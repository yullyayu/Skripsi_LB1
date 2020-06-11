<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Register Rekam Medis 
      </h1>
      <?php if ($this->session->flashdata('flash')){ ?>
        <div class="alert alert-danger" role="alert">
          <strong><?=$this->session->flashdata('flash');?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } elseif ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" role="alert">
          <strong><?=$this->session->flashdata('success');?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php }?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Rekam Medis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          </div>
            <form class="form-horizontal" action="<?php echo site_url('rekam_medis/formRegister'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="noreg" class="col-sm-2 control-label">No Register</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_register" placeholder="No Register">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="tanggal">Tanggal</label>
                    <div class="col-sm-10">
                      <div class="input-prepend">
                        <input type="date" placeholder="" name="tanggal" class="button" required><button for="tanggal" class="fa fa-calendar"></button>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Pasien">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="umur" class="col-sm-2 control-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="umur" placeholder="Umur">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jenis_umur" class="col-sm-2 control-label">Jenis Umur</label>
                      <div class="col-sm-10">
                        <input list="jenis_umur" type="text" class="form-control" name="jenis_umur" placeholder="Jenis Umur" required>
                          <datalist id="jenis_umur">
                          <option value="Tahun"></option>
                          <option value="Hari"></option>
                          </datalist>
                      </div>
                  </div>
                <div class="form-group">
                  <label for="jeniskelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input list="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" required>
                    <datalist id="jenis_kelamin">
                    <option value="Laki-laki"></option>
                    <option value="Perempuan"></option>
                    </datalist>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jenispekerjaan" class="col-sm-2 control-label">Jenis Pekerjaan</label>
                  <div class="col-sm-10">
                    <input list="jenis_pekerjaan" type="text" class="form-control" name="jenis_pekerjaan" placeholder="Jenis Pekerjaan" required>
                    <datalist id="jenis_pekerjaan">
                    <option value="Formal"></option>
                    <option value="Informal"></option>
                    </datalist>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kdpenyakit" class="col-sm-2 control-label">Kode Penyakit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode_penyakit" placeholder="Kode Penyakit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="terapi" class="col-sm-2 control-label">Terapi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="terapi" placeholder="Terapi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nobpjs" class="col-sm-2 control-label">No. BPJS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_bpjs" placeholder="Np. BPJS">
                  </div>
                </div>
                <div class="form-group">
                  <label for="dlmwilayah" class="col-sm-2 control-label">Dalam Wilayah</label>
                  <div class="col-sm-10">
                    <input list="dalamWilayah" type="text" id ="txt" onkeyup="manage(this)" class="form-control" name="dalam_wilayah" placeholder="Dalam Wilayah" required>
                    <datalist id="dalamWilayah" >
                    <option value="Baru">Baru</option>
                    <option value="Lama">Lama</option>
                    <option value="KKL">KKL</option>
                    </datalist>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dlmwilayah" class="col-sm-2 control-label">Luar Wilayah</label>
                  <div class="col-sm-10">
                    <input list="luarWilayah" type="text" id ="btSubmit" onkeyup="manag(this)" class="form-control" name="luar_wilayah" placeholder="Luar Wilayah" required>
                    <datalist type="lb" id="luarWilayah">
                    <option value="Baru">Baru</option>
                    <option value="Lama">Lama</option>
                    <option value="KKL">KKL</option>
                    </datalist>
                  </div>
                </div>
              </div>
              <script>
                  function manage(txt){
                    var bt = document.getElementById('btSubmit');
                    if (txt.value == 'Baru' ){
                      bt.disabled = true;
                    }else if (txt.value == 'Lama') {
                      bt.disabled = true;
                    }else if(txt.value == 'KKL'){
                      bt.disabled = true;
                    }else{
                      bt.disabled = false ;
                    }
                  }
                </script>

                <script>
                  function manag(btSubmit){
                    var dw = document.getElementById('txt');
                    if (btSubmit.value == 'Baru' ){
                      dw.disabled = true;
                    }else if (btSubmit.value == 'Lama') {
                      dw.disabled = true;
                    }else if(btSubmit.value == 'KKL'){
                      dw.disabled = true;
                    }else{
                      dw.disabled = false ;
                    }
                  }
                </script>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

