<?php
session_start();
  if($_SESSION['access_level']=="user"){

    session_abort();


    include "header.php";
    include "mobileheader.php";
    include "sidenav.php";
    include "topheader.php";


    ?>

    <!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <BR></BR>
        <div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5></h5>
					</div>
					<div class="card-body">
                    <?php


                        date_default_timezone_set("Asia/Kolkata");  
                        $h = date('G');

                        if($h>=5 && $h<=11)
                        {
                            echo "<figure class='text-center'><h1 style = 'font-family: sans-serif;'>Good morning ".$_SESSION['username']."</h1></figure>";
                        }
                        else if($h>=12 && $h<=15)
                        {
                            echo "<figure class='text-center'><h1 style = 'font-family: sans-serif;'>Good afternoon ".$_SESSION['username']."</h1></figure>";
                        }
                        else
                        {
                            echo "<figure class='text-center'><h1 style = 'font-family: sans-serif;'>Good evening ".$_SESSION['username']."</h1></figure>";
                        }
                    ?>  

					</div>
				</div>
			</div>


    </div>
</div>

    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
    <!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
    <!-- <script src="assets/js/uikit.min.js"></script> -->

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-sale.js"></script>
</body>

</html>


    <?php
  }
  else{
      echo"unothorised access";
      header('Location: ../../index.php');
  }
     
?>

