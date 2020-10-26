<?php
include_once "Manifest.php";
include_once "MongoDatabaseAdapter.php";
include_once "Controllers/Controller.php";
include_once "Controllers/SearchController.php";

$search = new SearchController();
$search->bindModel("Models/SearchModel");
$search->bindView("Views/GalleryView");
$search->init();