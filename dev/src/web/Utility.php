<?php

class Utility
{
    public static function getPath($uri){
        return explode('?', $uri)[0];
    }
}