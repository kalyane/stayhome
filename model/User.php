<?php

class User implements JsonSerializable{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $coins;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getCoins() {
        return $this->coins;
    }

    function __construct($name, $surname, $email, $password, $coins=0, $id = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->coins = $coins;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => $this->password,
            'coins' => $this->coins
        ];
    }

}