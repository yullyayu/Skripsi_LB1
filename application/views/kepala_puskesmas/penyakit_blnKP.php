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
              <?php if ($peny_bulan == null) { ?>
                  <h1 class="box-title">15 Besar Penyakit Puskesmas Dinoyo</h1>
                <?php }else { 
                      foreach ($peny_bulan as $lb) {
                        $bulan = date('M', strtotime($lb->tanggal));
                        $tahun = date('Y', strtotime($lb->tanggal));
                      }?>
                  <h3 class="box-title">15 Besar Penyakit Puskesmas Dinoyo Bulan <?php echo $bulan ?> </h3>
                <?php } ?> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <form method="post" action="<?php echo site_url('data_penyakit/filterPeny'); ?>">
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Bulan</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="bulan" id="bulan">
                      <?php $daftarBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober", "Desember");
                      foreach ($daftarBulan as $key) { 
                      if($key == $bulan){?>
                      <option value="<?php echo $key?>" <?php echo set_select('bulan', $key); ?> selected=""><?php echo $key['bulan']?></option>
                      <?php }
                      else{?>
                      <option value="<?php echo $key?>" <?php echo set_select('bulan', $key); ?>><?php echo $key?></option>
                      <?php } } ?>
                      </select>
                    </div>
                  </div><br>
                  <div class="form-group"><br>
                    <label class="col-sm-1 control-label">Tahun</label>
                    <div class="col-sm-12">
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
                  <button type="submit" id="btn-filter" class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-filter"></span>  Filter</button>
                </div>
                </div>
                <!-- /.box-footer -->
              </form>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th  rowspan="2">No</th>
                  <th  rowspan="2">Penyakit</th>
                  <th  rowspan="2">Kode ICDX</th>
                  <th  colspan="2" >Jumlah</th>
                  <th  rowspan="2">Total</th>
                </tr>
                <tr>
                  <th >Laki-Laki</th>
                  <th >Perempuan</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($peny_bulan == null){ ?>
                      <div class="alert alert-danger" role="alert">
                        <strong><?=$this->session->flashdata('flash');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php }else { 
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
                    <?php } ?>
                </tbody>
              </table>
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