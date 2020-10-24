<?php


class Manifest
{
    public static function getDatabaseAdapter(){
        return new MongoDatabaseAdapter();
    }
}