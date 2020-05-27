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
                  <th scoop="col" colspan="2">Januari</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Februari</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Maret</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">April</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Mei</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Juni</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Juli</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Agustus</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">September</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Oktober</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">November</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" colspan="2">Desember</th>
                  <th scoop="col" rowspan="2">Total</th>
                  <th scoop="col" rowspan="2">Jumlah</th>
                </tr>
                <tr>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
                  <th scope="col">L</th>
                  <th scope="col">P</th>
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