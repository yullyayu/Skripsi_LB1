<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo site_url('data_penyakit/getJum_Penyakit') ?>">Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('data_penyakit/getRekap_Penyakit') ?>">Kumulatif</a></li>
     </ul>
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
            <form class="form-horizontal" method="POST" action="<?php echo site_url('data_penyakit/getRekap_Penyakit'); ?>">
                  <div class="form-group"><br>
                    <label class="col-sm-1 control-label" for="exampleFormControlSelect1">Tahun</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="tahun" id="exampleFormControlSelect1">
                      <?php for($i=2020 ; $i<=2029;$i++){
                      if($i == $year){?>
                      <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>selected=""><?php echo $i?></option>
                      <?php   } else{?>
                      <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>><?php echo $i?></option>
                      <?php   }} ?>
                      </select>
                      </div>
                  </div><br><br>
                  <div class="box-footer"><br>
                    <div class="col-sm-12" align="right">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filter</button>
                    </div>
                  </div>
              </form>
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
                <?php $no =0; foreach ($data as $dp ): $no++; ?>
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
                         $jumlah += $total ; ?>
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
                  <button type="submit" id="btn-filter" class="btn btn-primary" data-toggle="modal" data-target="#cetak"><span class="fa fa-print"></span>  Cetak Excel</button>
                  <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Kirim Laporan </button>
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
                      <h4 class="modal-title">Kirim Laporan 15 Besar Penyakit</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('data_penyakit/sendKP'); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                        <div class="col-sm-10">
                          <div class="input-prepend">
                            <input type="date" placeholder="" name="tanggal" class="button" required><button for="tanggal" class="fa fa-calendar"></button>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="jenis_laporan" class="col-sm-2 control-label">Jenis Laporan</label>
                      <div class="col-sm-10">
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" placeholder="Jenis Laporan" required>
                          <datalist id="jenis_laporan"> 
                          <option value="Laporan 15 Penyakit Terbanyak Bulanan"></option>
                          <option value="Laporan 15 Penyakit Terbanyak Tribulan"></option>
                          <option value="Laporan 15 Penyakit Terbanyak Tahunan"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Puskesmas" value="Dinoyo">
                        </div>
                    </div>
                    <textarea name="datalb1" style="display:none"><?php echo json_encode($data)?></textarea>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="kirim">Send Kepala Puskesmas</button>                      
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
              <!-- MODAL CETAK LAPORAN -->
              <div class="modal fade" id="cetak">
                <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Cetak 15 Besar Penyakit</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('export_excel/cetakPenyThn'); ?>" method="post">
                  <div class="box-body">
                <div class="form-group">
                <label class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tahun" id="tahun">
                    <?php for($i=2019 ; $i<=2029;$i++){
                    if($i == $tahun){?>
                    <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>selected=""><?php echo $i?></option>
                    <?php   } else{?>
                    <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>><?php echo $i?></option>
                    <?php   }} ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-12" align="right">
              <button type="submit" id="btn-filter" class="btn btn-primary" name="cetak"><span class="fa fa-print"></span>  Cetak Excel</button>
              </div>
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
  