<?php
include_once "php/head.php";
?>
    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">WEB DEVELOPMENT SYSTEM</h2>
        <div class="text-center mb-5 text-dark"></div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="php/usercheck.php" method="POST">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                placeholder="User Name" name="username">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="password" name="password">
            </div>
            <div class="text-center"><button type="submit" name = "submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an
                Account</a>
            </div>
          </form>
          
        </div>

      </div>
    </div>
  </div>
</body>
</html>