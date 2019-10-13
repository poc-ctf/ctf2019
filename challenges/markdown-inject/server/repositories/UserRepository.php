<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/user.php';

class UserRepository {
    public function isUserValidByToken($token) {
        return !empty($this->getUserByToken($token));
    }

    public function isUserValidByUserName($userName, $password) {
        return !empty($this->getUserByUserName($userName, $password));
    }

    public function isBadLogin($username) {
        $fetchAll = $this->getFromPrepare('select loginNumber from loginNumber where username=:username', [':username' => $username]);
        return $fetchAll[0]['loginNumber'] > 50;
    }

    public function getUserByToken($token) {
        $fetchAll = $this->getFromPrepare(
            'SELECT * FROM user WHERE token=:token limit 1',
            [
                ':token' => $token
            ]
        );

        if (empty($fetchAll)) {
            return null;
        }

        return new User($fetchAll[0]);
    }

    public function isUserExist($userName) {
        return !empty($this->getFromPrepare(
            'SELECT * FROM user WHERE username=:username limit 1',
            [
                ':username' => $userName
            ]
        ));
    }

    public function getNotVisitedTokens() {
        $results = $this->getFromPrepare(
            'SELECT token FROM comment WHERE visited IS NULL', []
        );

        if (empty($results)) {
            $results = [];
        }

        $arr = [];
        foreach ($results as $result) {
            $arr[] = $result['token'];
        }

        return $arr;
    }

    public function getUserByUserName($userName, $password) {
        $fetchAll = $this->getFromPrepare(
            'SELECT * FROM user WHERE username=:username AND password=:password limit 1',
            [
                ':username' => $userName,
                ':password' => User::getPasswordHash($password)
            ]
        );

        if (empty($fetchAll)) {
            return null;
        }

        return new User($fetchAll[0]);
    }

    private function getFromPrepare($sql, $bindParams) {
        $stmt = Config::db()->prepare($sql);
        $stmt->execute($bindParams);

        $results = $stmt->fetchAll();
        if (!empty($results)) {
            return $results;
        }

        return null;
    }

    public function fillSession(User $user) {
        if ($user == null) {
            return;
        }

        $_SESSION['valid'] = true;
        $_SESSION['name'] = $user->getName();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['token'] = $user->getToken();
    }

    public function getComments($token) {
        return $this->fetchComments($this->getFromPrepare(
            'SELECT * FROM comment WHERE token=:token',
            [
                ':token' => $token
            ]
        ));
    }

    public function getAdminComments($token) {
        Config::db()->beginTransaction();
        $fetchAll = $this->fetchComments($this->getFromPrepare(
            'SELECT * FROM comment WHERE token=:token AND visited IS NULL',
            [
                ':token' => $token
            ]
        ));

//        Config::db()->exec('UPDATE comment set visited=1 WHERE visited IS NULL');
        Config::db()->commit();

        return $fetchAll;
    }

    private function fetchComments($fetchAll) {
        $comments = [];
        if (empty($fetchAll)) {
            return $comments;
        }

        foreach ($fetchAll as $result) {
            $comments[] = [
                'title' => $result['title'],
                'comment' => $result['comment'],
                'time' => $result['time'],
            ];
        }

        return $comments;
    }

    public function setBadLogin($username) {
        $fetchAll = $this->getFromPrepare('select loginNumber from loginNumber where username=:username', [':username' => $username]);
        if (empty($fetchAll)) {
            $loginNumber = 1;
        } else {
            $loginNumber = $fetchAll[0]['loginNumber'] + 1;
        }

        $stmt = Config::db()->prepare(
            "INSERT INTO loginNumber (username, loginNumber)
                VALUES (:username, :loginNumber)"
        );

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':loginNumber', $loginNumber);

        $stmt->execute();
    }

    public function registerUser($userName, $password) {
        if ($this->isUserExist($userName)) {
            return false;
        }

        $stmt = Config::db()->prepare(
            "INSERT INTO user (username, password, token)
                VALUES (:username, :password, :token)"
        );

        $dbPassword = User::getPasswordHash($password);

        $stmt->bindParam(':token', User::getTokenHash($dbPassword));
        $stmt->bindParam(':password', $dbPassword);
        $stmt->bindParam(':username', $userName);

        $stmt->execute();

        Config::clear();
        return true;
    }
}