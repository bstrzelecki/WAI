<?php


class SearchView extends View
{

    public function render()
    {
        echo <<<EOT
        <script>
        function updateGallery(string){
            if(string.length === 0){
                document.getElementById("gallery").innerHTML = "";
            }else{
                const request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                     document.getElementById("gallery").innerHTML = this.responseText;
                  }
                };
                request.open("GET", "search.php?value=" + string, true);
                request.send();
            }
        }
</script>
        
        <input onkeyup="updateGallery(this.value)">
        <div id="gallery"></div>

EOT;

    }
}