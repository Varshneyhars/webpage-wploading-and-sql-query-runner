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
					
					<div class="card-body">
                    <form action="" method="post">
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Enter your Query here...</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sqlcode"></textarea>
                    <br>
                    <div class="mb-3">
                    
                    <select class="form-select" name="tableselect">
                       <?php
                          $sql = "SHOW TABLES FROM $dbname";
                          $result = mysqli_query($connh,$sql);
                          
                          if (!$result) {
                              echo "DB Error, could not list tables\n";
                             // echo 'MySQL Error: ' . mysqli_error();
                              exit;
                          }
                          echo "<option>select your table...</option>";
                          while ($row = mysqli_fetch_row($result)) {
                             
                              echo "<option value='".$row[0]."'>". $row[0]."</option>";
                          }
                       ?>
                    </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Test Your query" name="runcode">
                   
                   </div>
                   </form>

                   


				</div>
			</div>

            <div class="col-sm-12">
				<div class="card">
					
					<div class="card-body">
                    <?php
                        
                
                        if (isset($_POST['runcode'])) {
                            $query = $_POST['sqlcode'];
                            echo "Your Query:- <b>". $query ."</b>";
                            $sql = $query;

                            if ($connh->query($sql) === TRUE) {
                            //echo "New record created successfully";
                            $page = $_SERVER['PHP_SELF'];
                            $sec = "1";
                            header("Refresh: $sec; url=$page");
                              
                                
                            } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                           
                              
                        }
                        if(isset($_POST['tableselect'])){
                            $table =$_POST['tableselect'];
                            $sqli = "SELECT * FROM ".$table;
                            //echo $sqli;
                            $result = $connh->query($sqli);
                            $sql = "SELECT * FROM ".$table;
                            $results = mysqli_query($conn, $sql) ;

                          
                            if ($result->num_rows > 0) {
                            // output data of each row
                            $results=mysqli_query($connh,"SELECT * FROM $table ");
                            if (mysqli_num_rows($results)<1) echo "Table is empty";
                            else
                            {
                               $row=mysqli_fetch_assoc($results);
                               echo "  <div class='table-responsive'><table class='table table-bordered'>";
                               echo "<thead><tr>";
                               echo "<th>".join("</th><th>",array_keys($row))."</th>";
                               echo "</thead></tr>";
                            
                               while ($row)
                               {
                                   echo "<tbody><tr>";
                                   echo "<td>".join("</td><td>",$row)."</td>";
                                   echo "</tr></tbody>";
                                   $row=mysqli_fetch_assoc($results);
                               }
                            
                               echo "</table></div>";
                            }
                            
                          }
                            
                        }
                        /* $sql = "SELECT * FROM ".$table;
                            $result = mysqli_query($conn, $sql) ;

                            // Print the column names as the headers of a table
                          
                            $columns = array();
                            $resultset = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (empty($columns)) {
                                    $columns = array_keys($row);
                                    echo '<tr><th>'.implode('</th><th>', $columns).'</th></tr>';
                                    //echo "<br>".implode(' , ',$columns);
                                }
                                
                            }
                             */

                            
                        
                    ?>
                   


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