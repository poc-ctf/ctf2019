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
            <div class="alerts"></div>
        </div>
    </div>
</header>

<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/sha1.impl.js"></script>

<script>
    $('.submit').on('click', function () {
        let password = $("#password").val();
        $.get('flag.php?password' + password, function(data) {
            $('.alerts').html(data);
        });
    });
</script>
</body>

</html>