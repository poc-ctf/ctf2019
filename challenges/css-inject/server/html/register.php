<?php
require_once __DIR__ . '/../config/header.php';
?>
<h2>Register your account</h2>
<div class="container form-signin">
    <?php $msg = '';
    $userRepository = Config::userRepository();

    if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        if (!$userRepository->isUserValidByUserName($_POST['username'], $_POST['password'])) {
            $userRepository->registerUser($_POST['username'], $_POST['password']);

            header("Location: /");
            exit();
        } else {
            $msg = 'User already exist';
        }
    } ?>
</div>
<div class="container">
    <form class="form-signin" role="form" action="?" method="post">
        <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
        <input type="text" class="form-control" name="username" placeholder="username" required autofocus /></br>
        <input type="password" class="form-control" name="password" placeholder="password" required /></br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
    </form>
</div>

<?php
require_once __DIR__ . '/../config/footer.php';
?>