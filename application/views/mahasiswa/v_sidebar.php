<body id="page-top">
 
  <!-- Page Wrapper -->
  <div id="wrapper">
 
    <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          
        </div>
        <div class="sidebar-brand-text mx-1">TUKIRKU</div>
      </a>
 
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
 
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fa-solid fa-gauge-simple"></i>
          <span>DASHBOARD</span></a>
      </li>
 
      
           <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-university"></i>
          <span>PENGAJUAN</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilihan anda :</h6>
            <a class="collapse-item" href="<?php echo base_url('mahasiswa/inputproposal') ?>">PROPOSAL</a>
            <a class="collapse-item" href="<?php echo base_url('Dashboard/draftlaporan') ?>"> DRAFT LAPORAN </a>
            <a class="collapse-item" href="<?php echo base_url('Dashboard/dokumenakhir') ?>">DOKUMEN AKHIR</a>
            
          </div>
        </div>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('mahasiswa/indexbimbingan') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span> BIMBINGAN </span>
        </a>
      </li>
 
 
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilihan anda:</h6>
            <a class="collapse-item" href="<?php echo base_url('administrator/profil') ?>">Profil</a>
            
          </div>
        </div>
      </li>
 
      <!-- Nav Item - Pages Collapse Menu -->
    
         
 
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
     
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
 
    </ul>
    <!-- End of Sidebar -->
 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
 
      <!-- Main Content -->
      <div id="content">
 
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow bg-gradient-primary">
        </nav>