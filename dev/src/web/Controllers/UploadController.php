<?php

class UploadController extends Controller
{
    public function handleFileUpload(){
        $uploadLocation = getcwd()."/images/";
        $uploadPath = $uploadLocation.basename($_FILES['file']['name']);

        if(($output = $this->validate()) != "OK"){
            echo $output;
            return;
        }

        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)){
            echo "File uploaded successfully";
        }else{
            echo "Possible error";
        }
    }
    public function validate(){
        if($_FILES['file']['size']>1048576)
            return "File is too large";
        if($_FILES['file']['type'] != 'image/png' && $_FILES['file']['type'] != 'image/jpeg')
            return "File is of wrong type";
        return "OK";
        //TODO check if file already exist
    }
}