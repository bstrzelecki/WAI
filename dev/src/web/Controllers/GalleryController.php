<?php


class GalleryController extends Controller
{
    public function handleSave()
    {
        $page = $_POST["page"];
        $arr = $_POST["selected"];
        if ($page == "") $page = 0;
        $_SESSION["pages"] = $_POST["pages"];
        $_SESSION["page" . $page] = $arr;
    }

    public function handleRemove()
    {
        for ($i = 0; $i <= $_SESSION["pages"]; $i++) {
            $pageStr = "page" . $i;
            $_SESSION[$pageStr] = array_diff($_SESSION[$pageStr], $_POST["selected"]);
        }
    }
}