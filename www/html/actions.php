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

    <table id="myTable" style="margin: 0px 10px; width:95%">
      <tr class="header">
        <th style="width:5%;">ID</th>
        <th style="width:5%;">WRAG</th>
        <th>Description</th>
        <th style="width:10%;">Owner</th>
        <th style="width:20%;">Last Comment</th>
      </tr>
      <tr class="header" style="text-align:center">
        <th><input type="text" id="myInputID" onkeyup="myFunctionID()" placeholder="Search for ID"></th>
        <th></th>
        <th><input type="text" id="myInputDesc" onkeyup="myFunctionDesc()" placeholder="Search in description"></th>
        <th><input type="text" id="myInputOwner" onkeyup="myFunctionOwner()" placeholder="Search for names"></th>
        <th><input type="text" id="myInputComment" onkeyup="myFunctionComment()" placeholder="Search in comment"></th>
      </tr>
      <?php
        $query = "SELECT actID, actWRAG, actIssue, actOwner FROM actions";
        $result = mysqli_query($connection, $query); 
        while ($row = mysqli_fetch_array($result)) {
          $ID = $row['actID'];
          $WRAG = $row['actWRAG'];
          $description = $row['actIssue'];
          $owner = $row['actOwner'];
					     echo '<tr>';
            echo '<td>';
              echo $ID;
            echo '</td>';
            echo '<td class="' . $WRAG . '">';
              echo $WRAG;
            echo '</td>';
            echo '<td>';
              echo $description;
            echo '</td>';
            echo '<td>';
              echo $owner;
            echo '</td>';
            echo '<td>';
              echo '';
            echo '</td>';
					     echo '</tr>';
        }
      ?>
      <script>
        function myFunctionID() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInputID");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function myFunctionDesc() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInputDesc");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function myFunctionOwner() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInputOwner");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function myFunctionComment() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInputComment");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
        
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        </script>
    </table>
  </body>
</html>
