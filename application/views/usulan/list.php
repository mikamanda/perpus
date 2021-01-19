<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">  
	<h2><i class="fa fa-send"></i> <?php echo $title ?></h2>

    <br>

    <?php if($this->session->flashdata('sukses')) { ?>

    <div class="alert alert-success text-center">
        <?php echo $this->session->flashdata('sukses'); ?>
    </div>    

    <?php }else{ ?>    

	<p class="alert alert-success">Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. Silahkan isi data-data Anda dengan lengkap dan benar!</p>

    <?php 
    // Echo validation error
    echo validation_errors('<div class="alert alert-warning">','</div>');

    // Buka form
    echo form_open(base_url('usulan'));
    ?>

    <div class="form-group">
        <div class="col-md-2">Judul buku baru<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <input type="text" name="judul" class="form-control" placeholder="Judul buku baru" value="<?php echo set_value('judul') ?>" required>
        </div>
    </div>
    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2">Nama penulis buku<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis Buku" value="<?php echo set_value('penulis') ?>" required>
        </div>
    </div>

    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2">Penerbit buku<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" value="<?php echo set_value('penerbit') ?>" required>
        </div>
    </div>

    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2">Keterangan<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
        </div>
    </div>

    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2">Nama pengusul<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama Pengusul" value="<?php echo set_value('nama_pengusul') ?>" required>
        </div>
    </div>

    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2">Email pengusul<span class="text-danger">*</span></div>
        <div class="col-md-10 text-left">
            <input type="email" name="email_pengusul" class="form-control" placeholder="Email Pengusul" value="<?php echo set_value('email_pengusul') ?>" required>
        </div>
    </div>

    <div class="col-md-12"><hr></div>
    <div class="form-group">
        <div class="col-md-2"><span class="text-danger"></span></div>
        <div class="col-md-10 text-left">
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim Usulan">
            <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
        </div>
    </div>


    <?php 
    // Form close
    echo form_close();

      } // End if flashdata
    ?>

</div>
</div>

</div>
</div>
