<?php


class UploadModel extends Model
{

    public function init()
    {
        if (@$_SESSION["key"] != null) {
            $db = Manifest::getDatabaseAdapter();
            $this->setParam("userName", $db->getUserLogin($_SESSION["key"]));
            $this->setParam("isAuthorDisabled", "readonly");
        } else {
            $this->setParam("isAuthorDisabled", "");
        }

    }
}