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
            <?php
            $datalaporan = json_decode($peny_tri[0]->datalb1); 
                foreach ($datalaporan as $dp ){
                $tot = 0;
                $peny[] = $dp->nama_penyakit;
                foreach ($dp->pasien as $pas) {
                  $bln = $pas->bulan = $pas->bulan1;
                  $bulan = date('M', strtotime($bln));
                  $tahun = date('Y', strtotime($bln));
                  $tot = $pas->Laki + $pas->Perempuan;
                }
                array_push($total, $tot);
            } 
            $tahun = date('Y', strtotime($bln)) ;
            $judul = 'GRAFIK 15 BESAR PENYAKIT TERBANYAK TRIWULAN TAHUN '.$tahun ;
            ?>
            <div class="form-group"><br>
              <div class="col-sm-12" align="right">
                    <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Terima </button>
                    <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Evaluasi </button>
              </div>
            </div><br><br>
              <!-- end-kirim -->
              <!-- MODAL TERIMA LAPORAN -->
              <div class="modal fade" id="kirim">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Terima Laporan Bulanan(LB1)</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('dinkes/accLB1/'. $peny_tri[0]->id_laporan); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="" name="tanggal" class="form-control" value="<?php echo $peny_tri[0]->tanggal?>">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="jenis_laporan" class="col-sm-2 control-label">Jenis Laporan</label>
                      <div class="col-sm-10">
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" value="<?php echo $peny_tri[0]->jenis_laporan?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" value="<?php echo $peny_tri[0]->nama_puskesmas?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="acc">Terima</button>                     
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
      text: <?php echo json_encode($judul)?>
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
  