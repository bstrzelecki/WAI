<?php


class LoginView extends View
{

    public function render()
    {
        echo <<<EOT
<form method="post" action="/login/submit">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login"/>
    
    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password"/>
    
    <input type="submit" value="Zaloguj się"/>
</form>
EOT;

    }
}