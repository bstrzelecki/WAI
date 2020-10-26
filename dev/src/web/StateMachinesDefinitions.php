<?php


class StateMachinesDefinitions
{
    public static function getLeftPanelContext(){
        $left  = new Context();
        $left->router->bind("GET", "/gallery", function () {
            $form = new UploadController();
            $form->bindView("Views/UploadView");
            $form->bindModel("Models/UploadModel");
            $form->init();
        });
        $left->router->bind("POST", "/gallery/upload", function () {
            $form = new UploadController();
            $form->handleFileUpload();
            $form->bindView("Views/UploadView");
            $form->bindModel("Models/UploadModel");
            $form->init();
        });
        return $left;
    }

    public static function getContentContext()
    {
        $content = new Context();
        $content->router->bind("GET", "/", function () {
            $main = new Controller();
            $main->bindModel("Models/MainModel");
            $main->bindView("Views/MainView");
            $main->init();
        });
        $content->router->bind("GET", "/events", function () {
            $main = new Controller();
            $main->bindModel("Models/EventModel");
            $main->bindView("Views/MainView");
            $main->init();
        });
        $content->router->bind("GET", "/places", function () {
            $main = new Controller();
            $main->bindModel("Models/PlacesModel");
            $main->bindView("Views/MainView");
            $main->init();
        });
        $content->router->bind("GET", "/gallery", function () {
            $main = new GalleryController();
            $main->bindModel("Models/GalleryModel");
            $main->bindView("Views/GalleryView");
            $main->init();
        });
        $content->router->bind("POST", "/gallery/save", function () {
            $main = new GalleryController();
            $main->handleSave();
            $main->bindModel("Models/GalleryModel");
            $main->bindView("Views/GalleryView");
            $main->init();
        });
        $content->router->bind("GET", "/gallery/upload", function () {
            $main = new GalleryController();
            $main->bindModel("Models/GalleryModel");
            $main->bindView("Views/GalleryView");
            $main->init();
        });
        $content->router->bind("GET", "/gallery/saved", function () {
            $main = new GalleryController();
            $main->bindModel("Models/SavedModel");
            $main->bindView("Views/GalleryView");
            $main->init();
        });
        $content->router->bind("POST", "/gallery/remove", function () {
            $main = new GalleryController();
            $main->handleRemove();
            $main->bindModel("Models/SavedModel");
            $main->bindView("Views/GalleryView");
            $main->init();
        });
        $content->router->bind("GET", "/register", function () {
            $main = new AuthenticationController();
            $main->bindModel("Models/DefaultModel");
            $main->bindView("Views/RegisterView");
            $main->init();
        });
        $content->router->bind("GET", "/login", function () {
            $main = new AuthenticationController();
            $main->bindModel("Models/DefaultModel");
            $main->bindView("Views/LoginView");
            $main->init();
        });
        $content->router->bind("POST", "/register/submit", function () {
            $main = new AuthenticationController();
            $main->bindModel("Models/AuthenticationModel");
            $main->bindView("Views/RegisterView");
            $main->init();
            $main->RegisterUser();
        });
        $content->router->bind("POST", "/login/submit", function () {
            $main = new AuthenticationController();
            $main->bindModel("Models/DefaultModel");
            $main->bindView("Views/LoginView");
            $main->init();
            $main->LoginUser();
        });
        $content->router->bind("GET", "/gallery/search", function () {
            $main = new Controller();
            $main->bindModel("Models/MainModel");
            $main->bindView("Views/SearchView");
            $main->init();
        });
        $content->router->bind("GET", "/logout", function () {
            echo "Wylogowano pomyślnie";
        });
        return $content;
    }
}