<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
                <h1 class="box-title">15 Besar Penyakit Puskesmas Dinoyo</h1>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">Penyakit</th>
                  <th scoop="col" rowspan="2">Kode ICDX</th>
                  <th scoop="col" colspan="2" >Jumlah</th>
                  <th scoop="col" rowspan="2">Total</th>
                </tr>
                <tr>
                  <th scope="col">Laki-Laki</th>
                  <th scope="col">Perempuan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $datalaporan = json_decode($peny_bln[0]->datalb1);
                $no =0; foreach ($datalaporan as $dt ): $no++; ?>
                  <tr class="odd gradeX">
                     <th scope="row"><?= $no ?></th>
                     <th scope="row"><?= $dt->nama_penyakit?></th>
                     <th scope="row"><?= $dt->kode_icdx?></th>
                     <?php $total = 0; ?>
                     <?php if (count($dt->pasien) == 0){ ?>
                       <td>0</td>
                       <td>0</td>
                     <?php }else {
                       foreach ($dt->pasien as $pas){ 
                         $total = $pas->Laki + $pas->Perempuan?>
                         <td><?= $pas->Laki?> </td>
                         <td><?= $pas->Perempuan?> </td>
                       <?php }
                        } ?>
                        <td><?= $total?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
               <!-- kirim -->
               <div class="form-group"><br>
                  <div class="col-sm-12" align="right">
                  <button type="submit" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#kirim"> Kirim ke Dinkes </button>
                  </div>
                </div><br><br>
                </div>
              <!-- end-kirim -->

            <!-- MODAL KIRIM LAPORAN -->
              <div class="modal fade" id="kirim">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Kirim Laporan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('laporan_bulanan/kirimLB1Dinkes/'. $peny_bln[0]->id_laporan); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="" name="tanggal" class="form-control" value="<?php echo $peny_bln[0]->tanggal?>">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="jenis_laporan" class="col-sm-2 control-label">Jenis Laporan</label>
                      <div class="col-sm-10">
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" value="<?php echo $peny_bln[0]->jenis_laporan?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" value="<?php echo $peny_bln[0]->nama_puskesmas?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="acc">Kirim</button>                     
                    </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
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
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>ower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/"; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/"; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "order": [[5, "desc"]]
    });
  })
</script>
</body>
</html>
