<?php
session_start();
try {
  $connection = new PDO("mysql:host=localhost;dbname=hackathon;port:3306;charset=utf8", 'root', '');
} catch (Exception $e) {
  echo "erreur de connexion $e->$getMessage()";
}


if (isset($_GET['id']) and !empty($_GET['id'])) {
  $id = $_GET['id'];
  $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
  $recupUser->execute(array($id));
  if ($recupUser->rowCount() > 0) {
    if (isset($_POST['envoyer'])) {
      if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $insertionMessage = $connection->prepare('INSERT INTO message (message, id_destinataire, id_auteur) VALUES (?, ?, ?)');
        $insertionMessage->execute(array($message, $id, $_SESSION['id']));
      }
    }
  } else {
    echo "Aucun utilisateur Trouvé";
  }
} else {
  echo "Aucun Identifiant Trouvé";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../asset/chat.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
<?php
  // Inclure le footer
  include('navbar.php');
  ?>
  <form action="" method="post">
    <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
      <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
        <div class="relative flex items-center space-x-4">
          <div class="relative">
            <span class="absolute text-green-500 right-0 bottom-0">
              <svg width="20" height="20">
                <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
              </svg>
            </span>
            <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
          </div>
          <div class="flex flex-col leading-tight">

            <?php

            $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
            $recupUser->execute(array($id));
            $user = $recupUser->fetch();

            ?>

            <div class="text-2xl mt-1 flex items-center">
              <span class="text-gray-700 mr-3"><?php echo $user['firstname'] . " " . $user['lastname'] ?></span>
            </div>
            <span class="text-lg text-gray-600">Junior Developer</span>
          </div>
        </div>
        <div class="flex items-center space-x-2">
          <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </button>
          <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
          </button>
          <button type="button" class="inline-flex items-center justify-center rounded-lg border h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
          </button>
        </div>
      </div>
      <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">

        <?php

        $recupMessage = $connection->prepare('SELECT * FROM message WHERE id_auteur = ? AND id_destinataire = ? OR id_auteur = ? AND id_destinataire = ? ');
        $recupMessage->execute(array($_SESSION['id'], $id, $id, $_SESSION['id']));
        while ($message = $recupMessage->fetch()) {

          if ($message['id_auteur'] == $_SESSION['id']) {
        ?>
          <div class="chat-message">
          <div class="flex items-end justify-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white "><?php echo $message['message'] ?></span></div>
            </div>
            <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
          </div>
        </div>
          <?php
          } else {
            $recupUser = $connection->prepare('SELECT * FROM etudiant WHERE id = ?');
            $recupUser->execute(array($message['id_auteur']));
            $user = $recupUser->fetch();
          ?>
            <div class="chat-message">
          <div class="flex items-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600"><?php echo  $message['message'] ?></span></div>
            </div>
            <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
          </div>
        </div>
        <?php
          }
        }
        ?>
      
      </div>
      <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
        <div class="relative flex">
          <span class="absolute inset-y-0 flex items-center">
            <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
              </svg>
            </button>
          </span>
          <input type="text" placeholder="Write your message!" name="message" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
          <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
              </svg>
            </button>
            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </button>
            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </button>
            <button type="submit" name="envoyer" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
              <span class="font-bold">Send</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <style>
    .scrollbar-w-2::-webkit-scrollbar {
      width: 0.25rem;
      height: 0.25rem;
    }

    .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
      --bg-opacity: 1;
      background-color: #f7fafc;
      background-color: rgba(247, 250, 252, var(--bg-opacity));
    }

    .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
      --bg-opacity: 1;
      background-color: #edf2f7;
      background-color: rgba(237, 242, 247, var(--bg-opacity));
    }

    .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
      border-radius: 0.25rem;
    }
  </style>

  <script>
    const el = document.getElementById('messages')
    el.scrollTop = el.scrollHeight
  </script>

<br><br><br>
<?php
  // Inclure le footer
  include('footer.php');
  ?>
</body>
</html>