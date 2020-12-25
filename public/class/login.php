<?php
session_start();

if (isset($_POST['submit'])) {
    require 'connect.php';

    //Query user table to find the details submitted
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $values = [
        'username' => $_POST['email'],
        'password' => $_POST['password'] // level 1 password
        'password' => sha1($_POST['password']) // level 2 password
        'password' => sha1($_POST['email'].$_POST['password']) // level 3 password
    ];
    $stmt->execute($values);
    
    // Check its has record in table to activate session
    if ($stmt->rowCount() > 0) {
        $_SESSION['loggedin'] = true;
        echo 'You are now logged in';
        echo '<p>Welcome back ' . $_POST['email'] .'</p>';
        echo '<p><a href="session.php">Home Page</a></p>';
    }
    else {
        echo 'Sorry, your Email and password could not be found';
        echo '<p><a href="login.php">login</a></p>';
    }
}
else { //The submit button was not pressed, show the log-in form
?>
    <form action="login.php" method="POST">
    <label>Email: </label>
    <input type="text" name="email" />
    <label>Password: </label>
    <input type="password" name="password" />
    <input type="submit" name="submit" value="Log In" />
    </form>
<?php
}
?>