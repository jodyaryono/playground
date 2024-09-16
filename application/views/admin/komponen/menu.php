 <!-- Divider -->
 <hr class="sidebar-divider my-0">

 <!-- Nav Item - Dashboard -->
 <li class="nav-item active">
     <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>DASHBOARD</span></a>
 </li>

 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">
     INTERFACE
 </div>

 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item">
     <a class="nav-link" href="<?php echo base_url(); ?>kategori">
         <i class=" fas fa-fw fa-cog"></i>
         <span>Kategori</span></a>
 </li>

 <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="arsipDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-fw fa-archive"></i>
         <span>Sistem Arsip</span>
     </a>

     <div class="dropdown-menu" aria-labelledby="arsipDropdown">
         <a class="dropdown-item" href="<?php echo base_url(); ?>jenis_arsip">
             <i class="fas fa-envelope"></i> Jenis Arsip
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>arsip">
             <i class="fas fa-file"></i> Arsip
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>laporan">
             <i class="fas fa-folder"></i> Laporan
         </a>
     </div>
 </li>
 <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="kasirDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-fw fa-cash-register"></i>
         <span>Sistem Order</span>
     </a>

     <div class="dropdown-menu" aria-labelledby="kasirDropdown">
         <a class="dropdown-item" href="<?php echo base_url(); ?>produk">
             <i class="fas fa-box"></i> Produk
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>orders">
             <i class="fas fa-receipt"></i> Order
         </a>
     </div>
 </li>

 <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-fw fa-users"></i>
         <span>Users & Menu</span>
     </a>

     <div class="dropdown-menu" aria-labelledby="usersDropdown">
         <a class="dropdown-item" href="<?php echo base_url(); ?>users">
             <i class="fas fa-user"></i> Users
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>roles">
             <i class="fas fa-user-tag"></i> Roles
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>menus">
             <i class="fas fa-list"></i> Menu
         </a>
         <a class="dropdown-item" href="<?php echo base_url(); ?>users_management">
             <i class="fas fa-user-cog"></i> User Management
         </a>
     </div>
 </li>


 <li class="nav-item">
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </li>
 </ul>
 <!-- End of Sidebar -->