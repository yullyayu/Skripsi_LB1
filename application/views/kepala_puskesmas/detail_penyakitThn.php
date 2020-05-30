<div class="content-wrapper">
    <section class="content-header">
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
                <h1 class="box-title">Data Kumulatif 15 Besar Penyakit</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped"><br><br>
                <thead>
                <tr>
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">Diagnosa</th>
                  <th scoop="col" rowspan="2">Kode ICDX</th>
                  <th scoop="col" colspan="3">Januari</th>
                  <th scoop="col" colspan="3">Februari</th>
                  <th scoop="col" colspan="3">Maret</th>
                  <th scoop="col" colspan="3">April</th>
                  <th scoop="col" colspan="3">Mei</th>
                  <th scoop="col" colspan="3">Juni</th>
                  <th scoop="col" colspan="3">Juli</th>
                  <th scoop="col" colspan="3">Agustus</th>
                  <th scoop="col" colspan="3">September</th>
                  <th scoop="col" colspan="3">Oktober</th>
                  <th scoop="col" colspan="3">November</th>
                  <th scoop="col" colspan="3">Desember</th>
                  <th scoop="col" rowspan="2">Jumlah</th>
                </tr>
                <tr>
                  <?php for ($x=0; $x <12 ; $x++) { ?>
                    <th scope="col">L</th>
                    <th scope="col">P</th>
                    <th scope="col">Total</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $datalaporan = json_decode($status[0]->datalb1);
                $no =0; foreach ($datalaporan as $dp ): $no++; ?>
                  <tr class="odd gradeX">
                     <th scope="row"><?= $no ?></th>
                     <th scope="row"><?= $dp->nama_penyakit?></th>
                     <th scope="row"><?= $dp->kode_icdx?></th>
                     <?php 
                     $total = 0 ;
                     $jumlah = 0;
                     if(count($dp->pasien) == 0) {
                       for ($x=0; $x<12 ; $x++) {  ?>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                     <?php  }
                     } else {
                       foreach ($dp->pasien as $pas) { 
                         $total = $pas->Laki + $pas->Perempuan ;
                         $jumlah += $total ;?>
                        <td><?= $pas->Laki ?></td>
                        <td><?= $pas->Perempuan?></td>
                        <td><?= $total ?></td>
                     <?php  }
                     } ?>
                     <td><?= $jumlah ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
                <!-- kirim -->
                <div class="form-group"><br>
                  <div class="col-sm-12" align="right">
                  <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Setuju </button>
                  <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#catatan"> Catatan </button>
                  </div>
                </div><br><br>
              <!-- end-kirim -->

              <!-- MODAL KIRIM LAPORAN -->
              <div class="modal fade" id="kirim">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Kirim Laporan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('kepala_puskesmas/accLB1/'. $status[0]->id_laporan); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="" name="tanggal" class="form-control" value="<?php echo $status[0]->tanggal?>">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="jenis_laporan" class="col-sm-2 control-label">Jenis Laporan</label>
                      <div class="col-sm-10">
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" value="<?php echo $status[0]->jenis_laporan?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" value="<?php echo $status[0]->nama_puskesmas?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="acc">Setuju</button>                     
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
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
  