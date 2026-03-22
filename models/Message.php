<?php

namespace Models;

class Message {
    private int $id;
    private string $content;
    private int $date;
    private int $pinned = 0;

    public function __construct(int $id, string $content, int $date, int $pinned){
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->pinned = $pinned;
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

    public function setDate($date)
    {
        // Format attendu : YYYY-MM-DD HH:MM:SS
        if (!preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $created_at)) {
            throw new \Exception("Format de date invalide");
        }

        $this->date = $date;
    }

    public function pinMessage(): void{
        $this->pinned = 1;
    }

}