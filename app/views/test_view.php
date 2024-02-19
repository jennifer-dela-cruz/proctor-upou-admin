<?php 
 $this->view("main_view", $data);
?>

<div class="row">
	<div class="col-12">
		<div class="d-flex align-items-center gap-4 mb-4">
			<div class="position-relative">
			  <div class="border border-2 border-primary rounded-circle">
				 <div class="flex-shrink-0 bg-light-primary rounded-circle round d-flex align-items-center justify-content-center">
				  <i class="ti ti-paperclip text-primary fs-6"></i>
				</div>
			  </div>
			</div>
			<div>
			  <h3 class="fw-semibold">Test #<span class="text-dark">00001</span>
			  </h3>
			  <span>Introduction To Information Sciences</span>
			</div>
			<div class="ms-auto mt-4 mt-md-0">
			  <div class="hstack">
				<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="John Deo">
				  <img src="<?=ASSETS?>dist/images/profile/user-1.jpg" class="rounded-circle border border-2 border-white" width="35" alt="u1" />
				</a>
				<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Smith" class="ms-n2">
				  <img src="<?=ASSETS?>dist/images/profile/user-2.jpg" class="rounded-circle border border-2 border-white" width="35" alt="u2" />
				</a>
				<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Jonthan Leo" class="ms-n2">
				  <img src="<?=ASSETS?>dist/images/profile/user-3.jpg" class="rounded-circle border border-2 border-white" width="35" alt="u3" />
				</a>
				<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Test Leo" class="ms-n2">
				  <img src="<?=ASSETS?>dist/images/profile/user-4.jpg" class="rounded-circle border border-2 border-white" width="35" alt="u3" />
				</a>
				<a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="5 more people are on this test" class="ms-n2">
				
				  <div  class="bg-light-primary rounded-circle round d-flex align-items-center justify-content-center border border-2 border-white" width="25" alt="u3" />
					<i class="ti ti-dots text-primary fs-6"></i>
				  </div>
				</a>
			</div>
		</div>	
	</div>
		
	<div class="row">
		<div class="col-8">
			<div class="card text-white bg-camera rounded"  style="height:560px; width:100%">
				<div class="card-body center-icon">
					 <div class="flex-shrink-0 bg-light-primary rounded-circle round d-flex align-items-center justify-content-center border border-2 border-white" width="35" alt="u3" />
						<i class="ti ti-camera text-primary fs-8"></i>
					 </div>
				</div>
				<div class="border-top">
				
				</div>
			</div>
			<div class="text-center" >
				<button type="button"  class="btn btn-secondary btn-circle btn-xl me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Turn On Microphone">
					<i class="ti ti-microphone fs-8"></i>
                 </button>
				 <button type="button" class="btn btn-secondary btn-circle btn-xl me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Turn On Camera">
					<i class="ti ti-camera fs-8"></i>
                 </button>
				 <button type="button" class="btn btn-secondary btn-circle btn-xl me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Raise Hand">
					<i class="ti ti-hand-stop fs-8"></i>
                 </button>
				 <button id="maximizeButton" type="button" class="btn btn-secondary btn-circle btn-xl me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" onclick="fullscreen();" title="Full Screen">
					<i id="maximizeButtonIcon" class="ti ti-arrows-maximize fs-8"></i>
                 </button>
				 <button id="moreOptionsButton" type="button" class="btn btn-secondary btn-circle btn-xl me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="More Options">
					<i class="ti ti-dots-vertical fs-8"></i>
                 </button>
			</div>
		</div>
		<div class="col-4">
		<div class="card w-100">
                <div class="card-body">
                  <h5 class="card-title fw-semibold">Mid Terms</h5>
                  <p class="card-subtitle">August 9, 2023</p>
                  <div class="mt-4 pb-3">
                    <div class="d-flex align-items-center">
                      <span class="bg-light-primary text-primary badge">In Progress</span>
                      <span class="fs-3 ms-auto">Prof. Lorem Ipsum </span>
                    </div>
                    <h6 class="mt-3">Module 1 - Data Communication</h6>
                    <span class="fs-3 lh-sm"></span>
                    <div class="hstack gap-3 mt-3">
                      <a href="#" class="fs-3 text-bodycolor d-flex align-items-center text-decoration-none">
                        <i class="ti ti-clock fs-6 text-primary me-2 d-flex"></i> 2 Hours</a>                    
                    </div>
                  </div>
                </div>
              </div>            
		</div>
	</div>
</div>

<?php 
 $this->view("layout/layout_footer", $data);
?>

<script src="<?=ASSETS?>dist/js/violations.js"></script>

	