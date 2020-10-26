<?php


class UserStateView extends View
{

    public function render()
    {
        if ($this->getParam("isLoggedIn")) {
            echo <<<EOT
         <a href="gallery/saved">
          <div class="nav-option">
              Wybrane
          </div>
        </a>
        <a href="logout">
          <div class="nav-option">
              Wyloguj się
          </div>
        </a>
EOT;
        } else {
            echo <<<EOT
        <a href="login">
          <div class="nav-option">
              Zaloguj się
          </div>
        </a>
        <a href="register">
          <div class="nav-option">
            Zarejestruj się
          </div>
        </a>
EOT;
        }


    }
}