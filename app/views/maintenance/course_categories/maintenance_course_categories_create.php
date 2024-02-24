<?php 
 $this->view("main_view", $data);

 
?> 

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Course Categories</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Maintenance</li>
            <li class="breadcrumb-item">
              <a class="text-muted text-decoration-none" href="
								<?=ROOT?>maintenance/course_categories">Course Category</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">Create</li>
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
    <form id="create_user_form" method="post"  action="<?=ROOT?>maintenance/course_categories/save_create">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Create Category</h5> 
          
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
            <div class="col-sm-12 col-md-12">
              <div class="mb-3">
                <label for="inputfname" class="control-label col-form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here" <?=getValue('name','text') ?>/>
              </div>
            </div>
          </div>
		  <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="mb-3">
                <label for="inputfname" class="control-label col-form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description Here" <?=getValue('description','text') ?>/>
              </div>
            </div>
          </div>
        </div>
        
        <div class="p-3 border-top">
          <div class="action-form">
            <div class="mb-3 mb-0 text-end">
              <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light"> Save </button>
              <a href="<?=ROOT?>maintenance/course_categories" class="btn btn-dark rounded-pill px-4 waves-effect waves-light"> Cancel </a>
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
