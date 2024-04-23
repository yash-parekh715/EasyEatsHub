<?php
// $name= $_POST['name'];
include 'conn.php';
$email= $_POST['email'];
$password= $_POST['password'];


if($email=="admin@a.com" && $password=="admin"){
    setcookie('user','admin',time()+60*60*24*30,'/');
    setcookie('userid','0',time()+60*60*24*30,'/');
    header('location:../index.php');
}else{
    $sql = "SELECT * from log_in where email='$email' and password='$password' order by USER_ID desc limit 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        header('location:../login.php?wrong=1');
    }else{
        
        header('location:../index.php');
        $row = mysqli_fetch_assoc($result);
        setcookie('user',$row['USER_NAME'],time()+60*60*24*30,'/');
        setcookie('userid',$row['USER_ID'],time()+60*60*24*30,'/');
    }
}
?>