<?php 
include("../config/config.php");


if(isset($_POST['logout']))
{

    $_SESSION['mid']=null;
    header("Location: login.php");
}

$id="";
if(isset($_POST['edit']))
{

    // print_r($_POST);
$id = $_POST['id'];



$request_query="SELECT * FROM  bloodrequest INNER JOIN blood on idBlood=Bid WHERE idRequest='$id'";


$res= mysqli_query($conn,$request_query);


$request=mysqli_fetch_assoc($res);
// print_r($request);


}

if(isset($_POST['update']))
{

    $status=$_POST['status'];
    $unit =$_POST['unit'];
    $id= $_POST['idReq'];
   
  





    $query="UPDATE `bloodbank`.`bloodrequest` SET `unit` = '$unit', `status` = '$status' WHERE `idRequest`= '$id';";


    mysqli_query($conn,$query);
    header("Location: index.php");


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</head>
<body>


<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>





<header aria-label="Site Header" class="shadow-sm">
  <div class="mx-auto max-w-screen-xl p-4">
    <div class="flex items-center justify-between gap-4 lg:gap-10">
      <div class="flex lg:w-0 lg:flex-1">
        <a href="#">
         
          <span class=""> Buddy</span>
        </a>
      </div>

      <nav
        aria-label="Site Nav"
        class="hidden gap-8 text-sm font-medium md:flex"
      >
        <a class="text-gray-500  flex flex-row items-center justify-center" href="inventory.php">
        <img src="../assets/bloods.png" class="w-4 h-4 ml-2"/>    

        
        <h4>Inventory</h4></a>
      
      </nav>

      <div class="hidden flex-1 items-center justify-end gap-4 sm:flex">
      <form 
          class="rounded-lg bg-gray-100 px-5 py-2 text-sm font-medium text-gray-500"
          action="" method="POST"
        >
       
        <input type="submit" name="logout" value="logout"/>
</form>
       
      </div>

      <div class="lg:hidden">
        <button class="rounded-lg bg-gray-100 p-2 text-gray-600" type="button">
          <span class="sr-only">Open menu</span>
          <svg
            aria-hidden="true"
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            viewbox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M4 6h16M4 12h16M4 18h16"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            />
          </svg>
        </button>
      </div>
    </div>
  </div>
</header>


<div class="w-screen h-screen items-center justify-center flex bg-indigo-200">


<article class="rounded-xl w-2/5 h-3/5 border-2 border-gray-100 bg-white">
  <div class="grid grid-cols-8 w-full h-full">
    <div class="flex items-center justify-around flex-col col-span-5">
        <img src="../assets/droplet.svg" class="w-10/12 h-3/5 object-contain p-2"/>
        <div class="text-indigo-600 text-3xl font-semibold">
            <?php echo $request['group'] ?>
        </div>

    </div>
    <form action="" method="post" class="px-2 flex items-center justify-around flex-col col-span-3">
    <div class="text-red-800 text-xl"> requestId: <?php echo $request['idRequest'] ?> </div>
    <div class="text-indigo-400 font-semibold">
        requested unit
        <input type="text" value=<?php echo $request['unit'] ?> name="unit">
    </div>

    <div class="text-indigo-400 font-semibold mt-6">
        status
        <input type="text" value=<?php echo $request['status'] ?> name="status">
        <input type="hidden" value=<?php echo $request['idRequest'] ?> name="idReq">
    </div>

    <input type="submit" name="update" value="update"/>

    </form>


  </div>
</article>




</div>
</body>
</html>