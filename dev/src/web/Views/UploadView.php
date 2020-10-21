<?php


class UploadView  extends View
{

    public function render()
    {
        echo <<<FRM
            <div>
                <form enctype="multipart/form-data" action="/gallery/upload" method="POST">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <label for="fileInput">Wybierz plik:</label>
                    <input id="fileInput" name="file" type="file"/>
                    <input type="submit" value="Wyślij plik"/>
                </form>
            </div>
            

FRM;

    }
}