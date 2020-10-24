<?php

require "MongoDatabaseAdapter.php";

class UploadController extends Controller
{
    public function handleFileUpload(){
        $uploadLocation = getcwd()."/images/";
        $guid = Utility::getGUID();
        $fileName = $guid;

        if(($output = $this->validate()) != "OK"){
            echo $output;
            return;
        }
        $smallWidth = 200;
        $smallHeight = 125;

        if($_FILES['file']['type'] == 'image/png')
        {
            $image = imagecreatefrompng($_FILES['file']['tmp_name']);
        }else{
            $image = imagecreatefromjpeg($_FILES['file']['tmp_name']);
        }
        list($width, $height) = getimagesize($_FILES['file']['tmp_name']);
        $small = imagecreatetruecolor(200, 115);
        imagecopyresized($small, $image, 0,0,0,0, $smallWidth, $smallHeight, $width,$height);
        imagestring($image, 64, 0, 0, $_POST["watermark"], imagecolorallocate($image,255,0,0));


        if(imagepng($image, $uploadLocation."[W]".$fileName, 0)){
            echo "File watermarked successfully";
        }else{
            echo "Possible error";
        }
        if(imagepng($small, $uploadLocation."[M]".$fileName, 0)){
            echo "File watermarked successfully";
        }else{
            echo "Possible error";
        }


        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadLocation."[S]".$fileName)){
            echo "File uploaded successfully";
        }else{
            echo "Possible error";
        }

        $db = Manifest::getDatabaseAdapter();
        $db->pushPhoto($guid, $_POST["photoTitle"], $_POST["author"]);

    }
    public function validate(){
        if($_POST["photoTitle"] == null)
            return "Title cant be empty";
        if($_POST["author"] == null)
            return "Author cant be empty";
        if($_POST["watermark"] == null)
            return "Watermark cant be empty";
        if($_FILES['file']['size']>1048576)
            return "File is too large";
        if($_FILES['file']['type'] != 'image/png' && $_FILES['file']['type'] != 'image/jpeg')
            return "File is of wrong type";
        return "OK";
    }
}