<?php session_start();?>

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
  <title>All team</title>
</head>
<body>
<?php
  // Inclure le footer
  include('navbar.php');
  ?>
<div class="min-h-screen py-40 bg-center bg-no-repeat bg-cover bg-fixed bg-gray-700 bg-blend-multiply" style="background-image: url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg');">
  <div class="container mx-auto">
  <div class="flex flex-col lg:flex-row w_8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
    <div class="w-full lg:w-1/2 flex flex-col items-center h-full bg-gray-700 relative" style="background-image: url(../images/hackathon_flou.png); background-size: cover; background-repeat: no-repeat; background-position: center; height: 650px;">

  <div class="w-full h-full flex flex-col items-center justify-center" style="position: relative; z-index: 1;">
    <!-- Votre contenu centré ici -->
    <div class="w-full h-full " style="background-image: url(../images/hackathon.png); background-size: center; background-repeat: no-repeat; background-position: center; height: 650px;">
      <!-- Image ou contenu que vous voulez centrer -->
    </div>
  </div>
</div>
      <div class="w-full lg:w-1/2 py-16 px-12 ">
        <h2 class="text-3xl mb-4 font-bold font-mono flex flex-col items-center ">All TEAM</h2>
        <p class="mb-4 flex flex-col items-center font-mono text-gray-400"> Hackathon Team</p>
      <form method="POST" action="../Controller/Delete.php">
      <div class="mt-5 grid grid-cols-2 gap-5">
      <label class="font-mono text-gray-400" style="font-size: 20px;" >Exesting Team</label>
          <select type="text" name="teamexistingdelete"  id="teamexistingid" placeholder="FirstName" class="border border-gray-400 py-1 px-2 w-full" required>
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

            
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5">
      <?php
      $conn->close();
      ?>
        </div>
        <div class="mt-6  ">
        <div class="flex mt-4 md:mt-6">
          
  <button value="Envoyer" type="submit"  class="text-red py-2 px-4 rounded" style="background-color: red;width: 50%;">  <a href="Home.php">Delete</a></button>

    <button value="Envoyer" type="button" class="bg-blue-500 text-red py-2 px-6 rounded " style="width: 50%;"><a href="Home.php">Back</a></button>
</div>
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