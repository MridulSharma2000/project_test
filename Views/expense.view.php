<?php
session_start();
$id = $_SESSION['Id'];

$id = $_SESSION['Id'];
if (!isset($id)) {
    header('location:/Finalproject/');
}

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];

}

if (isset($_POST['option'])) {
    $op = $_POST['option'];
}


?>

<?php
require 'Views/Partials/head.php';
require 'Views/Partials/nav.php';
?>
<main>

    <h1>EXPENSE</h1>
    <button id="mbtn" class="btn btn-primary turned-button">Add Expense</button>
    <div id="modalDialog" class="modal">
        <div class="modal-content animate-top">
            <div class="modal-header">
                <h5 class="modal-title">Create Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="addexpense" method="post" id="contactFrm" enctype="multipart/form-data">
                <div class="modal-body">
               
                    <div class="response"></div>

              
                    <div class="form-group">
                        <label>Item Name:</label>
                        <input type="text" name="itemname" id="itemname" class="form-control" placeholder="Add Item Name Here" required="">
                    </div>
                    <div class="form-group">
                        <label>Item Cost:</label>
                        <input type="text" name="Itemcost" id="Itemcost" class="form-control" placeholder="Add Item Cost Here" required="">
                    </div>
                    <div class="form-group">
                        <label>Item Date:</label>
                        <input type="date" name="Itemdate" id="Itemdate" class="form-control" placeholder="YYY-MM-DD" min="1997-01-01" required="">
                    </div>
                    <div class="form-group">
                        <label>Choose Category:</label>
                        <select name="option" id="option" class="form-control">
                            <?php
                            $fetch =  App::get('database')->getdata('category', '*', null, "`user_id` = '$id'", null, null, null);
                            foreach ($fetch as $value) {
                            ?>
                                <option name="category " value="<?php echo $value['Id']; ?>"><?php echo $value['Category_Name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Bill Attachments:</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
    
                    <button type="submit" id="savebutton" class="btn " value="<?php $_SESSION['Id']; ?>">Add Expenses</button>
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

    <div class="filter">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <form action="" method="post">
            <label for="from">From</label>
            <input type="text" id="from" name="from">
            <label for="to">to</label>
            <input type="text" id="to" name="to">
            <input type="submit" class="btn" name="submit" value="Filter">
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(function() {
                var dateFormat = "yy-mm-dd",
                    from = $("#from")
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                    })
                    .on("change", function() {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                    to = $("#to").datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                    })
                    .on("change", function() {
                        from.datepicker("option", "maxDate", getDate(this));
                    });

                function getDate(element) {
                    var date;
                    try {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error) {
                        date = null;
                    }

                    return date;
                }
            });
        </script>
    </div>

    <div class="static">
        <form action="" method="post">

            <label>Choose Category:</label>
            <select name="option" id="option" class="form-control">
                <option>This Week</option>
                <option>Last Week</option>
                <option>This Month</option>
                <option>Last Month</option>
            </select>
            <button type="submit" name="filter" id="savebutton" class="btn">Filter</button>
        </form>
    </div>

    <div id="table-group">
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Cost</th>
                    <th>Bill</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($from) && !empty($to)) {

                    $retrive =  App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' AND  `expense_date` BETWEEN '$from' AND '$to' ", ' expense_date DESC', null, null);
                } elseif (!empty($op) && $op == 'This Week') {
                    $retrive = App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' AND week(`expense_date`)=week(now())", ' expense_date DESC', null, null);
                } elseif (!empty($op) && $op == 'Last Week') {
                    $retrive = App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' AND week(`expense_date`)=week(now())-1", ' expense_date DESC', null, null);
                } elseif (!empty($op) && $op == 'This Month') {
                    $retrive = App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' AND month(`expense_date`)=month(now())", ' expense_date DESC', null, null);
                } elseif (!empty($op) && $op == 'Last Month') {
                    $retrive = App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' AND month(`expense_date`)=month(now())-1", ' expense_date DESC', null, null);
                } else {
                    $retrive =  App::get('database')->getdata('expenses', '*', "`category` on expenses.category_id = category.Id", "expenses.user_id = '$id' ", ' expense_date DESC', null, null);
                }

                if (count($retrive) > 0) {

                    $sno = 0;
                    foreach ($retrive as $value) {

                        if ($value['user_id'] == $id) {
                            $sno = $sno + 1;
                            echo "<tr>
                         <td>" . $sno . "</td>
                         <td>" . $value['item_name'] . "</td>
                         <td>" . $value['Category_Name'] . "</td>
                         <td>" . $value['expense_date'] . "</td>
                         <td>" . $value['expense_cost'] . "</td>
                         <td><img src=" . $value['expense_bill'] . " alt='Image loading...' height = 40px width = 40px  ></td>
                         </tr>";
                        }
                    }
                }

                ?>

            </tbody>
        </table>
    </div>
</main>





<?php
require 'Views/Partials/footer.php';
?>