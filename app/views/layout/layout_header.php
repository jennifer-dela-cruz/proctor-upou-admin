 <!-- Header Start -->
        
        <header class="app-header"> 
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                  <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                
                 
                  <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                          <img src="<?=ASSETS?>assets/images/user-icon.png" class="rounded-circle" width="35" height="35" alt="" />
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                      <div class="profile-dropdown position-relative" data-simplebar>
                        <div class="py-3 px-7 pb-0">
                          <h5 class="mb-0 fs-5 fw-semibold">Logged In As</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                          <img src="<?=ASSETS?>assets/images/user-icon.png" class="rounded-circle" width="80" height="80" alt="" />
						  <div class="row">
							<div class="col-md-3">
							  <div class="ms-3">
								<h5 class="mb-1 fs-3"><?=$_SESSION['username']?></h5>
								
								<p class="mb-0 d-flex text-dark align-items-center gap-2">
								  <i class="ti ti-mail"></i> <?=$_SESSION['email']?>
								</p>
							  </div>
							</div>
						  </div>
                        </div>
                        <div class="d-grid py-4 px-7 pt-8">
                          <a href="<?=ROOT?>login" class="btn btn-outline-primary">Log Out</a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        
        <!-- Header End -->
        