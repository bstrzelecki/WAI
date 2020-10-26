<?php

require "MongoDatabaseAdapter.php";
include_once "Controller.php";

class UploadController extends Controller
{
    public function handleFileUpload()
    {
        $uploadLocation = getcwd() . "/images/";
        $uid = Utility::getUID();
        $fileName = $uid;

        if (($output = $this->validate()) != "OK") {
            echo $output;
            return;
        }
        $smallWidth = 200;
        $smallHeight = 125;

        if ($_FILES['file']['type'] == 'image/png') {
            $image = imagecreatefrompng($_FILES['file']['tmp_name']);
        } else {
            $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
        }
        list($width, $height) = getimagesize($_FILES['file']['tmp_name']);
        $small = imagecreatetruecolor(200, 115);
        imagecopyresized($small, $image, 0, 0, 0, 0, $smallWidth, $smallHeight, $width, $height);
        imagestring($image, 64, 0, 0, $_POST["watermark"], imagecolorallocate($image, 255, 0, 0));


        if (!imagepng($image, $uploadLocation . "[W]" . $fileName, 0)) {
            echo "Possible error";
        }
        if (!imagepng($small, $uploadLocation . "[M]" . $fileName, 0)) {
            echo "Possible error";
        }


        if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadLocation . "[S]" . $fileName)) {
            echo "Possible error";
        }

        $db = Manifest::getDatabaseAdapter();
        if (isset($_POST["visibility"]) && $_POST["visibility"] == "private") {
            $db->pushPrivatePhoto($uid, $_POST["photoTitle"], $_POST["author"], $_SESSION["key"]);
        } else {
            $db->pushPhoto($uid, $_POST["photoTitle"], $_POST["author"]);
        }


    }

    public function validate()
    {
        if ($_POST["photoTitle"] == null)
            return "Tytuł nie może być pusty";
        if ($_POST["author"] == null)
            return "Autor nie może być pusty";
        if ($_POST["watermark"] == null)
            return "Znak wodny nie może być pusty";
        if ($_FILES['file']['size'] > 1048576)
            return "Plik jest zbyt duży";
        if ($_FILES['file']['type'] != 'image/png' && $_FILES['file']['type'] != 'image/jpeg')
            return "Plik jest złego typu";
        return "OK";
    }
}