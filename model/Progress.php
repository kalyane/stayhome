<?php

class Progress implements JsonSerializable{
    private $id;
    private $ncompleted;
    private $date;
    private $iduser;
    
    function getId() {
        return $this->id;
    }

    function getNcompleted() {
        return $this->ncompleted;
    }

    function getDate() {
        return $this->date;
    }

    function getIduser() {
        return $this->iduser;
    }

    function __construct($ncompleted, $date, $iduser, $id = 0) {
        $this->id = $id;
        $this->ncompleted = $ncompleted;
        $this->date = $date;
        $this->iduser = $iduser;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'ncompleted' => $this->ncompleted,
            'date' => $this->date,
            'iduser' => $this->iduser
        ];
    }

}