<?php 
 $this->view("main_view", $data);
?>

	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
		<div class="card-body px-4 py-3">
		  <div class="row align-items-center">
			<div class="col-9">
			  <h4 class="fw-semibold mb-8">Students</h4>
			  
			</div>
			<div class="col-3">
			  <div class="text-center mb-n5">  
				<img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<section class="datatables">
	<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
					  <table
					    id="student_table"
                        class="table border table-bordered display text-nowrap"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
					  <?php foreach($data['student_list'] as $row): ?>

						  <tr>
                            <td><?=$row->firstname?> <?=$row->lastname?></td>
                            <td><?=$row->email?></td>
                            
                            <td>
							<div class="maintenance-action-button">
							<a href="<?=ROOT?>student/edit/<?=$row->id?>"
									type="button"
									class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-primary text-primary font-medium align-items-center"
									>
									<i class="ti ti-edit"></i>
									Edit Details/Courses
									</a>
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
	  

