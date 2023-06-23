<?php
session_start();
$id = $_SESSION['Id'];

if (!isset($id)) {
  header('location:/Finalproject/');
}

$dataPoints = array();

$count = 0;

$sum = App::get('database')->getdata('expenses', 'MONTHNAME(`expense_date`) as mname, SUM(`expense_cost`) as total', null, "`user_id` = '$id'", null, null, 'MONTH (`expense_date`)');

foreach ($sum as $value) {
    $dataPoints[$count]["label"] = $value['mname'];
    $dataPoints[$count]["y"] = $value['total'];
    $count = $count + 1;
}


?>

<?php
require 'Views/Partials/head.php';
require 'Views/Partials/nav.php';

?>
<div class="mainlogo">
    <header class="header">
        <!-- <button class="btn" id="category">Add Category</button> -->

        <button id="mbtn" class="btn ">Add Category</button>

        <!-- The Modal -->
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
        <button class="btn" id="expense">Add Expenses</button>
    </header>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Monthly Total Expense"
                },
                axisY: {
                    title: "Total Expense (in Rupee)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## Rupee",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</div>
<?php
require 'Views/Partials/footer.php';
?>