<!doctype html>
<?php require "Context.php";
      require "PlainTextDisplayController.php";
?>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Web</title>
  <base href="/">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="favicon.ico" rel="icon" type="image/x-icon">
<link rel="stylesheet" href="styles.css"></head>
<body>
<div id="container">
  <header>
    <div id="title">
      <h1>
Podróżowanie - Moje hobby
</h1>
      <app-size-adjust></app-size-adjust>
    </div>
  </header>
  <aside>
    <div id="left-panel">
      <div id="navigation">
        <a href="/">
          <div class="nav-option">
              Strona główna
          </div>
        </a>
        <a href="events">
          <div class="nav-option">
                Nadchodzące wydarzenia
          </div>
        </a>
        <a href="places">
          <div class="nav-option">
              Interesujące miejsca
          </div>
        </a>
        <a href="gallery">
          <div class="nav-option">
            Galeria
          </div>
        </a>
      </div>

      <app-notepad></app-notepad>

    </div>

  </aside>
  <article>
    <div id="content">
        <?php
            $content = new Context();
            $content->router->bind("GET", "/", function (){
                $main = new PlainTextDisplayController();
                $main->bindModel("Models/MainModel");
                $main->bindView("Views/MainView");
                $main->init();
            });
            $content->router->bind("GET", "/events", function (){
                $main = new PlainTextDisplayController();
                $main->bindModel("Models/EventModel");
                $main->bindView("Views/MainView");
                $main->init();
            });
            $content->router->bind("GET", "/places", function (){
                $main = new PlainTextDisplayController();
                $main->bindModel("Models/PlacesModel");
                $main->bindView("Views/MainView");
                $main->init();
            });
            $content->router->bind("GET", "/gallery", function (){
                $main = new PlainTextDisplayController();
                $main->bindModel("Models/MainModel");
                $main->bindView("Views/MainView");
                $main->init();
            });
            $content->apply();

        ?>
    </div>
  </article>
  <footer>
    <div id="ft">
      <app-clock></app-clock>
      <span>Made by Bartosz Strzelecki 2020</span>
    </div>
  </footer>
</div>
<app-greeter></app-greeter>
<script src="runtime.js" defer></script><script src="polyfills.js" defer></script><script src="scripts.js" defer></script><script src="main.js" defer></script></body>
</html>
