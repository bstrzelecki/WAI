<?php
session_start();

require "Manifest.php";
require "Context.php";
include "StateMachinesDefinitions.php";
require "Controllers/UploadController.php";
require "Controllers/GalleryController.php";
require "Controllers/AuthenticationController.php";

$sessionCtrl = new Context();
$sessionCtrl->router->bind("GET", "/logout", function () {
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
    <link rel="stylesheet" href="styles.css">
</head>
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
                <?php
                $auth = new Context();
                $auth->router->bind("POST", "/login/submit", function () {});
                $auth->router->any(function () {
                    $btns = new Controller();
                    $btns->bindModel("Models/UserStateModel");
                    $btns->bindView("Views/UserStateView");
                    $btns->init();
                });
                $auth->apply();
                ?>
            </div>
            <app-notepad></app-notepad>
            <?php
            $left = StateMachinesDefinitions::getLeftPanelContext();
            $left->apply();
            ?>
        </div>

    </aside>
    <article>
        <div id="content">
            <?php
            $content = StateMachinesDefinitions::getContentContext();
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
<script src="runtime.js" defer></script>
<script src="polyfills.js" defer></script>
<script src="scripts.js" defer></script>
<script src="main.js" defer></script>
</body>
</html>
