<?php

namespace Controllers;

use Repositories\RoomRepository;

class RoomController{
    public function create(): void{
        if ($_SERVEUR['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'] ?? '';

            try {
                $repository = new RoomRepository();
                $repository->createRoom($name);

                header('Location: index.php.page=rooms');
                exit;
            } catch (\Exception $e) {
                $error = $e-getMessage();
            }
        }

        $view = "views/room/room.phtml";

        require "views/layout.phtml";
    }
}