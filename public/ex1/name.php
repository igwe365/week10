<?php
    session_start();

    if (isset($_POST['submit'])) {    

        $_SESSION['name'] = $_POST['name'];
        echo '<p><a href="welcome.php">Welcome</a></p>';

    }
else{
?>
    <form action="name.php" method="POST">
    <label>Enter Name: </label> <input type="text" name="name" />
    <input type="submit" name="submit" value="Log In" />
    </form>
<?php
}
?>