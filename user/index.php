<?php 
include('../config/config.php');

print_r($_SESSION);


if(isset($_SESSION['uid']))
{


  $uid =$_SESSION['uid'];

  $medicalq ="SELECT * FROM hospital";
  
  
  $med= mysqli_query($conn,$medicalq);
  
  $medData =mysqli_fetch_all($med,MYSQLI_ASSOC);

  
  
  
  $userQ ="SELECT * FROM user INNER JOIN blood on  idBlood=blood  WHERE `iduser`=$uid";
  
  
  try {
      //code...
      $exe = mysqli_query($conn,$userQ);
  } catch (\Throwable $th) {
      throw $th;
  }
  
  $data3 = mysqli_fetch_assoc($exe);
  print_r($data);

}
else
{
  header("Location: login.php");
}

if(isset($_POST['logout']))
{

    $_SESSION['uid']=null;
    header("Location: login.php");
    exit();


}








?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>





<header aria-label="Site Header" class="shadow-sm">
  <div class="mx-auto max-w-screen-xl p-4">
    <div class="flex items-center justify-between gap-4 lg:gap-10">
      <div class="flex lg:w-0 lg:flex-1">
        <a href="#">
         
        <span class="">Blood Buddy</span>
        </a>
      </div>

      <nav
        aria-label="Site Nav"
        class="hidden gap-8 text-sm font-medium md:flex"
      >
        <a  class="text-gray-500  id="notify" flex flex-row items-center justify-center" href="bloodRequest.php">
        <img src="../assets/bell.svg" class="w-4 h-4 ml-2"/>    
        <h4 id="notify">Notification</h4></a>
      
      </nav>

      <div class="hidden flex-1 items-center justify-end gap-4 sm:flex">
      <form
          class="rounded-lg bg-gray-100 px-5 py-2 text-sm font-medium text-gray-500"
         action=""
         method="post"
        >
       
          <input type="submit" name="logout" value="logout"/>
        </form>
        </a>

       
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
<div class="grid grid-cols-8 w-full h-full">

<div class="flex col-span-3 border-r-2 flex-col items-center justify-center h-full">

    <img src="https://api.multiavatar.com/Binx Bond.svg" class="w-2/3 h-1/3 object-contain mx-auto my-6"/>

<div class="w-full max-w-xl p-2 flex items-center flex-col justify-around font-semibold">

    <div class="w-full flex items-center h-12  my-2 justify-between px-2 text-green-600 bg-green-100">
        <label>id</label>
        <h2><?php echo $data3['iduser'] ?></h2>
    </div>
    <div class="w-full flex items-center h-12 my-2  justify-between px-2 text-green-600 bg-green-100">
        <label>name</label>
        <h2><?php echo $data3['name'] ?></h2>
    </div>
    <div class="w-full flex items-center h-12  my-2  justify-between px-2 text-green-600 bg-green-100">
        <label>email</label>
        <h2><?php echo $data3['email'] ?></h2>
    </div>
    <div class="w-full flex items-center h-12  my-2 justify-between px-2 text-green-600 bg-green-100">
        <label>blood</label> 
        <h2><?php echo $data3['group'] ?></h2>
    </div>


</div>




</div>

<div class="flex flex-col col-span-5 items-center-justify-between overflow-scroll grid grid-cols-6 ml-2">

    <?php
    
    
    for ($i=0; $i <count($medData) ; $i++) { 
    
    
    
    
    
    ?>
    <form action="medicalPage.php" method="GET" class="col-span-3 ">


<div class="max-w-md p-8 sm:flex sm:space-x-6 bg-white-900 text-gray-500 border-2 border-green-800">
<div class="flex-shrink-0 w-full mb-6 h-44 sm:h-32 sm:w-32 sm:mb-0">
    <img src="../assets/hospital.png" alt="" class="object-cover object-center w-full h-full rounded bg-gray-500">
</div>
<div class="flex flex-col space-y-4">
    <div>
        <h2 class="text-2xl font-semibold"><?php echo $medData[$i]['hname']?> </h2>
        <span class="text-sm text-gray-700"><?php echo $medData[$i]['address']?> </span>
    </div>
    <div class="space-y-1">
        <span class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-label="Email address" class="w-4 h-4">
                <path fill="currentColor" d="M274.6,25.623a32.006,32.006,0,0,0-37.2,0L16,183.766V496H496V183.766ZM464,402.693,339.97,322.96,464,226.492ZM256,51.662,454.429,193.4,311.434,304.615,256,268.979l-55.434,35.636L57.571,193.4ZM48,226.492,172.03,322.96,48,402.693ZM464,464H48V440.735L256,307.021,464,440.735Z"></path>
            </svg>
            <span class="text-gray-800"><?php echo $medData[$i]['hemail']?> </span>
        </span>
        <input type="hidden" value=<?php echo $medData[$i]['idhospital']?> name="medicalId"/>
        <input type="submit"  value="visit" class="bg-green-400 p-2 text-white cursor-pointer" name="visit"/>
    </div>
</div>
</div>

</form>
       





<?php } ?>     



</div>
</div>







</body>
</html>