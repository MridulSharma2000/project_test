
<?php

class PagesController
{

    public function home()
    {
        return view('index');
    }
    public function signup()
    {

        return view('signup');
       
    }

    public function category()
    {
        return view('category');
       
    }
    public function expense()
    {
        return view('expense');

    }
    public function dashboard()
    {
        return view('users');

    }
    public function record()
    {
        return view('record');

    }
    public function notfound()
    {
        return view('error');

    }
    public function logout()
    {
        session_start();
        if(isset($_SESSION['Id']) ){
            session_destroy();
            return view('index');
        }
    }
}
