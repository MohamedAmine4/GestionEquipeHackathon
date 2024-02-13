
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
  <link href="./information.css" rel="stylesheet">
  <title>Informations</title>
</head>
<body>
<div class="min-h-screen py-40 bg-center bg-no-repeat bg-cover bg-fixed bg-gray-700 bg-blend-multiply" style="background-image: url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg');">
  <div class="container mx-auto">
    <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
      <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-gray-700" style="background-image: url(images/hackathon.png); background-size:auto; background-repeat: no-repeat; background-position: center; height: 650px;">
      <h1 class="text-3xl mb-3 py-14 font-bold font-mono">Welcome</h1>  
      </div>
      <div class="w-full lg:w-1/2 py-16 px-12">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center">Information About Student</h2>
        <p class="mb-4"> Information Student.</p>
      <form method="POST" action="connexion.php">
        <div class="grid grid-cols-2 gap-2">

          <label class="font-mono" >Last Name</label>
          <select type="text" name="lname" placeholder="LastName" id="lname" class="appearance-none border rounded-md border-gray-400 py-1 px-2 h-10" required onchange="updateEmail()">>
          <?php
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
        $sql = "SELECT lastname FROM etudiant ";
        $result = $conn->query($sql);

        // Afficher les options du select
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['lastname'] . "'>" . $row['lastname'] . "</option>";
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
        <div class="mt-6">




        <script>
// Début du code JavaScript
// Fonction qui met à jour l'input email en fonction du nom de famille choisi
function updateEmail() {
  // Récupérer la valeur du select
  var lname = document.getElementById("lname").value;
  // Créer l'URL du fichier JSON
  var url = "http://localhost/web_php/Tp_web/src/data.php";
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
      var email = "";
      var skills="";
      // Parcourir le tableau data
      for (var i = 0; i < data.length; i++) {
        // Vérifier si le nom de famille de l'objet courant correspond à la valeur du select
        if (data[i].lastname == lname) {
          // Récupérer l'email de l'objet courant
          email = data[i].email;
          skills = data[i].skills;
          // Sortir de la boucle
          break;
        }
      }
      // Mettre à jour la valeur de l'input email
      document.getElementById("email").value = email;
      document.getElementById("skills").value = skills;

      console.log(email);
    })
    .catch((error) => {
      // Afficher un message d'erreur
      console.error("Erreur lors de la récupération du JSON : " + error);
    });
}
// Fin du code JavaScript
</script>

          <input type="email" name="email" id="email" placeholder="Email" class="border shadow-sm border-slate-300 rounded-md py-1 px-2 w-full h-10" disabled />
        </div>
        <div class="mt-5">
          <input placeholder="Skills" name ="skills" id="skills" class="border border-gray-400 rounded-md py-1 px-2 w-full h-10" disabled></input>
        </div>
        <div class="mt-6">
          <button value="Envoyer" type="submit" class="bg-green-500  text-red py-2 px-4 rounded w-full">Retour</button>
        </div>
      </form>
      </div>
  
  </div>
  </div>
</div>
<?php
  // Inclure le footer
  include('footer.php');
  ?>
</body>





</html>