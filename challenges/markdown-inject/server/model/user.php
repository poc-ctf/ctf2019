<?php
class User {
    private $name;
    private $password;
    private $token;

    public function __construct($resultArray) {
        $this->name = $resultArray['username'];
        $this->password = $resultArray['password'];
        $this->token = $resultArray['token'];
    }


    public function getToken() {
        return $this->token;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public static function getTokenHash($password) {
        return hash('sha1', '8ij$uhg@b' . $password);
    }

    public static function getPasswordHash($password) {
        return hash('sha1', '6g_bm&' . $password);
    }
}