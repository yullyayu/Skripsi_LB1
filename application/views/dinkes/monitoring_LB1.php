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
            <!-- <form class="form-horizontal" action="<?php echo site_url('dinkes/monitoringLB1'); ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Bulan</label>
                    <div class="col-sm-11">
                      <select class="form-control" name="bulan" id="bulan">
                      <?php 
                      // $daftarBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober", "Desember");
                      // foreach ($daftarBulan as $key) { 
                      // if($key == $bulan){?>
                      <option value="<?php //echo $key?>" <?php //echo set_select('bulan', $key); ?> selected=""><?php // echo $key['bulan']?></option>
                      <?php 
                      //}else{?>
                      <option value="<?php // echo $key?>" <?php // echo set_select('bulan', $key); ?>><?php // echo $key?></option>
                      <?php // } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Tahun</label>
                    <div class="col-sm-11">
                      <select class="form-control" name="tahun" id="tahun">
                      <?php
                      // for($i=2019 ; $i<=2029;$i++){
                      // if($i == $tahun){?>
                      <option value="<?php // echo $i?>" <?php // echo set_select('tahun', $i); ?>selected=""><?php // echo $i?></option>
                      <?php  // } else{?>
                      <option value="<?php // echo $i?>" <?php // echo set_select('tahun', $i); ?>><?php // echo $i?></option>
                      <?php //  }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                 /.box-body 
                <div class="box-footer">
                  <div class="col-sm-12" align="right">
                  <button type="submit" id="btn-filter" class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-filter"></span>  Filter</button>
                </div>
                </div>
                 /.box-footer 
              </form> -->
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Jenis Laporan</th>
                  <th rowspan="2">Bulan </th> 
                  <th colspan="1">Status Pengiriman LB1</th>
                  <th rowspan="2">Action</th>
                </tr>
                <tr>
                  <?php foreach ($puskesmas as $ps){ ?>
                  <th scope="col"><?php echo $ps->nama_puskesmas ?></th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php $no =0; foreach ($monitoring as $dt ){ $no++?>
                <tr class="odd gradeX">
                  <td><?php echo $no ?></td>
                  <td><?php echo $dt->nama_laporan?></td>
                  <?php if ($dt->tanggal == null) { ?>
                    <td><?php echo date('F') ?> </td>
                  <?php }else{ ?>
                  <td><?php echo date('F', strtotime($dt->tanggal))?> </td>
                  <?php } ?>
                  <?php if ($dt->status == 2 || $dt->status == 3) { ?>
                    <td><span class="label label-primary">Sudah</span></td>
                  <?php } else { ?>
                    <td><span class="label label-danger">Belum</span></td>
                  <?php } ?>
                  <?php if ($dt->status == 2 || $dt->status == 3) { ?>
                    <td><button class="btn btn-block btn-primary btn-xs">Selesai</button></td>
                  <?php } else { ?>
                    <td><button type='submit' class="btn btn-block btn-danger btn-xs" href="" data-toggle="modal" data-target="#pesan<?= $dt->id_laporan ?>">Reminder</button></td>
                  <?php } ?>
                  <!-- <td><span class="label label-primary">Approved</span><td> -->
                </tr>
                    <!-- MODAL Hapus Data -->
                    <div class="modal fade" id="pesan<?= $dt->id_laporan ?>">
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
                <?php } ?>
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