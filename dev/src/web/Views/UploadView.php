<?php


class UploadView extends View
{

    public function render()
    {
        $radios = "";
        if (isset($_SESSION["key"])) {
            $radios = <<<RDO
<label for="public">Publiczny</label>
<input type="radio" name="visibility" id="public" value="public" checked/>
<label for="private">Prywatny</label>
<input type="radio" name="visibility" id="private" value="private"/>
RDO;

        }
        echo <<<FRM
            <div>
                <form enctype="multipart/form-data" action="/gallery/upload" method="POST">
                    
                    <label for="photoTitle">Tytuł:</label>
                    <input type="text" id="photoTitle" name="photoTitle" required/>
  
                    <label for="author">Autor:</label>
                    <input type="text" id="author" name="author" value="{$this->getParam("userName")}" {$this->getParam("isAuthorDisabled")} required/>
                    
                    <label for="watermark">Znak wodny:</label>
                    <input type="text" id="watermark" name="watermark" required/>
                    
                    {$radios}
                    
                    <label for="fileInput">Wybierz plik:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input id="fileInput" name="file" type="file" required/>
                    
                    <input type="submit" value="Wyślij plik"/>
                </form>
            </div>
FRM;
    }
}