<?php

class UsersController
{

    function fetch()
    {
        session_start();
        unset($_REQUEST['login']);

        if (isset($_REQUEST) && !empty($_REQUEST)) {


            $data = $_REQUEST['email'];
            $data1 = $_REQUEST['password'];

            $task =  App::get('database')->getdata('user', '*', null, "`Email` = '$data' AND `Password` = '$data1'", null, null, null);

            if (count($task) > 0) {
                foreach ($task as $value) {
                    if ($value['Email'] == $_REQUEST['email'] && $value['Password'] == $_REQUEST['password']) {
                        $_SESSION = $value;
                        header('location:/Finalproject/dashboard');
                    }
                }
            } else {
                header('location:/Finalproject/');
            }
        } else {
            header('location:/Finalproject/');
        }
    }

    function categorystore()
    {
        session_start();
        $data = array('Category_Name' => $_REQUEST['Category'], 'user_id' => $_SESSION['Id']);
        App::get('database')->InsertAll('category', $data);
        header('location:/Finalproject/category');
    }
    function expensesstore()
    {
        session_start();

        if (isset($_FILES['file'])) {
            $image = $_FILES['file']['name'];
            $i_tmpname = $_FILES['file']['tmp_name'];
            $random = rand(000, 999);
            $name = $random . $image;
            if (file_exists('file')) {
                $destination = '/../Views/upload/' . $name;
            } else {
                $destination = '/../Views/upload/default.jpg';
            }
        }

        $data = array(
            'item_name' => $_REQUEST['itemname'],
            'expense_cost' => $_REQUEST['Itemcost'],
            'user_id' => $_SESSION['Id'],
            'category_id' => $_REQUEST['option'],
            'expense_date' => $_REQUEST['Itemdate'],
            'expense_bill' => $destination,
        );

        App::get('database')->InsertAll('expenses', $data);
        move_uploaded_file($i_tmpname, $destination);
        header('location:/Finalproject/expense');
    }

    function register()
    {

        unset($_REQUEST['signup']);
        $data = $_REQUEST['email'];

        $check = App::get('database')->getdata('user', '*', null, "`Email` = '$data'", null, null);

        if (Count($check) > 0) {
            echo "<script>alert('user Alreday Exist')</script>";
            header('location:/Finalproject/signup');
        } else
        if ($_REQUEST['password'] != $_REQUEST['cpassword']) {
            echo "<script>alert('Password not Matched')</script>";
            header('location:/Finalproject/signup');
        } else {
            unset($_REQUEST['cpassword']);
            $data = array(
                'Name' => $_REQUEST['name'],
                'Email' => $_REQUEST['email'],
                'Password' => $_REQUEST['password']
            );
            App::get('database')->InsertAll('user', $data);
            echo "<script>alert('Registered Successfully')</script>";
            header('location:/Finalproject/register');
        }
    }
}
