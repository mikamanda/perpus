<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">
    <!-- Dasbor !-->
    <li><a  href="<?php echo base_url('anggota/dasbor') ?>"><i class="fa fa-dashboard"></i> 
    Dashboard</a></li>

    <!-- Peminjaman Buku !-->
    <!-- <li><a href="#"><i class="fa fa-eye"></i> Lihat Buku</a>    
    </li>  -->

    <!-- Peminjaman Buku !-->
    <li><a href="<?php echo base_url('anggota/peminjaman/add/'.$id_anggota) ?>"><i class="fa fa-book"></i> Pemesanan Buku</a>    
    </li>   

    <!-- Setting !-->
    <li><a href="<?php echo base_url('anggota/pengaturan') ?>"><i class="fa fa-cog"></i> Pengaturan</a>       
    </li>   
	
</ul>

</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2><?php echo $title ?></h2>   
</div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
<div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-default">
<div class="panel-heading">
<?php echo $title ?>
</div>
<div class="panel-body">
<div class="table-responsive">