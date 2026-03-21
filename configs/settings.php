<?php

const AVAILABLE_ROUTES = [
    '/' => [
        'controller' => 'RoomController',
        'method' => 'index'
    ],
    'room' => [
        'controller' => 'RoomController',
        'method' => 'index'
    ],
    'about' => [
        'controller' => 'AboutController',
        'method' => 'index'
    ],
    'add_room' => [
        'controller' => 'RoomController',
        'method' => 'create'
    ],
    'pin_message' => [
        'controller' => 'MessageController',
        'method' => 'pinMessage'
    ],
    'add_message' => [
        'controller' => 'MessageController',
        'method' => 'create'
    ]

];