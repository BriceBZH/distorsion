<?php
    class Router 
    {
        public function __construct() {

        }

        public function handleRequest(array $get, array $session) : void {
            $pageController = new PageController();
            $route = "post";
/*             $categories = $pageController->categoryShow();
            $channels = $pageController->channelShow(); */
            if(isset($get['route']) && $get['route'] === "about") {
                $route = $pageController->about();
            } else if(isset($get['route']) && $get['route'] === "postMessage") {
                $pageController->postCreate();
            } else if(isset($get['route']) && $get['route'] === "categoryName") {
                $pageController->categoryCreate();
            } else if(isset($get['route']) && $get['route'] === "create-category") {
                $route = $pageController->categoryForm();
            } else if(isset($get['route']) && $get['route'] === "create-channel") {
                $route = $pageController->channelForm();
            } else if(isset($get['route']) && $get['route'] === "channelName") {
                $route = $pageController->channelCreate($get['id']);
            } else if(!isset($get['route'])) {
                $posts = $pageController->home();    
            }  else {
                $pageController->notFound();
            }
            require "templates/layout.phtml";
        }
    }