<?php


class GalleryModel extends Model
{
    public static $imagesOnPage = 5;


    public $thumbnails = [];
    public $photos = [];
    public $titles = [];
    public $authors = [];
    public $selected = [];

    public function init()
    {
        $this->setParam("mode", "save");
        $files = scandir("/var/www/dev/src/web/images");
        $ti = 0;
        $pi = 0;
        $db = Manifest::getDatabaseAdapter();

        foreach ($files as $file) {
            if ($file == "." || $file == "..") continue;
            if ($file[1] == 'W') {
                $this->photos[$pi] = $file;
                $pi++;
            }
            if ($file[1] == 'M') {
                $data = $db->getPhoto(substr($file, 3));
                if (isset($data["visibleBy"]) && $data["visibleBy"] != $_SESSION["key"])
                    continue;
                $this->thumbnails[$ti] = $file;
                $this->selected[$ti] = @in_array($this->thumbnails[$ti], @$_SESSION["page" . (int)($ti / GalleryModel::$imagesOnPage)]) ? "checked" : "";
                $this->titles[$ti] = $data["title"];
                $this->authors[$ti] = $data["author"] . (isset($data["visibleBy"]) ? " [P]" : "");
                $ti++;
            }
        }
        $this->setParam("selected", $this->selected);
        $this->setParam("authors", $this->authors);
        $this->setParam("titles", $this->titles);
        $this->setParam("thumbnails", $this->thumbnails);
        $this->setParam("photos", $this->photos);
    }
}