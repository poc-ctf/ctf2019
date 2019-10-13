<?php
require_once __DIR__ . '/../config/header.php';


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
            <textarea name="comment">U can use only this tags: "b", "br", "em", "hr", "i", "p", "s", "span", "style" and this attributes: "class", "id", "style"</textarea>
            <input type="submit" value="send"/>
        </form>
    </div>

<? $results = Config::userRepository()->getComments($_SESSION['token']);
if (!empty($results)) {
    foreach ($results as $result) {
        echo '<div>';
        echo '<div>' . $result['title'] . ' ' . date("Y-m-d H:i:s", $result['time']) . '</div>';
        echo '<div>' . $result['comment'] . '</div>';
        echo '</div>';
    }
}
require_once __DIR__ . '/../config/footer.php';