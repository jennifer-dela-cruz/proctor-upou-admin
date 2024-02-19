<!DOCTYPE html>
<html lang="en">
  
<head>
    <!-- Title -->
    <title><?=$data['page_title']?> | <?=WEBSITE_TITLE?></title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
				<h4>
                  <a href="index.html" class="text-nowrap logo-img text-center d-block mb-5 w-100">
					LOGIN
				   </a>
				   </h4>
                  <form method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="unameoremail" id="unameoremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" <?=getValue('unameoremail','text') ?>>
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Import Js Files -->
    
    <script src="<?=ASSETS?>dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?=ASSETS?>dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?=ASSETS?>dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    
    <!-- core files -->
    
    <script src="<?=ASSETS?>dist/js/app.min.js"></script>
    <script src="<?=ASSETS?>dist/js/app.minisidebar.init.js"></script>
    <script src="<?=ASSETS?>dist/js/app-style-switcher.js"></script>
    <script src="<?=ASSETS?>dist/js/sidebarmenu.js"></script>
    
    <script src="<?=ASSETS?>dist/js/custom.js"></script>
	<script src="<?=ASSETS?>dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>
	<script> 
	function errorMessage(message){
		Swal.fire("Login Error", message, "error");
	}
	</script>
	<?php if(!@$data['validation']['valid']): ?> <script>errorMessage('<?=@$data['validation']['errorMessages'][0]?>')</script> <?php endif; ?>
  </body>

</html>