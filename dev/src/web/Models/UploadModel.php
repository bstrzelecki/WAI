<?php


class UploadModel extends Model
{

    public function init()
    {
        if(@$_SESSION["key"]!=null){
            $db = Manifest::getDatabaseAdapter();
            $this->setParam("userName", $db->getUserLogin($_SESSION["key"]));
            $this->setParam("isAuthorDisabled", "disabled");
        }else{
            $this->setParam("isAuthorDisabled", "");
        }

    }
}