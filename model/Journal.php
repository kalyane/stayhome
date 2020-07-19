<?php

class Journal implements JsonSerializable{
    private $id;
    private $date;
    private $description;
    private $iduser;
    
    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function getDescription() {
        return $this->description;
    }

    function getIduser() {
        return $this->iduser;
    }

    function __construct($date, $description, $iduser, $id = 0) {
        $this->id = $id;
        $this->date = $date;
        $this->description = $description;
        $this->iduser = $iduser;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'description' => $this->description,
            'iduser' => $this->iduser
        ];
    }

}