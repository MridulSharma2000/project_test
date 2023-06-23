<?php
require 'Views/Partials/head.php';
?>

<body>
    <div class="signup-container">
        <div class="signup-form">
            <form action="register" method="post" enctype="multipart/form-data">
                <h3>REGISTER YOURSELF <br> HERE </h3>
                <?php
                if (isset($error)) {
                    echo '<span class = "error">' . $error . '</span>';
                }
                elseif(isset($msg)){
                    echo '<span class = "msg">' . $msg . '</span>';
                }
                ?>
                <br>
                Name:<br> <input type="text" name="name" id="" placeholder="Enter Your Name " required>
                <br>
                Email:<br> <input type="email" name="email" id="" placeholder="Enter Your Email" required>
                <br>
                Password:<br> <input type="password" name="password" id="" placeholder="Enter Your Password" required>
                <br>
                Confirm Password:<br> <input type="password" name="cpassword" id="" placeholder="Enter Your Confirm Password" required>
                <br>
                <div>
                    <input class="btn" type="submit" value="Sign Up" name="signup">
                </div>
                <br>
                <span>Already have an Account ?</span>
                <br>
                <a href="loginback">Login </a>
            </form>
        </div>
    </div>
    </form>
    <?php
    require 'Views/Partials/footer.php';
    ?>