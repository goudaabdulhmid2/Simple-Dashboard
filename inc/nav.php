
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo ROOT_URL.'admin/index.php';?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cities
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo ROOT_URL.'admin/cities/add.php';?>">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo ROOT_URL.'admin/cities/index.php';?>">Viwe all</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo ROOT_URL.'admin/services/add.php';?>">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo ROOT_URL.'admin/services/index.php';?>">View All</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Orders
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  href="<?php echo ROOT_URL.'admin/orders/index.php';?>">View All</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Admins
          </a>
          <ul class="dropdown-menu">
           <li><a class="dropdown-item"  href="<?php echo ROOT_URL.'admin/adminOpration/add.php';?>">Add</a></li>
            <li><a class="dropdown-item"  href="<?php echo ROOT_URL.'admin/adminOpration/index.php';?>">View All</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo ROOT_URL.'admin/logout.php';?>">Log out</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>