<?php

namespace Models;

class Message {
    private int $id;
    private string $content;
    private string $date;
    private $pinned = null;
    private int $id_room;

    public function __construct(int $id, string $content, string $date, $pinned, int $id_room){
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->pinned = $pinned;
        $this->id_room = $id_room;
    }

    // Getters

    public function getId(){
        return $this->id;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDate(){
        return $this->date;
    }

    public function getPinned(){
        return $this->pinned;
    }

    public function getIdRoom(){
        return $this->id_room;
    }

    // Setters

    public function setId($id)
    {
        if (!preg_match('/^[0-9]+$/', $id)) {
            throw new \Exception("ID invalide");
        }

        $this->id = (int) $id;
    }

    public function setContent(string $content): string{
        if (strlen(trim($content)) < 1) {
            throw new \Exception("Le contenu doit contenir au moins 1 caractère");
        }

        $this->content = trim($content);
    }

    public function setDate($date){
        // Format attendu : YYYY-MM-DD HH:MM:SS
        if (!preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $created_at)) {
            throw new \Exception("Format de date invalide");
        }

        $this->date = $date;
    }

    public function setPinned($pinned)
    {
        if (!in_array($pinned, [0, 1])) {
            throw new \Exception("La valeur doit être 0 ou 1");
        }

        $this->pinned = $pinned;
    }

    public function setIdRoom($id_room)
    {
        if (!preg_match('/^[0-9]+$/', $id_room)) {
            throw new \Exception("ID invalide");
        }

        $this->id_room = (int) $id_room;
    }

    public function pinMessage(): void{
        $this->pinned = 1;
    }

}