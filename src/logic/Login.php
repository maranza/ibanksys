<?php

//Verifies Username and password

class Login {

    private $username;
    private $password;
    private $level;
    private $data = array();

    public function __construct($username, $password) {

        $this->username = $username;
        $this->password = $password;
    }

    public function checkLogin() {
        //authenticate user 
        $sql = "SELECT * FROM login where username=:user AND password=:pass";
        $rows = getData($sql, array("user" => $this->username, "pass" => $this->password));
        if (count($rows) == 1) {
            $this->data = $rows;
            return true;
        } else
            return false;
    }

    public function isAdmin() {

        if ($this->data[0]["level"] == 1)
            return true;
        else
            return false;
    }

    //checks if user is blocked
    public function blocked() {
        if ($this->data[0]["access"] == 1)
            if ($this->check())
                return true;
            else
                return false;
    }

    public function getid() {

        return($this->data[0]["idnumber"]);
    }

    //checking the db if user is blocked
    private function check() {
        if ($this->data[0]["stamp"] != 0) {
            if ($this->data[0]["stamp"] > time())
                return true;
            else {

                runquery("UPDATE login set access=0,stamp=0 where username=:usr", array(":usr" => $this->username));
                return false;
            }
        } else
            return false;
    }

    public function getUsername() {

        return($this->username);
    }

    public function getPassword() {
        return($this->password());
    }

}
