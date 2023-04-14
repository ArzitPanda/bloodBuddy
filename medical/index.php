<?php 
include('../config/config.php');
//    print_r($_SESSION);
require("../components/Request.php");

$medId=$_SESSION['mid'];

if( $_SESSION['mid']==null)
{
    header("Location: login.php");
}


if(isset($_POST['logout']))
{

    $_SESSION['mid']=null;
    header("Location: login.php");
}

$hospital_details="SELECT * FROM HOSPITAL WHERE `idHospital`=$medId";



$request_details ="SELECT * FROM bloodrequest inner join user on user.iduser=bloodrequest.Uid inner join blood on blood.idBlood=Bid where Mid=$medId;";



$req_res =mysqli_query($conn,$request_details);
$requests=mysqli_fetch_all($req_res,MYSQLI_ASSOC);
// print_r($requests);






$present_query="SELECT * FROM  hospital  inner join blood_present on hospital.idhospital = blood_present.mid 
inner join blood on blood.idBlood=blood_present.bid WHERE hospital.idhospital=$medId;
"
;

$res= mysqli_query($conn,$present_query);

$inventory =mysqli_fetch_all($res,MYSQLI_ASSOC);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
   
   <!--
Include Tailwind JIT CDN compiler
More info: https://beyondco.de/blog/tailwind-jit-compiler-via-cdn
-->
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











        <!-- Table -->
        <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-12">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">users</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">units</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">blood group</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">time</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">edit</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                        <?php 
                            
                            for ($i=0; $i <count($requests) ; $i++) { 
                                ?>
                                <form class="w-full" method="post" action="form.php">   
                        
                                         
                            <tr class="hover:bg-green-200 ">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://api.multiavatar.com/user.svg" width="40" height="40" alt="Burak Long"></div>
                                        <div class="font-medium text-gray-800"><?php echo $requests[$i]['name'] ?></div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left"><?php echo $requests[$i]['email'] ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500"><?php echo $requests[$i]['unit'] ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-sm text-center"><?php echo $requests[$i]['group']?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-sm text-center"><?php  echo $requests[$i]['group'] ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-sm text-center"><?php  if($requests[$i]['status']==1){echo "requested";} elseif($requests[$i]['status']==2){echo "granted";}else{echo "rejected";} ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                <?php echo $requests[$i]['idRequest']?>
                                    <input type="hidden" value=<?php echo $requests[$i]['idRequest']?>  name="id"/>
                                    <div class="text-sm text-center"><input type="submit" name="edit" class="bg-indigo-500 text-white font-semibold px-2 rounded-md shadow-lg" value="edit"/></div>
                                </td>
                            </tr>
                                <form/>
                             
                                <?php

                            };
                            
                            
                            ?>

                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


<!-- More components -->

   
   
   
   
   
   






</body>
</html>


