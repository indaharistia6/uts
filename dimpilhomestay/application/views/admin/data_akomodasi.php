<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_akomodasi"><i class="fas fa-plus fa-sm"></i>Tambah Akomodasi</button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA KAMAR</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php 
		$no=1;
		foreach($akomodasi as $a) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $a->nama_kamar ?></td>
				<td><?php echo $a->keterangan ?></td>
				<td><?php echo $a->kategori ?></td>
				<td><?php echo $a->harga ?></td>
				<td><?php echo $a->stok ?></td>
				<td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
				<td><?php echo anchor('admin/data_akomodasi/edit/' .$a->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td onclick="javascript: return confirm('Anda yakin hapus?')" class="text-center"><?php echo anchor('admin/data_akomodasi/hapus/' .$a->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>

	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_akomodasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT KAMAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_akomodasi/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

        	<div class="form-group">
        		<label>Nama Kamar</label>
        		<input type="text" name="nama_kamar" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
            <option>Double</option>
            <option>Deluxe</option>  
            </select>
        	</div>
        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Gambar Kamar</label><br>
        		<input type="file" name="gambar_kamar" class="form-control">
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