<?php


class GalleryView extends View
{

    public function render()
    {
        $thumbnails = $this->getParam("thumbnails");
        $authors = $this->getParam("authors");
        $titles = $this->getParam("titles");
        $photos = $this->getParam("photos");
        $isLoggedIn = @$_SESSION['key']!=null?"":"disabled";
        $out = "<form method='post' action='PhotoSaver.php'>";
        $imgNo = 0;
        $page = @$_GET["page"]??0;
        for($i = GalleryModel::$imagesOnPage*$page; $i < min(GalleryModel::$imagesOnPage+GalleryModel::$imagesOnPage*$page,count($thumbnails)) ;$i++){
            $out = $out.<<<EOT
<figure>
    <a href="images/{$photos[$i]}"><img src="images/{$thumbnails[$i]}"/></a>
    <figcaption>{$titles[$i]} by {$authors[$i]}</figcaption>
</figure><input type="checkbox" name="selected[]" value="{$thumbnails[$i]}"/>
EOT;
            $imgNo++;
        }
        $previousPage = $page - 1;
        $nextPage = $page+1;
        $out = $out."<input type='submit' value='Zapamiętaj wybrane' {$isLoggedIn}></form>";

        if($previousPage >= 0){
            $out = $out."<a href='/gallery?page={$previousPage}'>Poprzednia strona</a>";
        }
        if($nextPage < count($thumbnails) / GalleryModel::$imagesOnPage)
        {
            $out = $out."<a href='/gallery?page={$nextPage}'>Następna strona</a>";
        }

        echo $out;
    }
}