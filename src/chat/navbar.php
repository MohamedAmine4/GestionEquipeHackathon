<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>navbar</title>
  <link href="./navbar.css" rel="stylesheet">
</head>
<body>
  

<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 ">
  <div class="w-full  flex flex-row justify-end m-auto p-4">
    <a href="#" class="flex flex-row justify-end mx-auto">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-start text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    
    <div class=" justify-start mx-auto" id="navbar-dropdown">
      <ul class="flex flex-row justify-start w-full font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 font-medium flex items-start justify-between w-full md:w-auto">Team <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="../information.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Informations about Student</a>
                    </li>
                    <li>
                        <a href="../equipe.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">ADD Team</a>
                    </li>
                    <li>
                        <a href="../Modifierequipe.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Modify Team</a>
                    </li>
                  
                    </ul>
                    <!-- <div class="py-1">
                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                    </div> -->
                </div>
            </li> 
            <li>
        <button id="dropdownNavbarLinkSetting" data-dropdown-toggle="dropdownNavbarSetting" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 font-medium flex items-start justify-between w-full md:w-auto">Setting <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbarSetting" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="../Inscreption.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Modifiy Information</a>
                    </li>
                  
                    <!-- <li>
                        <a href="../chat/Logout.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Log out</a>
                    </li> -->
                  
                    </ul>
                    <div class="py-1">
                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                    </div>
                </div>
            </li>
            <li>
            <a href="#" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Services</a>
            </li>
            <li>
            <a href="#" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Pricing</a>
            </li>
            <li>
            <a href="#" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Contact</a>
            </li>
        </ul>
    
    </div>
    </nav>

</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
</body>
</html>