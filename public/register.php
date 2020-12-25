<?php
require 'connect.php';
    
if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('INSERT INTO  users (email,password,name) VALUES (:email,:password,:name)');

    $values = [
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'password' => $hash = password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];

    $stmt->execute($values);
    echo 'Registration done!';
    echo '<p><a href="login.php">login Page</a></p>';
}
else {
?>
<link rel="stylesheet" href="test.css">

<form action="register.php" method="POST">
    <!--create name  -->
	<label>Enter Email:</label>
	<input type="text" name="email" />

    <!-- create password -->
    <label>Create Password:</label>
	<input type="text" name="password" />

    <!-- enter name -->
    <label>Enter Name:</label>
	<input type="text" name="name" />

	<input type="submit" name="submit" value="Add" />
</form>
<?php
}
?>
