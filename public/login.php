<?php
session_start();

if (isset($_POST['submit'])) {
    require 'connect.php';

    //Query user table to find the details submitted
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $values = [
        'email' => $_POST['email'],
    ];
    $stmt->execute($values);
    $user = $stmt->fetch();

    // Check its has record in table to activate session
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['loggedin'] = $user['id'];
        
        echo 'You are now logged in';
        echo '<p>Welcome back ' . $_POST['name'] .'</p>';
        echo '<p><a href="session.php">Home Page</a></p>';
    }
    else {
        echo 'Sorry, your account could not be found';
        echo '<p><a href="login.php">login</a></p>';
    }
}
else { //The submit button was not pressed, show the log-in form
?>
    <link rel="stylesheet" href="test.css">

    <form action="login.php" method="POST">

    <label>Email: </label>
    <input type="text" name="email" />

    <label>Password: </label>
    <input type="password" name="password" />

    <label>Enter Name:</label>
	<input type="text" name="name" />

    <input type="submit" name="submit" value="Log In" />
    </form>
<?php
}
?>