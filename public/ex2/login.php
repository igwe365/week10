<?php
session_start();
if (isset($_POST['submit'])) {
 //Check they entered the correct username/password
    if ($_POST['username'] === 'igwe' && $_POST['password'] === 'maganie') {
    $_SESSION['loggedin'] = true;
    echo '<p>Welcome back ' . $_POST['username'] .'</p>';
    echo '<p><a href="session.php">Welcome</a></p>';
    }
 //If they didn't, display an error message
    else {
    echo '<p>You did not enter the correct username and password</p>';
    echo '<p><a href="login.php">login</a></p>';
    }
}
else { //The submit button was not pressed, show the log-in form
?>
    <form action="login.php" method="POST">
    <label>Username: </label>
    <input type="text" name="username" />
    <label>Password: </label>
    <input type="password" name="password" />
    <input type="submit" name="submit" value="Log In" />
    </form>
<?php
}
?>