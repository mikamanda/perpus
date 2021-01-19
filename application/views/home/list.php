<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

<?php $i=1; foreach($slider as $slider) { ?>

        <div class="item <?php if($i==1) { echo "active"; } ?>">
          <img class="first-slide" src="<?php echo base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?php echo $slider->judul_berita ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $slider->judul_berita ?></h1>
              <p><?php echo character_limiter($slider->isi,100) ?></p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url('berita/read/'.$slider->slug_berita) ?>" role="button">Baca selengkapnya</a></p>
            </div>
          </div>
        </div>

<?php $i++; } ?>
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8">
          <div class="panel panel-default">
          <div class="panel-body">  
            <div class="row">
              <div class="col-md-4">
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar)?>" class="img img-responsive img-thumbnail">
              </div>
            <div class="col-md-8 posting">
              <h2><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" style="text-decoration: none;"><?php echo $berita->judul_berita ?></a></h2>
              <p><?php echo character_limiter($berita->isi,250) ?></p>
              <p class="text-right"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-primary btn-sm">Baca Selengkapnya...</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
				<div class="panel-body">  
					<h2><i class="glyphicon glyphicon-search"></i> Pencarian Buku</h2><br>

					<p class="alert alert-success">
						<i class="glyphicon glyphicon-warning-sign"></i> Ketik kata kunci
					</p>

					<form action="<?php echo base_url('katalog') ?>" method="post" class="form-inline text-center">
						<input type="text" name="cari" class="form-control" placeholder="Kata kunci" required>
						<input type="submit" name="submit" class="btn btn-success" value="Cari Buku">
					</form>
        </div>
      </div>

		
		<!-- 	<div class="panel panel-default">
				<div class="panel-body">  
					<h2><i class="glyphicon glyphicon-search"></i> Pencarian Buku Berdasarkan Bahasa</h2><br>

					<form action="<?php echo base_url('katalog/caribahasa') ?>" method="post" class="form-inline text-center">
						<select name="bahasa" class="form-control" required>
							<option value="">silahkan pilih Bahasa</option>
							<?php foreach($bahasa as $bahasa) : ?>
									<option value="<?= $bahasa->id_bahasa ?>"><?= $bahasa->nama_bahasa ?></option>
							<?php endforeach ?>
						</select>
						<input type="submit" name="submit" class="btn btn-success" value="Cari Buku">
					</form>
        </div>
      </div> -->

      <div class="panel panel-default">
          <div class="panel-body">  
          <h2><i class="fa fa-link"></i> Link Perpustakaan</h2>
          <ul style="padding-left: 0;">

            <?php foreach($link as $link) { ?>

            <p><li style="list-style-type: none;"><a href="<?php echo $link->url ?>" title="<?php echo $link->nama_link ?>" style="text-decoration: none;"  target="<?php echo $link->target ?>"><i class="fa fa-chevron-right"></i>
              <?php echo $link->nama_link ?>
            </a></li></p>

            <?php } ?>

          </ul>
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
              <h4><a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>" style="text-decoration: none;"><?php echo $buku->judul_buku ?></a></h4>
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
      <!-- berdasarkan jenis -->
      <div class="panel panel-default">
        <div class="panel-body">  
          <h2>Kategori Buku</h2><br>
          <div class="row">
          <div class="col-md-12">  
          <form action="<?php echo base_url('katalog/carijenis') ?>" method="post">

            <select name="jenis" class="form-control" required>
             <!--  <option value="">Cari Buku Berdasarkan Jenis</option> -->
              <?php foreach($jenis as $jenis) : ?>
                  <option value="<?= $jenis->id_jenis ?>"><?= $jenis->nama_jenis ?></option>
              <?php endforeach ?>
            </select><br>
            <div class="text-right">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Lihat Buku...">
          </div>
          </form>
        </div>
      </div>

        </div>
      </div>

    </div>
  </div>