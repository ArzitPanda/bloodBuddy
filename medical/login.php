

<?php

include('../config/config.php');




if(isset($_SESSION['mid']))
{
    header("Location: index.php");
}





$data =$_POST;


$type =$data['type'];
$msg="";

$data =$_POST['email'];
$pass =$_POST['pass'];








if($type==2)
{

$loginQ ="SELECT * FROM hospital WHERE `hemail`='$data' AND `hpassword`='$pass' ";

$res= mysqli_query($conn,$loginQ);
$logindat =mysqli_fetch_row($res);

print_r($logindat);

    if($logindat==null)
    {
        ?>

<script>
    alert("invalid email or password")
</script>

<?php
    }
    else
    {
        $_SESSION['mid']=$logindat[0];
        
    
        header("Location: index.php");
        exit();
    }




   

}
if($type==1)
{


    $email=$_POST['email'];
    $name=$_POST['name'];
    $add=$_POST['address'];
   


$checkQ ="SELECT * FROM hospital WHERE `hemail`='$email'";
$execute = mysqli_query($conn,$checkQ);
$data =mysqli_fetch_all($execute);
if(count($data)>0)
{

    
?>

<script>
    alert("hospital already present try to login")
</script>

<?php


}

if(count($data)==0)
{


  print_r($_POST);

    $signQ ="INSERT INTO hospital(`hname`, `hemail`, `hpassword`, `address`) VALUES ('$name', '$email', '$pass', '$add');";




    $execute=mysqli_query($conn,$signQ);
    $signdata= mysqli_affected_rows($conn);

    print_r($signdata);

    $loginQ ="SELECT * FROM hospital WHERE `hemail`='$email' AND `hpassword`='$pass' ";

    $res= mysqli_query($conn,$loginQ);
    $logindat =mysqli_fetch_row($res);
    
    print_r($logindat);
    
        $_SESSION['mid']=$logindat[0];
      
    
        header("Location: index.php");
        exit();




}




   

    






}








?>























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>login</title>
</head>
<body>

    <div class="bg-green-200 h-screen w-screen">

    <div class="w-full h-20 flex items-center justify-between  px-6 bg-white text-green-200 ">
        <div class="text-xl flex items-center justify-center h-full w-20">
            <h1>blood</h1>
            <h2>Buddy</h2>
        </div>
        <a  href="../user/login.php" class="px-2 h-10 rounded-lg  bg-green-300 text-white shadow-sm"  href="">Are you an user</a>

    </div>

    <div class="w-full h-4/5 flex items-center justify-around mt-6">

<div class="bg-white h-full rounded-lg w-3/5">

    <div id="login" class="w-full h-full flex flex-col items-center justify-between">
        <div class="w-full items-center pl-6 pt-6">
            <h2 class="text-green-600 text-3xl font-semibold ">log in As Hospital</h2>
        </div>

        <form id="loginInputContainer" class="w-full flex flex-col gap-2 items-center justify-between"  action="login.php" method="post">
        <input type="hidden" value="2" name="type"/>
            <div class="w-10/12 h-16 flex items-start flex-col">
                <label>username</label>
                <input type="email"  placeholder="enter your email" name="email" required class="w-full outline-none border-0"></input>
            </div>
            <div class="w-10/12 h-16 flex items-start flex-col">
                <label>password</label>
                <input type="password" required  placeholder="enter your password" name="pass" class="w-full outline-none border-0"></input>
            </div>

            <input type="submit" value="login" title="login" name="login" class="w-full h-16 text-white bg-green-600 mt-12" />



        </form>
        <div class="h-1/12 w-full flex items-center justify-center pb-6">
            <button id="signButton">new to blood buddy <span class="font-semibold text-green-600">sign up as hospital
                    now</span></button>
        </div>
    </div>












    <div id="signup" class="w-full h-full hidden flex flex-col items-center justify-between">

        <div class="w-full items-center pl-6 pt-6">
            <h2 class="text-green-600 text-3xl font-semibold ">sign up</h2>
        </div>

        <form class="grid grid-cols-8 w-full gap-6 place-items-center mx-auto " action="login.php" method="post">
            <input type="hidden" value="1" name="type"/>
            <div class="col-span-4 h-16 flex items-start flex-col bg-green-100 px-10 rounded-md">
                <label>name</label>
                <input type="text" placeholder="enter your name" required name="name" class="w-full"></input>
            </div>
            <div class="col-span-4 h-16 flex items-start flex-col bg-green-100 px-10 rounded-md">
                <label>email</label>
                <input type="email" placeholder="enter your email" required name="email"  class="w-full"></input>
            </div>
            <div class="col-span-4 h-16 flex items-start flex-col bg-green-100 px-10 rounded-md">
                <label>password</label>
                <input type="password" required placeholder="enter your password" name="pass" class="w-full"></input>
            </div>

            <div class="col-span-4 h-16 flex items-center justify-center bg-green-100 px-10 rounded-md">
               
                <input type="text" placeholder="enter your address" name="address" />

            </div>

            <input type="submit" value="signup" name="sign up" class="w-full col-span-8 h-16 text-white bg-green-600 mt-12" />



        </form>



        <div class="h-1/12 w-full flex items-center justify-center pb-6">
            <button id="logButton">already have an account <span class="font-semibold text-green-600">login
                    now</span></button>
        </div>
    </div>




</div>
<img src="../assets/hospital.png" class="h-10/12 w-4/12 object-contain" />
</div>




</div>

    
     <script >

var login =document.getElementById('login');
var signup =document.getElementById('signup');

var signButton =document.getElementById('signButton')
var logButton =document.getElementById('logButton')

signButton.addEventListener('click',()=>{


    signup.classList.remove('hidden')
    login.classList.add('hidden')



})
logButton.addEventListener('click',()=>{


   login.classList.remove('hidden')
    signup.classList.add('hidden')



})


     </script>
</body>
</html>