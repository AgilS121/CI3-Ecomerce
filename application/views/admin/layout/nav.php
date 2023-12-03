 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!-- menu dahsboard-->
            <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

            <!-- Menu produk -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-sitemap"></i> <span>PRODUK</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/produk')?>"><i class="fa fa-table"></i> Data Produk</a></li>
                <li><a href="<?php echo base_url('admin/produk/tambah')?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
                <li><a href="<?php echo base_url('admin/kategori')?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
              </ul>
            </li>

            <!-- Menu User -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-lock"></i> <span>Pengguna</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/user')?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
                <li><a href="<?php echo base_url('admin/user/tambah')?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
              </ul>
            </li>

             <!-- Menu konfigurasi -->
             <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Konfigurasi Website</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/konfigurasi')?>"><i class="fa fa-home"></i> Kofigurasi Umum</a></li>
                <li><a href="<?php echo base_url('admin/konfigurasi/logo')?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
                <li><a href="<?php echo base_url('admin/konfigurasi/icon')?>"><i class="fa fa-icon"></i> Konfigurasi icon</a></li>

              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?php echo $title ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body">