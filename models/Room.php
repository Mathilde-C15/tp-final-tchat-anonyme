<?php

namespace Model;

class Room {
    private int $name;

    public function __construct(int $name){
        $this->name = $name;
    }

    // Getters

    public function getName(){
        return $this->name;
    }

    // Setters
    public function setName($name): int{
        if (!preg_match('/^[a-zA-Z0-9À-ÿ\s\-\',.!?]{3,20}$/u', $name)) {
            throw new \Exception("Titre invalide (3 à 255 caractères, lettres et chiffres uniquement)");
        }

        $this->name = trim($name);        
    }
}