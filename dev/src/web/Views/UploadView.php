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
                    
                    <label for="photoTitle">Tytuł:</label><br/>
                    <input type="text" id="photoTitle" class="text-box" name="photoTitle" required/><br/>
  
                    <label for="author">Autor:</label><br/>
                    <input type="text" id="author" class="text-box" name="author" value="{$this->getParam("userName")}" {$this->getParam("isAuthorDisabled")} required/><br/>
                    
                    <label for="watermark">Znak wodny:</label>
                    <input type="text" id="watermark" class="text-box" name="watermark" required/><br/>
                    
                    {$radios}
                    
                    <label for="fileInput">Wybierz plik:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input id="fileInput"  name="file" type="file" required/>
                    
                    <input type="submit" class="btn" value="Wyślij plik"/>
                </form>
            </div>
FRM;
    }
}