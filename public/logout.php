<?php
session_start();
unset($_SESSION['loggedin']);
echo 'You are now logged out';
echo '<p><a href="login.php">login</a></p>';
?>