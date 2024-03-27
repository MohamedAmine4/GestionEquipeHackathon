<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../asset/ChargerBD.css" rel="stylesheet">
  <style>
table {
      border-collapse: collapse;
      width: 50%;
    }
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    tr:first-child {
      background-color: aqua;
    }
  </style>
</head>
<body >
  <br>
 <h1 style="text-align: center;" class="font-bold text-4xl">Enter Your CSV File </h1> 
<div class="w-full  flex items-center justify-center ">

  <form class="bg-gray-400 shadow-md rounded px-8 pt-6 pb-8 mb-4"  method="post" action="../Controller/fileCSV.php">
    
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        File
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="monFichier" type="file" name="monFichier" placeholder="Username">
    </div>
  
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        OK
      </button>
    </div>
  </form>
  <br>

  <!-- <?php
    // Inclure le fichier contenant la fonction
    include_once '../Controller/fileCSV.php';
    
    // Appeler la fonction avec le nom du fichier
    if (!empty($_POST["monFichier"])) {
        afficherContenuFichierCSV($_POST["monFichier"]);
    }
    ?> -->
</div>
<div id="contenuFichier" class="w-full  flex items-center justify-center "></div>

<!-- JavaScript pour lire et afficher le contenu du fichier CSV -->
<script>
  document.getElementById("monFichier").addEventListener("change", function(event) {
    var fichier = event.target.files[0];
    var reader = new FileReader();
    
    reader.onload = function(e) {
      var contenu = e.target.result;
      var lignes = contenu.split("\n");
      var tableHTML = "<table border='1'>";
      
      for (var i = 0; i < lignes.length; i++) {
        var colonnes = lignes[i].split(";");
        tableHTML += "<tr>";
        
        for (var j = 0; j < colonnes.length; j++) {
          tableHTML += "<td>" + colonnes[j] + "</td>";
        }
        
        tableHTML += "</tr>";
      }
      
      tableHTML += "</table>";
      document.getElementById("contenuFichier").innerHTML = tableHTML;
    };
    
    reader.readAsText(fichier);
  });
</script>

</body>
</html>