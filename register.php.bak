<?php
include('/inc/sql.php');
if(!empty($_POST['submit'])) {
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['key'])) {
        echo "You Didn't Complete a form!";
    }
    elseif($_POST['password'] != $_POST['password_confirm']) {
        echo "Your passwords do not match!";
    }
    else {
        $user = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $key = $_POST['key'];
        $statement = $db->prepare("INSERT INTO `users1` (`id`, `username`, `first`, `last`, `email`, `password`, `classID`, `classKEY`) VALUES ('NULL', $user, $fname, $lname, $email, '', '', $key");
        $statement->execute();
        echo "Registered!";
    }
}
else {
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>iClassroom | Register - Development (Port 82)</title>
    </head>
    <body>
        <center>
            <form name="register" action="register.php" method="post">
                <label>Username: </label> <input type="text" name="username" /><br />
                <label>Password: </label> <input type="text" name="password" /><br />
                <label>Password (again): </label> <input type="text" name="password_confirm" /><br />
                <label>First Name: </label> <input type="text" name="fname" /><br />
                <label>Last Name: </label> <input type="text" name="lname" /><br />
                <label>Class Key (You should get this from your teacher): </label> <input type="text" name="key" /><br />
                <input type="submit" name="submit" value="Login"/><br />
            </form>
        </center>
    </body>
</html>


    <?php
}
?>