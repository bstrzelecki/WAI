<?php


class UploadView  extends View
{

    public function render()
    {
        echo <<<FRM
            <div>
                <form enctype="multipart/form-data" action="/gallery/upload" method="POST">
                    
                    <label for="photoTitle">Tytuł:</label>
                    <input type="text" id="photoTitle" name="photoTitle"/>
  
                    <label for="author">Autor:</label>
                    <input type="text" id="author" name="author"/>
                    
                    <label for="watermark">Znak wodny:</label>
                    <input type="text" id="watermark" name="watermark"/>
                    
                    <label for="fileInput">Wybierz plik:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input id="fileInput" name="file" type="file"/>
                    
                    <input type="submit" value="Wyślij plik"/>
                </form>
            </div>
FRM;
    }
}