<?php


class MainView extends View
{
    public $params = [];
    public function render()
    {
        echo
      "<h2>".$this->getParam("title")."</h2>".
      "<p id=\"contentParagraph\">".$this->getParam("data").
      "</p>".
      "<small>".$this->getParam("footer")."</small>";
    }
}