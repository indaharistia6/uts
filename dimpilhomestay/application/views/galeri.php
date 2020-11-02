<div class="container-fluid">
	<div class="row text-center mt-4">
		
		<?php foreach ($galeri as $g) : ?>

			<div class="card ml-3" style="width: 16rem;">
			  <img src="<?php echo base_url().'/uploads/'.$g->gambar_galeri ?>" class="card-img-top">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $g->judul ?></h5>
			    <small><?php echo $g->deskripsi ?></small><br><br>
			    <?php echo anchor('dashboard/detail_galeri/'.$g->id_galeri, '<div class="btn btn-sm btn-success">Detail</div>') ?>
			  </div>
			</div>

		<?php endforeach; ?>
	</div>
</div>