<?php
require 'Views/Partials/head.php';
?>

<body>
    <!-- aside -->
    <div class="container">
        <nav>
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTioOtvtY8OQ5joHoYVvUOvmH-niVZIy3N8pQ&usqp=CAU" alt="">
            </div>
            <ul>
                <li><a href="dashboard" id="dashboard">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Dashboard</span>
                    </a></li>
                <li><a href="category" id="category">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Category</span>
                    </a></li>
                <li><a href="expense" id="expenses">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">Expenses</span>
                    </a></li>
                <li><a href="record">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">Records</span>
                    </a></li>
                <li><a href="logout">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>
    </div>