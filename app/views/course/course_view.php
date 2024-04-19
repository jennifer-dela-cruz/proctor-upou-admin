<?php
$this->view("main_view", $data);
?>

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
		<div class="card-body px-4 py-3">
		  <div class="row align-items-center">
			<div class="col-9">
			  <h4 class="fw-semibold mb-8">Courses</h4>
			 <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item">Course List</li>
			  </ol>
			</nav>

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
					  <?php if(@$data['course_list']): ?>
							<?php foreach((array) @$data['course_list'] as $row): ?>
								<li>
								  <a href="<?=ROOT?>course/<?=$row->id?>" class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user <?php if($data['course_data'][0]-> id == $row->id): ?> bg-light <?php endif; ?> "  data-user-id="<?=$row->id?>">
									<span class="position-relative">
									  <i class="ti ti-book fs-9 text-primary"></i>
									</span>
									<div class="ms-6 d-inline-block w-75">
									  <h6 class="mb-1 fw-semibold chat-title"><?=$row->fullname?> </h6>
									  <span class="fs-2 text-body-color d-block"><?=$row->shortname?></span>
									</div>
								  </a>
								</li>
							<?php endforeach; ?>
						<?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
				<?php if(isset($data['course_data'])): ?>
                <div class="w-100">

                  <div class="chat-container h-100 w-100">
                    <div class="chat-box-inner-part h-100">
                      <div class="chatting-box app-email-chatting-box">
                        <div class="p-9 py-3 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                          <h5 class="text-dark mb-0 fw-semibold">Course Details</h5>
                          <ul class="list-unstyled mb-0 d-flex align-items-center">
                            <li class="d-lg-none d-block">
                              <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-arrow-left"></i>
                              </a>
                            </li>
                            <!-- <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Course Details">
								 <a href="<?//=ROOT?>course/edit/<?//=$data['course_data'][0]->id?>" type="button" class="fs-2 justify-content-center w-100 btn mb-1 btn-rounded btn-info text-white font-medium d-flex align-items-center">
									<i class="ti ti-pencil fs-4 me-2"></i>
									Edit
								</a>
                            </li> &nbsp;&nbsp;&nbsp; -->
                          </ul>
                        </div>

                        <div class="position-relative overflow-hidden">
                          <div class="position-relative">
                            <div class="chat-box p-9" style="height: calc(100vh - 428px)" data-simplebar>
                              <div class="chat-list chat active-chat" data-user-id="1">
                                <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                  <div class="d-flex align-items-center gap-3">
                                     <i class="ti ti-file-description fs-10"></i>
                                    <div>
                                      <h6 class="fw-semibold fs-4 mb-0"><?=$data['course_data'][0]->fullname?> </h6>
                                      <p class="mb-0"><?=$data['course_data'][0]->shortname?></p>
                                      <p class="mb-0"><?=$data['course_data'][0]->idnumber?></p>
                                    </div>
                                  </div>
                                </div>
								<div class="row justify-content-center">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-body p-4">
                          <h4 class="fw-semibold mb-3">Quizzes</h4>
                          <div class="table-responsive">
								<table class="table search-table a	lign-middle text-nowrap">
								  <thead class="header-item">
									<th>Name</th>
									<th>Description</th>
									<th>Action</th>
								  </thead>
								  <tbody>
								  <?php if(@$data['quiz_data']): ?>
											<?php foreach((array) @$data['quiz_data'] as $row): ?>
												<!-- start row -->
												<tr class="search-items">
												  <td style="width: 30%">
													<div class="d-flex align-items-center">
													   <i class="ti ti-file-pencil fs-8 text-primary"></i>
													  <div class="ms-3">
														<div class="user-meta-info">

														  <span class="user-work fs-3" ><?=$row->name?></span>
														</div>
													  </div>
													</div>
												  </td>
												  <td style="width: 50%">
													<span class="usr-email-addr"><?=$row->intro?></span>
												  </td>
												  <td style="width: 20%">
													<div class="action-btn">
													  <a href="<?=ROOT?>quiz/<?=$row->id?>" class="text-info edit">
														<i class="ti ti-eye fs-5"></i>
													  </a>
													  <!-- <a href="javascript:void(0)" class="text-dark delete ms-2">
														<i class="ti ti-trash fs-5"></i>
													  </a> -->
													</div>
												  </td>
												</tr>
												<!-- end row -->
											<?php endforeach; ?>
									<?php endif; ?>
								  </tbody>
								</table>
							  </div>
                        </div>
                      </div>
                    </div>
					<div class="col-12">
                      <!-- <div class="d-flex align-items-center justify-content-end gap-3">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-light-danger text-danger">Cancel</button>
                      </div> -->
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
<?php
 $this->view("layout/layout_footer", $data);
?>

<script src="<?=ASSETS?>dist/js/apps/chat.js"></script>

<?php if(isset($data['success'])): ?>
<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
<script>Swal.fire("Success!", "Course has been successfully Created.", "success"); </script>
<!-- <script>showToastr("Successfully created user", "Success")</script> -->
<?php endif; ?>

<?php if(isset($data['successedit'])): ?>
<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
<script>Swal.fire("Success!", "Course has been successfully Updated.", "success"); </script>
<!-- <script>showToastr("Successfully edited user", "Success")</script> -->
<?php endif; ?>