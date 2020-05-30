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
                <h1 class="box-title">15 Besar Penyakit Puskesmas Dinoyo</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <form class="form-horizontal" action="<?php echo site_url('data_penyakit/filterPeny_kpl'); ?>" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                     <select class="form-control" name="bulan" id="bulan">
                  <?php 
                  $daftarBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober", "Desember");
                  foreach ($daftarBulan as $key) {
                    if($key== $bulan){?>
                    <option value="<?php echo $key?>" selected=""><?php echo $key?></option>
                 <?php }
                    else{?>
                     <option value="<?php echo $key?>" ><?php echo $key?></option>
                  <?php } } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="tahun" id="tahun">
                    <?php for($i=2019 ; $i<=2029;$i++){
                      if($i==$tahun){?>
                    <option value="<?php echo $i?>" selected=""><?php echo $i?></option>
                    <?php   } else{?>
                    <option value="<?php echo $i?>" ><?php echo $i?></option>
                    <?php   }} ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" align="right">
                  <button type="submit" id="btn-filter" class="btn btn-success" ><span class="glyphicon glyphicon-filter"></span>  Filter</button>
                </div>
                </div>
                </form>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">Penyakit</th>
                  <th scoop="col" rowspan="2">Kode ICDX</th>
                  <th scoop="col" colspan="2" >Jumlah</th>
                  <th scoop="col" rowspan="2">Total</th>
                </tr>
                <tr>
                  <th scope="col">Laki-Laki</th>
                  <th scope="col">Perempuan</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                $datalaporan = json_decode($peny_bulan[0]->datalb1);
                $no =0; foreach ($datalaporan as $dt ): $no++; ?>
                  <tr class="odd gradeX">
                     <th scope="row"><?= $no ?></th>
                     <th scope="row"><?= $dt->nama_penyakit?></th>
                     <th scope="row"><?= $dt->kode_icdx?></th>
                     <?php $total = 0; ?>
                     <?php if (count($dt->pasien) == 0){ ?>
                       <td>0</td>
                       <td>0</td>
                     <?php }else {
                       foreach ($dt->pasien as $pas){ 
                         $total = $pas->Laki + $pas->Perempuan?>
                         <td><?= $pas->Laki?> </td>
                         <td><?= $pas->Perempuan?> </td>
                       <?php }
                        } ?>
                        <td><?= $total?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <div class="form-group"><br>
                  <div class="col-sm-12" align="right">
                  <button type="submit" id="btn-filter" class="btn btn-primary" data-toggle="modal" data-target="#cetak"><span class="fa fa-print"></span>  Cetak Excel</button>
                  </div>
              </div><br><br>
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