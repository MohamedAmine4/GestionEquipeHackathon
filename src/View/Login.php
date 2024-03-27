<?php
session_start();

$err1 = "";
$err2 = "";

try {
    $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
    echo "erreur de connexion $e->$getMessage()";
}

if (isset($_POST['valider'])) {
    if (!empty($_POST['lastname']) && !empty($_POST['password'])) {
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];

        // Préparer la requête SQL pour sélectionner l'utilisateur en fonction du nom d'utilisateur et du mot de passe
        $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE lastname = ? AND password = ?');
        $recupUser->execute(array($lastname, $password));

        // Vérifier si l'utilisateur existe dans la base de données
        if ($recupUser->rowCount() > 0) {
            // Utilisateur trouvé, récupérer ses informations
            $user = $recupUser->fetch();

            // Enregistrer les informations de l'utilisateur dans la session
            $_SESSION['id'] = $user['id'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['skills'] = $user['skills'];
            $_SESSION['class'] = $user['class'];

            // Rediriger l'utilisateur vers la page d'accueil
            header('Location: Home.php');
            exit(); // Terminer le script après la redirection
        } else {
            // Utilisateur non trouvé, afficher un message d'erreur
            $err1 .= "<span style='color:red;'><b>Nom d'utilisateur ou mot de passe incorrect.</b></span>";
        }
    } else {
        // Les champs nom d'utilisateur et mot de passe sont vides, afficher un message d'erreur
        $err2 .= "<span style='color:red;'><b>Veuillez saisir votre nom d'utilisateur et votre mot de passe.</b></span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../asset/login.css" rel="stylesheet">
</head>

<body>

    <form action="" method="post">
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

                    <div class="w-full lg:w-1/2 py-16 px-12">
                        <h1 class="text-2xl font-semibold mb-4">Login</h1>
                        <!-- Formulaire de connexion -->
                        <?php echo $err2; ?>
                        <?php echo $err1; ?>
                        
                        <div class="mb-4">
                            <label for="username" class="block text-gray-600">Username</label>
                            <input type="text" id="username" name="lastname" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-600">Password</label>
                            <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                        </div>
                        <button type="submit" name="valider" class="bg-green-500 hover:bg-green-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br><br>
    <?php
    // Inclure le footer
    include('footer.php');
    ?>
</body>

</html>
