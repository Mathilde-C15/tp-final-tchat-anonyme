<?php

namespace Controllers;

class AboutController{
    
    public function about(): void{
        $title = "A propos";
        $view = __DIR__ . '/../views/about/about.phtml';

        $showSidebar = false;

        include __DIR__ . '/../views/layout.phtml';
    }
}