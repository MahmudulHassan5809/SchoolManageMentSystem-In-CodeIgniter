
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo site_url();?>">College Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url();?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if ($this->session->userdata('logged_in') === true): ?>
            	<a class="dropdown-item" href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a>
            	<a class="dropdown-item" href="<?php echo site_url('admin/logout') ?>">Logout</a>
            <?php else: ?>
            	<a class="dropdown-item" href="<?php echo site_url('admin/loginView') ?>">Login</a>
            	<a class="dropdown-item" href="<?php echo site_url('admin/registerView') ?>">Register</a>
            <?php endif ?>
          </div>
        </li>
      </div>
      </ul>
    </div>
  </nav>


