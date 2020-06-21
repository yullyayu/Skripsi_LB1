  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Puskesmas Kota Malang
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
              <h3 class="box-title">Data Tabel Puskesmas</h3>
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
              <?php }elseif ($this->session->flashdata('update')) { ?>
                <div class="alert alert-success" role="alert">
                  <strong><?=$this->session->flashdata('update');?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php }?>
            </div>
            <!-- /.box-header -->
            <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#tambah"> Tambah Data </button>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">Kode</th>
                  <th scoop="col" rowspan="2">Nama Puskesmas</th>
                  <th scoop="col" rowspan="2">Kecamatan</th>
                  <th scoop="col" rowspan="2">Kota</th>
                  <th scoop="col" colspan="2">Action</th>
                </tr>
                <tr>
                  <th scope="col">Edit</th>
                  <th scope="col">Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no =0; foreach ($puskesmas as $p ){ $no++?>
                    <tr class="odd gradeX">
                      <th scope="row"><?php echo $no?></th>
                      <th scope="row"><?php echo $p->kd_puskesmas?></th>
                      <th scope="row"><?php echo $p->nama_puskesmas?></th>
                      <th scope="row"><?php echo $p->kecamatan?></th>
                      <th scope="row"><?php echo $p->kota ?></th>
                      <td><a class='btn btn-info btn-xs' href="<?php echo site_url('dinkes/tampilEdit/'. $p->kd_puskesmas);?>"><span class="fa fa-pencil" ></span></a></td>
                      <td><a class='btn btn-danger btn-xs' href="" data-toggle="modal" data-target="#hapus<?= $p->kd_puskesmas ?>"><span class="fa fa-trash-o"></span></a></td>
                    </tr>
                    <!-- MODAL Hapus Data -->
                    <div class="modal fade" id="hapus<?= $p->kd_puskesmas ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Hapus Data Puskesmas</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo site_url('dinkes/hapus_Puskesmas/'.$p->kd_puskesmas) ?>" method="post">
                            <div class="modal-body">
                              <p>Anda Yakin Hapus?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" name="kirim">Hapus</button>                      
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- end modal -->
                    <?php }?>
            </tbody>
          </table>
          </div>

            <!-- modal tambah data -->
            <div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Puskesmas</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('dinkes/addPuskesmas'); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="kd_puskesmas" class="col-sm-2 control-label">Kode</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="kd_puskesmas" id="kd_puskesmas" placeholder="Kode Puskesmas" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Nama Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Nama Puskesmas" required>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kota" class="col-sm-2 control-label">Kota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" required>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->