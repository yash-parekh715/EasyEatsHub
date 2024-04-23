<?php
include 'conn.php';
try{
$id = $_GET['id'];
$msg = $_POST['msg'];
$uid = $_COOKIE['userid'];
$sql = "INSERT INTO `comments`(`RACIPE_ID`, `msg`, `USER_ID`) VALUES ('$id','$msg','$uid')";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location:../recipe.php?id=$id");
}else{
    header("Location:../recipe.php?id=$uid&couldnotsend=1");
}
}catch(Exception $e){
    echo $e->getMessage();
    echo "sql::::: " . $sql;
}
?>