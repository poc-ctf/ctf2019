<?php
$password = "mnil5qp";
$salt = 'bluefire2';
$flag = getenv("FLAG");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
</head>

<body id="page-top">
<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center content">
            <h1 class="mx-auto my-0 text-uppercase">Password</h1>
            <input type="password" name="password" id="password">
            <br/>
            <br/>
            <button class="submit btn btn-success">Login</button>
            <div class="alerts">
                <?php if ($_GET['p'] == $password) {
                    echo '<br /><br /><br /><div class="alert alert-danger">' . $flag . '</div>';
                } ?>
            </div>
        </div>
    </div>
</header>

<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/sha1.impl.js"></script>

<script>
    $('.submit').on('click', function () {
        let password = $("#password").val();
        let salt = "<?php echo $salt; ?>";
        if (sha1(salt + password) === "<?php echo sha1($salt . $password); ?>") {
            if (document.location.href.indexOf("p=") === -1) {
                document.location.href = document.location.href + "?p=" + password;
            }
        } else {
            $('.alerts').html('<br /><br /><br /><div class="alert alert-danger">Wrong password</div>');
        }
    });
</script>
</body>

</html>