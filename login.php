<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['login'])) {
    header("location:index.php");
}

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {

        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
</body>

</html>