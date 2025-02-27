<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo site_url('kepala_puskesmas/dataLB1_kepala') ?>">Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('kepala_puskesmas/tribulanLB1_kepala') ?>">Tri Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('kepala_puskesmas/rekapLB1_kepala') ?>">Tahun</a></li>
     </ul>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
            <?php if ($lb_tribulan == null) { ?>
              <h3 class="box-title" >Laporan Data Kesakitan Bulan </h3>
            <?php }else { 
                  foreach ($lb_tribulan as $lb) {
                    $bulan = date('m', strtotime($lb->tanggal));
                    $tahun = date('Y', strtotime($lb->tanggal));
                    if ($bulan == 1 || $bulan == 2 || $bulan == 3) {
                      $tri = 'Tribulan 1';
                    }elseif ($bulan == 4 || $bulan == 5 || $bulan == 6) {
                      $tri = 'Tribulan 2';
                    }elseif ($bulan == 7 || $bulan == 8 || $bulan == 9) {
                      $tri = 'Tribulan 3';
                    }elseif ($bulan == 10 || $bulan == 11 || $bulan == 12) {
                      $tri = 'Tribulan 4';
                    }
                  }?>
              <h3 class="box-title" >Laporan Data Kesakitan <?php echo $tri ?> Tahun <?php echo $tahun ?> </h3>
            <?php } ?> 
            </div>
            <div class="box-body">
              <form method="POST" action="<?php echo site_url('Kepala_puskesmas/filterTribulan') ?>">
                <div class="form-group">
                  <label class="col-sm-1 control-label" for="exampleFormControlSelect1">Tribulan</label>
                  <div class="col-sm-12">
                  <select class="form-control" id="exampleFormControlSelect1" name="triwulan" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                </div><br>
                <div class="form-group"><br>
                    <label class="col-sm-1 control-label" for="exampleFormControlSelect1">Tahun</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="year" id="exampleFormControlSelect1">
                      <?php for($i=2019 ; $i<=2029;$i++){
                      if($i == $year){?>
                      <option value="<?php echo $i?>" <?php echo set_select('year', $i); ?>selected=""><?php echo $i?></option>
                      <?php   } else{?>
                      <option value="<?php echo $i?>" <?php echo set_select('year', $i); ?>><?php echo $i?></option>
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
              <table id="example" class="table table-bordered table-striped"><br><br>
              <thead>
                  <tr>
                    <th scoop="col" rowspan="4">Kode DX</th>
                    <th scoop="col" rowspan="4">Kode ICD-X</th>
                    <th scoop="col" rowspan="4">Nama Penyakit</th>
                    <th scoop="col" colspan="96">Jumlah Penderita Menurut Golongan Umur</th>
                    <th scoop="col" colspan="8">Total</th>
                  </tr>
                  <tr>
                    <th scope="col" colspan="8">0-7 Hari</th>
                    <th scope="col" colspan="8">8-28 Hari</th>
                    <th scope="col" colspan="8">>29-1 Thn</th>
                    <th scope="col" colspan="8">1-4 Thn</th>
                    <th scope="col" colspan="8">5-9 Thn</th>
                    <th scope="col" colspan="8">10-14 Thn</th>
                    <th scope="col" colspan="8">15-19 Thn</th>
                    <th scope="col" colspan="8">20-44 Thn</th>
                    <th scope="col" colspan="8">45-54 Thn</th>
                    <th scope="col" colspan="8">55-59 Thn</th>
                    <th scope="col" colspan="8">60-69 Thn</th>
                    <th scope="col" colspan="8">>70 Thn</th>
                    <th scope="col" colspan="8"></th>
                  </tr>
                  <tr>
                    <?php for($x=0;$x<12;$x++) { ?>
                      <th scope="col" colspan="2">Baru</th>
                      <th scope="col" colspan="2">Lama</th>
                      <th scope="col" colspan="2">KKL</th>
                      <th scope="col" colspan="2">JKK</th>
                    <?php }?>
                    <th scope="col" colspan="2">Baru</th>
                    <th scope="col" colspan="2">Lama</th>
                    <th scope="col" colspan="2">KKL</th>
                    <th scope="col" colspan="2">JKK</th>
                    </tr>
                  <tr>
                  <?php for($x=0;$x<12;$x++) { ?>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                  <?php }?> 
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($lb_tribulan == null) {?>
                  <div class="alert alert-danger" role="alert">
                    <strong><?=$this->session->flashdata('flash');?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                <?php } else { ?>
                  <tr class="odd gradeX">      
                    <?php 
                    $datalaporan = json_decode($lb_tribulan[0]->datalb1);
                    foreach ($datalaporan as $d) {?>
                    <th scope="row"><?= $d->kode_dx?></th>
                    <th scope="row"><?= $d->kode_icdx?></th>
                    <th scope="row"><?= $d->nama_penyakit?></th>
                    <!--Spasih 1-->
                    <?php 
                      $totBaruP = 0;
                      $totBaruL = 0;
                      $totLamaP = 0;
                      $totLamaL = 0;
                      $totKKLP = 0;
                      $totKKLL = 0;
                      $totJKKP = 0;
                      $totJKKL = 0;  
                      ?>
                    <?php if(count($d->pasien) == 0){ 
                      for($x = 0;$x<12;$x++){
                      ?>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    <?php }}else{ ?>
                      <?php foreach($d->pasien as $pas){ ?>
                      <?php 
                      $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                      $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki ; 
                      $totBaruP += $pas->Baru->Perempuan;
                      $totBaruL += $pas->Baru->Laki;
                      $totLamaP += $pas->Lama->Perempuan;
                      $totLamaL += $pas->Lama->Laki;
                      $totKKLP += $pas->KKL->Perempuan;
                      $totKKLL += $pas->KKL->Laki;
                      $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                      $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                      $br_pr = $pas->Baru->Perempuan;
                      $br_lk = $pas->Baru->Laki;
                      $lm_pr = $pas->Lama->Perempuan;
                      $lm_lk = $pas->Lama->Laki;
                      $kkl_pr = $pas->KKL->Perempuan;
                      $kkl_lk = $pas->KKL->Laki;
                      ?>
                      <td><?= $br_pr ?></td>
                      <td><?= $br_lk?></td>
                      <td><?= $lm_pr?></td>
                      <td><?= $lm_lk ?></td>
                      <td><?= $kkl_pr?></td>
                      <td><?= $kkl_lk?></td>
                      <td><?= $jumJKKP?></td>
                      <td><?= $jumJKKL?></td>
                    <?php }?>
                    <?php }?>
                    <!-- Total -->
                    <td><?= $totBaruP?></td>
                    <td><?= $totBaruL?></td>
                    <td><?= $totLamaP?></td>
                    <td><?= $totLamaL?></td>
                    <td><?= $totKKLP?></td>
                    <td><?= $totKKLL?></td>
                    <td><?= $totJKKP?></td>
                    <td><?= $totJKKL?></td>
                    </tr>
                    <?php ;}?>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right">Jumlah</th>
                    <?php for ($i=0; $i <104 ; $i++) { ?>
                      <th></th>
                    <?php } ?>
                </tr>
                </tfoot>
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