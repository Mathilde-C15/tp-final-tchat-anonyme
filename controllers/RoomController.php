<?php

namespace Controllers;

use Repositories\RoomRepository;
use Repositories\MessageRepository;

class RoomController{

    public function index(): void{
        $repository = new RoomRepository();
        $rooms = $repository->findRooms();

        $view = "views/room/room.phtml";

        require "views/layout.phtml";
    }

    public function create(): void {
        $repository = new RoomRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');

            try {
                if ($name === '') {
                    throw new \Exception("Le nom du salon est obligatoire.");
                }

                $repository->createRoom($name);

                header('Location: index.php?page=room');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $rooms = $repository->findRooms();
        $view = "views/room/createRoom.phtml";
        require "views/layout.phtml";
    }
}