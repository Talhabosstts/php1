<?php

include 'connection.php';

if(isset($_POST['register'])){

$name =$_POST['name'];
$email =$_POST['email'];
$pass =$_POST['password'];
$address =$_POST['address'];

// echo $name .'<br>'.$email.'<br>'.$pass .'<br>'.$address;
$insert = mysqli_query($con, "INSERT into register(name, email, password, address)VALUES

('$name','$email','$pass','$address')");

if($insert){
    header('location: register.php');
}

}

// update start

if(isset($_POST['update'])){

$name =$_POST['name'];
$email =$_POST['email'];
$pass =$_POST['password'];
$address =$_POST['address'];

$update = mysqli_query($con,"update register set name = '$name',email ='$email'
,password='$password',address='$address' where id='$id'"); 

if($update){
    echo "<script>
    alert('data update succesfully');
    location.assign('fetch.php');
    </script>";
}
}

// update end

?>