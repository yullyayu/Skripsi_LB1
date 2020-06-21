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
            <?php $total = [];
                  $total2 = [];
                  $total3 = [];
                ?>
            <?php
            $datalaporan = json_decode($peny_tri[0]->datalb1); 
            // var_dump($datalaporan);
            foreach ($datalaporan as $dp) {         
              $array = 0;   
              $array2 = 0;    
              $array3 = 0;  
              $peny[] = $dp->nama_penyakit;
              $tot = $dp->total;
              $tot2 = $dp->total2;
              $tot3 = $dp->total3;
              $array = json_decode($tot, true);
              $array2 = json_decode($tot2, true);
              $array3 = json_decode($tot3, true);
              // var_dump($array2);
              array_push($total, $array);
              array_push($total2, $array2);
              array_push($total3, $array3);
              // var_dump($tot2);
              // var_dump($tot3);
            }
            ?>
            <div class="form-group"><br>
              <div class="col-sm-12" align="right">
                    <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Terima </button>
                    <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#eval"> Evaluasi </button>
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
              <!-- CATATAN LAPORAN -->
              <div class="modal fade" id="eval">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Evaluasi Laporan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('dinkes/evaluasiLB1/'. $peny_tri[0]->id_laporan); ?>" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="status" class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <input list="status" type="text" class="form-control" name="status" placeholder="Pilih status" required>
                          <datalist id="status"> 
                          <option value="Tolak"></option>
                          <option value="Terima"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="modal-body">
                    <label class="control-label" for="basicinput">Evaluasi: </label>
                      <textarea id="ket" name="ket" rows="10" cols="90"></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="acc">Kirim</button>
                    </div>
                    </form>
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
    text: "GRAFIK 15 BESAR PENYAKIT TERBANYAK TRIWULAN TAHUN " + <?php echo json_encode($nama_tahun)?>
  },

  subtitle: {
      text: 'Puskesmas Dinoyo Malang'
  },

  yAxis: {
      title: {
          text: ''
      }
  },

  xAxis: {
      categories: <?php echo json_encode($peny) ?>
  },

  series: [{
      name: <?php echo json_encode($nama_bulan[0]) ?>,
      data: <?php echo json_encode($total) ?> 
  }, {
      name: <?php echo json_encode($nama_bulan[1]) ?>,
      data: <?php echo json_encode($total2) ?> 
  }, {
      name: <?php echo json_encode($nama_bulan[2]) ?>,
      data: <?php echo json_encode($total3) ?>
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
  
  <script type="text/javascript">
  Highcharts.chart('container', {

  title: {
      text: "GRAFIK 15 BESAR PENYAKIT TERBANYAK TRIWULAN TAHUN " + <?php echo json_encode($nama_tahun)?>
  },

  subtitle: {
      text: 'Puskesmas Dinoyo Malang'
  },

  yAxis: {
      title: {
          text: ''
      }
  },

  xAxis: {
      categories: <?php echo json_encode($peny) ?>
  },
  series: [{
      name: <?php echo json_encode($nama_bulan[0]) ?>,
      data: <?php echo json_encode($total) ?> 
  }, {
      name: <?php echo json_encode($nama_bulan[1]) ?>,
      data: <?php echo json_encode($total2) ?> 
  }, {
      name: <?php echo json_encode($nama_bulan[2]) ?>,
      data: <?php echo json_encode($total3) ?>
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
  