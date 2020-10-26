<?php
include_once "Manifest.php";
include_once "MongoDatabaseAdapter.php";
include_once "Controllers/Controller.php";

$search = new Controller();
$search->bindModel("Models/SearchModel");
$search->bindView("Views/GalleryView");
$search->init();