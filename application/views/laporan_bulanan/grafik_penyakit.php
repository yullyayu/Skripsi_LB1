<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Data 15 Besar Penyakit Puskesmas Dinoyo
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
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
            </div>
            <div id="container"></div>
            <?php $total = []; ?>
            <?php foreach ($data as $dp ){
                $tot = 0;
                $peny[] = $dp->nama_penyakit;
                // print_r($peny);
                // if (count($dp->pasien) == 0) {
                //   $total[] = 0 ;
                // } else {
                foreach ($dp->pasien as $pas) {
                  $bln = $pas->bulan = $pas->bulan1;
                  $bulan = date('M', strtotime($bln));
                  $tot = $pas->Laki + $pas->Perempuan;
                }
                array_push($total, $tot);
                // var_dump($total);
                // print_r($peny);
            } 
            ?>
            <div class="form-group"><br>
              <div class="col-sm-12" align="right">
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
                    <form class="form-horizontal" action="<?php echo site_url('laporan_bulanan/sendKP'); ?>" method="post">
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
                        <input list="jenis_laporan" type="text" class="form-control" name="jen_laporan" placeholder="Jenis Laporan" value="Laporan 15 Penyakit Terbanyak Tribulan">
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
  <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>highcharts/highcharts.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>highcharts/series-label.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>highcharts/exporting.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>highcharts/export-data.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>highcharts/accessibility.js"></script>
  
  <script type="text/javascript">
  Highcharts.chart('container', {

  title: {
      text: 'GRAFIK 15 BESAR PENYAKIT TERBANYAK TRIWULAN TAHUN 2020'
  },

  subtitle: {
      text: 'Puskesmas Dinoyo Malang'
  },

  yAxis: {
      title: {
          text: 'Number of Employees'
      }
  },

  xAxis: {
      categories: <?php echo json_encode($peny) ?>
      // accessibility: {
      //     rangeDescription: 'Range: 2011 to 2020'
      // }
  },

  // legend: {
  //     layout: 'vertical',
  //     align: 'right',
  //     verticalAlign: 'middle'
  // },

  // plotOptions: {
  //     series: {
  //         label: {
  //             connectorAllowed: false
  //         },
  //         pointStart: 2011
  //     }
  // },

  series: [{
      name: <?php echo json_encode($bulan)?>,
      data: <?php echo json_encode($total) ?>
  // }, {
  //     name: 'Februari',
  //     data: [null, null, 1, 0, 0, 0, 1, 1, 2, 0, 1, 0, 4, 2, 3]
  // }, {
  //     name: 'Maret',
  //     data: [1, 2, 0, 1, 0, 2, 1, 2, 4, 1, 2, 1, 1, 0, 5]
  }],

  responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }

  });
  </script>
  