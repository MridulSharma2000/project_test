
<?php

require 'vendor/autoload.php';
$query = require 'Core/bootstrap.php';


Router::load('Routes.php')
->Direct(Request::uri());

