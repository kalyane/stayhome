<?php

class Category implements JsonSerializable{
    private $id;
    private $name;
    private $icon;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getIcon() {
        return $this->icon;
    }

    function __construct($name, $icon, $id = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon
        ];
    }

}