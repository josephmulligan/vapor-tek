<?php
  include('includes/header.php');
  include('includes/nav.php');
?>

  <!--=======================================================================================-->

  <!-- start of content -->
  <div class="main">
    <div class="container grid-custom">
      <div class="customPadding">
        <div class="row">

          <!-- Carousel - Visible on larger screens hidden on smaller * * * * * * * * * * * * * * * * * * * -->
          <div class="container-fluid visible-md visible-lg">
            <div class="row">
              <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="res/home-slide.jpg" alt="Oil Derreck">
                      <!-- Image 1 -->
                      <h3>Specialists in High Performance Corrosion Preventives</h3>
                    </div>
                    <div class="item">
                      <img src="res/Slide-2.jpg" alt="pistons and con rods">
                      <!-- Image 2 -->
                      <h3>Volatice Corroion Inhibitors (VCI's)</h3>
                    </div>
                    <div class="item">
                      <img src="res/Slide-3.jpg" alt="overhead cables">
                      <!-- Image 3 -->
                      <h3>Ministry of Defence &amp; Aerospace Approved</h3>
                    </div>
                    <div class="item">
                      <img src="res/Slide-4.jpg" alt="High rise welder">
                      <!-- Image 4 -->
                      <h3>Performance in Adverse Environments</h3>
                    </div>
                    <div class="item">
                      <img src="res/Slide-5.jpg" alt="High rise welder">
                      <!-- Image 5 -->
                      <h3>Oil &amp; Gas Applications</h3>
                    </div>
                    <div class="item">
                      <img src="res/Slide-6.jpg" alt="High rise welder">
                      <!-- Image 6 -->
                      <h3>Storage, Transportaion &amp; Shipping</h3>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--/.container-fluid for Image slider carousel-->

          <div class="col-sm-12">
            <h2>Rust and Corrosion Prevention <br> Leaders in Corrosion</h2>
            <p class="text-justify home-page-text">
              Vapor-Tek Ltd are a UK based company who specialize in the manufacture of high performance corrosion preventives. Our anti-rust, corrosion and rust inhibitors include solvent deposited thin films and Volatile corrosion inhibitors (VCI’s) for the prevention of corrosion and protection of metal parts and equipment during storage, transportation and export.
            </p>
          </div>
        </div>
      </div>

      <!-- Marketing to display Vapor-Tek's 3 main products; steelgard, cablegard, vaporol -->
      <div class="container marketing">
        <div class="row">
          <div class="col-md-4">
            <img class="img-circle center-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Steelgard" width="180" height="180">
            <h2>Steelgard</h2>
            <p>
              <a class="btn btn-info center-block" href="steelgard.html" role="button">View details &raquo;</a>
            </p>
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4">
            <img class="img-circle center-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Cablegard" width="180" height="180">
            <h2>Cablegard</h2>
            <p>
              <a class="btn btn-info center-block" href="cablegard.html" role="button">View details &raquo;</a>
            </p>
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4">
            <img class="img-circle center-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Vaporol" width="180" height="180">
            <h2>Vaporol</h2>
            <p>
              <a class="btn btn-info center-block" href="vaporol.php" role="button">View details &raquo;</a>
            </p>
          </div>
          <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /. Marketing Container -->

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="col-sm-6 col-xs-6">
            <img src="res/pistons.jpg" alt="pistons" class="img-responsive " width="300 " height="205">
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <img src="res/aluminumCable.JPG " alt="aluminium cables " class="img-responsive " width="300 " height="205 ">
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <img src="res/bridge.jpg " alt=" " class="img-responsive " width="300 " height="205 ">
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <img src="res/vci.PNG " alt="vci image " class="img-responsive " width="300 " height="205 ">
          </div>
        </div>
        <div class="col-md-6 col-sm-6 ">
          <img src="res/portalRafter.jpg " alt="Portal Rafter " class="img-responsive center-block " height="400 " width="600 ">
        </div>
      </div>
    </div>
    <div class="footer-push"></div>
  </div>

  <!-- =============================================================================================================================================== -->
  <!-- end of first content  -->

  <?php include('includes/footer.php'); ?>