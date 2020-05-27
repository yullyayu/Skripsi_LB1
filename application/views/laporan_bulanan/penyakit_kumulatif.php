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
               
                  <tr class="odd gradeX">
                     <th scope="row"><?= $no ?></th>
                     <th scope="row"><?= $dp->nama_penyakit?></th>
                     <th scope="row"><?= $dp->kode_icdx?></th>
                     <?php 
                    //  $total = 0;
                    //  if(count($dp->pasien) == 0) {
                       for ($x=0; $x<12 ; $x++) {  ?>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                     <?php  }
                    //  } else {
                      //  foreach ($dp->pasien as $pas) { 
                        //  $total = $pas->Laki + $pas->Perempuan?>
                        <td></td>
                        <td></td>
                        <td></td>
                     <?php 
                      ?>
                  </tr>
                
                </tbody>
              </table>
               <!-- kirim -->
               <div class="form-group"><br>
                  <div class="col-sm-12" align="right">
                  <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Kirim Laporan </button>
                  </div>
                </div><br><br>
              <!-- end-kirim -->
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
  