<?php
 $this->view("main_view", $data);


?>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Update Proctor Status</h4>
        <?php if(@$data['quiz_data']): ?>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
						 <li class="breadcrumb-item">
						  <a class="text-muted text-decoration-none" href="
											<?=ROOT?>course/<?=$data['quiz_data'][0]->courseid?>"><?=$data['quiz_data'][0]->coursename?></a>
						</li>

						 <?php if(@$data['attempt_data']): ?>
							 <li class="breadcrumb-item">
							  <a class="text-muted text-decoration-none" href="
												<?=ROOT?>quiz/<?=$data['quiz_data'][0]->id?>"><?=$data['quiz_data'][0]->name?></a>
							</li>
							<li class="breadcrumb-item">
							  <a class="text-muted text-decoration-none" href="
												<?=ROOT?>quiz/<?=$data['quiz_data'][0]->id?>/<?=$data['attempt_data'][0]->studentid?>"><?=$data['attempt_data'][0]->studentfirstname?> <?=$data['attempt_data'][0]->studentlastname?></a>
							</li>
							<li class="breadcrumb-item" aria-current="page">Update Status</li>
						 <?php else: ?>
						 	<li class="breadcrumb-item" aria-current="page"><?=$data['quiz_data'][0]->name?></li>
						 <?php endif; ?>
					  </ol>
					</nav>

			<?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 align-items-stretch">
    <!-- --------- START PROCTOR STATUS FORM ---------------- -->
    <form id="update_proctor_status_form" method="post" action="<?=ROOT?>quiz/save_update?quizId=<?=$data['quiz_data'][0]->id?>&studentId=<?=$data['attempt_data'][0]->studentid?>">
      <div class="card">
        <div class="card-body">
          <!-- <h5 class="mb-3">UPDATE STATUS</h5> -->

            <!-- Display Error Messages -->
            <?php if(!@$data['errors']['isPosted']): ?>
				<?php foreach((array) @$data['errors']['errorMessages'] as $row): ?>
					<div class="alert bg-danger alert-dismissible fade show" role="alert">
						<div class="d-flex align-items-center text-light font-medium">
						  <i class="ti ti-square-rounded-x me-2 fs-4"></i> <?= $row ?>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endforeach; ?> <?php endif; ?>
		  <div class="row">
			<div class="col-lg-6 d-flex align-items-stretch">
                      <div class="w-100 position-relative overflow-hidden">
                        <div class="p-4">
                          <h5 class="card-title fw-semibold"><?=$data['attempt_data'][0]->studentfirstname?> <?=$data['attempt_data'][0]->studentlastname?></h5>
						  <div class="row">
							<div class="col-6">
							  <p class="card-subtitle mb-4"></p>
							  <div class="text-center">
								<?php if(@$data['proctor_status']){
											foreach((array) @$data['proctor_status'] as $row){
												if($row->user_id == $data['attempt_data'][0]->studentid){
													$photoResult = getS3Object($row->verify_face_path);
												}
											}
										  }else{
												$photoResult->signedUrl = ASSETS.'assets/images/user-icon.png';
										  }?>
								<img src="<?=$photoResult->signedUrl?>" alt="Image not found" onerror="this.src='<?=ASSETS?>assets/images/user-icon.png';"  class="img-fluid " width="120" height="120">
								<div class="d-flex align-items-center justify-content-center my-4 gap-3">
								  <p class="mb-0">Face Photo</p>
								</div>

							  </div>
							</div>
							<div class="col-6">
							  <p class="card-subtitle mb-4"></p>
							  <div class="text-center">
								<?php if(@$data['proctor_status']){
											foreach((array) @$data['proctor_status'] as $row){
												if($row->user_id == $data['attempt_data'][0]->studentid){
													$photoResult = getS3Object($row->verify_id_path);
												}
											}
										  }else{
												$photoResult->signedUrl = ASSETS.'assets/images/user-icon.png';
										  }?>
								<img src="<?=$photoResult->signedUrl?>" alt="Image not found" onerror="this.src='<?=ASSETS?>assets/images/user-icon.png';"  class="img-fluid " width="120" height="120">
								<div class="d-flex align-items-center justify-content-center my-4 gap-3">
								  <p class="mb-0">ID Card</p>
								</div>
							  </div>
							</div>
						  </div>
                        </div>
                      </div>
                    </div>
			<div class="col-lg-6 d-flex align-items-stretch">
                      <div class="w-100 position-relative overflow-hidden">
                        <div class="p-4">
                          <h5 class="card-title fw-semibold">Proctoring Summary</h5>
                          <p class="card-subtitle mb-4"></p>
							<div class="row">

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Proctoring Type:</label>
									  <label>
									    <?php if($data['proctoring_type'][0]->proctoring_type == '1'): ?>
												<label>Automated proctoring</label>
										<?php elseif($data['proctoring_type'][0]->proctoring_type == '2'): ?>
												<label>Random snapshot</label>
										<?php endif; ?>
									  </label>
									</span>
								</div>

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Total Violations:</label>
									  <label><?php if(@$data['attempt_data']): ?>
												<?php if (isset($data['proctoring_type'][0]->proctoring_type)): ?>
													<label><?=$total_violations?></label>
												<?php endif; ?>
											<?php endif; ?>
									  </label>
									</span>
								</div>

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Initial Status:</label>
									  <?php if(@$data['proctor_status']): ?>
											<?php if(isset($data['proctor_status'][0]->violation_initial_status)): ?>

												<!-- Should be changed to string instead of boolean for more statuses like not applicable or error -->
												<?php if($data['proctor_status'][0]->violation_initial_status): ?>
													<label>Passed</label>
												<?php else: ?>
													<label>Failed</label>
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Final Status:</label>
									  <?php if(@$data['proctor_status']): ?>
											<?php if(isset($data['proctor_status'][0]->violation_initial_status)): ?>

												<!-- Should be changed to string instead of boolean for more statuses like not applicable or error -->
												<?php if ($data['proctor_status'][0]->violation_approval_datetime != 0): ?>
													<?php if($data['proctor_status'][0]->violation_approval_status): ?>
														<label>Passed</label>
													<?php else: ?>
														<label>Failed</label>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Final Status Reason:</label>
									  <label><?=$data['proctor_status'][0]->violation_approval_reason?></label>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Reviewer:</label>
									  <label><?=$data['proctor_status'][0]->firstname?> <?=$data['proctor_status'][0]->lastname?></label>
									</span>
								</div>


								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Review Date:</label>
									  <label>
									  <?php if ($data['proctor_status'][0]->violation_approval_datetime != 0): ?>
										<?=$data['proctor_status'][0]->violation_approval_datetime?>
									  <?php endif; ?>
									  </label>
									</span>
								</div>
							</div>

					   </div>
                      </div>
                    </div>
          </div>
		  <div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
				<label class="control-label col-form-label">Status</label>
					<select name="statusselect" class="form-select">
						<option value="" selected="selected" hidden> Select a Status </option>
						<option value="0"> Failed </option>
						<option value="1"> Success </option>
					</select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="reason" class="control-label col-form-label">Reason</label>
                <input type="text" class="form-control" name="reason" id="reason" placeholder="Reason Here"/>
              </div>
            </div>
          </div>
        </div>
		<div class="p-3 border-top">
          <div class="action-form">
            <div class="mb-3 mb-0 text-end">
              <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light"> Save </button>
              <a href="<?=ROOT?>quiz/<?=$data['quiz_data'][0]->id?>/<?=$data['attempt_data'][0]->studentid?>" class="btn btn-dark rounded-pill px-4 waves-effect waves-light"> Cancel </a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- --------- END UPDATE PROCTOR STATUS FORM ---------------- -->
  </div>
</div> <?php
 $this->view("layout/layout_footer", $data);
?>
