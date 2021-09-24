<?php

// Constantes d'erreurs
const ERROR_REQUIRED = "Désolé, ce champ ne peut-être vide.";
const ERROR_TOO_SHORT = "Désolé, vous avez saisie moins de 5 caractères.";
$error = "";

// Création du fichier contenant nos todos. (Format JSON)
$filename = __DIR__ . '/data/todos.json';
$todos = [];

// Check si le fichier existe sinon on définit un tableau vide
if (file_exists($filename)) {
  $data = file_get_contents($filename);
  $todos = json_decode($data, true); // Convertie en tableau Associatif
}

// Contrôle qu'on a bien une méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Désinfection de l'input
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $todo = $_POST['todo'];

  // Contrôle de la TODO
  if (!$todo) {
    $error = ERROR_REQUIRED;
  } elseif (mb_strlen($todo) < 5) {
    $error = ERROR_TOO_SHORT;
  };

  // Si je n'ai pas d'erreur j'ajoute le contenu de la nouvelle todo
  if (!$error) {
    $todos = [...$todos, [
      "id" => time(),
      "name" => $todo,
      "done" => false
    ]];

    file_put_contents($filename, json_encode($todos), JSON_PRETTY_PRINT);
  }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Todo List | PHP</title>
  <!-- JS -->
  <script src="./public/javascripts/index.js" defer></script>
  <!-- CSS -->
  <link rel="stylesheet" href="./public/css/style.css" />
</head>

<body>
  <header>
    <nav>
      <span class="brand">Logo</span>
    </nav>
  </header>
  <main>
    <div class="todos">
      <form action="/" method="POST">
        <input type="text" name="todo" id="todo" placeholder="Une chose à faire ?" />
        <button type="submit">Ajouter</button>
      </form>
      <?php if ($error) : ?>
        <p><?= $error; ?></p>
      <?php endif; ?>

      <ul class="list">
        <li>Apprendre PHP <input type="checkbox" name="task1" id="task1" /></li>
        <li>Apprendre Symfony <input type="checkbox" name="task1" id="task1" /></li>
        <li>Apprendre Le WEB <input type="checkbox" name="task1" id="task1" /></li>
      </ul>
    </div>
  </main>
  <footer>
    &copy; Tous droits réservés - 2016 - 2021
  </footer>
</body>

</html>