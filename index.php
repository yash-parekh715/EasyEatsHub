<?php
include 'server/conn.php';
$sql = "SELECT count(*) as rs FROM racipe";
$rs = mysqli_fetch_assoc(mysqli_query($conn, $sql))['rs'];
$sql = "SELECT count(*) as rs FROM ingrediant_details";
$is = mysqli_fetch_assoc(mysqli_query($conn, $sql))['rs'];
$sql = "SELECT count(DISTINCT cusine) as rs FROM about_recipe";
$cu = mysqli_fetch_assoc(mysqli_query($conn, $sql))['rs'];
$sql = "SELECT count(DISTINCT diet) as rs FROM about_recipe";
$co = mysqli_fetch_assoc(mysqli_query($conn, $sql))['rs'];

$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE r.racipe_id in (5,500,456,789,451,2000,985,6544,5800) limit 9";
$tops = mysqli_query($conn, $sql);
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id order by r.racipe_id desc limit 9";
$news = mysqli_query($conn, $sql);
?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyEatsHub</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        header>div.container-fluid {
            min-height: 90vh;
        }

        .statsCard {
            background: #fcfcfc;
            border: 1px solid #55555555;
            border-radius: 10px;
        }

        .card.links {
            cursor: pointer;
        }

        .card.links:hover {
            box-shadow: 1px 2px 2px 4px #000000aa;
        }

        .bg-info {
            background-color: #FFDEAD !important;
        }
    </style>
    <?php include 'top.php'; ?>
</head>

<body>
    <?php include 'nav.php'; ?>
    <header>

        <div class="container-fluid bg-light p-4">

            <div class="container my-5">
                <div class="px-4 py-5 my-5 text-center">
                    <!-- <img class="d-block mx-auto mb-4" src="qs.png" alt="" width="135" height="auto"> -->
                    <h1 class="display-5 fw-bold">Delight in Every
                        Bite<?php if (isset($_COOKIE['user'])) {
                            echo ", " . $_COOKIE['user'];
                        } ?></h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">Explore our carefully crafted collection of dishes, designed to cater to
                            different dietary preferences and skill levels.</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3"
                                onclick="location.replace('recipes.php')">Explore</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4"
                                onclick="location.replace('aboutus.php')">About us</button>
                        </div>
                    </div>
                </div>
            </div>


    </header>
    <div class="container-fluid px-5 mb-5 p-4 bg-info">
        <div class="row">
            <p class="display-2">
                Explore
            </p>
        </div>
        <div class="row my-3 p-4">
            <div class="col-lg-3 col-sm-6 text-center mb-2">
                <div class="statsCard py-3">
                    <div class="statsCard-icon">
                        <h2><?php echo $rs; ?></h2>
                    </div>
                    <div class="statsCard-content">
                        <h3>Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 text-center mb-2">
                <div class="statsCard py-3">
                    <div class="statsCard-icon">
                        <h2><?php echo $is; ?></h2>
                    </div>
                    <div class="statsCard-content">
                        <h3>Ingredients</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 text-center mb-2">
                <div class="statsCard py-3">
                    <div class="statsCard-icon">
                        <h2><?php echo $cu; ?></h2>
                    </div>
                    <div class="statsCard-content">
                        <h3>Cuisine</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 text-center mb-2">
                <div class="statsCard py-3">
                    <div class="statsCard-icon">
                        <h2><?php echo $co; ?></h2>
                    </div>
                    <div class="statsCard-content">
                        <h3>Course</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid my-5 px-5">
        <div class="row">
            <p class="display-2">
                Top Recipes
            </p>
        </div>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($tops)) {

                ?>
                <div class="col-lg-4 col-12 px-4 my-3">

                    <div class="card links">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['rname']; ?></h5>
                        </div>

                        <div class="card-body">
                            <p>
                                <?php
                                echo $row['pt'] + $row['ct'] . 'mins,' . $row['ser'] . " serving";
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $row['co'] . ' / ' . $row['cu'] . ' / ' . $row['d'];
                                ?>
                            </p>
                            <a href="recipe.php?id=<?php echo $row['id']; ?>" class="card-link">Explore more</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <section class="">
        <div class="container-fluid my-5 px-5">
            <div class="row">
                <p class="display-2">
                    NEW Recipes
                </p>
            </div>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($news)) {

                    ?>
                    <div class="col-lg-4 col-12 px-4 my-3">

                        <div class="card links">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['rname']; ?></h5>
                            </div>

                            <div class="card-body">
                                <p>
                                    <?php
                                    echo $row['pt'] + $row['ct'] . 'mins,' . $row['ser'] . " serving";
                                    ?>
                                </p>
                                <p>
                                    <?php
                                    echo $row['co'] . ' / ' . $row['cu'] . ' / ' . $row['d'];
                                    ?>
                                </p>
                                <a href="recipe.php?id=<?php echo $row['id']; ?>" class="card-link">Explore more</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>

</html>