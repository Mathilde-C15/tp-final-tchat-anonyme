<?php

namespace Controllers;

use Repositories\RoomRepository;

class RoomController{

    public function index(): void{
        $repository = new RoomRepository();
        $rooms = $repository->findRooms();

        $view = "views/room/room.phtml";

        require "views/layout.phtml";
    }


    public function create(): void{
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'] ?? '';

            try {
                $repository = new RoomRepository();
                $repository->createRoom($name);

                header('Location: index.php?page=room');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $rooms = $repository->findRooms();
        $view = "views/room/create.phtml";

        require "views/layout.phtml";
    }

    
}