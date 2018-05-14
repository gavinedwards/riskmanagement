<?php
include "session.php";
include "../inc/dbinfo.inc";

/* Connect to MySQL and select the database. */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);
$hazard = $_GET["conID"]

?>
<html>
  <head>
    <style>
      <?php include "class.css"; ?>
    </style>
  </head>
  <body>
    <div class="content">
      <div>
        <div class="a">
          <h1>Controls Page</h1>
          <?php  if (isset($_SESSION['username'])) : ?>
          <h3>Logged in as <?php echo $_SESSION['username']; ?> <a href="welcome.php?logout='1'">logout</a> </h3>
          <?php endif ?>
        </div>
        <div class="c" width=100px>
          <img src="img/logosm.png" width="100px"/>
        </div>
      </div>
    </div>
    <?php include "navbar.php"; ?>
    <!-- Main Splash Page Sections -->

    <table id="myTable">
      <tr class="header">
        <th style="width:5%;">ID</th>
        <th style="width:5%;">WRAG</th>
        <th style="width:50%;">Description</th>
        <th style="width:10%;">Owner</th>
        <th style="width:20%;">Last Comment</th>
      </tr>
      <? php
        $query = "SELECT actID, actWRAG, actIssue, actOwner FROM actions";
        $result = mysqli_query($connection, $query); 
        while ($row = mysqli_fetch_array($result)) {
        }
          echo '<tr>';
            echo '<td>Stuff</td>';
            echo '<td>Stuff</td>';
            echo '<td>Stuff</td>';
            echo '<td>Stuff</td>';
            echo '<td>Stuff</td>';
          echo '</tr>';
      ?>
    </table>
  </body>
</html>
