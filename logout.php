<?php
setcookie('user',$name,time()-10,'/');
header('Location:index.php');
?>