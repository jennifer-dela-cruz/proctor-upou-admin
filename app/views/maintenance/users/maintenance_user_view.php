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
				  <li class="breadcrumb-item" aria-current="page">User</li>
				</ol>
			  </nav>
			  
			</div>
		  </div>
		</div>
	</div>
	<section class="datatables">
	<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
						<div class="col-sm-1 maintenance-add-button">
							<?php if(!$data['archive']): ?> 
								<a href="<?=ROOT?>maintenance/user/archive"   type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-warning text-warning font-medium d-flex align-items-center">
									<i class="ti ti-archive fs-4 me-2"></i>
									Archives
								</a> 
							<?php else: ?>
								<a href="<?=ROOT?>maintenance/user"   type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-info text-info font-medium d-flex align-items-center">
									<i class="ti ti-database fs-4 me-2"></i>
									Live Data
								</a> 
							<?php endif; ?>
						</div> 
					  <div class="col-sm-1 maintenance-add-button">
							<a href="<?=ROOT?>maintenance/user/create" type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-success text-success font-medium d-flex align-items-center">
								<i class="ti ti-plus fs-4 me-2"></i>
								Add User
							</a> &nbsp; &nbsp;
					  </div> <br />
                    <div class="table-responsive">
					  <table
                        id="file_export"
                        class="table border table-bordered display text-nowrap"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
							<th>Role</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
						<tbody>
					  <?php foreach($data['users_data'] as $row): ?>

						  <tr>
                            <td><?=$row->firstname?> <?=$row->lastname?></td>
							<td><?=$row->role?></td>
                            <td><?=$row->email?></td>
                            <td><?=$row->address?></td>
                            <td><?=$row->city?></td>
                            <td>
								<div class="maintenance-action-button">
									<?php if(!$data['archive']): ?>
										<a href="<?=ROOT?>maintenance/user/edit/<?=$row->id?>" type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-primary text-primary font-medium align-items-center">
										<i class="ti ti-edit"></i>
										</a>
										<button onclick="deleteUser('<?=$row->firstname?>', '<?=$row->id?>')" type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-danger text-danger font-medium  align-items-center">
											<i class="ti ti-trash"></i>
										</button>
									<?php else: ?>
										<button onclick="restoreUser('<?=$row->firstname?>', '<?=$row->id?>')" type="button" class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-info text-info font-medium  align-items-center">
											<i class="ti ti-refresh"></i>
										</button>
									<?php endif; ?>
								</div>	
							</td>
                          </tr>
					  <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
	</div>



<?php 
 $this->view("layout/layout_footer", $data);
?>

<script> 
  
	function deleteUser(name, id){
		Swal.fire(
		  {
			title: "Are you sure?",
			text: "The user (" + name + ") will be soft deleted. You may be able to recover this using the archives",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false,
		  }
		).then((result) => {
		  if (result.value) {
			  console.log(id);
			  window.location.replace('<?=ROOT?>maintenance/user/delete_user/'+id);
		  }
		});
	}		

	function restoreUser(name, id){
		Swal.fire(
		  {
			title: "Are you sure?",
			text: "The user (" + name + ") will be restored.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085D6",
			confirmButtonText: "Yes, restore it!",
			closeOnConfirm: false,
		  }
		).then((result) => {
		  if (result.value) {
			  console.log(id);
			  window.location.replace('<?=ROOT?>maintenance/user/restore_user/'+id);
		  }
		});
		
	}

</script>

<?php if(isset($data['success'])): ?>
<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
<script>Swal.fire("Success!", "User has been successfully Created.", "success"); </script>
<!-- <script>showToastr("Successfully created user", "Success")</script> -->
<?php endif; ?>

<?php if(isset($data['successedit'])): ?>
<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
<script>Swal.fire("Success!", "User has been successfully Edited.", "success"); </script>
<!-- <script>showToastr("Successfully edited user", "Success")</script> -->
<?php endif; ?>

<?php if(isset($data['successdelete'])): ?>
	<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
	<?php if($data['successdelete']): ?>
		<script>Swal.fire("Success!", "User has been successfully deleted.", "success"); </script>
	<?php else: ?>
		<script>Swal.fire("Error", "Something went wrong while trying to delete this record", "error"); </script>
	<?php endif; ?>
<?php endif; ?>

<?php if(isset($data['successrestore'])): ?>
	<script src="<?=ASSETS?>dist/js/custom-toastr.js"></script>
	<?php if($data['successrestore']): ?>
		<script>Swal.fire("Success!", "User has been successfully restored.", "success"); </script>
	<?php else: ?>
		<script>Swal.fire("Error", "Something went wrong while trying to restore this record", "error"); </script>
	<?php endif; ?>
<?php endif; ?>