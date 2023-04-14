
<?php 


include("../config/config.php");

if(isset($_SESSION['uid']))
{
    $id=$_SESSION['uid'];


    $requestUser ="SELECT * from bloodrequest inner join hospital on idhospital=Mid inner join blood on idBlood=Bid where Uid ='$id';";


    $res= mysqli_query($conn,$requestUser);

    $requests =mysqli_fetch_all($res,MYSQLI_ASSOC);
   






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
    <script src="https://cdn.tailwindcss.com"></script>
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





<?php

for ($i=0; $i<count($requests) ; $i++) { 
    ?>

    
<div class="mt-2 shadow-sm">
       
            <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5 shadow-sm px-6">
              <div class="flex items-center flex-1 min-w-0">
                <img
                    src="https://d34u8crftukxnk.cloudfront.net/slackpress/prod/sites/6/SlackLogo_CompanyNews_SecondaryAubergine_Hero.jpg?d=500x500&amp;f=fill" class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
                <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                  <p class="text-lg font-bold text-gray-800 truncate"><?php echo $requests[$i]['hname'] ?></p>
                  <p class="text-gray-600 text-md"><?php echo  $requests[$i]['unit'] ?></p>
                  <p class="text-gray-600 text-md"><?php echo  $requests[$i]['time'] ?></p>
                </div>
              </div>
              <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                <a href="" class="<?php switch($requests[$i]['status'])
                {
                    case 1:
                        echo "bg-gray-800";
                        break;
                    case 2:
                        echo "bg-green-800";
                        break;
                    case 3:
                        echo "bg-red-500";
                        break;
                }
                
                ?>
                
                
                
                pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                    duration-200 hover:bg-gray-700 rounded-lg">
            <?php switch($requests[$i]['status'])
                {
                    case 1:
                        echo "pending";
                        break;
                    case 2:
                        echo "accepted";
                        break;
                    case 3:
                        echo "rejected";
                        break;
                }
                
                ?>
                
                </a>
              </div>
            </div>
   

<?php




}



?>










         
</body>
</html>