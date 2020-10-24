<?php


class RegisterView extends View
{

    public function render()
    {
        echo <<<EOT
<form method="post" action="/register/submit">
    <label for="email">Adres e-mail:</label>
    <input type="email" id="email" name="email"/><br/>
    <label for="login">Login:</label>
    <input type="text" id="login" name="login"/><br/>
    
    <label for="password">Hasło:</label>
    <input type="password" id="password" name="password"/><br/>
    <label for="repassword">Powtórz hasło:</label>
    <input type="password" id="repassword" name="repassword"/><br/>
    
    <input type="submit" value="Wyślij">
</form>
EOT;

    }
}