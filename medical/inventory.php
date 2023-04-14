




<?php 
if(isset($_POST['logout']))
{
    
    if(  $_SESSION['mid']=null)
    {
        header("Location: login.php");
    }

    $_SESSION['mid']=null;
    header("Location: login.php");
}


include("../config/config.php");

$mid =$_SESSION['mid'];


$query="select * from blood_present inner join blood on bid=idBlood where mid=$mid";

$res=mysqli_query($conn,$query);


$result=mysqli_fetch_all($res,MYSQLI_ASSOC);

// print_r($result);


if(isset($_POST['update']))
{

  print_r($_POST);

$bid=$_POST['blood'];
$unit =$_POST['units'];

$query="select count(*) as length from blood_present where mid=$mid and bid='$bid'";

$res=mysqli_query($conn,$query);

$data =mysqli_fetch_assoc($res);
if($data['length']==0)
{
$q ="INSERT INTO `bloodbank`.`blood_present` (`bid`, `mid`, `count`) VALUES ('$bid', '$mid', '$unit');";

$res=mysqli_query($conn,$q);




}
else
{
  $update ="UPDATE `bloodbank`.`blood_present` SET `count` = '$unit' WHERE (`bid` = '$bid' AND `mid`=$mid);";

  $resd=mysqli_query($conn,$update);
  
}
header("Refresh:0");


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


<script src="https://cdn.tailwindcss.com"></script>




<header aria-label="Site Header" class="shadow-sm">
  <div class="mx-auto max-w-screen-xl p-4">
    <div class="flex items-center justify-between gap-4 lg:gap-10">
      <div class="flex lg:w-0 lg:flex-1">
        <a href="index.php">
         
          <span class="">Blood Buddy</span>
        </a>
      </div>

      <nav
        aria-label="Site Nav"
        class="hidden gap-8 text-sm font-medium md:flex"
      >
        <a class="text-gray-500  flex flex-row items-center justify-center" href="">
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
  <div class="w-screen grid grid-cols-8 h-screen">
  <div class="col-span-4 flex items-start py-6  flex-wrap ">
    <?php 
      for ($i=0; $i <count($result) ; $i++) { 
     ?>

<a
  href="#"
  class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-xl transition-shadow hover:shadow-lg sm:p-6 lg:p-8 mx-6"
>
  <div>
    <h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl"><?php echo $result[$i]['count'] ?></h3>

    <div class="mt-4 border-t-2 border-gray-100 pt-4">
      <p class="text-sm font-medium uppercase text-gray-500">units of blood</p>
    </div>
  </div>

  <div
    class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-12 lg:mt-16"
  >
    <p class="font-medium sm:text-lg"><?php echo $result[$i]['group'] ?></p>

    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 transition group-hover:translate-x-3"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M17 8l4 4m0 0l-4 4m4-4H3"
      />
    </svg>
  </div>
</a>




<?php
      }
    
    
    
    
    ?>


  </div>
  <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
        <form action="" method="POST" class="space-y-4">
         

         

          <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
           <?php 
           
           $arr=["A+","A-","B+","B-","AB+","AB-","O+","O-"];

          for ($i=0; $i <count($arr) ; $i++) { 
            

            ?>


              <div>
              <input
                class="peer sr-only"
                id="<?php echo $i+1?>"
                type="radio"
                tabindex="-1"
                name="blood"
                value=<?php echo $i+1;?>
              />

              <label
                for="<?php echo $i+1?>"
                class="block w-full rounded-lg border border-gray-200 p-3 hover:border-black peer-checked:border-black peer-checked:bg-black peer-checked:text-white"
                tabindex="0"
              >
                <span class="text-sm font-medium"> <?php echo $arr[$i] ?> </span>
              </label>
              
            </div>



            <?php

          }

           ?>
            

         
          </div>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label class="sr-only" for="unit">unit</label>
              <input
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="units"
                type="number"
                name="units"
                id="unit"
              />
            </div>

           
          </div>
        

          <div class="mt-4">
            <button
              type="submit"
              name="update"
              value="update"
              class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
            >
             update value
            </button>
          </div>
        </form>
      </div>


  </div>

</body>
</html>