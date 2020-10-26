<?php


class AuthenticationController extends Controller
{
    public function RegisterUser()
    {
        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repwd = $_POST["repassword"];

        if (!$this->Validate($login, $email, $password, $repwd)) return;

        $db = Manifest::getDatabaseAdapter();
        $db->addUser($login, $email, $password);
        echo "Zarejestrowano pomyślnie";
    }

    protected function Validate($login, $email, $password, $repwd)
    {
        $isValid = true;
        if ($login == "" || $email == "" || $password == "" || $repwd == "") {
            echo "Pola nie mogą być puste";
            $isValid = false;
        }
        if ($password != $repwd) {
            echo "Hasło nie są te same";
            $isValid = false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Zły format adresu";
            $isValid = false;
        }
        $db = Manifest::getDatabaseAdapter();
        if (!$db->isLoginAvailable($login)) {
            echo "Login jest już w użyciu";
            $isValid = false;
        }


        return $isValid;
    }

    public function LoginUser()
    {
        $login = $_POST["login"];
        $password = $_POST["password"];

        $db = Manifest::getDatabaseAdapter();
        $key = $db->getSessionKey($login, $password);
        if ($key == null) {
            echo "Nazwa urzytkownika lub hasło jest niepoprawne";
        } else {
            $_SESSION["key"] = $key;
            echo "Zalogowano pomyślnie";
        }
    }
}