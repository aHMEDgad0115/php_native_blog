
<div class="container-fluid">
  <div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo aurl('categories'); ?>">
              <i class="fa-solid fa-list"></i>
              <?php echo trans('admin.categories'); ?>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo aurl('news'); ?>">
              <i class="fa-solid fa-newspaper"></i>  
              <?php echo trans('admin.news'); ?>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo aurl('users'); ?>">
              <i class="fa-solid fa-user-group"></i>  
              <?php echo trans('admin.users'); ?>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo aurl('comments'); ?>">
              <i class="fa-solid fa-comment-dots"></i>  
              <?php echo trans('admin.comments'); ?>
              </a>
            </li>
           
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                <i class="fa-solid fa-gear"></i>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?php echo url('admin/logout'); ?>">
              <i class="fa-solid fa-right-to-bracket"></i>
              <?php echo trans('admin.logout'); ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>