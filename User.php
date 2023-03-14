<?php

session_start();

try {
    $database = new PDO('mysql:host=localhost;dbname=révisions', 'root', '');
}

catch (Exception $e) {
    die('Erreur: '. $e->getMessage());
}

class User {

    // ATTRIBUTS

    public $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    public function __construct($login, $password, $email, $firstname, $lastname) {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->bdd = new PDO('mysql:host=localhost;dbname=révisions', 'root', '');
    }

    // GET SET

    public function getLogin() {
        return $this->login;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getFirstname() {
        return $this->firstname;
    }
    public function getLastname() {
        return $this->lastname;
    }
    public function setLogin($login) {
        $this->login = $login;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    // FONCTIONS

    public function register() {

        $register = $this->bdd->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?,?,?,?,?)");
        $register->execute([$this->login, $this->password, $this->email, $this->firstname, $this->lastname]);
    }

    public function connect($login, $password) {

        $connect = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ? ");
        $connect->execute([$login, $password]);
        $result = $connect->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $result;
        // var_dump($_SESSION);
    }

    public function disconnect() {

        unset($_SESSION['user']);
        session_destroy();
        // var_dump($_SESSION);
    }

    public function isConnected() {

        if (isset($_SESSION['user'])) {
            echo "Connecté";
            return true;
        } else {
            echo "Non connecté";
            return false;
        }
    }

}

// $User = new User('etienne','aze','et@lol','etienne','bar');

// var_dump($user);

// $User->register();
