<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo site_url('data_penyakit/dataPeny_kpl') ?>">Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('data_penyakit/dataPenyThn_kpl') ?>">Kumulatif</a></li>
      </ul>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
              <?php if ($peny_tahun == null) { ?>
                <h1 class="box-title">Data Kumulatif 15 Besar Penyakit</h1>
              <?php }else { 
                    foreach ($peny_tahun as $lb) {
                      $tahun = date('Y', strtotime($lb->tanggal));
                    }?>
                <h3 class="box-title" >Data Kumulatif 15 Besar Penyakit Tahun <?php echo $tahun ?> </h3>
              <?php } ?> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form class="form-horizontal" method="POST" action="<?php echo site_url('data_penyakit/filterTahun'); ?>">
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
                  </div>
                  <div class="box-footer">
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
                <?php if ($peny_tahun == null){ ?>
                  <div class="alert alert-danger" role="alert">
                    <strong><?=$this->session->flashdata('flash');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php }else { 
                $datalaporan = json_decode($peny_tahun[0]->datalb1);
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
                <?php } ?>
                </tbody>
              </table>
               <!-- kirim -->
               <div class="form-group"><br>
                  <div class="col-sm-12" align="right">
                  <button type="submit" id="btn-filter" class="btn btn-primary" data-toggle="modal" data-target="#cetak"><span class="fa fa-print"></span>  Cetak Excel</button>
                  </div>
              </div><br><br>
              <!-- end-kirim -->
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