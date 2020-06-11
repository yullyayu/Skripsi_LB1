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
     <form method="POST" action="<?php echo site_url('Data_penyakit/getGrafikLB1') ?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Tahun</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Tahun" name="year" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Triwulan</label>
    <select class="form-control" id="exampleFormControlSelect1" name="triwulan" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Filter</button>
</form>
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
              
              foreach ($data_peny as $dp) {         
                $array = 0;   
                $array2 = 0;    
                $array3 = 0;  
                $peny[] = $dp['nama_penyakit'];
                $tot = $dp['total'];
                $tot2 = $dp['total2'];
                $tot3 = $dp['total3'];
                $array = json_decode($tot, true);
                $array2 = json_decode($tot2, true);
                $array3 = json_decode($tot3, true);
                // var_dump($array2);
                array_push($total, $array);
                array_push($total2, $array2);
                array_push($total3, $array3);
                var_dump(json_encode($total));
                // var_dump($tot2);
                // var_dump($tot3);
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
                    <form class="form-horizontal" action="<?php echo site_url('data_penyakit/sendKP'); ?>" method="post">
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
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" placeholder="Jenis Laporan" required>
                          <datalist id="jenis_laporan"> 
                          <option value="Laporan 15 Penyakit Terbanyak Bulanan"></option>
                          <option value="Laporan 15 Penyakit Terbanyak Tribulan"></option>
                          <option value="Laporan 15 Penyakit Terbanyak Tahunan"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Puskesmas" value="Dinoyo">
                        </div>
                    </div>
                    <textarea name="datalb1" style="display:none"><?php echo json_encode($data_peny)?></textarea>
                    
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
  