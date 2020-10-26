<?php


class LoginView extends View
{

    public function render()
    {
        echo <<<EOT
<form method="post" action="/login/submit">
    <label for="login">Login:</label>
    <input class="text-box" type="text" id="login" name="login"/>
    
    <label for="password">Hasło:</label>
    <input class="text-box" type="password" id="password" name="password"/>
    
    <input type="submit" class="btn" value="Zaloguj się"/>
</form>
EOT;

    }
}