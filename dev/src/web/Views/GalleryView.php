<?php

include_once "Models/GalleryModel.php";

class GalleryView extends View
{

    public function render()
    {
        $thumbnails = $this->getParam("thumbnails");
        $authors = $this->getParam("authors");
        $titles = $this->getParam("titles");
        $photos = $this->getParam("photos");
        $isLoggedIn = @$_SESSION['key']!=null?"":"disabled";
        $selected = $this->getParam("selected");
        $page = @$_GET["page"]??0;
        error_reporting(0);
        $out = "<form method='post' action='/gallery/{$this->getParam("mode")}?page={$page}'>";
        for($i = GalleryModel::$imagesOnPage*$page; $i < min(GalleryModel::$imagesOnPage+GalleryModel::$imagesOnPage*$page,count($thumbnails)) ;$i++){
            $out .= <<<EOT
    <figure>
       <a href="images/{$photos[$i]}"><img src="images/{$thumbnails[$i]}"/></a>
       <figcaption>{$titles[$i]} by {$authors[$i]}</figcaption>
    </figure><input type="checkbox" name="selected[]" value="{$thumbnails[$i]}" {$selected[$i]}/>
EOT;
        }
        error_reporting(-1);
        $out .= "<input name='page' type='hidden' value='{$page}'/>";
        $pages = (int)(count($thumbnails)/GalleryModel::$imagesOnPage);
        $out .= "<input name='pages' type='hidden' value='{$pages}'/>";
        $previousPage = $page - 1;
        $nextPage = $page+1;
        $buttonValue = $this->getParam("mode")=="save"?"Zapamiętaj wybrane":"Usuń z wybranych";
        if(count($thumbnails)>0)
            $out .= "<input type='submit' value='$buttonValue' {$isLoggedIn}></form>";

        if($previousPage >= 0){
            $out .= "<a href='/gallery?page={$previousPage}'>Poprzednia strona</a>";
        }
        if($nextPage < count($thumbnails) / GalleryModel::$imagesOnPage)
        {
            $out .= "<a href='/gallery?page={$nextPage}'>Następna strona</a>";
        }

        echo $out;
    }
}