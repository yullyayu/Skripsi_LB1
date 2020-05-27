<div class="content-wrapper">
    <section class="content-header">
        <h1>
        CETAK LAPORAN BULANAN
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
          <div class="box">
            <div class="box-header">
                <h1 class="box-title">Laporan Bulanan(LB1) Dinas Kesehatan</h1>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('export_excel/cetakBulanDinkes'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
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
                </div>
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
                <button type="submit" id="btn-filter" class="btn btn-success" name="filter"><span class="fa fa-print"></span>  Cetak Excel</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 