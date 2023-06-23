<?php

App::bind('config',require 'config.php');

App::bind('database',new Query(Connection::ConnectDb(App::get('config')['database'])));


function view($name,$data =[]){
    extract($data);
    return require "Views/{$name}.view.php" ;

}

