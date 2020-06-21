  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PENYAKIT DAN KATEGORI PENYAKIT DINAS KESEHATAN 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Penyakit</h3>
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
            </div>
            <div class="box-footer">
                <div class="col-sm-12" align="right">
                <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#tambah"> Tambah Data </button>
                </div>
            </div>
              <!-- /.box-footer -->
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">Kode DX</th>
                  <th >Kode ICDX</th>
                  <th >Nama Penyakit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php foreach ($penyakit as $peny) { ?>
                    <td><?= $peny->kode_dx?></td>
                    <td><?= $peny->kode_icdx?></td>
                    <td><?= $peny->nama_penyakit?></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Kategori Penyakit</h3>
            </div>
            <div class="box-footer">
                <div class="col-sm-12" align="right">
                <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kategori"> Tambah Data </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">Kode DX</th>
                  <th >Nama Kategori</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($kp as $key) { ?>
                <tr>
                    <td><?= $key->kode_dx?></td>
                    <td><?= $key->kategori_penyakit?></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          
          <!-- MODAL TAMBAH DATA -->
          <div  class="modal fade" id="tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Laporan Bulanan(LB1)</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('dinkes/tambahPenyakit'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode_dx" class="col-sm-2 control-label">Kode DX</label>
                        <div class="col-sm-9">
                            <input list="kode_dx" type="text" class="form-control" name="kode_dx" placeholder="Kode DX" required>
                            <datalist id="kode_dx">
                            <?php foreach ($kp as $dt) { ?>
                            <option value=<?php echo $dt->kode_dx ?>></option>
                            <?php } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode_icdx" class="col-sm-2 control-label">Kode ICDX</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="kode_icdx" id="kode_icdx" placeholder="Kode ICDX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_penyakit" class="col-sm-2 control-label">Nama Penyakit</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" placeholder="Nama Penyakit" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-dennger">Reset</button>
                      <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                    </div>
                </form>
                </div>
              </div>
            </div> 
            <!-- end modal -->

            <!-- MODAL TAMBAH KATEGORI-->
          <div  class="modal fade" id="kategori">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Laporan Bulanan(LB1)</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('dinkes/tambahKategori'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode_dx" class="col-sm-2 control-label">Kode DX</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="kode_dx" id="kode_dx" placeholder="Kode DX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori_penyakit" class="col-sm-2 control-label">Kategori Penyakit</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="kategori_penyakit" id="kategori_penyakit" placeholder="Kategori Penyakit" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-dennger">Reset</button>
                      <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                    </div>
                </form>
                </div>
              </div>
            </div> 
            <!-- end modal -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->