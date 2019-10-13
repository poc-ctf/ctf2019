<?php
require_once __DIR__ . '/../config/header.php';
?>
    <h2>Enter Username and Password</h2>
    <div class="container form-signin">

        <?php
        $msg = '';
        $userRepository = Config::userRepository();

        if (empty($_GET['err'])) {
            if ($_GET['err'] == 1) {
                $msg = "Problem with login";
            } else if ($_GET['err'] == 2) {
                $msg = "Too much characters";
            }
        }

        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            if ($userRepository->isBadLogin($_POST['username'])) {
                $msg = 'Too many wrong login attempts';
            } else if ($userRepository->isUserValidByUserName($_POST['username'], $_POST['password'])) {
                $userRepository->fillSession($userRepository->getUserByUserName(
                    $_POST['username'],
                    $_POST['password']
                ));

                header("Location: /comments.php");
                exit();
            } else {
                $userRepository->setBadLogin($_POST['username']);
                $msg = 'Wrong username or password';
            }
        } else if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['token'])) {
            if ($userRepository->isBadLogin($_POST['username'])) {
                $msg = 'Too many wrong login attempts';
            } else if ($userRepository->isUserValidByToken($_POST['token'])) {
                $userRepository->fillSession($userRepository->getUserByToken($_POST['token']));
                header("Location: /comments.php");
                exit();
            } else {
                $userRepository->setBadLogin($_POST['username']);
                $msg = 'Wrong token';
            }
        } ?>
    </div> <!-- /container -->

    <div class="container">
        <form class="form-signin" role="form" action="?" method="post">
            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
            <input type="text" class="form-control"
                   name="username" placeholder="username"
                   required autofocus></br>
            <input type="password" class="form-control"
                   name="password" placeholder="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit"
                    name="login">Login
            </button>
        </form>
        <br/>
        Możesz również podać swój token:
        <form class="form-signin" role="form" action="?" method="post">
            <h4 class="form-signin-heading">Zaloguj się za pomocą tokena</h4>
            <input type="text" class="form-control"
                   name="username" placeholder="username"
                   required autofocus></br>
            <input type="text" class="form-control" name="token" placeholder="token" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit"
                    name="login">Login
            </button>
        </form>
    </div>

<?php
require_once __DIR__ . '/../config/footer.php';
?>