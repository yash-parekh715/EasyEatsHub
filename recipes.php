<?php
include 'server/conn.php';
if(isset($_GET['name'])){
    if($_GET['name']=="" ){
        $name="All";
    }else{
        $name = $_GET['name'];
    }
}else{
    $name = 'All';
}
if(isset($_GET['course'])){
    $course = $_GET['course'];
}else{
    $course = 'All';
}
if(isset($_GET['cuisine'])){
    $cuisine = $_GET['cuisine'];
}else{
    $cuisine = 'All';
}
if(isset($_GET['diet'])){
    $diet = $_GET['diet'];
}else{
    $diet = 'All';
}
if(isset($_GET['time'])){
    if($_GET['time']==""){
        $time = 999;
    }else{

        $time = (int)$_GET['time'];
    }
}else{
    $time = 999;
}

if(isset($_GET['page'])){
    $offset = ((int)$_GET['page'])*20;
    $offset = $offset - 20;
}else{
    $offset = 0;
}
// echo $course."\n".$name."\n".$offset."\n".$cuisine."\n".$diet."\n";
// $total = 
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE (cusine = '$cuisine' OR 'All' = '$cuisine') AND (diet = '$diet' OR 'All' = '$diet' ) AND (course = '$course' OR 'All' = '$course' ) AND (RACIPE_NAME like '%$name%' or 'All' = '$name') AND (PREP_TIME+COOK_TIME < $time) limit 20 offset $offset";
// echo $sql;
$result = mysqli_query($conn, $sql);
$overalltotal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as rs FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE (cusine = '$cuisine' OR 'All' = '$cuisine') AND (diet = '$diet' OR 'All' = '$diet' ) AND (course = '$course' OR 'All' = '$course' ) AND (RACIPE_NAME like '%$name%' or 'All' = '$name') AND (PREP_TIME+COOK_TIME < $time) "))['rs'];
$pages = ($overalltotal % 20==0) ?  ($overalltotal/20): ($overalltotal/20)+1;
$sql = "SELECT DISTINCT cusine as rs FROM about_recipe";
$cuisinelist = mysqli_query($conn, $sql);
$sql = "SELECT DISTINCT COURSE as rs FROM about_recipe";
$courselist = mysqli_query($conn, $sql);
$sql = "SELECT DISTINCT diet as rs FROM about_recipe";
$dietlist =  mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recipes list</title>
    <?php include 'top.php';?>

</head>
<body>
    <?php include 'nav.php';?>

    <div class="container p-4">
        <form>
            <div class="conatiner">
                <div class="row">
                    <div class="col-10 offset-lg-2">

                        <label for="exampleFormControlInput1 col-10 offset-lg-2" class="form-label">begin the journey</label>
                    </div>
                    <div class="col-lg-6 offset-lg-2">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Recipe" <?php
                                if($name=="All"){
                                    echo "";
                                }else{
                                    echo 'value="' . $name . '"';
                                }
                            ?>>
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <label class="mb-2 form-label">Course:</label>
                        <select name="course" class="form-select " aria-label="Default select example">
                        <option >All</option>
                        <?php
                            $nums= mysqli_num_rows($courselist);
                            while($row = mysqli_fetch_assoc($courselist)){
                               
                                echo "<option value=\"".$row['rs']."\" ".(($row['rs']==$course)?" selected":"").">".$row['rs']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="mb-2 form-label">Cuisine:</label>
                        <select name="cuisine" class="form-select " aria-label="Default select example">
                        <option>All</option>
                        <?php
                            $nums= mysqli_num_rows($cuisinelist);
                            while($row = mysqli_fetch_assoc($cuisinelist)){
                               
                                echo "<option value=\"".$row['rs']."\" ".(($row['rs']==$cuisine)?" selected":"").">".$row['rs']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="mb-2 form-label">Diet:</label>
                        <select name="diet" class="form-select " aria-label="Default select example">
                        <option >All</option>
                        <?php
                            $nums= mysqli_num_rows($dietlist);
                            while($row = mysqli_fetch_assoc($dietlist)){
                               
                                echo "<option value=\"".$row['rs']."\" ".(($row['rs']==$diet)?" selected":"").">".$row['rs']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Total Time (mins)</label>
                    <input type="number" name="time" class="form-control" id="exampleFormControlInput1" placeholder="45" <?php 
                    if ($time==999){
                        echo "";
                    }else{
                        echo 'value="'.$time.'"';
                    }
                    ?>>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div class="container-fluid px-4 my-4">
        <div class="row">
            <p class="display-4">
                <span><?php echo $overalltotal;?></span>  Recipes Found
            </p>
        </div>
        <div class="row">
            <?php
            while($row = mysqli_fetch_assoc($result) ){

            ?>
            <div class="col-lg-4 col-12 px-4 my-3">

                <div class="card links">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['rname'];?></h5>
                  </div>
                  
                  <div class="card-body">
                    <p>
                        <?php
                        echo $row['pt']+$row['ct'].'mins,'.$row['ser'] ." serving";
                        ?>
                    </p>
                    <p>
                        <?php 
                            echo $row['co'].' / '.$row['cu'].' / '.$row['d'];
                        ?>
                    </p>
                    <a href="recipe.php?id=<?php echo $row['id'];?>" class="card-link">Explore more</a>
                  </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 " style="overflow: auto;">
                <nav aria-label="..." class="d-flex">
                    <ul class="pagination mx-auto">
                        <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Go to page:</a>
                        </li>
                        <?php
                        
                        if(isset($_GET['page']) ){
                            $a = $_GET['page'];
                        }else{
                            $a = 1;
                        }
                        $link="?";
                        foreach ($_GET as $key => $value) {
                            if($key!= "page"){
                                $link.= $key."=" . $value ."&";
                            }
                        }
                        $link.="page=" ;
                        for ($i=1; $i <= $pages; $i++) { 
                            if($i == $a){
                                echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="'.$link.$i.'">'.$i.'</a></li>';
                            }
                        }
                        ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>
