<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE id = $id");
header("Location: dashboard.php");
exit();
?>