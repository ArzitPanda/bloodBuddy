<?php

include('../config/config.php');


if(isset($_SESSION['uid']))
{
    header("Location: index.php");
}


$data =$_POST;


$type =$data['type'];
$msg="";

$data =$_POST['email'];
$pass =$_POST['pass'];



$arr = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];




if($type==2)
{

$loginQ ="SELECT * FROM user WHERE `email`='$data' AND `password`='$pass' ";

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
        $_SESSION['uid']=$logindat[0];
        $_SESSION['bg']=$logindat[4];
    
        header("Location: index.php");
        exit();
    }




   

}
if($type==1)
{


    $email=$_POST['email'];
    $name=$_POST['name'];
    $bg=$_POST['blood'];
    $b=-1;


$checkQ ="SELECT * FROM user WHERE `email`='$email'";
$execute = mysqli_query($conn,$checkQ);
$data =mysqli_fetch_all($execute);


if(count($data)>0)
{

    
?>

<script>
    alert("user already present try to login")
</script>

<?php


}

if(count($data)==0)
{


    for ($i=0; $i <8 ; $i++) { 

        if($bg==$arr[$i])
        {
            $b=$i+1;
            break;
        }




        # code...
    }

    $signQ ="INSERT INTO user(`name`, `email`, `password`, `blood`) VALUES ('$name', '$email', '$pass', '$b');";




    $execute=mysqli_query($conn,$signQ);
    $signdata= mysqli_affected_rows($conn);

    print_r($signdata);

    $loginQ ="SELECT * FROM user WHERE `email`='$email' AND `password`='$pass' ";

    $res= mysqli_query($conn,$loginQ);
    $logindat =mysqli_fetch_row($res);
    
    print_r($logindat);
    
        $_SESSION['uid']=$logindat[0];
        $_SESSION['bg']=$logindat[4];
    
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


    <div class="hidden absolute z-20 w-2/3 h-32 shadow-sm bg-white" >

        <?php 

        
        ?>

    </div>



    <div class="bg-red-100 h-screen w-screen" >

        <div class="w-full h-20 flex items-center justify-between bg-pink-600 px-6">
            <div class="text-xl flex items-center justify-center h-full w-20">
                <h1>blood</h1>
                <h2>Buddy</h2>
            </div>
            <a  href="../medical/login.php" id="btnMedical" class="px-2 h-10 rounded-lg  bg-pink-300 text-white">Are you a hospital</a >

        </div>

        <div class="w-full h-4/5 flex items-center justify-around mt-6">

            <div class="bg-white h-full rounded-lg w-3/5">

                <div id="login" class="w-full h-full flex flex-col items-center justify-between">
                    <div class="w-full items-center pl-6 pt-6">
                        <h2 class="text-pink-600 text-3xl font-semibold ">log in</h2>
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

                        <input type="submit" value="login" title="login" name="login" class="w-full h-16 text-white bg-pink-600 mt-12" />



                    </form>
                    <div class="h-1/12 w-full flex items-center justify-center pb-6">
                        <button id="signButton">new to blood buddy <span class="font-semibold text-pink-600">sign up
                                now</span></button>
                    </div>
                </div>












                <div id="signup" class="w-full h-full hidden flex flex-col items-center justify-between">

                    <div class="w-full items-center pl-6 pt-6">
                        <h2 class="text-pink-600 text-3xl font-semibold ">sign up</h2>
                    </div>

                    <form class="grid grid-cols-8 w-full gap-6 place-items-center mx-auto " action="login.php" method="post">
                        <input type="hidden" value="1" name="type"/>
                        <div class="col-span-4 h-16 flex items-start flex-col bg-pink-100 px-10 rounded-md">
                            <label>name</label>
                            <input type="text" placeholder="enter your name" required name="name" class="w-full"></input>
                        </div>
                        <div class="col-span-4 h-16 flex items-start flex-col bg-pink-100 px-10 rounded-md">
                            <label>email</label>
                            <input type="email" placeholder="enter your email" required name="email"  class="w-full"></input>
                        </div>
                        <div class="col-span-4 h-16 flex items-start flex-col bg-pink-100 px-10 rounded-md">
                            <label>password</label>
                            <input type="password" required placeholder="enter your password" name="pass" class="w-full"></input>
                        </div>

                        <fieldset class="col-span-4 h-46 grid grid-cols-2  col-gap-2 bg-pink-100 px-10 rounded-md">
                            <legend class="text-xs">Select your blood group:</legend>


                            <?php

                            $arr = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];


                            ?>


                            <?php

                            for ($i = 0; $i < 8; $i++) {




                            ?>
                                <div class="mx-2 text-sm font-semibold col-span-1">
                                    <input type="radio" id=<?php echo $arr[$i] ?> name="blood" value=<?php echo $arr[$i] ?>>
                                    <label for=<?php echo $arr[$i] ?>><?php echo $arr[$i] ?></label>
                                </div>



                            <?php } ?>

                        </fieldset>

                        <input type="submit" value="signup" name="sign up" class="w-64 col-span-8 h-16 text-white bg-pink-600 mt-12" />



                    </form>



                    <div class="h-1/12 w-full flex items-center justify-center pb-6">
                        <button id="logButton">already have an account <span class="font-semibold text-pink-600">login
                                now</span></button>
                    </div>
                </div>




            </div>
            <img src="../assets/bloods.png" class="h-10/12 w-4/12 object-contain" />
        </div>



    </div>

    <script src="login.js"></script>

</body>

</html>