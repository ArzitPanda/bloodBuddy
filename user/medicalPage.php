<?php 
include("../config/config.php");


if(isset($_POST['logout']))
{

    $_SESSION['uid']=null;
    header("Location: login.php");
    exit();


}


$uid =$_SESSION['uid'];
if(isset($_GET['visit']))
{

$id =$_GET['medicalId'];

   $queryBlood ="SELECT * FROM  hospital  inner join blood_present on hospital.idhospital = blood_present.mid 
   inner join blood on blood.idBlood=blood_present.bid where mid=$id";




$res =mysqli_query($conn,$queryBlood);

$data=mysqli_fetch_all($res,MYSQLI_ASSOC);

// print_r($data);



}

if(isset($_POST['request']))
{
    
    

if($_POST['bid']!=$_SESSION['bg'])
{

?>

<script>
    alert("blood id is not matched")
</script>


<?php





}
else
{

    $timestamp = time();
    $formatted = date('y-m-d h:i:s', $timestamp);
  

    $uid =$_POST['uid'];
    $mid =$_POST['mid'];
    $bid =$_POST['bid'];
    $unit =$_POST['unit'];
    



$input_bond="INSERT INTO `bloodbank`.`bloodrequest` (`Bid`, `Mid`, `Uid`, `unit`, `time`, `status`) VALUES ('$bid','$mid','$uid','$unit','$formatted', '1');";


$res = mysqli_query($conn,$input_bond);







}






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
        <a class="text-gray-500  id="notify" flex flex-row items-center justify-center" href="bloodRequest.php">
        <img src="../assets/bell.svg" class="w-4 h-4 ml-2"/>    
        <h4 id="notify">Requests</h4></a>
      
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

<div class="w-full flex items-center justify-around py-4">

<?php 

    for ($i=0; $i <count($data) ; $i++) { 
        
   



?>
<form class="w-64 p-2 bg-green-200 rounded-md flex flex-col items-center justify-center  my-6" action="" method="POST">
<h1 class="font-bold text-3xl text-black">
    <?php echo $data[$i]['count'] ?>
</h1>
<h4> <?php echo $data[$i]['group'] ?></h4>
<input type="hidden" name="uid" value=<?php echo $uid?>>
<input type="hidden" name="bid" value=<?php echo $data[$i]['idBlood']?>>

<input type="hidden" name="mid" value=<?php echo $_GET['medicalId']?>>
<div>
    <label class="text-sm text-grey-500">
        request unit
    </label>
    <input type="number" name="unit"/>
</div>


<input type="submit" value="request" name="request" class="px-2 py-1 bg-blue-600 text-white rounded-lg mt-2"/>
</form>


<?php 
    }
?>


</div>


  
</body>
</html>