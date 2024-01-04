<?php

namespace Src\Core;

// require("Validation.php");

use Src\Core\Validation;
use Src\Models\Database;

class Ajax
{
    private $username;
    private $email;
    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }
    public function response()
    {
        if (isset($this->username)) {
            if (!isset($this->username)) {
                echo json_encode(["ok" => false]);
                return;
            }
            $exist = Validation::checkUserExist("username", $this->username);
            if ($exist) {
                echo json_encode(["ok" => true, "message" => "This '{$this->username}' username is already taken"]);
                exit;
            } else {
                echo json_encode(["ok" => false]);
                exit;
            }
        }

        if (isset($this->email)) {
            if (!isset($this->email)) {
                echo json_encode(["ok" => false]);
                return;
            }
            $exist = Validation::checkUserExist("email", $this->email);
            if ($exist) {
                $response = ["ok" => true, "message" => "This '{$this->email}' email is already taken"];
                echo json_encode($response);
                exit;
            } else {
                echo json_encode(["ok" => false]);
                exit;
            }
        }
    }
}
