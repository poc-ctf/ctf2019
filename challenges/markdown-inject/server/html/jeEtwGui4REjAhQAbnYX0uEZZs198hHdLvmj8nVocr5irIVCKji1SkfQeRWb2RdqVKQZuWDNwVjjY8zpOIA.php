<?php

if (
    empty($_GET['GZwm2Hn7IpuheuGqblWfl6fCgtZpJ7RfTtWmtClhC3zVdfNOTmHI1GjibJKeHFGu']) ||
    $_GET['GZwm2Hn7IpuheuGqblWfl6fCgtZpJ7RfTtWmtClhC3zVdfNOTmHI1GjibJKeHFGu'] == 'jBJGmUEQKztBb/Y+otU+3GXpd1XXjBv221RSKrs+BMlYiPm0j1I3yZbgQeRKTDsN7bBblYqf96uJyYQmA1YozA=='
) {
    header("Location: /index.php");
    exit();
}

if (!empty($_GET['tokens'])) {
    require_once __DIR__ . '/../config/config.php';
    echo json_encode(Config::userRepository()->getNotVisitedTokens());
    exit();
}

if (empty($_GET['YR8S99QPE0dVSnm0mbJDL7Eef0eV9vX0g'])) {
    header("Location: /index.php");
    exit();
}

if (empty($_GET['tokens'])) {
    require_once __DIR__ . '/../config/header.php';
    require_once __DIR__ . '/../vendor/autoload.php'; ?>

    <div>
    Twój token: <div id="user-token" data-token="flag{<?php echo Config::flag(); ?>}"><?php echo Config::flag(); ?>
    </div>

    <? $results = Config::userRepository()->getAdminComments($_GET['YR8S99QPE0dVSnm0mbJDL7Eef0eV9vX0g']);
    $parser = new Michelf\MarkdownExtra();
    $parser->no_entities = true;
    $parser->no_markup = true;

    if (!empty($results)) {
        foreach ($results as $result) {
            echo '<div id="comments">';
            echo '<div>' . $result['title'] . '</div>';
            echo '<div>' . $parser->transform($result['comment']) . '</div>';
            echo '</div>';
        }
    } ?>
    <script>
        var myLinks = document.getElementById("comments").getElementsByTagName("a");
        for (var i = 0; i < myLinks.length; i++) {
            myLinks[i].click();
        }
    </script>
    <?php
    require_once __DIR__ . '/../config/footer.php';
}