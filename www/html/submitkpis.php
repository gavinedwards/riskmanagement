<?php 
include "session.php"; 
include "../inc/dbinfo.inc";

/* Connect to MySQL and select the database. */
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DBNAME);
$kpiID = $_GET["kpiID"];
$description = $_POST["description"];
$kpiDesc1 = $_POST["kpiDesc1"];
$kpiVal1 = $_POST["kpiVal1"];
$kpiDesc2 = $_POST["kpiDesc2"];
$kpiVal2 = $_POST["kpiVal2"];
$kpiDesc3 = $_POST["kpiDesc3"];
$kpiVal3 = $_POST["kpiVal3"];

$sql = 'UPDATE kpis SET kpiDesc = "' . $description . '", kpiDesc1 = "' . $kpiDesc1 . '", kpiVal1 = "' . $kpiVal1 . '", kpiDesc2 = "' . $kpiDesc2 . '", kpiVal2 = "' . $kpiVal2 . '", kpiDesc3 = "' . $kpiDesc3 . '", kpiVal3 = "' . $kpiVal3 . '" WHERE kpiID = "' . $kpiID . '"';

mysqli_query($connection, $sql);

if (mysqli_query($connection, $sql)) {
  header('Location: kpis.php');
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

?>
