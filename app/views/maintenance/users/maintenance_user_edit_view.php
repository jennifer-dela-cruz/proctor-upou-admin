<?php 
 $this->view("main_view", $data);

 
?> 

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Users</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a class="text-muted text-decoration-none" href="
								<?=ROOT?>maintenance/user">User</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 align-items-stretch">
    <!-- --------- START USER FORM ---------------- -->
    <form id="edit_user_form" method="post" action="<?=ROOT?>maintenance/user/save_edit/<?=$data['user_data'][0]->id?>">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Edit User</h5> 
          
            <!-- Display Error Messages -->
            <?php if(!@$data['errors']['isPosted']): ?> <?php foreach((array) @$data['errors']['errorMessages'] as $row): ?> <div class="alert bg-danger alert-dismissible fade show" role="alert">
            
            <div class="d-flex align-items-center text-light font-medium">
              <i class="ti ti-square-rounded-x me-2 fs-4"></i> <?= $row ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> <?php endforeach; ?> <?php endif; ?> <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="inputfname" class="control-label col-form-label">First Name</label>
                <input type="text" class="form-control" name="inputfname" id="inputfname" placeholder="First Name Here" value="<?=$data['user_data'][0]->firstname?>" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="inputlname2" class="control-label col-form-label">Last Name</label>
                <input type="text" class="form-control" name="inputlname" id="inputlname" placeholder="Last Name Here" value="<?=$data['user_data'][0]->lastname?>" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="uname" class="control-label col-form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Username Here" value="<?=$data['user_data'][0]->username?>" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label class="control-label col-form-label">Roles</label>
                <select name="roleselect" class="form-select"> 
				  <?php $isUnassigned = false ?>
                  <?php foreach($data['user_roles'] as $row): ?> 
                    <option value="<?= $row->id?>" <?php if($data['user_data'][0]->roleid == $row->id): ?> selected="selected" <?php elseif($data['user_data'][0]->roleid == 0): $isUnassigned = true?> <?php endif ?> > <?= $row->shortname?> </option> 
                  <?php endforeach; ?> 
				  <?php if($isUnassigned): ?>
					<option value="0" selected="selected"> Unassigned </option>
				  <?php endif ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body border-top">
          <h5 class="mb-3">Account Security</h5>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="password" class="control-label col-form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password Here" value="<?=$data['user_data'][0]->password?>" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="confirmpassword" class="control-label col-form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password Here" />
              </div>
            </div>
          </div>
        </div>
        <div class="card-body border-top">
          <h5>Contact Info &amp; Address</h5>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="text" class="control-label col-form-label">Email</label>
                <input type="email" class="form-control" name="email1" id="email1" placeholder="Email Here" value="<?=$data['user_data'][0]->email?>" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="cono" class="control-label col-form-label">Contact No</label>
                <input type="text" class="form-control" name="cono" id="cono" placeholder="Contact No Here" value="<?=$data['user_data'][0]->phone1?>" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="mb-3">
                <label for="address1" class="control-label col-form-label">Address</label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Here" value="<?=$data['user_data'][0]->address?>" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label for="city" class="control-label col-form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City Here" value="<?=$data['user_data'][0]->city?>" />
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 border-top">
          <div class="action-form">
            <div class="mb-3 mb-0 text-end">
              <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light"> Save </button>
              <a href="<?=ROOT?>maintenance/user" class="btn btn-dark rounded-pill px-4 waves-effect waves-light"> Cancel </a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- --------- END USER FORM ---------------- -->
  </div>
</div> <?php 
 $this->view("layout/layout_footer", $data);
?>
