<?php 
if(!isset($_SESSION['username']) && !isset($_SESSION['firstname'])){
	$this->redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    
    <!-- Title -->
    
    <title><?= $data['page_title']?> | <?=WEBSITE_TITLE?></title>
    <!-- Required Meta Tag -->
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Test Site" />
    <meta name="author" content="" />
    <meta name="keywords" content="Test Site" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon -->    
    <link rel="shortcut icon" type="image/png" href="<?=ASSETS?>logo.png" />    
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?=ASSETS?>dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
	<!-- --------------------------------------------------- -->
    <!-- datatable  Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="<?=ASSETS?>dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="<?=ASSETS?>dist/css/style.min.css" />
	<link rel="stylesheet" href="<?=ASSETS?>dist/css/mystyles.css" />
	<!-- Sweetalert -->
	<link rel="stylesheet" href="<?=ASSETS?>dist/libs/sweetalert2/dist/sweetalert2.min.css">
	
  </head>

<body>
  
      <!-- Preloader -->
    <!-- Body Wrapper -->
    
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
	
	<?php $this->view("layout/layout_sidebar", $data);?> 
	
	  <!-- Main wrapper -->
      
      <div class="body-wrapper">
	  
	  <?php $this->view("layout/layout_header", $data); ?> 
	  
	  <div class="container-fluid mw-100">