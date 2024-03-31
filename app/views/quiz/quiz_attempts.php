<?php
$this->view("main_view", $data);

use Aws\S3\S3Client;
use Aws\Exception\AwsException;



?>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
		<div class="card-body px-4 py-3">
		  <div class="row align-items-center">
			<div class="col-9">
			  <h4 class="fw-semibold mb-8">Quiz Attempts</h4>
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
							<li class="breadcrumb-item" aria-current="page"><?=$data['attempt_data'][0]->studentfirstname?> <?=$data['attempt_data'][0]->studentlastname?></li>
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

	<div class="container-fluid">
          <div class="card overflow-hidden chat-application">
            <div class="d-flex align-items-center justify-content-between gap-3 m-3 d-lg-none">
              <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
              </button>
              <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="d-flex w-100">
              <div class="d-flex w-100">
                <div class="min-width-340">
                  <div class="border-end user-chat-box h-100">
                    <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                      <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search" />
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                      </form>
                    </div>
                    <div class="app-chat">
                      <ul class="chat-users" style="height: calc(100vh - 400px)" data-simplebar>
					  <?php if(@$data['attempt_list']): ?>
							<?php foreach((array) @$data['attempt_list'] as $row): ?>
								<li>
								  <a href="<?=ROOT?>quiz/<?=$row->quizid?>/<?=$row->studentid?>" class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user <?php if($data['attempt_list'][0]->attemptid == $row->attemptid): ?> bg-light <?php endif; ?> "  data-user-id="<?=$row->attemptid?>">
									<span class="position-relative">
									  <i class="ti ti-user fs-9 text-primary"></i>
									</span>
									<div class="ms-6 d-inline-block w-75">
									  <h6 class="mb-1 fw-semibold chat-title"><?=$row->studentfirstname?> <?=$row->studentlastname?></h6>
									</div>
								  </a>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
				<?php if(isset($data['attempt_data'])): ?>
                <div class="w-100">

                  <div class="chat-container h-100 w-100">
                    <div class="chat-box-inner-part h-100">
                      <div class="chatting-box app-email-chatting-box">
                        <div class="p-9 py-3 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                          <h5 class="text-dark mb-0 fw-semibold">Quiz Attempt Evidences</h5>
                          <ul class="list-unstyled mb-0 d-flex align-items-center">
                            <li class="d-lg-none d-block">
                              <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-arrow-left"></i>
                              </a>
                            </li>
                            <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Update Proctor Status">
								 <a href="<?=ROOT?>quiz/<?=$data['quiz_data'][0]->id?>/<?=$data['attempt_data'][0]->studentid?>?update_status=1" type="button" class="fs-2 justify-content-center w-100 btn mb-1 btn-rounded btn-info text-white font-medium d-flex align-items-center">
									<i class="ti ti-pencil fs-4 me-2"></i>
									Update Proctor Status
								</a>
                            </li>
                          </ul>
                        </div>

                        <div class="position-relative overflow-hidden">
                          <div class="position-relative">
                            <div class="chat-box p-9" style="height: calc(100vh - 428px)" data-simplebar>
                              <div class="chat-list chat active-chat" data-user-id="1">
							  <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Student Information</h5>
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
						  <div class="row">
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Username:</label>
									  <label><?=$data['attempt_data'][0]->username?></label>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Email:</label>
									  <label><?=$data['attempt_data'][0]->email?></label>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Name:</label>
									  <label><?=$data['attempt_data'][0]->studentfirstname?> <?=$data['attempt_data'][0]->studentlastname?></label>
									</span>
								</div>
						  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Proctoring Summary</h5>
                          <p class="card-subtitle mb-4"></p>
                          <form class="mb-4">
							<div class="row">

								<div class="col-12">
									<span>
										<label class="form-label fw-semibold">Proctoring Type:</label>
										<label>
										<?php $proctoring_type = implode(" ", $data['proctoring_type']); ?>
										<?php if($proctoring_type == '1'): ?>
												<label>Automated proctoring</label>
										<?php elseif($proctoring_type == '2'): ?>
												<label>Random snapshot</label>
										<?php endif; ?>
										</label>
									</span>
								</div>

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Total Violations:</label>
									  <label><?=count($data['attempt_data'])?></label>
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
										<?php
											// Create a DateTime object with the current date and time
											$date = $data['proctor_status'][0]->violation_approval_datetime;

											$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);

											// Set the timezone to Singapore
											$date->setTimezone(new DateTimeZone('Asia/Singapore'));

											// Format the date
											$date = $date->format('F d, Y g:i A');
											$data['proctor_status'][0]->violation_approval_datetime = $date;
										?>
										<?=$data['proctor_status'][0]->violation_approval_datetime?>
									  <?php endif; ?>
									  </label>
									</span>
								</div>
							</div>
                          </form>
						<h5 class="card-title fw-semibold ">Quiz Information</h5>
						<form>
							<div class="row">

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Quiz Name:</label>
									  <label><?php if(@$data['attempt_data']): ?>
												<?=$data['attempt_data'][0]->quizname?>
											<?php endif; ?>
									  </label>
									</span>
								</div>

								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">State:</label>
									  <label>In progress</label>
									</span>
								</div>

								<!-- <div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Time Start:</label>
									   <label>December 8, 2023, 1:30PM</label>
									</span>
								</div>
								<div class="col-12">
									<span>
									  <label class="form-label fw-semibold">Time End:</label>
									   <label>December 8, 2023, 1:33PM</label>
									</span>
								</div> -->
							</div>
                          </form>
					   </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Evidences <span class="badge bg-secondary"><?=count($data['attempt_data'])?></span></h5>
						  </s
                          <p class="card-subtitle mb-4"></p>
							 <div class="px-4 pt-9 pb-6 d-none d-lg-block">
							  <form class="position-relative">
								<input type="text" class="form-control search-evidence py-2 ps-5" id="text-srh" placeholder="Search" />
								<i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
							  </form>
							</div>
							<div class="app-chat">
							  <ul class="quiz-evidences" data-simplebar>
							  <?php if(@$data['attempt_data']): ?>
									<?php foreach((array) @$data['attempt_data'] as $row): ?>
										<?php
											// change the casing of the violation
											$row->violation = str_replace("_", " ", $row->violation);
											$row->violation = ucfirst(strtolower($row->violation));

										?>
										<li>
										<?php $result = getS3Object($row->path); ?>
										  <a href="javascript: void(0)" onclick="showImageModal('<?=$result->signedUrl?>', '<?=$result->imgKey?>', '<?=$result->fileType?>')" data-toggle="modal" data-target="#exampleModal" class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"  data-user-id="<?=$row->attemptid?>">
											<span class="position-relative">
											  <img  src="<?php if($result->fileType == "mp4"): ?>
															<?php echo ASSETS.'assets/images/video-play-button-con.png'; ?>
														<?php else: ?>
															<?php echo $result->signedUrl; ?>
														<?php endif; ?>"
													alt="Image not found" onerror="this.src='<?=ASSETS?>assets/images/violation-icon.png';" width="180" height="180">

											</span>
											<div class="ms-6 d-inline-block w-75">
											  <h5 class="mb-1 fw-semibold chat-title"><?=$row->violation?></h5>
											  <span class="fs-2 text-body-color d-block"><?=$row->created_datetime?></span>
											</div>
										  </a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							  </ul>
							</div>
						</div>
                      </div>
                    </div>
                  </div>

							  </div>
                              </div>
                            </div>
                          </div>
                        </div>

					  </div>
                    </div>
                  </div>
                </div>
				 <?php else: ?>

				<?php endif; ?>
			  </div>

            </div>
          </div>
        </div>

		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
 $this->view("layout/layout_footer", $data);
?>

<script src="<?=ASSETS?>dist/js/apps/chat.js"></script>

<?php if(isset($data['successupdate'])): ?>
<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
<script>Swal.fire("Success!", "Proctor Status has been successfully Updated.", "success"); </script>
<!-- <script>showToastr("Successfully edited user", "Success")</script> -->
<?php endif; ?>

<script>
function showImageModal(imageUrl, fileName, fileType){
	var domString = '<img src="'+ imageUrl +'"></img>'
	if(fileType == "mp4"){
		domString = '<video width="1280" height="720" controls>'+
						'<source src="'+imageUrl+'" type="video/mp4">'+
					'</video>';
	}else{
		domString = '<img src="'+ imageUrl +'"></img>';
	}

	Swal.fire({
          title: '<strong>'+fileName+ '</strong>',
          type: "info",
          html: domString,
		  width: '1280px',
          showCloseButton: true,
        });
}</script>