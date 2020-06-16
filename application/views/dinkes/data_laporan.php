  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Bulanan(LB1) Dinas Kesehatan Kota Malang
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
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Data Puskesmas Laporan LB1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Puskesmas</th>
                  <th>Kecamatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $no =0; foreach ($dt_laporan as $dl ): $no++;?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $dl->nama_puskesmas?></td>
                  <td><?php echo $dl->kecamatan?>
                  <td><a class='btn btn-info btn-xs' href="<?php echo site_url('dinkes/dataLB1_dinkes/'. $dl->kd_puskesmas);?>"><span class="fa fa-pencil" ></span></a></td>
                </tr>
                <?php endforeach;?>  
              </tbody>
              </table>
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