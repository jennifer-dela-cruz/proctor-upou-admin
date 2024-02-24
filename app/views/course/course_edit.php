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
            <li class="breadcrumb-item">
              <a class="text-muted text-decoration-none" href="
								<?=ROOT?>course">Course List</a>
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
    <form id="create_user_form" method="post" action="<?=ROOT?>course/save_edit/<?=$data['course_data'][0]->id?>">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Create Course</h5> 
          
            <!-- Display Error Messages -->
            <?php if(!@$data['errors']['isPosted']): ?> 
				<?php foreach((array) @$data['errors']['errorMessages'] as $row): ?> 
					<div class="alert bg-danger alert-dismissible fade show" role="alert">
		
						<div class="d-flex align-items-center text-light font-medium">
							<i class="ti ti-square-rounded-x me-2 fs-4"></i> <?= $row ?>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div> 
				<?php endforeach; ?> 
			<?php endif; ?> 

		<div class="row">
            <div class="col-sm-12">
              <div class="mb-3">
                <label for="inputfname" class="control-label col-form-label">Course Name</label>
                <input type="text" class="form-control" name="coursename" id="coursename" placeholder="Course Name Here" value="<?=$data['course_data'][0]->fullname?>"/>
              </div>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="inputfname" class="control-label col-form-label">Course Shortname</label>
                <input type="text" class="form-control" name="courseshort" id="courseshort" placeholder="Course Name Here" value="<?=$data['course_data'][0]->shortname?>" />
              </div>
            </div>
			<div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="inputlname2" class="control-label col-form-label">Course Code</label>
                <input type="text" class="form-control" name="coursecode" id="coursecode" placeholder="Course Code Here" value="<?=$data['course_data'][0]->shortname?>" />
              </div>
            </div>
        </div>
          <div class="row">
            
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="inputlname2" class="control-label col-form-label">Course Number</label>
                <input type="text" class="form-control" name="coursenumber" id="coursenumber" placeholder="Course Code Here" value="<?=$data['course_data'][0]->idnumber?>" />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label class="control-label col-form-label">Categories</label>
                <select name="coursecategory" class="form-select"> 
                  <?php $isUnassigned = false ?>
                  <?php foreach($data['course_categories'] as $row): ?> 
                    <option value="<?= $row->id?>" <?php if($data['course_data'][0]->category == $row->id): ?> selected="selected" <?php elseif($data['course_data'][0]->category == 0): $isUnassigned = true?> <?php endif ?> > <?= $row->name?> </option> 
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
          <h5 class="mb-3">Enrollment Details</h5>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="password" class="control-label col-form-label">Start Date</label>
                <input type="password" class="form-control" name="startdate" id="startdate" <?=getValue('startdate','text') ?> />
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="mb-3">
                <label for="confirmpassword" class="control-label col-form-label">End Date</label>
                <input type="password" class="form-control" name="enddate" id="enddate"  />
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 border-top">
          <div class="action-form">
            <div class="mb-3 mb-0 text-end">
              <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light"> Save </button>
              <a href="<?=ROOT?>course/<?=$data['course_data'][0]->id?>" class="btn btn-dark rounded-pill px-4 waves-effect waves-light"> Cancel </a>
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
