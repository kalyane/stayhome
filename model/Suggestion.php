<?php

class Suggestion implements JsonSerializable{
    private $id;
    private $name;
    private $icon;
    private $idcategory;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getIcon() {
        return $this->icon;
    }

    function getIdcategory() {
        return $this->idcategory;
    }

    function __construct($name, $icon, $idcategory, $id = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->idcategory = $idcategory;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'idcategory' => $this->idcategory
        ];
    }

}