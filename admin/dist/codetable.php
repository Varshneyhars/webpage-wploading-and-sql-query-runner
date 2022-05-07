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
                            <li class="breadcrumb-item"><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)) ?></li>
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
                    
                    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">File Name</th>
              <th scope="col">Link</th>
              <th scope="col">View</th>
              
            </tr>
          </thead>
          <tbody>
              <?php
              $userf= $_SESSION['username'];
            $sql = "SELECT * FROM uploads WHERE username='$userf' ORDER BY id DESC";
            $result = $conn->query($sql);
            $i = 1;
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
            <tr>
              <td><?php echo $i?></td>
              <td><?php echo $row["filename"];?></td>
              <td><?php echo $base ."admin/dist/up/".$row["newfilename"];?></td>
              <td><a href="<?php echo "up/".$row["newfilename"];?>"><button type="button" class="btn btn-info">View</button></a></td>
              
            </tr>
                <?php
          
          $i += 1;  
            }
            } else {
            echo "0 results";
            }
            ?>
            
          </tbody>
        </table>
        </div>

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