<?php 
 $this->view("main_view", $data);
?>

	<div class="card bg-light-info shadow-none position-relative overflow-hidden">
		<div class="card-body px-4 py-3">
		  <div class="row align-items-center">
			<div class="col-9">
			  <h4 class="fw-semibold mb-8">Quiz</h4>
			  <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item">Quiz List</li>
			  </ol>
			</nav>
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
					    id="quiz_table"
                        class="table border table-bordered display text-nowrap"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
							<th>Course</th>
                            <th>Description</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
					  <?php foreach($data['quiz_list'] as $row): ?>

						  <tr>
                            <td><?=$row->name?></td>
							<td><?=$row->coursename?></td>
                            <td><?=$row->intro?></td>
                            
                            <td>
							<div class="maintenance-action-button">
							<a href="<?=ROOT?>quiz/<?=$row->id?>"
									type="button"
									class="justify-content-center w-100 btn mb-1 btn-rounded btn-light-primary text-primary font-medium align-items-center"
									>
									
									View
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
	  

