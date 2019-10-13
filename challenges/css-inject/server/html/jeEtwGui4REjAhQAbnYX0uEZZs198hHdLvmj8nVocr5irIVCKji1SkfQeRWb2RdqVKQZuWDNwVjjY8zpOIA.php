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
    require_once __DIR__ . '/../config/header.php'; ?>


    <div>
    Twój token: <div id="user-token" data-token="flag{<?php echo Config::flag(); ?>}"><?php echo Config::flag(); ?>
    </div>

    <? $results = Config::userRepository()->getAdminComments($_GET['YR8S99QPE0dVSnm0mbJDL7Eef0eV9vX0g']);
    if (!empty($results)) {
        foreach ($results as $result) {
            echo '<div>';
            echo '<div>' . $result['title'] . '</div>';
            echo '<div>' . $result['comment'] . '</div>';
            echo '</div>';
        }
    }
    require_once __DIR__ . '/../config/footer.php';
}