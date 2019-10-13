<?php
require_once __DIR__ . '/../repositories/UserRepository.php';
date_default_timezone_set('UTC');

class Config {
    public static $dbInstance;
    public static $userRepository;

    public static function db() {
        if (self::$dbInstance == null) {
            self::$dbInstance = new PDO('sqlite:../db/complains.sqlite3');
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::init();
        }

        return self::$dbInstance;
    }

    public static function userRepository() {
        if (self::$userRepository == null) {
            self::$userRepository = new UserRepository();
        }

        return self::$userRepository;
    }

    public static function clear() {
        self::$dbInstance = null;
    }

    private static function init() {
        self::$dbInstance->exec(
            "CREATE TABLE IF NOT EXISTS comment (
                    id INTEGER PRIMARY KEY, 
                    token TEXT, 
                    title TEXT, 
                    comment TEXT, 
                    visited INTEGER, 
                    time INTEGER)"
        );

        self::$dbInstance->exec(
            "CREATE TABLE IF NOT EXISTS user (
                    id INTEGER PRIMARY KEY, 
                    username TEXT, 
                    password TEXT, 
                    token TEXT)"
        );

        self::$dbInstance->exec(
            "CREATE TABLE IF NOT EXISTS loginNumber (
                    loginNumber INTEGER, 
                    username TEXT PRIMARY KEY)"
        );

        $adminUsername = 'ycpejmz22xmv1omgww';
        self::$dbInstance->exec(
            "REPLACE INTO loginNumber (username, loginNumber) VALUES ('" . $adminUsername . "', 10)"
        );

        $password = '1234';
        $dbPassword = User::getPasswordHash($password);
        $token = self::flag();
        self::$dbInstance->exec(
            "REPLACE INTO user (`id`, `username`, `password`, `token`)
                VALUES (1, \"${adminUsername}\", \"${dbPassword}\", \"${token}\")
                "
        );
    }

    public static function flag() {
        return "zouunylm4nlugmoawcta9sklf7tunppa6oxflpibjvbpi5vv2rj";
    }
}

Config::db();