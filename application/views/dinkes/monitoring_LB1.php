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
                    <td><button class="btn btn-block btn-primary btn-xs">Selesai</button></td>
                  <?php } else { ?>
                    <td><button type='submit' class="btn btn-block btn-danger btn-xs" href="" data-toggle="modal" data-target="#pesan">Reminder</button></td>
                  <?php } ?>
                  <!-- <td><span class="label label-primary">Approved</span><td> -->
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>

            <!-- MODAL Hapus Data -->
            <div class="modal fade" id="pesan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Kirim Pesan Puskesmas</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('dinkes/sendMessage/'.$dt->id_laporan) ?>" method="post">
                    <div class="modal-body">
                      <p>Apakah anda yakin ingin mengirim pesan?</p>
                    </div>
                    <textarea name="tanggal" style="display:none"><?php date_default_timezone_set('Asia/Jakarta');
                    echo date("Y-m-d"); ?></textarea>
                    <textarea name="waktu" style="display:none"><?php date_default_timezone_set('Asia/Jakarta');
                    echo date("H:i:s"); ?></textarea>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="acc">kirim</button>                      
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