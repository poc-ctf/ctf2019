<?php
require_once __DIR__ . '/../config/config.php';
ob_start();
session_start();
?>
<html lang="en">
<head>
    <title>Complain system</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
</head>

<body>
<div>
    <?php if (empty($_SESSION['valid'])) { ?>
        <a href="/register.php" tite="Logout">Register</a>
    <?php } else { ?>
        <a href="/logout.php" tite="Logout">Logout</a>
    <?php } ?>
</div>