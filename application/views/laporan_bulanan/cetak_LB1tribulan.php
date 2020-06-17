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
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/viewCetak') ?>">Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/viewCetakTribln') ?>">Tri Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/viewCetakTahun') ?>">Tahun</a></li>
     </ul>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">          
          <div class="box">
            <div class="box-header">
                <h1 class="box-title">Laporan Bulanan(LB1) Puskesmas</h1>
                <?php if ($this->session->flashdata('flash')){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?=$this->session->flashdata('flash');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php }?>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('export_excel/cetakTribln'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tribulan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="tribulan" id="tribulan">
                    <?php $daftarTribulan = array("Tribulan 1","Tribulan 2","Tribulan 3", "Tribulan 4");
                    foreach ($daftarTribulan as $key) {
                    if($key== $tribulan){?>
                    <option value="<?php echo $key?>" <?php echo set_select('tribulan', $key);?> selected=""><?php echo $key['tribulan']?></option>
                    <?php }
                    else{?>
                    <option value="<?php echo $key?>" <?php echo set_select('tribulan', $key);?>><?php echo $key?></option>
                    <?php }}?>
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
                <button type="submit" id="btn-filter" class="btn btn-primary" name="filter"><span class="fa fa-print"></span>  Cetak Excel</button>
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
 