<?php
include ("class/users.php");	
$register=new users;	
extract($_POST);

$password = $_POST['pass'];

$passwordmd5 = md5($password);
$query="insert into signup values ('','$name','$id','$email','$passwordmd5')";

if($register->signup($query))
{
	$register->url("index.php?run=success");
}
?>