<?php

// if controller is not found check models
spl_autoload_register(function ($class_name) {
    require "../app/models/" . $class_name . ".php";
});

require "config.php";
require "functions.php";
require "database.php";
require "controller.php";
require "app.php";
