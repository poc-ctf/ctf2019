<?php
require_once __DIR__ . '/../config/header.php';
$_SESSION['valid'] = false;
$_SESSION['name'] = null;
$_SESSION['password'] = null;
$_SESSION['token'] = null;
?>
<h2>You logged out</h2>
<?php
require_once __DIR__ . '/../config/footer.php';
?>