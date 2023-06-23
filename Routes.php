<?php

$routes->Define([

    '/Finalproject/' => 'PagesController@home',
    '/Finalproject/category' => 'PagesController@category',
    '/Finalproject/expense' => 'PagesController@expense',
    '/Finalproject/dashboard' => 'PagesController@dashboard',
    '/Finalproject/record' => 'PagesController@record',
    '/Finalproject/signup' => 'PagesController@signup',
    '/Finalproject/loginback' => 'PagesController@home',
    '/Finalproject/logout' => 'PagesController@logout',
    '/Finalproject/login' => 'PagesController@home',
    '/Finalproject/pagenotfound' => 'PagesController@notfound',



    '/Finalproject/login' => 'UsersController@fetch',
    '/Finalproject/addcategory' => 'UsersController@categorystore',
    '/Finalproject/addexpense' => 'UsersController@expensesstore',
    '/Finalproject/register' => 'UsersController@register',


]);
