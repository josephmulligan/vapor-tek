<?php
//similar to user_search.php
//allows the user to search the product database and see the different products on offer
//left in but effectively replaced by products.php
include('includes/header.php');
include('includes/nav.php');
?>
<div class="container">
    <h1>Vapor-tek Product Search</h1>
    <div class="row">
        <div class="col-md-6">
            <div id="custom-search-input">
                <form action="" method="POST">
                    <div class="input-group col-md-12">
                        <input type="text" name="name" class="form-control input-lg" placeholder="Search products by name" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" name="btnSubmit" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br/>
<form action="" method="POST">
    <div class="container">
        <button class="btn btn-info btn-lg" name="btnAll" type="submit" style="display: block; width: 100%;">Display All Data</button>
    </div>
</form>

<!--Search php code, which contains connection to the database when the search button is pressed.-->
<?php
if(isset($_POST['btnSubmit'])) {
    // if(isset($_GET['Go'])){}
    if(isset($_POST['name'])){
        if(preg_match("/^[A-Za-z]+$/", $_POST['name'])){
            $name= $_POST['name'];
            // Connect to the database
            include('includes/dbconnect.php');

            // Query the database table
            $query= "SELECT * FROM products WHERE name LIKE '%{$name}%'";
            // Run the query against the mysqli query function
            $result= mysqli_query($conn, $query);		
            echo "<div class='contatiner'><h3 style='text-align:center'>Search Results</h3>";
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Product ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Price</th>";
            echo "<th>Stock</th>";
            echo "</tr>";
            // Create while loop and loop through result set
            while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                //create variables for product descriptors
                $product_id= $row['productID'];
                $name= $row['name'];
                $desc= $row['description'];
                $price= $row['price'];
                $stock= $row['stock'];

                // Display the result of the array		
                echo "<tr>";
                echo "<td>".$product_id."</td>";
                echo "<td>".$name."</td>";
                echo "<td>".$desc."</td>";
                echo "<td>".$price."</td>";
                echo "<td>".$stock."</td>";
                echo "</tr>";
            }
            echo "</table></div>";
        }
    } else {
        echo "<p>Please enter a search query</p>";
    }
}
?>
<!-- PHP for Search All Button that produces all the info from the contacts database -->
<?php
if(isset($_POST['btnAll'])) {
    // if(isset($_GET['Go'])){}
    // Connect to the database
    include('includes/dbconnect.php');
    $sqlistatement = "SELECT * FROM products"; 
    $sqli_result = mysqli_query($conn, $sqlistatement) or die("<<STEP 4 IS DEAD!>> Couldn't execute the SQL SELECT statement");
    //  Process the information retrieved from the database and display to the user's browser in table format
    echo "<div class='contatiner'><h3 style='text-align:center'>Search Results</h3>";
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>Product ID</th>";
    echo "<th>Name</th>";
    echo "<th>Description</th>";
    echo "<th>Price</th>";
    echo "<th>Stock</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($sqli_result)) { 
        $product_id = $row[0]; 
        $name = $row[1]; 
        $desc = $row[2]; 
        $price = $row[3]; 
        $stock = $row[4];

        echo"<tr>";
        echo "<td>".$product_id."</td><td>".$name."</td><td>".$desc."</td><td>".$price."</td><td>".$stock."</td>";
        echo "</tr>";
    }
    // Free up any memory holding the database records
    mysqli_free_result($sqli_result);
}
echo "</table></div>";
include('includes/footer.php');
?>