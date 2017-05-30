<?php
include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');

//script to view all invoices in the database
//can only be accessed by MD or PM
//these users can confirm they have received payment for each invoice

if(isset($_POST['submit'])) {//admin has confirmed payment of order
    if ($conn->query("UPDATE invoices SET paid = 1 WHERE invoiceID = '".$_GET['confirm_payment']."';") === TRUE) {
        echo "<em>Payment Confirmed</em>";
    } else {
        echo "Error: ".$conn->error;
    }
}

if(isset($_COOKIE['loggedIn'])) {//user is logged in
    $cookie_value = $_COOKIE['loggedIn'];

    //get admin value for the current user
    //0: Customer
    //1: Administrator (MD)
    //2: Account Administrator(AA)
    //3: Product Manager (PM)
    $admin = check_admin_status($cookie_value);

    echo "<div class='container'><table class='table table-hover'>";
    echo "<tr><th>Invoice ID</th><th>Order ID</th><th>Notes</th>";

    //if user is MD or PM, allow them to see all invoices, else allow user to see only invoices they have been sent
    if($admin == 1 || $admin == 2) {
        echo "<th>Paid</th></tr>";
        //query invoices database to give invoice details
        $result = $conn->query("SELECT * FROM invoices;");
        while($row = $result->fetch_array(MYSQLI_BOTH)) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";

            //if not paid, add button to update paid status
            if($row['paid'] == 0) {
                echo "<td><form action='/?confirm_payment=$row[0]' method='post'>
                    <button class='btn btn-primary' type='submit' name='submit'>Confirm Payment</button>
                </form></td>";
            }

            echo "</tr>";
        }
    } else {//user is not admin
        echo "</tr>";
    }

    echo "</table></div>";
}

include('includes/footer.php');
?>