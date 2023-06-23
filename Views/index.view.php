<?php
session_start();
?>

<?php
require 'Views/Partials/head.php';


?>
<div class="login-container">
    <div class="login-form">
        <form action="login" method="post" enctype="multipart/form-data">
            <h2>Login Page</h2>
            <?php
            if (isset($error)) {
                echo '<span class = "error">' . $error . '</span>';
            }
            ?>
            Email:<br> <input type="email" name="email" placeholder="Enter Your Email Address">
            <br>
            Password:<br> <input type="password" name="password" placeholder="Enter Your Password">
            <br>
            <input type="submit" value="Login Now" name="login">
            <br>
            <span>Don't Have An Account Yet ?</span>
            <br>
            <a href="signup">Sign up </a>
        </form>
    </div>
</div>
<?php
require 'Views/Partials/footer.php';

?>