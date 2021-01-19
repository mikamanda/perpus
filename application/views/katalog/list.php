

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8">

      <div class="panel panel-default">
          <div class="panel-body">  
          <h2><i class="fa fa-search"></i> Pencarian Buku</h2><br>

          <p class="alert alert-success">
            <i class="glyphicon glyphicon-warning-sign"></i> Ketik kata kunci (judul buku)
          </p>

          <form action="<?php echo base_url('katalog') ?>" method="post" class="form-inline text-center">
            <input type="text" name="cari" class="form-control" placeholder="Kata kunci" required>
            <input type="submit" name="submit" class="btn btn-success" value="Cari Buku">
          </form>
        </div>
      </div>

      
    </div>

        <div class="col-lg-4">
          <div class="panel panel-default">
          <div class="panel-body">  
          <h2>Buku Baru</h2>
          <br>
          <?php $a=1; foreach($buku as $buku) { ?>
          <!-- Buku 1 <?php echo $a ?> -->
          <div class="row buku">
            <div class="col-md-4">
              <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"> 
              <img class="img-thumbnail img-rounded" src="<?php if($buku->cover_buku=="") { echo base_url('assets/perpus/image/gambar.jpeg'); }else{ echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku); } ?>" alt="<?php echo $buku->judul_buku ?>">
              </a>
            </div>
            <div class="col-md-8">
              <h4><a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a></h4>
              <p class="bukubaru"><?php echo character_limiter($buku->ringkasan,60) ?></p>
            </div>
            <div class="clearfix"></div>
            <hr>
          </div>
          <!-- End buku <?php echo $a ?> -->

          <?php $a++; } ?>
          <p>
          <a href="<?php echo base_url('katalog') ?>" class="btn btn-primary btn-block">
          <i class="glyphicon glyphicon-book"></i> Lihat semua koleksi</a>
          </p>
          
        </div>
      </div>

    </div>
  </div>
