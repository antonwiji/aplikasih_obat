<?php
if (!isset($_SESSION["login"])) {
    header("location: ../logout.php");
    exit;
}
?>
<!DOCTYPE html>
<!-- 
Template Name: Mintos - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Loka Kesehatan tradisional masyarakat (lktm) palembang</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets_dashboard/favicon.ico">
    <link rel="icon" href="../assets_dashboard/favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="../assets_dashboard/vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="../assets_dashboard/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../assets_dashboard/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="../assets_dashboard/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../assets_dashboard/dist/css/style.css" rel="stylesheet" type="text/css">


    <!-- Data Table CSS -->
    <link href="../assets_dashboard/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets_dashboard/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" /> <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets_dashboard/font-awesome/css/all.min.css">
</head>

<body>