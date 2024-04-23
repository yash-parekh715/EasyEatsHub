<?php
include 'server/conn.php';
if (isset($_GET['cid'])) {
    $id=$_GET['cid'];
    $rid=$_GET['rid'];
}else{
    header('location:recipes.php');
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'top.php';?>
    <?php if(isset($_GET['couldnotsend'])){echo '<script>alert("could not send data");</script>';} ?>
</head>
<body>
<?php include 'nav.php';?>

            

</div>

<div class="container">
    <p class="display-3"> Edit Comment</p>
    <div class="row">
 

        <div class="col-lg-8 col-sm-12">
            <?php
                $sql = "SELECT a.msg as msg,b.user_name as name FROM comments a join log_in b on a.USER_ID=b.USER_ID WHERE a.Cid=$id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    
                    ?>
                        <form action="./server/editcomment.php?cid=<?php echo $id."&rid=".$rid;?>" method="post">
                    <label for="exampleFormControlTextarea1" class="form-label">Tell us about it</label>
                    <textarea class="form-control mb-4" id="exampleFormControlTextarea1" rows="4" name="msg"><?php 
                        $sql = "SELECT * FROM `comments` WHERE Cid ='$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row['msg'];
                    ?></textarea>
                    <input type="submit" class="btn btn-dark" value="send">
                </form>
                    <?php
                }
            ?>
        </div>

    </div>
</div>

</body>
</html>