<?php
session_start();
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}
if(!$_SESSION['lastname']){
  header('Location: Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./AllUser.css" rel="stylesheet">
  <!-- <script src="test.js"></script> -->
</head>
<body>
<div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
  <div class="flex items-center justify-between pb-6">
    <div>
      <h2 class="font-semibold text-gray-700">User Accounts</h2>
      <span class="text-xs text-gray-500">View accounts of registered users</span>
    </div>
    <div class="flex items-center justify-between">
      <div class="ml-10 space-x-8 lg:ml-40">
        <button class="flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
          </svg>

          CSV
        </button>
      </div>
    </div>
  </div>
  <div class="overflow-y-hidden rounded-lg border">
    <div class="overflow-x-auto">
    <form>
  <input type="text" name="lname" placeholder="LastName" id="lname" class="appearance-none border rounded-md border-gray-400 py-1 px-2 h-10" required oninput="rechercher()">
      <table class="w-full">
        <thead>
          <tr class="bg-blue-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
            <th class="px-5 py-3">ID</th>
            <th class="px-5 py-3">Full Name</th>
            <th class="px-5 py-3">User Role</th>
            <th class="px-5 py-3">Status</th>
          </tr>
        </thead>
        <tbody class="text-gray-500"  id="results" onchange="location = this.value">
      </tbody>
      </table>

      </form>

      <script>
        
function rechercher() {
  var lname = document.getElementById("lname").value;
  var url = "http://localhost/web_php/Tp_Web/src/DonnerContact.php";

  fetch(url)
      .then((response) => {
          if (response.ok) {
              return response.json();
          } else {
              console.error("Erreur lors de la requête : " + response.status);
          }
      })
      .then((data) => {
          var resultsList = document.getElementById("results");
          resultsList.innerHTML = ""; // Efface les résultats précédents

            for (var i = 0; i < data.length; i++) {
              if (data[i].lastname.toLowerCase().startsWith(lname.toLowerCase())) {
                var listItem = document.createElement("tr");
                var td1 = document.createElement("td");
                td1.className = "border-b border-gray-200 bg-white px-5 py-5 text-sm";
                td1.innerHTML = "<p class='whitespace-no-wrap'>"+(i+1)+"</p>";

                var img = document.createElement("img");
                img.className = "h-full w-full rounded-full";
                img.src = "https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144";

                var div1 = document.createElement("div");
                div1.className = "h-10 w-10 flex-shrink-0";
                div1.appendChild(img);

                var div2 = document.createElement("div");
                div2.className = "ml-3";
                div2.innerHTML = "<a href ='chat.php?id=" + data[i].id + "'>" + data[i].firstname + " " + data[i].lastname + "</a>";

                var td2 = document.createElement("td");
                td2.className = "border-b border-gray-200 bg-white px-5 py-5 text-sm";
                td2.appendChild(div1);
                td2.appendChild(div2);

                var td3 = document.createElement("td");
                td3.className = "border-b border-gray-200 bg-white px-5 py-5 text-sm";
                td3.innerHTML = "<p class='whitespace-no-wrap'>Student</p>";

                var span = document.createElement("span");
                span.className = "rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900";
                span.textContent = "Active";

                var td4 = document.createElement("td");
                td4.className = "border-b border-gray-200 bg-white px-5 py-5 text-sm";
                td4.appendChild(span);

                listItem.appendChild(td1);
                listItem.appendChild(td2);
                listItem.appendChild(td3);
                listItem.appendChild(td4);
                console.log(data[i].lastname);
                resultsList.appendChild(listItem);
              }
            }
      })
      .catch((error) => {
          console.error("Erreur lors de la récupération du JSON : " + error);
      });
}

        </script>
    </div>
    <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
      <span class="text-xs text-gray-600 sm:text-sm"> Showing 1 to 5 of 12 Entries </span>
      <div class="mt-2 inline-flex sm:mt-0">
        <button class="mr-2 h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Prev</button>
        <button class="h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Next</button>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br>
<?php
  // Inclure le footer
  include('../footer.php');
  ?>
</body>
</html>