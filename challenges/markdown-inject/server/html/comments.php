<?php

use Michelf\MarkdownExtra;

require_once __DIR__ . '/../config/header.php';
require_once __DIR__ . '/../vendor/autoload.php';

if (!$_SESSION['valid']) {
    header("Location: /index.php");
    exit();
} ?>

    <div>
        Twój token: <div id="user-token" data-token="scs2019{<?php echo $_SESSION['token']; ?>}"><?php echo $_SESSION['token']; ?>
    </div>

    <div>
        <form action="comment.php" method="POST">
            <input type="text" name="title">
            <textarea name="comment">U can use markdown style</textarea>
            <input type="submit" value="send"/>
        </form>
    </div>

<? $results = Config::userRepository()->getComments($_SESSION['token']);

$parser = new Michelf\MarkdownExtra();
$parser->no_entities = true;
$parser->no_markup = true;

if (!empty($results)) {
    foreach ($results as $result) {
        echo '<div>';
        echo '<div>' . $result['title'] . ' ' . date("Y-m-d H:i:s", $result['time']) . '</div>';
        echo '<div>' . $parser->transform($result['comment']) . '</div>';
        echo '</div>';
    }
}
require_once __DIR__ . '/../config/footer.php';