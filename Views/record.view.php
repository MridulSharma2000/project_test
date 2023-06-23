<?php
session_start();
$id = $_SESSION['Id'];
if (!isset($id)) {
    header('location:/Finalproject/');
}

if (isset($_REQUEST['Choose'])) {
    $custom_Month = $_REQUEST['start'];
}

if (!empty($custom_Month)) {

    $timestamp = strtotime("-1 month", strtotime($custom_Month));
    $timestamp1 = strtotime(" 0 month", strtotime($custom_Month));
    $previousMonth = date("Y-m-d", $timestamp);
    $customMonth = date("Y-m-d", $timestamp1);



    $previous_custom_total = App::get('database')->getdata('expenses', 'SUM(`expense_cost`) AS previous_month_total_cost', null, "`user_id` = '$id' AND MONTH(`expense_date`) = MONTH('$previousMonth')", null, null, null);
    $custom_total = App::get('database')->getdata('expenses', 'SUM(`expense_cost`) AS custom_month_total_cost', null, "`user_id` = '$id' AND MONTH(`expense_date`) = MONTH('$customMonth')", null, null, null);

    if (count($previous_custom_total) > 0 && count($custom_total) > 0) {
        foreach ($previous_custom_total as $value) {
            $previous_month_expense = $value['previous_month_total_cost'];
        }
        foreach ($custom_total as $value1) {
            $current_month_expense  = $value1['custom_month_total_cost'];
        }
    }
} else {


    $Total = App::get('database')->getdata('expenses', 'SUM(CASE WHEN MONTH(`expense_date`) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) THEN `expense_cost` ELSE 0 END) AS last_month_expense,
    SUM(CASE WHEN MONTH(`expense_date`) = MONTH(CURRENT_DATE) THEN `expense_cost` ELSE 0 END) AS current_month_expense', null, "`user_id` = '$id'", null, null, null);

    foreach ($Total as $value) {
        $previous_month_expense = $value['last_month_expense'];
        $current_month_expense = $value['current_month_expense'];
    }
}



$percentage_change = 0;
if ($previous_month_expense != 0) {
    $percentage_change = (($current_month_expense - $previous_month_expense) / $previous_month_expense) * 100;
}


$categories = App::get('database')->getdata('category', 'COUNT(DISTINCT `Category_Name`) AS total_categories', null, "`user_id` = '$id'", null, null, null);

foreach ($categories as $value) {

    $total_category = ($value['total_categories']);
}

?>

<?php
require 'Views/Partials/head.php';
require 'Views/Partials/nav.php';
?>



<main>
    <div class="static">
        <form action="" method="post">
            <label for="start">Month-Wise Comparison:</label>

            <input type="month" id="start" name="start" min="" value="">
            <button type="submit" name="Choose" id="savebutton" class="btn">Choose</button>
        </form>
    </div>
    <div id="categories">
        <div class="categories">
            <h2>TOTAL CATEGORIES</h2>
            <span><?php echo $total_category ?></span>
        </div>
        <div class="categories">
            <h2>Previous Month Total Expense</h2>
            <span><?php echo '₹' . $previous_month_expense ?></span>
        </div>
        <div class="categories">
            <h2>Current Month Total Expense</h2>
            <span><?php echo '₹' . $current_month_expense ?></span>
        </div>
        <div class="categories">
            <h2>Comparison With Last Month In Percentage</h2>
            <span><?php
                    echo round($percentage_change) . '%';
                    echo "<br>";
                    if ($percentage_change < 0) {
                        echo "Expense In Decrease ↓";
                    } elseif ($percentage_change > 0) {
                        echo "Expense In Increase ↑";
                    } else {
                        echo " No Change In Expense  ";
                    }
                    ?></span>
        </div>
    </div>
</main>
<?php
require 'Views/Partials/footer.php';
?>