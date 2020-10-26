<?php
      session_start();


      require "Manifest.php";
      require "Context.php";
      require "Controllers/PlainTextDisplayController.php";
      require "Controllers/UploadController.php";
      require "Controllers/GalleryController.php";
      require "Controllers/UserStateController.php";
      require "Controllers/AuthenticationController.php";
      require "Controllers/SearchController.php";

      $sessionCtrl = new Context();
      $sessionCtrl->router->bind("GET", "/logout", function (){
          session_unset();
          session_destroy();
      });
      $sessionCtrl->apply();
?>
<!doctype html>
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
          <a href="gallery/search">
          <div class="nav-option">
            Wyszukiwarka
          </div>
        </a>
      </div>

        <?php
            $auth = new Context();
            $auth->router->bind("POST", "/login/submit", function (){});
            $auth->router->any(function (){
                $btns = new UserStateController();
                $btns->bindModel("Models/UserStateModel");
                $btns->bindView("Views/UserStateView");
                $btns->init();
            });
            $auth->apply();
        ?>

      <app-notepad></app-notepad>
        <?php
            $left = new Context();
            $left->router->bind("GET", "/gallery", function (){
                $form = new UploadController();
                $form->bindView("Views/UploadView");
                $form->bindModel("Models/UploadModel");
                $form->init();
            });
            $left->router->bind("POST", "/gallery/upload", function (){
                $form = new UploadController();
                $form->handleFileUpload();
            });
            $left->apply();
        ?>
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
                $main = new GalleryController();
                $main->bindModel("Models/GalleryModel");
                $main->bindView("Views/GalleryView");
                $main->init();
            });
            $content->router->bind("POST", "/gallery/save", function (){
                $main = new GalleryController();
                $main->handleSave();
                $main->bindModel("Models/GalleryModel");
                $main->bindView("Views/GalleryView");
                $main->init();
            });
            $content->router->bind("GET", "/gallery/saved", function (){
                $main = new GalleryController();
                $main->bindModel("Models/SavedModel");
                $main->bindView("Views/GalleryView");
                $main->init();
            });
            $content->router->bind("POST", "/gallery/remove", function (){
                $main = new GalleryController();
                $main->handleRemove();
                $main->bindModel("Models/SavedModel");
                $main->bindView("Views/GalleryView");
                $main->init();
            });
            $content->router->bind("GET", "/register", function (){
                $main = new AuthenticationController();
                $main->bindModel("Models/AuthenticationModel");
                $main->bindView("Views/RegisterView");
                $main->init();
            });
            $content->router->bind("GET", "/login", function (){
                $main = new AuthenticationController();
                $main->bindModel("Models/AuthenticationModel");
                $main->bindView("Views/LoginView");
                $main->init();
            });
            $content->router->bind("POST", "/register/submit", function (){
                $main = new AuthenticationController();
                $main->bindModel("Models/AuthenticationModel");
                $main->bindView("Views/RegisterView");
                $main->init();
                $main->RegisterUser();
            });
            $content->router->bind("POST", "/login/submit", function (){
                $main = new AuthenticationController();
                $main->bindModel("Models/AuthenticationModel");
                $main->bindView("Views/LoginView");
                $main->init();
                $main->LoginUser();
            });
            $content->router->bind("GET", "/gallery/search", function (){
                $main = new SearchController();
                $main->bindModel("Models/MainModel");
                $main->bindView("Views/SearchView");
                $main->init();
            });
            $content->router->bind("GET", "/logout", function (){
                echo "Wylogowano pomyślnie";
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
