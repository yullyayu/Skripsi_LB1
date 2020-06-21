  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Data Register</h4>
              <p>Rekam Medis</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?=site_url('laporan_bulanan/dataRegisterLB')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Laporan Bulanan(LB1)</h4>
              <p>Data Penyakit</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=site_url('laporan_bulanan/dataLB1')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>15 Besar Penyakit</h4>
              <p>Penyakit Terbanyak</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=site_url('data_penyakit/getJum_Penyakit')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    <!-- Main content -->
    <section class="content">
      <?php $unique = ""; ?>
      <?php foreach ($data_pesan as $dp) { ?>
        <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
            <?php
            $date = $dp['tanggal'];
            if ($unique == null) {
                $unique = $date;
                echo '<span class="bg-red">' .
                    date('d F Y', strtotime($unique)) .
                    '</span>';
            } else {
                if ($unique != $date) {
                    if ($unique != null) {
                        $unique = $date;
                        echo '<span class="bg-red">' .
                            date('d F Y', strtotime($unique)) .
                            '</span>';
                    }
                }
            }
            ?>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $dp['waktu']; ?></span>

                <h3 class="timeline-header"><a href="#">Dinas Kesehatan</a> sent you an email</h3>
                <div class="timeline-body">
                  <?php if ($dp['id_jp'] == 1) { ?>
                    Laporan Bulanan(LB1) belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }elseif ($dp['id_jp'] == 2) { ?>
                    Laporan Tribulan(LB1) belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }elseif ($dp['id_jp'] == 3) { ?>
                    Laporan Tahunan(LB1) belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }elseif ($dp['id_jp'] == 4) { ?>
                    Laporan 15 Besar Penyakit Bulanan! belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }elseif ($dp['id_jp'] == 5) { ?>
                    Laporan 15 Besar Penyakit Tribulan! belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }elseif ($dp['id_jp'] == 6){?>
                    Laporan 15 Besar Penyakit tahunan! belum dikirim! Batas pengiriman laporan tanggal 10.
                  <?php }?>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php } ?>
      </section>
    <!-- /.content -->
        <!-- ./col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  