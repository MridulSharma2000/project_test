<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EXPENSE TRACKER</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");

        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
        }

        .container {
            display: flex;
        }

        /* login Page */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background-color: #c3e6cb;
            background-color: #edf75c;

            background-color: #66afe9;
        }

        .login-form {
            /* border: 2px solid saddlebrown;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
    background-color: cornflowerblue;
    border-radius: 15px; */
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #bcf75c;
            background-color: #c3e6cb;
            width: 25%;
            height: 75%;
            text-align: center;
            border: 5px solid white;
            border-radius: 15px;
            font-size: 17px;
            padding: 2px 10px;

        }

        .login-form form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 10px;
        }

        .login-form form h2 {
            margin: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 25px;
            padding: 5px 12px;
            margin: 10px 5px;

        }

        .login-form form input {
            border-radius: 10px;
            padding: 4px 10px;
            border: 2px solid lightseagreen;
            text-align: center;
        }

        .login-form form {
            border-radius: 15px;
            padding: 4px 10px;
            text-decoration: none;
            padding: 2px;
        }

        /* signup page */

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #66afe9;
            width: 100%;
        }

        .signup-container span .error .msg {

            background-color: red;

        }

        .signup-form {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            background-color: #c3e6cb;
            width: 35%;
            height: 80%;
            text-align: center;
            border: 5px solid white;
            border-radius: 15px;
            font-family: serif;
            padding: 45px 0px;
            margin: 20px;
        }

        .signup-form input {
            padding: 1px 6px;
            border: 2px solid lightseagreen;
            border-radius: 8px;
            margin: 2px 5px;
            padding: 5px 27px;
            font-size: 12px;
            text-align: center;
            width: 100%;
        }

        .signup-container form {
            margin: 15px;
        }

        nav {
            position: relative;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            background-color: darkcyan;
            /* background-color: burlywood; */
            width: 200px;
            overflow: hidden;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .logo {
            /* text-align: center; */
            display: flex;
            align-items: center;
            justify-content: center;
            /* margin: auto; */
            height: 90px;
            width: 200px;
            background-color: darkslateblue;
            border-bottom: 2px solid whitesmoke;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .logo img {
            width: 87x;
            height: 87px;
            border-radius: 50%;
        }

        .logo span {
            font-weight: bold;
            padding-left: 15px;
            font-size: 18px;
            text-transform: uppercase;
        }

        a {
            position: relative;
            color: rgb(85, 83, 83);
            font-size: 14px;
            display: table;
            width: 200px;
            padding: 10px;
        }

        nav .fas {
            position: relative;
            width: 70px;
            height: 40px;
            top: 14px;
            font-size: 20px;
            text-align: center;
        }

        .nav-item {
            position: relative;
            color: #000;
            top: 12px;
            margin-left: 10px;
        }

        * a:hover {
            background: #eee;
        }

        /* main */
        .mainlogo {
            display: flex;
            width: 100%;
            flex-direction: column;

        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            gap: 4rem;
            /* background-color: lightblue; */
            background-color: #cae3a8;

            /* border-radius: 15px; */
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 25px;
            border-bottom: 2px solid lightcoral;

        }

        main {
            width: 100%;
            display: flex;
            flex-direction: column;
            background-color: #a2dbbe;
            height: 100vh;


        }

        .btn {
            padding: 1rem;
            background-color: forestgreen;
            color: white;
            border-radius: 2rem;
            top: 20px;
        }


        /* modal */

        .animate-top {
            position: relative;
            animation: animatetop 0.4s
        }

        #table-group {
            margin-top: 30px;
        }

        table {

            width: 75%;
            height: auto;
            margin: auto;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            text-align: center;
            background-color: azure;
            border-radius: 5px;
            padding: 2px;
        }

        #categories {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column;
            height: auto;

        }

        .categories {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 57%;
            flex-direction: column;
            margin: 7px;
            background-color: lightgreen;
            border: 2px solid seashell;
            border-radius: 20px;
            padding: 4px 10px;
        }

        .categories h2 {
            background-color: limegreen;
            margin: 4px;
            color: whitesmoke;
            padding: 7px 35px;
            border-radius: 5px;
            font-size: 20px;
            border: 1px solid whitesmoke;

        }

        .categories span {
            background-color: #9a7ccc;
            margin: 5px;
            color: whitesmoke;
            padding: 10px 15px;
            border-radius: 10px;
            width: 37%;
            text-align: center;
            color: rgb(0, 0, 0);
            font-size: 15px;
            font-weight: bold;
            border: 1px solid whitesmoke;
        }

        .static form {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 5px;
            background-color: #cae3a8;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            border-bottom: 2px solid lightcoral;
        }

        .static form input {
            margin: 6px 16px;
            padding: 0px 5px;
            border-radius: 10px;
            border: 2px solid darkmagenta;
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            margin: 1% auto;
            border: 1px solid #888;
            width: 475px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: .3rem;
            outline: 0;
        }

        .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem;
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
            margin-top: 0;
        }

        h5.modal-title {
            font-size: 1.25rem;
            color: #666;
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        button.close {
            padding: 0;
            background-color: transparent;
            border: 0;
            /* -webkit-appearance: none; */
        }

        .modal-header .close {
            padding: 1rem;
            margin: -1rem -1rem -1rem auto;
        }

        .close:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .modal-body {
            flex: 1 1 auto;
            padding: 1rem;
        }

        .modal-body p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .modal-footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #e9ecef;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: #07a8ff;
            border-color: #07a8ff;
            display: flex;
            justify-content: end;
            position: fixed;
            right: 10px;
            top: 26px;
            margin: 0 auto;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn:focus,
        .btn:hover {
            text-decoration: none;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .form-control {
            display: block;
            width: 95%;
            /*height: 34px;*/
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
        }

        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>