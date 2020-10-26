<?php


class RegisterView extends View
{

    public function render()
    {
        echo <<<EOT
<form method="post" action="/register/submit">
    <label for="email">Adres e-mail:</label>
    <input class="text-box" type="email" id="email" name="email" required/><br/>
    <label for="login">Login:</label>
    <input class="text-box" type="text" id="login" name="login" required/><br/>
    
    <label for="password">Hasło:</label>
    <input class="text-box" type="password" id="password" name="password" required/><br/>
    <label for="repassword">Powtórz hasło:</label>
    <input class="text-box" type="password" id="repassword" name="repassword" required/><br/>
    
    <input type="submit" class="btn" value="Wyślij">
</form>
EOT;

    }
}