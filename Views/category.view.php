<?php
session_start();
$user_id = ($_SESSION['Id']);

$user_id = $_SESSION['Id'];
if (!isset($user_id)) {
    header('location:/Finalproject/');
}
?>
<?php
require 'Views/Partials/head.php';
require 'Views/Partials/nav.php';
?>

<main>
    <header class="header">
        <h1>CATEGORY</h1>

        <button id="mbtn" class="btn btn-primary turned-button">Add Category</button>

        <div id="modalDialog" class="modal">
            <div class="modal-content animate-top">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="addcategory" method="post" id="contactFrm">
                    <div class="modal-body">
                        
                        <div class="response"></div>

                     
                        <div class="form-group">
                            <label>Add Category:</label>
                            <input type="text" name="Category" id="category" class="form-control" placeholder="Add Category Here" required="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="savebutton" class="btn" value="<?php $_SESSION['Id']; ?>">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
           
            var modal = $('#modalDialog');

            
            var btn = $("#mbtn");

            
            var span = $(".close");

            $(document).ready(function() {
                
                btn.on('click', function() {
                    modal.show();
                });

                
                span.on('click', function() {
                    modal.hide();
                });
            });

            
            $('body').bind('click', function(e) {
                if ($(e.target).hasClass("modal")) {
                    modal.hide();
                }
            });
        </script>

    </header>


    <div id="table-group">
        <table id="main">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th> Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fetch =  App::get('database')->getdata('category', '*', null, "`user_id` = '$user_id'", null, null, null);
                $sno = 0;
                foreach ($fetch as $value) {
                    $sno =  $sno + 1;
                    echo "<tr>
                    <td>" . $sno . "</td>
                    <td>" . $value['Category_Name'] . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</main>


<?php
require 'Views/Partials/footer.php';
?>