<?php


class GalleryView extends View
{
    public $thumbnails = [];
    public $photos = [];

    public $titles = [];
    public $authors = [];
    public function render()
    {
        $out = "";
        for($i = 0; $i < count($this->thumbnails);$i++){
            $out = $out.<<<EOT
<figure>
    <a href="images/{$this->photos[$i]}"><img src="images/{$this->thumbnails[$i]}"/></a>
    <figcaption>{$this->titles[$i]} by {$this->authors[$i]}</figcaption>
</figure>
EOT;
        }
        echo $out;
    }
}