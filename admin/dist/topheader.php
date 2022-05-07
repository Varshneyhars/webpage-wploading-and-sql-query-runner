
	<?php 
	
	$userf=$_SESSION['username'];
	 $sql = "SELECT * FROM profile where username='$userf'";
       
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['first_name']= $row['first_name'];
      }
    } else {
      echo "0 results";
    }
	?>
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">
					
				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name"><?php 
                                if(isset($_SESSION['username'])) {
                                    echo  "Hello (" . $_SESSION['username'] . ")";
                                } 
                                else {echo "error";} 
                                ?></span>
								<span class="user-desc"><?php 
								
                                if(isset($_SESSION['first_name'])) {
                                    echo   $_SESSION['first_name'];
                                } 
                                else {echo "error";} 
                                ?></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							
				
							<a href="../../php/logout.php" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>
                                Logout   </span>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
	<!-- [ Header ] end -->