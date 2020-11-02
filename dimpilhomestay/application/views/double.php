<div class="container-fluid">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="<?php echo base_url('assets/img/slider.jpg') ?>" class="d-block w-100" >
	    </div>
	    <div class="carousel-item">
	      <img src="<?php echo base_url('assets/img/sliderdua.jpg') ?>" class="d-block w-100" >
	    </div>
	    
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<div class="row text-center mt-4">
		
		<?php foreach ($double as $a) : ?>

			<div class="card ml-3" style="width: 16rem;">
			  <img src="<?php echo base_url().'/uploads/'.$a->gambar_kamar ?>" class="card-img-top">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $a->nama_kamar ?></h5>
			    <small><?php echo $a->keterangan ?></small><br>
			    <span class="badge badge-success">Rp. <?php echo number_format($a->harga, 0,',','.') ?></span><br>
			    <?php echo anchor('dashboard/booking/'.$a->id, '<div class="btn btn-sm btn-primary">Booking</div>') ?>
			    <?php echo anchor('dashboard/detail/'.$a->id, '<div class="btn btn-sm btn-success">Detail</div>') ?>
			  </div>
			</div>

		<?php endforeach; ?>
	</div>
</div>