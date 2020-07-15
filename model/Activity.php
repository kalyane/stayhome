<?php

class Activity implements JsonSerializable{
    private $id;
    private $name;
    private $timestart;
    private $timefinish;
    private $idcategory;
    private $iduser;
    private $description;
    private $status;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getTimestart() {
        return $this->timestart;
    }

    function getTimefinish() {
        return $this->timefinish;
    }

    function getIdcategory() {
        return $this->idcategory;
    }

    function getIduser() {
        return $this->iduser;
    }

    function getDescription() {
        return $this->description;
    }

    function getStatus() {
        return $this->status;
    }

    function __construct($name, $timestart, $timefinish, $idcategory, $iduser, $description, $status, $id = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->timestart = $timestart;
        $this->timefinish = $timefinish;
        $this->idcategory = $idcategory;
        $this->iduser = $iduser;
        $this->description = $description;
        $this->status = $status;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'timestart' => $this->timestart,
            'timefinish' => $this->timefinish,
            'idcategory' => $this->idcategory,
            'iduser' => $this->iduser,
            'description' => $this->description,
            'status' => $this->status 
        ];
    }

}