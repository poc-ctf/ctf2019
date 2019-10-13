<?php
require_once __DIR__ . '/../config/header.php';


if (!$_SESSION['valid']) {
    header("Location: /index.php?err=1");
    exit();
}

if (strlen($_POST['comment']) > 3000) {
    header("Location: /index.php?err=2");
    exit();
}

function stripUnwantedTagsAndAttrs($html_str) {
    if (!strlen($html_str)) {
        return false;
    }

    $allowed_tags = array("b", "br", "em", "hr", "i", "p", "s", "span", "style");
    $allowed_attrs = array("class", "id", "style");

    $xml = new DOMDocument();
    libxml_use_internal_errors(true);

    if ($xml->loadHTML($html_str, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD)) {
        foreach ($xml->getElementsByTagName("*") as $tag) {
            if (!in_array($tag->tagName, $allowed_tags)) {
                $tag->parentNode->removeChild($tag);
            } else {
                foreach ($tag->attributes as $attr) {
                    if (!in_array($attr->nodeName, $allowed_attrs)) {
                        $tag->removeAttribute($attr->nodeName);
                    }
                }
            }
        }
    }
    return $xml->saveHTML();
}

$stmt = Config::db()->prepare(
    "INSERT INTO comment (token, title, comment, time) 
                VALUES (:token, :title, :comment, :time)"
);

$stmt->bindParam(':token', $_SESSION['token']);
$stmt->bindParam(':title', stripUnwantedTagsAndAttrs($_POST['title']));
$stmt->bindParam(':comment', stripUnwantedTagsAndAttrs($_POST['comment']));
$stmt->bindParam(':time', (new DateTime())->getTimestamp());

$stmt->execute();

require_once __DIR__ . '/../config/footer.php';

header("Location: /comments.php");
exit();