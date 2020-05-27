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
                <h1 class="box-title">15 Besar Penyakit Puskesmas Dinoyo</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
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
                </div><br>
                <div class="form-group"><br>
                  <label class="col-sm-2 col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="tahun" id="tahun">
                    <?php for($i=2019 ; $i<=2029;$i++){
                      if($i==$tahun){?>
                    <option value="<?php echo $i?>" selected=""><?php echo $i?></option>
                    <?php   } else{?>
                    <option value="<?php echo $i?>" ><?php echo $i?></option>
                    <?php   }} ?>
                    </select><br>
                  </div>
                </div>
                <div class="form-group"><br>
                <div class="col-sm-12" align="right">
                  <button type="submit" id="btn-filter" class="btn btn-success" ><span class="glyphicon glyphicon-filter"></span>  Filter</button>
                </div>
                </div><br><br>
                <table id="example1" class="table table-bordered table-striped"><br><br>
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