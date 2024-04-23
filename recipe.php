<?php
include 'server/conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
}else{
    header('location:recipes.php');
}
// $sql = "SELECT * FROM racipe WHERE racipe_id = '".$id."'";
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE r.RACIPE_ID =  '$id'";

// echo $sql;
// try {
//     //code...
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['rname'];
$id = $row['id'];
$pt = $row['pt'];
$ct = $row['ct'];
$ser = $row['ser'];

// $sql = "SELECT * FROM `about_recipe` WHERE `recipe_id` = '".$id."'";
// echo $sql;
// try {
//     //code
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
$cuisine = $row['cu'];
$diet = $row['d'];
$course = $row['co'];
$sql = "SELECT r.quantity as q,r.remark as r,a.INGREDIANT_NAME as n FROM ingrediant_details a join ingrediant_for_racipe r on r.ingrediant_id = a.ingrediant_id where r.racipe_id = '$id'" ;
$ingrediant = mysqli_query($conn, $sql);
$sql = "SELECT * FROM `instructions` where RACIPE_ID='$id'" ;
$instructions = mysqli_query($conn, $sql);
// echo $sql;
// } catch (\Throwable $th) {
//     $th->getMessage();
// }
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

<div class="container mb-0 px-4">
    <p class="display-1"><?php echo $name;?></p>
</div>
<div class="container px-5 mt-0 d-flex" style="flex-direction: column;">
    <span><span><?php echo $cuisine;?></span><span> / </span><span><?php echo $course;?></span></span>
    <span><?php echo $pt;?> mins : prep time</span>
    <span><?php echo $ct;?> mins: cooking Time</span>
    <span><?php echo $ct+$pt;?> mins : Total time</span>
    <span> <span><?php echo $ser;?> serveing</span><span> - <?php echo $diet;?></span> </span>
</div>           
            
<div class="container mb-4 px-4">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <p class="display-4">Ingredients</p>
            <div class="row">
                <div class="col-lg-9 col-12">

                    <ul class="list-group">
                        <?php 
                            while($row = mysqli_fetch_assoc($ingrediant)) {
                                echo '<li class="list-group-item">'.$row['q'].' '.$row['n'].' - '.$row['r'].'</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">


            <p class="display-4">Instructions</p>



            <ol>
                <?php 
                    $string = mysqli_fetch_assoc($instructions)['INSTRUCTION'];
                    $listinstrcuts = explode(",", $string);
                    foreach ($listinstrcuts as $value) {
                        # code...
                        echo '<li>'.$value.'</li>';
                    }
                   
                ?>
            </ol>
        </div>
    </div>

</div>

<div class="container">
    <p class="display-3">Commets</p>
    <div class="row">
        <div class="col-lg-7 col-sm-12">
 
            <div class="mb-3">
                <?php 
                if(isset($_COOKIE['user'])){
                ?>
                <form action="./server/addcomment.php?id=<?php echo $id;?>" method="post">
                    <label for="exampleFormControlTextarea1" class="form-label">Tell us about it</label>
                    <textarea class="form-control mb-4" id="exampleFormControlTextarea1" rows="4" name="msg"></textarea>
                    <input type="submit" class="btn btn-dark" value="send">
                </form>
                    <?php }else{?>
                        <p class="h5">login to comment <a href="login.php">login here</a> </p>
                    <?php }?>
            </div>

        </div>

        <div class="col-lg-8 col-sm-12">
            <?php
                $sql = "SELECT a.USER_ID as uid,a.msg as msg,b.user_name as name,a.Cid as Cid FROM comments a join log_in b on a.USER_ID=b.USER_ID WHERE RACIPE_ID=$id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    
                    ?>
                        <div class="row my-2">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header d-flex"><?php echo $row['name'];?>
                                    <?php 
                                        if ($row['uid'] == $_COOKIE['userid']){
                                            ?>
                                                <span class="me-2" style="margin-left: auto;"><a href="editcomment.php?cid=<?php echo $row['Cid']."&rid=".$id;?>">[Edit]</a></span>
                                                <span class="me-2" style="margin-left: 10px;"><a href="./server/deletecomment.php?cid=<?php echo $row['Cid']."&rid=".$id;?>">[Delete]</a></span>
                                            <?php
                                        }
                                        if ($_COOKIE['user']=='admin'){
                                            ?>
                                                <span class="me-2" style="margin-left: auto;"><a href="./server/deletecomment.php?cid=<?php echo $row['Cid']."&rid=".$id;?>">[Delete]</a></span>
                                            <?php
                                        }
                                    ?></div>
                                    <div class="card-body">
                                        <p class="class-text"><?php echo $row['msg'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>

    </div>
</div>

</body>
</html>