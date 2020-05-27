  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Monitoring LB1 Dinas kesehatan Kota Malang
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
              <h3 class="box-title">Monitoring Status LB1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th >Jenis Laporan</th>
                  <th> Tanggal </th> 
                  <th >Puskesmas</th>
                  <th >Kecamatan</th>
                  <th >Status Pengiriman LB1</th>
                  <th style="width: 140px" >Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no =0; foreach ($monitoring as $dt ): $no++; ?>
                <tr class="odd gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $dt->nama_laporan?></td>
                  <td><?php echo date("Y-m-d") ?> </td>
                  <td><?php echo $dt->nama_puskesmas?></td>
                  <td><?php echo $dt->kecamatan?></td>
                  <?php if ($dt->status == 2 || $dt->status == 3) { ?>
                    <td><span class="label label-primary">Sudah</span></td>
                  <?php } else { ?>
                    <td><span class="label label-danger">Belum</span></td>
                  <?php } ?>
                  <?php if ($dt->status == 2 || $dt->status == 3) { ?>
                    <td><span class="label label-primary">Selesai</span></td>
                  <?php } else { ?>
                    <td><span class="label label-danger">Reminder</span></td>
                  <?php } ?>
                  <!-- <td><span class="label label-primary">Approved</span><td> -->
                </tr>
                <?php endforeach; ?>
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