<?php
 $this->view("main_view", $data);
?>

<div class="row">
  <div class="col-lg-1"></div>
  <div class="col-lg-10 align-items-stretch">
	<div class="card">
            <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                  <i class="ti ti-user-circle me-2 fs-6"></i>
                  <span class="d-none d-md-block">Account</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button" role="tab" aria-controls="pills-notifications" aria-selected="false">
                  <i class="ti ti-bell me-2 fs-6"></i>
                  <span class="d-none d-md-block">Courses</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab" aria-controls="pills-bills" aria-selected="false">
                  <i class="ti ti-article me-2 fs-6"></i>
                  <span class="d-none d-md-block">Quizzes</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                  <i class="ti ti-lock me-2 fs-6"></i>
                  <span class="d-none d-md-block">Security</span>
                </button>
              </li>
            </ul>
            <div class="card-body">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                  <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Change Profile</h5>
                          <p class="card-subtitle mb-4"></p>
                          <div class="text-center">
                            <img src="<?=ASSETS?>assets/images/user-icon.png" alt="" class="img-fluid rounded-circle" width="120" height="120">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                              <button class="btn btn-primary">Upload</button>
                              <button class="btn btn-outline-danger">Reset</button>
                            </div>
                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                      <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Change Password</h5>
                          <p class="card-subtitle mb-4"></p>
                          <form>
                            <div class="mb-4">
                              <label for="exampleInputPassword1" class="form-label fw-semibold">Current Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" value="<?=$data['student_data'][0]->password?>">
                            </div>
                            <div class="mb-4">
                              <label for="exampleInputPassword1" class="form-label fw-semibold">New Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="">
                              <label for="exampleInputPassword1" class="form-label fw-semibold">Confirm Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" >
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                          <h5 class="card-title fw-semibold">Personal Details</h5>
                          <p class="card-subtitle mb-4"></p>
                          <form>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">First Name</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="firstname" id="firstname" value="<?=$data['student_data'][0]->firstname?>">
                                </div>
                                <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">Username</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="uname" id="uname" value="<?=$data['student_data'][0]->username?>">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">Last Name</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="lastname" id="lastname" value="<?=$data['student_data'][0]->username?>">
                                </div>
                               <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="email" id="email" value="<?=$data['student_data'][0]->email?>">
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">Address</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="address" id="address" value="<?=$data['student_data'][0]->address?>">
                                </div>
                              </div><br /><br /><br /><br /><br />
							  <div class="col-lg-6">
                               <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">Contact No.</label>
                                  <input type="email" class="form-control" id="exampleInputtext" name="contactno" id="contactno" value="<?=$data['student_data'][0]->phone1?>">
                                </div>
                              </div>
							  <div class="col-lg-6">
                                <div class="mb-4">
                                  <label for="exampleInputPassword1" class="form-label fw-semibold">City</label>
                                  <input type="text" class="form-control" id="exampleInputtext" name="city" id="city" value="<?=$data['student_data'][0]->city?>">
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                  <button class="btn btn-primary">Save</button>
                                  <button class="btn btn-light-danger text-danger">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-notifications" role="tabpanel" aria-labelledby="pills-notifications-tab" tabindex="0">
                  <div class="row justify-content-center">
                    <div class="col-lg-9">
                      <div class="card">
                        <div class="card-body p-4">
                          <h4 class="fw-semibold mb-3">Available Courses</h4>
                          <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                  <thead class="header-item">
                    <th>
                      <div class="n-chk align-self-center text-center">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input primary" id="contact-check-all" />
                          <label class="form-check-label" for="contact-check-all"></label>
                          <span class="new-control-indicator"></span>
                        </div>
                      </div>
                    </th>
                    <th>Course Name</th>
                    <th>Short Name</th>
                    <th>Category</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
				  <?php if(@$data['course_available']): ?>
							<?php foreach((array) @$data['course_available'] as $row): ?>
								<!-- start row -->
								<tr class="search-items">
								  <td>
									<div class="n-chk align-self-center text-center">
									  <div class="form-check">
										<input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox1" />
										<label class="form-check-label" for="checkbox1"></label>
									  </div>
									</div>
								  </td>
								  <td>
									<div class="d-flex align-items-center">
									   <i class="ti ti-book fs-9 text-primary"></i>
									  <div class="ms-3">
										<div class="user-meta-info">
										  <h6 class="user-name mb-0" ><?=$row->fullname?></h6>
										  <span class="user-work fs-3" ><?=$row->idnumber?></span>
										</div>
									  </div>
									</div>
								  </td>
								  <td>
									<span class="usr-email-addr"><?=$row->shortname?></span>
								  </td>
								  <td>
									<span class="usr-location" ></span>
								  </td>
								  <td>
									<div class="action-btn">
									  <a href="javascript:void(0)" class="text-info edit">
										<i class="ti ti-eye fs-5"></i>
									  </a>
									  <a href="javascript:void(0)" class="text-dark delete ms-2">
										<i class="ti ti-trash fs-5"></i>
									  </a>
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
					<div class="col-lg-9">
                      <div class="card">
                        <div class="card-body p-4">
                          <h4 class="fw-semibold mb-3">Enrolled Courses</h4>
							<div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                  <thead class="header-item">
                    <th>
                      <div class="n-chk align-self-center text-center">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input primary" id="contact-check-all" />
                          <label class="form-check-label" for="contact-check-all"></label>
                          <span class="new-control-indicator"></span>
                        </div>
                      </div>
                    </th>
                    <th>Course Name</th>
                    <th>Short Name</th>
                    <th>Category</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>


                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="d-flex align-items-center justify-content-end gap-3">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-light-danger text-danger">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-bills" role="tabpanel" aria-labelledby="pills-bills-tab" tabindex="0">
                  <div class="row justify-content-center">


                    </div>
                    <div class="col-12">
                      <div class="d-flex align-items-center justify-content-end gap-3">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-light-danger text-danger">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body p-4">
                          <h4 class="fw-semibold mb-3">Two-factor Authentication</h4>
                          <div class="d-flex align-items-center justify-content-between pb-7">
                            <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis sapiente sunt earum officiis laboriosam ut.</p>
                            <button class="btn btn-primary">Enable</button>
                          </div>
                          <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                              <h5 class="fs-4 fw-semibold mb-0">Authentication App</h5>
                              <p class="mb-0">Google auth app</p>
                            </div>
                            <button class="btn btn-light-primary text-primary">Setup</button>
                          </div>
                          <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                              <h5 class="fs-4 fw-semibold mb-0">Another e-mail</h5>
                              <p class="mb-0">E-mail to send verification link</p>
                            </div>
                            <button class="btn btn-light-primary text-primary">Setup</button>
                          </div>
                          <div class="d-flex align-items-center justify-content-between py-3 border-top">
                            <div>
                              <h5 class="fs-4 fw-semibold mb-0">SMS Recovery</h5>
                              <p class="mb-0">Your phone number or something</p>
                            </div>
                            <button class="btn btn-light-primary text-primary">Setup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body p-4">
                          <div class="bg-light rounded-1 p-6 d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="ti ti-device-laptop text-primary d-block fs-7" width="22" height="22"></i>
                          </div>
                          <h5 class="fs-5 fw-semibold mb-0">Devices</h5>
                          <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit Rem.</p>
                          <button class="btn btn-primary mb-4">Sign out from all devices</button>
                          <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center gap-3">
                              <i class="ti ti-device-mobile text-dark d-block fs-7" width="26" height="26"></i>
                              <div>
                                <h5 class="fs-4 fw-semibold mb-0">iPhone 14</h5>
                                <p class="mb-0">London UK, Oct 23 at 1:15 AM</p>
                              </div>
                            </div>
                            <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)">
                              <i class="ti ti-dots-vertical"></i>
                            </a>
                          </div>
                          <div class="d-flex align-items-center justify-content-between py-3">
                            <div class="d-flex align-items-center gap-3">
                              <i class="ti ti-device-laptop text-dark d-block fs-7" width="26" height="26"></i>
                              <div>
                                <h5 class="fs-4 fw-semibold mb-0">Macbook Air</h5>
                                <p class="mb-0">Gujarat India, Oct 24 at 3:15 AM</p>
                              </div>
                            </div>
                            <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)">
                              <i class="ti ti-dots-vertical"></i>
                            </a>
                          </div>
                          <button class="btn btn-light-primary text-primary w-100 py-1">Need Help ?</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-flex align-items-center justify-content-end gap-3">
                        <button class="btn btn-primary">Save</button>
                        <button class="btn btn-light-danger text-danger">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
	 <div class="col-lg-1"></div>
</div>


<?php
 $this->view("layout/layout_footer", $data);
?>


