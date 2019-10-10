<?php
header('Access-Control-Allow-Origin: *');

$mysql_host = "ww.zzz.com.ua";
$mysql_database = "dimasik2283030";
$mysql_user = "dimasik228303";
$mysql_password = "zalupa228";
$link = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Ошибка при подключении MySQL" );
mysql_select_db($mysql_database, $link) or die ('Ошибка при подключении к БД');
if(isset($_POST['name'])) $name = $_POST['name'];
if(isset($_POST['score'])) $score = $_POST['score'];

if(isset($name) && isset($score)) {

$q1 = mysql_query("SELECT * FROM `result_table` WHERE `name`='".$name."'");


if(mysql_num_rows($q1) == 1) {


$array = mysql_fetch_array($q1);


if($score > $array['score']) $q3 = mysql_query("UPDATE `result_table` SET `score`='".$score."' WHERE `name`='".$name."'");
}
else 
$q2 = mysql_query("INSERT INTO `result_table`(`name`, `score`) VALUES ('".$name."', '".$score."')");
}


$q4 = mysql_query("SELECT * FROM `result_table` ORDER BY `score` DESC");

$i=0;
while($row = mysql_fetch_row($q4)){

    if($i<20) {
	echo $row[0].' - '.$row[1].'|';
	$i=$i+1;
	}
}
?>