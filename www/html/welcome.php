<html>
  <head>
    <style>
      <?php include "class.css"; ?>
      <?php include "session.php"; ?>
    </style>
  </head>
  <body>
   	<h1>Welcome Page</h1>
      <div class="content">
      	<!-- notification message -->
      	<?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
          	<h3>
              <?php 
              	echo $_SESSION['success']; 
              	unset($_SESSION['success']);
              ?>
          	</h3>
          </div>
      	<?php endif ?>
    
        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        	<p>Welcome <?php echo $_SESSION['username']; ?></p>
        	<p> <a href="welcome.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
      </div>

  </body>
</html>