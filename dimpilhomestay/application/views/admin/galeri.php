<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_galeri"><i class="fas fa-plus fa-sm"></i>Tambah Galeri</button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>JUDUL</th>
			<th>DESKRIPSI</th>
      <th>TANGGAL</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;
		foreach($galeri as $g) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $g->judul ?></td>
				<td><?php echo $g->deskripsi ?></td>
				<td><?php echo $g->tanggal ?></td>
				<td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
				<td><?php echo anchor('admin/galeri/edit/' .$g->id_galeri, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td onclick="javascript: return confirm('Anda yakin hapus?')" class="text-center"><?php echo anchor('admin/galeri/hapus/' .$g->id_galeri, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>

	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_galeri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT GALERI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/galeri/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

        	<div class="form-group">
        		<label>Judul</label>
        		<input type="text" name="judul" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>deskripsi</label>
        		<input type="text" name="deskripsi" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Tanggal</label>
        		<input type="date" name="tanggal" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Gambar Galeri</label><br>
        		<input type="file" name="gambar_galeri" class="form-control">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>