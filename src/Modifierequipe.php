
<?php 
if (isset($_POST["submit"])){

  ?>
    <script>
      window.location.href = "Inscreption.php";
    </script>
  <?php 
}

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./modifierequipe.css" rel="stylesheet">
</head>
<body>
<div class="min-h-screen py-40" style="background: linear-gradient(115deg, green 20%, cyan);">
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
      <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-green-500" style="background-image: url(images/hackathon.png); background-size:auto; background-repeat: no-repeat; background-position: center; height: 650px;">
      <h1 class="text-3xl mb-3 py-14 font-bold font-mono">Welcome</h1>  
      </div>
      <div class="w-full lg:w-1/2 py-16 px-12 ">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center ">Modify A TEAM</h2>
        <p class="mb-4 flex flex-col items-center font-mono text-gray-400"> Hackathon Team</p>
      <form method="POST" action="connexion.php">
      <div class="mt-5 grid grid-cols-2 gap-5">
      <label class="font-mono text-gray-400" style="font-size: 20px;" >Exesting Team</label>
          <select type="text" name="teamexisting"  id="teamexistingid" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required onchange="updateTeam()">
          <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hackathon";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM equipe ";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['teamname'] . "</option>";
            }
            $idteam= $_POST['id'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
      
        ?>
        
          </select> 
      </div>
      <div class="mt-5 grid grid-cols-2 gap-5">
      <input type="text" name="m2" id="namet" value="m2" disabled>
        <input type="text" name="l3" id="l3" value="l3" disabled>
        <input type="text" name="m1" id="m1" value="m1" disabled>
        <input type="text" name="m2" id="m2" value="m2" disabled>
      </div>
        <div class="mt-5 grid grid-cols-2 gap-5">

            <label class="font-mono text-gray-400" style="font-size: 20px;">Team Name</label>
            <input type="text" name="Teamname" placeholder="Team Name" class="appearance-none border rounded-md border-gray-400  px-2 w-full h-10"  />
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5">
        <label class="font-mono text-gray-400" style="font-size: 20px;">L3 Student</label>
          <select type="text" name="l3name" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required>
          <?php

        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='l3' ";
        $result = $conn->query($sql);
          
        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        ?>
          </select> 
          <label class="font-mono text-gray-400" style="font-size: 20px;" >M1 Student</label>
          <select type="text" name="m1name" placeholder="LastName" id="lname" class="border border-gray-400 py-1 px-2" required >
          <?php
      
        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='M1'";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
            $lname = $_POST['lastname'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        
        ?>
          </select>
          <label class="font-mono text-gray-400" style="font-size: 20px;">M2 Student</label>
          <select type="text" name="m2name" placeholder="LastName" id="lname" class="border border-gray-400 py-1 px-2" required >
          <?php
      
        // Requête pour récupérer les données depuis une table (ajustez selon votre base de données)
        $sql = "SELECT * FROM etudiant WHERE class='M2'";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
          echo "<option '>" . "" . "</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['lastname'] . "</option>";
            }
            $lname = $_POST['lastname'];
        } else {
            echo "<option value=''>Aucune donnée trouvée</option>";
        }
        // Fermer la connexion à la base de données
        $conn->close();
        ?>
          </select>
        </div>
        <div class="mt-6  ">
        <div class="flex mt-4 md:mt-6">
          
    <button value="Envoyer" type="submit" class="bg-green-500 text-red py-2 px-4 rounded" style="width: 50%;">Add Team</button>

    <button value="Envoyer" type="button" class="bg-blue-500 text-red py-2 px-6 rounded " style="width: 50%;">Back</button>
</div>
</div>
      </form>
      </div>
  
  </div>
  </div>
</div>
<script>
  function myFunction() {
  console.log("Début de l'attente");

  // Attendre 3 secondes (3000 millisecondes)
  setTimeout(function() {
    console.log("Fin de l'attente après 3 secondes");
    // Votre code ici après l'attente
  }, 3000);
}

// Appel de la fonction

// Début du code JavaScript
// Fonction qui met à jour l'input email en fonction du nom de famille choisi
function updateTeam() {
  // Récupérer la valeur du select
  var teamidequipe = document.getElementById("teamexistingid").value;
  var nameequipe="";
  console.log(teamidequipe);
  // Créer l'URL du fichier JSON
  var urlequipe="http://localhost/web_php/Tp_web/src/equipedata.php";
  var url = "http://localhost/web_php/Tp_web/src/lienequipedata.php";
  var urletudiant="http://localhost/web_php/Tp_web/src/data.php";
  var etudiantesID = [];
  var etudiantesname = [];
  fetch(urlequipe)
    .then((response) => {
      // Vérifier si la requête a réussi
      if (response.ok) {
        // Renvoyer le corps de la réponse en JSON
        return response.json();
      } else {
        // Afficher un message d'erreur
        console.error("Erreur lors de la requête : " + response.status);
      }
    })
    .then((data) => {
      // Initialiser l'email à une chaîne vide
      
      // Parcourir le tableau data
      for (var i = 0; i < data.length; i++) {
        // Vérifier si le nom de famille de l'objet courant correspond à la valeur du select
        if (data[i].id == teamidequipe) {
          nameequipe=data[i].teamname;
      
          
        }
      }
      // Mettre à jour la valeur de l'input email
    
    
    })
    .catch((error) => {
      // Afficher un message d'erreur
      console.error("Erreur lors de la récupération du JSON : " + error);
    });
  // Utiliser l'API Fetch pour récupérer le contenu du fichier JSON
  fetch(url)
    .then((response) => {
      // Vérifier si la requête a réussi
      if (response.ok) {
        // Renvoyer le corps de la réponse en JSON
        return response.json();
      } else {
        // Afficher un message d'erreur
        console.error("Erreur lors de la requête : " + response.status);
      }
    })
    .then((data) => {
      // Initialiser l'email à une chaîne vide
      
      // Parcourir le tableau data
      for (var i = 0; i < data.length; i++) {
        // Vérifier si le nom de famille de l'objet courant correspond à la valeur du select
        if (data[i].teamID == teamidequipe) {
      etudiantesID.push(data[i].etudaintID);
      
          
        }
      }
      // Mettre à jour la valeur de l'input email
    
    
    })
    .catch((error) => {
      // Afficher un message d'erreur
      console.error("Erreur lors de la récupération du JSON : " + error);
    });
///////////////////////////////////fetxh nom des etudiantes

    fetch(urletudiant)
    .then((response) => {
      // Vérifier si la requête a réussi
      if (response.ok) {
        // Renvoyer le corps de la réponse en JSON
        return response.json();
      } else {
        // Afficher un message d'erreur
        console.error("Erreur lors de la requête : " + response.status);
      }
    })
    .then((dataEtudiants) => {
      // Initialiser l'email à une chaîne vide
      console.log(etudiantesID);
      // Parcourir le tableau data
      for (var i = 0; i < dataEtudiants.length; i++) {
        // Vérifier si le nom de famille de l'objet courant correspond à la valeur du select
        if (dataEtudiants[i].id == etudiantesID[0] || dataEtudiants[i].id == etudiantesID[1] || dataEtudiants[i].id == etudiantesID[2]) {
          etudiantesname.push(dataEtudiants[i].lastname);
          
        }
      }
      console.log(etudiantesname);
      // Mettre à jour la valeur de l'input email
      myFunction();
      document.getElementById("namet").value = nameequipe;
      document.getElementById("l3").value = etudiantesname[0];
      document.getElementById("m1").value = etudiantesname[1];
      document.getElementById("m2").value = etudiantesname[2];
      
    })
    .catch((error) => {
      // Afficher un message d'erreur
      console.error("Erreur lors de la récupération du JSON : " + error);
    });
}
// Fin du code JavaScript
</script>
</body>



<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl">
      <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class=" hover:underline">About</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Careers</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Brand Center</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Blog</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">Discord Server</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Twitter</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Facebook</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Contact Us</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Licensing</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">iOS</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Android</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Windows</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">MacOS</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="px-4 py-6 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">Flowbite™</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
        </div>
      </div>
    </div>
</footer>


</html>