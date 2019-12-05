<header class="topbar">
   <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header">
         <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
         </a>
         <div class="navbar-brand">
            <a href="index.html" class="logo">
               <b class="logo-icon">
                  <img src="<?php echo base_url() ?>ebdesk.svg" alt="homepage" class="light-logo" style="height: 30px;" />
               </b>
               <span class="logo-text">
                  <span class="light-logo" alt="homepage" style="color: #fff;font-weight: bold;font-size: 16px;letter-spacing: 0.5px;">
                     CAREER
                  </span>
               </span>
            </a>
         </div>
         <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
         </a>
      </div>
      <?php if($this->session->userdata('loginsession')) { ?>
      <div class="navbar-collapse collapse" id="navbarSupportedContent">
         <ul class="navbar-nav float-left mr-auto"></ul>
            <ul class="navbar-nav float-right">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="m-l-5 font-medium d-none d-sm-inline-block"><?php echo $applicant_detail['fullname'] ?> <i class="mdi mdi-chevron-down"></i></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right user-dd">
                     <div class="d-flex no-block align-items-center bg-default text-white p-10">
                        <div class="m-l-10">
                           <h6 class="m-b-0 font-weight-bold"><?php echo $applicant_detail['fullname'] ?></h6>
                           <small class="text-muted">Sebagai Pelamar</small>
                        </div>
                     </div>
                     <a class="dropdown-item" href="<?php echo site_url() ?>applicant">
                        <i class="fas fa-flag m-r-5 m-l-5"></i> Status
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?php echo site_url() ?>profile">
                        <i class="ti-user m-r-5 m-l-5"></i> Biodata
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?php echo site_url() ?>print" target="_blank">
                        <i class="fas fa-file m-r-5 m-l-5"></i> Cetak CV
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?php echo site_url() ?>logout">
                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                     </a>
                  </div>
               </li>
            </ul>
      </div>
      <?php }else{ ?>
       <div class="navbar-collapse collapse" id="navbarSupportedContent">
         <ul class="navbar-nav float-left mr-auto"></ul>
         <ul class="navbar-nav float-right">
            <li class="nav-item">
               <a class="nav-link waves-effect waves-dark" href="" data-toggle="modal" data-target="#modal-login">
                  <span class="m-l-5 font-medium d-none d-sm-inline-block"><i class="fas fa-sign-in-alt"></i> Login Disini</span>
               </a>
            </li>
         </ul>
      </div>
      <?php } ?>
    </nav>
</header>