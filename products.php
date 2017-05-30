<?php
include('includes/header.php');
include('includes/nav.php');

//displays products as panels directly from the database
?>

<!--------------------------------------------------------

TEMPLATE FOR PRODUCT PANEL

<div class="col-lg-4 col-md-6 col-sm-6">
<div class="thumbnail">
<h2>{PRODUCT_NAME}</h2>
<a href="product_info.php?id={PRODUCT_ID}">
<img src="res/{PRODUCT_IMG}" alt="Image of {PRODUCT_NAME}" width="320" height="200">
</a>
<div class="caption">
</div>
</div>
</div>

-------------------------------------------------------->
<!-- Thumbnails for products -->
<div class="container">
    <div class="row">
        <div class="thumbnails">

            <?php
            include('includes/dbconnect.php');
            $query = "SELECT * FROM products ORDER BY name";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)) {
                //for every product in the database
                $name = $row['name'];
                $id = $row['productID'];

                echo("
              <div class='col-lg-4 col-md-6 col-sm-6'>
                <div class='thumbnail'>
                  <h2>".$name."</h2>
                  <a href='product_info.php?id=".$id."'>
                    <img src='res/spanner.jpg' alt='Image of ".$name."' width='320' height='200'>
                  </a>
                  <div class='caption'></div>
                </div>
              </div>
            ");
            }
            ?>

        </div>
        <!--thumbnails -->
    </div>
    <!--row-->
</div>

<!-- =============================================================================================================================================== -->
<!-- end of first content  -->
<?php
include('includes/footer.php');
?>