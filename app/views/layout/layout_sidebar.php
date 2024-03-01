      <!-- Sidebar Start -->
      
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="course.php" class="text-nowrap logo-img">
				<span class="sidebar-header">
					<img src="<?=ASSETS?>logo.png" height="38px" width="40px"> 
					
					<h4 class="display-10" style="margin: 10px; padding-left: 10px;" >&nbsp;&nbsp;<?=WEBSITE_TITLE?></h4>
				</span>
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8 text-muted"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
              <!-- ============================= -->
              <!-- Dashboard -->
              <!-- ============================= -->
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
			  
			  <li class="sidebar-item  <?php echo $data['page_title'] == "Courses" ? 'selected' : ''?>">
                <a class="sidebar-link" href="<?=ROOT?>course" aria-expanded="false">
                  <span>
                    <i class="ti ti-book"></i>
                  </span>
                  <span class="hide-menu">Courses</span>
                </a>
              </li>
			  <li class="sidebar-item  <?php echo $data['page_title'] == "Quizes" ? 'selected' : ''?>">
                <a class="sidebar-link" href="<?=ROOT?>quiz" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-pencil"></i>
                  </span>
                  <span class="hide-menu">Quizes</span>
                </a>
              </li>
			  <li class="sidebar-item  <?php echo $data['page_title'] == "Students" ? 'selected' : ''?>">
                <a class="sidebar-link" href="<?=ROOT?>student" aria-expanded="false">
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                  <span class="hide-menu">Students</span>
                </a>
              </li>
              <!-- <li class="sidebar-item <?php echo $data['page_title'] == "Exam" ? 'selected' : ''  ?>">
                <a class="sidebar-link" href="<?=ROOT?>test" aria-expanded="false">
                  <span>
                    <i class="ti ti-settings-2"></i>
                  </span>
                  <span class="hide-menu">Exam</span>
                </a>
              </li> -->
			  <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Maintenance</span>
              </li>
			  <li class="sidebar-item <?php echo $data['page_title'] == "User" ? 'selected' : ''  ?>">
                <a class="sidebar-link" href="<?=ROOT?>maintenance/user" aria-expanded="false">
                  <span>
                    <i class="ti ti-settings-2"></i>
                  </span>
                  <span class="hide-menu">Users</span>
                </a>
              </li>
			  <li class="sidebar-item <?php echo $data['page_title'] == "Course Categories" ? 'selected' : ''  ?>">
                <a class="sidebar-link" href="<?=ROOT?>maintenance/course_categories" aria-expanded="false">
                  <span>
                    <i class="ti ti-settings-2"></i>
                  </span>
                  <span class="hide-menu">Course Categories</span>
                </a>
              </li>
              
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      
      <!-- Sidebar End -->
      
