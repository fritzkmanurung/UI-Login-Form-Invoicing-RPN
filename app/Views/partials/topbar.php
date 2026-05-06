<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <button class="navbar-toggler navbar-toggler-left d-lg-none align-self-center" type="button" data-toggle="offcanvas" style="position: absolute; left: 10px; color: #4b49ac;">
      <i class="ti-menu" style="font-size: 20px;"></i>
    </button>
    <a class="navbar-brand brand-logo mr-5" href="<?= base_url('/dashboard'); ?>">
      <img src="<?= base_url('images/RPN 1.png'); ?>" class="mr-2" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="<?= base_url('/dashboard'); ?>">
      <img src="<?= base_url('images/RPN 1.png'); ?>" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-block" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="<?= base_url('images/User.jpeg'); ?>" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown custom-profile-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item py-2" href="<?= base_url('login'); ?>">
            <i class="ti-power-off text-primary"></i>
            Keluar
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>
