<?php


class GalleryModel extends Model
{
    public static $imagesOnPage = 5;


    public $thumbnails = [];
    public $photos = [];
    public $titles = [];
    public $authors = [];
    public function init()
    {
        $files = scandir("/var/www/dev/src/web/images");
        $ti = 0;
        $pi = 0;
        $db = Manifest::getDatabaseAdapter();

        foreach ($files as $file){
            if($file == "." || $file == "..")continue;
            if($file[1] == 'W'){
                $this->photos[$pi] = $file;
                $pi++;
            }
            if($file[1] == 'M'){
                $this->thumbnails[$ti] = $file;
                $data =  $db->getPhoto(substr($file, 3));
                $this->titles[$ti] = $data["title"];
                $this->authors[$ti] = $data["author"];
                $ti++;
            }
        }

        $this->setParam("authors", $this->authors);
        $this->setParam("titles", $this->titles);
        $this->setParam("thumbnails", $this->thumbnails);
        $this->setParam("photos", $this->photos);
    }
}