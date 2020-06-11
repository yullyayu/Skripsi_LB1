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
     <form method="POST" action="<?php echo site_url('Data_penyakit/getGrafikLB1Kepala') ?>">
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
            <?php if ($this->session->flashdata('flash')){ ?>
              <div class="alert alert-danger" role="alert">
                <strong><?=$this->session->flashdata('flash');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } else {
                $total = [];
                $total2 = [];
                $total3 = []; 
                $grafik = json_decode($lb_tribulan[0]->datalb1);
              // var_dump($grafik);
              foreach ($grafik as $dp) {         
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
                // var_dump($total);
                // var_dump($tot2);
                // var_dump($tot3);
              }    
            }?>
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
  