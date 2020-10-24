<?php


class UserStateModel extends Model
{

    public function init()
    {
        $this->setParam("isLoggedIn", @$_SESSION["key"]!=null);
    }
}