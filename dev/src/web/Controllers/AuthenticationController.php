<?php


class AuthenticationController extends Controller
{
    public function RegisterUser(){
        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repwd = $_POST["repassword"];

        if(!$this->Validate($login, $email, $password, $repwd))return;
        echo "Attempting user registration";
        $db = Manifest::getDatabaseAdapter();
        $db->addUser($login, $email, $password);
        echo "Database entry created";
    }
    public function LoginUser(){
        $login = $_POST["login"];
        $password = $_POST["password"];

        $db = Manifest::getDatabaseAdapter();
        $key = $db->getSessionKey($login, $password);
        if($key == null){
            echo "Username or password is invalid";
        }
        else{
            $_SESSION["key"] = $key;
            echo "Logged in successfully";
        }
    }
    protected function Validate($login ,$email, $password, $repwd){
        $isValid = true;
        if($password != $repwd){
            echo "Passwords do not match";
            $isValid = false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            $isValid = false;
        }
        $db = Manifest::getDatabaseAdapter();
        if(!$db->isLoginAvailable($login)){
            echo "Login is already taken";
            $isValid = false;
        }


        return $isValid;
    }
}