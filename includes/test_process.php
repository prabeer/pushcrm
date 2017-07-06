<?php
include 'functions.php';
$img = fileValidator($_FILES['img1'],array("jpg","pdf"));
echo $img;
if(($img))
{
	echo $img;
}else {
	echo 'No Format';
}
?>