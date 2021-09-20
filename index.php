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
      <form action="">
        <div class="new-todo">
          <input type="text" name="todo" id="todo" placeholder="Une chose à faire ?" />
          <button type="submit">Ajouter</button>
        </div>

        <ul class="list">
          <li>Apprendre PHP <input type="checkbox" name="task1" id="task1" /></li>
          <li>Apprendre Symfony <input type="checkbox" name="task1" id="task1" /></li>
          <li>Apprendre Le WEB <input type="checkbox" name="task1" id="task1" /></li>
        </ul>
      </form>
    </div>
  </main>
  <footer>
    &copy; Tous droits réservés - 2016 - 2021
  </footer>
</body>

</html>