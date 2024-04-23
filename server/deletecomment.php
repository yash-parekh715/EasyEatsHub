<?php
include 'conn.php';
try{
$cid = $_GET['cid'];
$rid = $_GET['rid'];

$msg = $_POST['msg'];
$uid = $_COOKIE['userid'];
$sql = "DELETE FROM `comments` WHERE cid='$cid'";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location:../recipe.php?id=$rid");
}else{
    header("Location:../recipe.php?id=$rid&couldnotsend=1");
}
}catch(Exception $e){
    echo $e->getMessage();
    echo "sql::::: " . $sql;
}
?>