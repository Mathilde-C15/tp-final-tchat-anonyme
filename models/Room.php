<?php

namespace Models;

class Room {
    private string $name;
    private int $id;

    public function __construct(?string $name = null, ?int $id = null){
        if ($name !== null) {
            $this->setName($name);
        }

        if ($id !== null) {
            $this->setId($id);
        }
    }

    // Getters

    public function getName(): string{
        return $this->name;
    }

    public function getId(): int{
        return $this->id;
    }

    // Setters
    public function setName(string $name): void{
        if (!preg_match('/^[a-zA-Z0-9À-ÿ\s\-\',.!?]{3,50}$/u', $name)) {
            throw new \Exception("Titre invalide (3 à 50 caractères, lettres et chiffres uniquement)");
        }

        $this->name = trim($name);        
    }

    public function setId(int $id): void{
        
        if (!preg_match('/^[0-9]+$/', $id)) {
            throw new \Exception("ID invalide");
        }

        $this->id = (int) $id;
    }
}