--register
$sql = "INSERT INTO `log_in`( `USER_NAME`, `email`, `PASSWORD`) VALUES('$name', '$email', '$password')";

$sql = "SELECT * from log_in where email='$email' and password='$password' order by USER_ID desc limit 1";

--login
$sql = "SELECT * from log_in where email='$email' and password='$password' order by USER_ID desc limit 1";

--cometd
$sql = "INSERT INTO `comments`(`RACIPE_ID`, `msg`, `USER_ID`) VALUES ('$id','$msg','$uid')";
$sql = "DELETE FROM `comments` WHERE cid='$cid'";
$sql = "UPDATE `comments` SET msg='$msg' WHERE cid='$cid'";



-- index
-- numbers
$sql = "SELECT count(*) as rs FROM racipe";
$sql = "SELECT count(*) as rs FROM ingrediant_details";
$sql = "SELECT count(DISTINCT cusine) as rs FROM about_recipe";
$sql = "SELECT count(DISTINCT diet) as rs FROM about_recipe";
--top,new
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE r.racipe_id in (5,500,456,789,451,2000,985,6544,5800) limit 9";

$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id order by r.racipe_id desc limit 9";


--racipe specific
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE r.RACIPE_ID =  '$id'";

--ingrediant
$sql = "SELECT r.quantity as q,r.remark as r,a.INGREDIANT_NAME as n FROM ingrediant_details a join ingrediant_for_racipe r on r.ingrediant_id = a.ingrediant_id where r.racipe_id = '$id'" ;
--instructions
$sql = "SELECT * FROM `instructions` where RACIPE_ID='$id'" ;
--comets 
$sql = "SELECT a.USER_ID as uid,a.msg as msg,b.user_name as name,a.Cid as Cid FROM comments a join log_in b on a.USER_ID=b.USER_ID WHERE RACIPE_ID=$id";
               

--racipe search
-- searched all number only
$sql ="SELECT count(*) as rs FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE (cusine = '$cuisine' OR 'All' = '$cuisine') AND (diet = '$diet' OR 'All' = '$diet' ) AND (course = '$course' OR 'All' = '$course' ) AND (RACIPE_NAME like '%$name%' or 'All' = '$name') AND (PREP_TIME+COOK_TIME < $time) ";

-- 20 with offset
$sql = "SELECT r.racipe_id as id,a.cusine as cu, a.diet as d, a.course as co, r.RACIPE_NAME as rname, r.prep_time as pt, r.cook_time as ct, r.serving as ser FROM about_recipe a join racipe r on a.racipe_id=r.racipe_id WHERE (cusine = '$cuisine' OR 'All' = '$cuisine') AND (diet = '$diet' OR 'All' = '$diet' ) AND (course = '$course' OR 'All' = '$course' ) AND (RACIPE_NAME like '%$name%' or 'All' = '$name') AND (PREP_TIME+COOK_TIME < $time) limit 20 offset $offset";


