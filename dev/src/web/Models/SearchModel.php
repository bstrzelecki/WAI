<?php


class SearchModel extends Model
{
    public $thumbnails = [];
    public $photos = [];
    public $titles = [];
    public $authors = [];

    public function init()
    {
        $this->setParam("mode", "search");
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
                if (isset($data["visibleBy"]))
                    continue;
                if (strpos($data["title"], $_GET["value"]) === false)
                    continue;
                $this->thumbnails[$ti] = $file;
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