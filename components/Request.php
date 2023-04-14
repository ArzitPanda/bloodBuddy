

<?php

function RequestBox($email,$unit,$bg)
{
   
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<script type="tailwind-config">
{
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
      }
    }
  }
}
</script>



        <div class="max-w-2xl mx-auto bg-green-600 shadow-lg rounded-lg">
            <div class="px-6 py-5">
                <div class="flex items-start">
                    <!-- Icon -->
                    <svg class="fill-current flex-shrink-0 mr-5" width="30" height="30" viewBox="0 0 30 30">
                        <path class="text-indigo-300" d="m16 14.883 14-7L14.447.106a1 1 0 0 0-.895 0L0 6.883l16 8Z" />
                        <path class="text-indigo-200" d="M16 14.619v15l13.447-6.724A.998.998 0 0 0 30 22V7.619l-14 7Z" />
                        <path class="text-indigo-500" d="m16 14.619-16-8V21c0 .379.214.725.553.895L16 29.619v-15Z" />
                    </svg>
             
                    <div class="flex-grow truncate">
                        <!-- Card header -->
                        <div class="w-full sm:flex justify-between items-center mb-3">
                            <!-- Title -->
                            <h2 class="text-2xl leading-snug font-extrabold text-gray-50 truncate mb-1 sm:mb-0"><?php echo $email ?></h2>
                            <!-- Like and comment buttons -->
                            <div class="flex-shrink-0 flex items-center space-x-3 sm:ml-2">
                                <button class="flex items-center text-left text-sm font-medium text-indigo-100 hover:text-white group focus:outline-none focus-visible:border-b focus-visible:border-indigo-100">
                                    <svg class="w-4 h-4 flex-shrink-0 mr-2 fill-current text-gray-300 group-hover:text-gray-200" viewBox="0 0 16 16">
                                        <path d="M14.682 2.318A4.485 4.485 0 0 0 11.5 1 4.377 4.377 0 0 0 8 2.707 4.383 4.383 0 0 0 4.5 1a4.5 4.5 0 0 0-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 0 0 0-6.364Zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 0 1 4.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 0 1 1.785 4.251h-.003Z" />
                                    </svg>
                                    <span><?php echo $unit ?> <span class="sr-only">units</span></span>
                                </button>
                                <button class="flex items-center text-left text-sm font-medium text-indigo-100 hover:text-white group focus:outline-none focus-visible:border-b focus-visible:border-indigo-100">
                                   <img src="../assets/droplet.svg" class="w-4 h-4 flex-shrink-0 mr-2 fill-current text-gray-300 group-hover:text-gray-200"/>
                                    <span><?php echo $bg ?> <span class="sr-only">Group</span></span>
                                </button>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="flex items-end justify-between whitespace-normal">
                            <!-- Paragraph -->
                            <div class="max-w-md text-indigo-100">
                                <p class="mb-2">Lorem ipsum dolor sit amet, consecte adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                            <!-- More link -->
                            <a class="flex-shrink-0 flex items-center justify-center text-indigo-600 w-10 h-10 rounded-full bg-gradient-to-b from-indigo-50 to-indigo-100 hover:from-white hover:to-indigo-50 focus:outline-none focus-visible:from-white focus-visible:to-white transition duration-150 ml-2" href="#0">
                                <span class="block font-bold"><span class="sr-only">Request accept</span> -></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php


};

?>




<?php


function tableRow($userName,$email,$unit,$bg,$time,$reqId)
{
?>

<div
  id="modal" class="hidden absolute rounded-2xl border border-blue-100 bg-white p-4 shadow-lg sm:p-6 lg:p-8 "
  role="alert"
>
  <div class="flex items-center gap-4">
    <span class="shrink-0 rounded-full bg-blue-400 p-2 text-white">
      <svg
        class="h-4 w-4"
        fill="currentColor"
        viewbox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          clip-rule="evenodd"
          d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
          fill-rule="evenodd"
        />
      </svg>
    </span>

    <p class="font-medium sm:text-lg">New message!</p>
  </div>

  <p class="mt-4 text-gray-500">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam ea quo unde
    vel adipisci blanditiis voluptates eum. Nam, cum minima?
  </p>

  <div class="mt-6 sm:flex sm:gap-4">
    <form
      class="inline-block w-full rounded-lg bg-blue-500 px-5 py-3 text-center text-sm font-semibold text-white sm:w-auto"
      href=""
    >
      Take a Look
</form>

    <form
      class="mt-2 inline-block w-full rounded-lg bg-gray-50 px-5 py-3 text-center text-sm font-semibold text-gray-500 sm:mt-0 sm:w-auto"
      href=""
    >
      Mark as Read
</form>
  </div>
</div>






 <tr class="hover:bg-green-200 ">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://api.multiavatar.com/user.svg" width="40" height="40" alt="Burak Long"></div>
                                        <div class="font-medium text-gray-800"><?php echo $userName ?></div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left"><?php echo $email ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500"><?php echo $unit ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-sm text-center"><?php echo $bg ?></div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-sm text-center"><?php  echo $time ?></div>
                                </td>
                                
                            </tr>



                            <script>
   


    
</script>

<?php

}


?>




