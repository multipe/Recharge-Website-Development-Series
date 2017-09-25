<?php
include 'db.php';

  if(isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['mobile']) AND isset($_POST['password'])){
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];  
$password=$_POST['password'];
$password1=md5($password);

$errors=array();
unset($errors);

//Empty
if(strlen($name)<1){
$errors[]='Full name field left empty!';
}


if(strlen($email)<1){
$errors[]='Email field left empty!';
}


if(strlen($mobile)<1){
$errors[]='Mobile Number field left empty!';
}

if(strlen($password)<1){
$errors[]='Password field left empty!';
}


if(!preg_match('/^([a-zA-Z0-9_-]+)\@([a-zA-Z0-9_.-]+)\.([a-zA-Z0-9_.-]+)$/', $email)){
$errors[]='Email is not valid!';
}

if(!is_numeric($mobile)){
$errors[]='mobile Number is not valid!';
}


$emch=mysql_query("SELECT * FROM users WHERE email='$email'");

if(mysql_num_rows($emch)>0){
$errors[]='Email already registered with another account!';
}


$emcha=mysql_query("SELECT * FROM users WHERE number='$mobile'");

if(mysql_num_rows($emcha)>0){
$errors[]='Mobile number already registered with another account!';
}


if(empty($errors)){

  $doreg=mysql_query("INSERT INTO users (email,password,name,number,status,balance) VALUES ('$email','$password1','$name','$mobile','1','0')");

  if($doreg){
 
	
	echo '<font color="green">User Registered Successfully.</font>';




    
}
else {
echo 'unknown error!';
}
}
else {


foreach($errors as $error){
echo '<li><font color="red"> '.$error.'</a></li>';
}

}


  }

?>