<div class="container-fluid">
  <div class="row">
    <div class="col-md2"></div>
    <div class="col-md8">

      <h3>Buku Tamu</h3>

      <form method="post" action="<?php echo base_url('dashboard/buku_tamu') ?>">
        

        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" placeholder="Nama Lengkap Anda" class="form-control">
        </div>

        <div class="form-group">
          <label>Alamat Lengkap</label>
          <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
        </div>

        <div class="form-group">
          <label>No Hp</label>
          <input type="text" name="no_hp" placeholder="No Hp Anda" class="form-control">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" placeholder="Email Anda" class="form-control">
        </div>

        <div class="form-group">
          <label>Komentar</label>
          <input type="text" name="komentar" placeholder="Tulis Komentar Anda" class="form-control">
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
      </form>

      <?php 
      } else 
      {
        echo "<h4>Anda Belum Menulis Komentar";
      } ?>
    </div>

    <div class="col-md2"></div>
  </div>
</div>