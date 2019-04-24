<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// Getting Users
if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select * from users";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}

// Change Password
if(isset($_POST['change'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select * from users";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html>
    <head>
    <title>Omobio</title>
    </head>
    <body>
        <h1>Users</h1>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>

        <button onclick="window.location.href = 'change_password.php';">Change Password</button>

        <?php if($num > 0){ ?>
            <table border="1" cellpadding="3">
                <tr><td colspan="2" align="center">Users Info</td></tr>
                <tr>
                    <td>Name: <?php echo $arr['FirstName']; ?></td>
                </tr>
                <tr>
                    <td>Email: <?php echo $arr['Email']; ?></td>
                </tr>
            </table>
            <?php }
                else{ ?>
                User not found.
                <?php } ?>
    </body>
</html>