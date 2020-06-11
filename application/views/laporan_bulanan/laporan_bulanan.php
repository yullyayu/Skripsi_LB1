<!--  -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<script src="<?php echo base_url()."assets";?>jquery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url()."assets";?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets";?>datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets";?>datatables/js/dataTables.bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
      <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/dataLB1') ?>">Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/dataLB1_tribln') ?>">Tri Bulan</a></li>
        <li class="active"><a href="<?php echo site_url('laporan_bulanan/rekapLB1') ?>">Tahun</a></li>
     </ul>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
              <?php  foreach ($data as $dp ){
                foreach ($dp->pasien as $pas) {
                  $bln = $pas->bulan = $pas->bulan1;
                  $bulan = date('F', strtotime($bln));
                  $tahun = date('Y', strtotime($bln));
                  // var_dump($bulan);
                }
            } ?>
              <h3 class="box-title" text="<?php $judul ?>">Laporan Data Kesakitan Bulan <?php echo $bulan ?> <?php echo $tahun ?></h3>
              <?php if ($this->session->flashdata('flash')): ?>
                <div class="alert alert-success" role="alert">
                    <strong><?=$this->session->flashdata('flash');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;?>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('laporan_bulanan/filterLB1'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="bulan" id="bulan">
                    <?php $daftarBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober", "Desember");
                    foreach ($daftarBulan as $key) { 
                    if($key == $bulan){?>
                    <option value="<?php echo $key?>" <?php echo set_select('bulan', $key); ?> selected=""><?php echo $key['bulan']?></option>
                    <?php }
                    else{?>
                    <option value="<?php echo $key?>" <?php echo set_select('bulan', $key); ?>><?php echo $key?></option>
                    <?php } } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="tahun" id="tahun">
                    <?php for($i=2019 ; $i<=2029;$i++){
                    if($i == $tahun){?>
                    <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>selected=""><?php echo $i?></option>
                    <?php   } else{?>
                    <option value="<?php echo $i?>" <?php echo set_select('tahun', $i); ?>><?php echo $i?></option>
                    <?php   }} ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-12" align="right">
                <button type="button" href="" class="btn bg-navy margin" data-toggle="modal" data-target="#tambah"> Tambah Data </button>
                <button type="submit" id="btn-filter" class="btn btn-success" name="filter"><span class="glyphicon glyphicon-filter"></span>  Filter</button>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
            <div class="box-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th scoop="col" rowspan="4">Kode DX</th>
                    <th scoop="col" rowspan="4">Kode ICD-X</th>
                    <th scoop="col" rowspan="4">Nama Penyakit</th>
                    <th scoop="col" colspan="96">Jumlah Penderita Menurut Golongan Umur</th>
                    <th scoop="col" colspan="8">Total</th>
                  </tr>
                  <tr>
                    <th scope="col" colspan="8">0-7 Hari</th>
                    <th scope="col" colspan="8">8-28 Hari</th>
                    <th scope="col" colspan="8">>29-1 Thn</th>
                    <th scope="col" colspan="8">1-4 Thn</th>
                    <th scope="col" colspan="8">5-9 Thn</th>
                    <th scope="col" colspan="8">10-14 Thn</th>
                    <th scope="col" colspan="8">15-19 Thn</th>
                    <th scope="col" colspan="8">20-44 Thn</th>
                    <th scope="col" colspan="8">45-54 Thn</th>
                    <th scope="col" colspan="8">55-59 Thn</th>
                    <th scope="col" colspan="8">60-69 Thn</th>
                    <th scope="col" colspan="8">>70 Thn</th>
                    <th scope="col" colspan="8"></th>
                  </tr>
                  <tr>
                    <?php for($x=0;$x<12;$x++) { ?>
                      <th scope="col" colspan="2">Baru</th>
                      <th scope="col" colspan="2">Lama</th>
                      <th scope="col" colspan="2">KKL</th>
                      <th scope="col" colspan="2">JKK</th>
                    <?php }?>
                    <th scope="col" colspan="2">Baru</th>
                    <th scope="col" colspan="2">Lama</th>
                    <th scope="col" colspan="2">KKL</th>
                    <th scope="col" colspan="2">JKK</th>
                    </tr>
                  <tr>
                  <?php for($x=0;$x<12;$x++) { ?>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                  <?php }?> 
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                    <th scope="col" >P</th>
                    <th scope="col" >L</th>
                  </tr>
                </thead>
                <tbody>
                <!--  -->
                <tr class="odd gradeX">
                    <?php foreach ($data as $d) {?>
                    <th scope="row"><?= $d->kode_dx?></th>
                    <th scope="row"><?= $kode = $d->kode_icdx?></th>
                    <th scope="row"><?= $nm_penyakit = $d->nama_penyakit?></th>
                    <!--Spasih 1-->
                    <?php 
                      $totBaruP = 0;
                      $totBaruL = 0;
                      $totLamaP = 0;
                      $totLamaL = 0;
                      $totKKLP = 0;
                      $totKKLL = 0;
                      $totJKKP = 0;
                      $totJKKL = 0;  
                      $total = [];
                      $jumlah = 0;
                      ?>
                    <?php if(count($d->pasien) == 0){ 
                      for($x = 0;$x<12;$x++){
                      ?>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    <?php }}else{ ?>
                      <?php foreach($d->pasien as $pas){ ?>
                      <?php 
                      $tot = 0;
                      $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                      $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki ; 
                      $totBaruP += $pas->Baru->Perempuan;
                      $totBaruL += $pas->Baru->Laki;
                      $totLamaP += $pas->Lama->Perempuan;
                      $totLamaL += $pas->Lama->Laki;
                      $totKKLP += $pas->KKL->Perempuan;
                      $totKKLL += $pas->KKL->Laki;
                      $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                      $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                      $br_pr = $pas->Baru->Perempuan;
                      $br_lk = $pas->Baru->Laki;
                      $lm_pr = $pas->Lama->Perempuan;
                      $lm_lk = $pas->Lama->Laki;
                      $kkl_pr = $pas->KKL->Perempuan;
                      $kkl_lk = $pas->KKL->Laki;
                      ?>
                      <td><?= $br_pr ?></td>
                      <td><?= $br_lk?></td>
                      <td><?= $lm_pr?></td>
                      <td><?= $lm_lk ?></td>
                      <td><?= $kkl_pr?></td>
                      <td><?= $kkl_lk?></td>
                      <td><?= $jumJKKP?></td>
                      <td><?= $jumJKKL?></td>
                     
                    <?php }?>
                    <?php }?>
                    <!-- Total -->
                    
                    <td><?= $totBaruP?></td>
                    <td><?= $totBaruL?></td>
                    <td><?= $totLamaP?></td>
                    <td><?= $totLamaL?></td>
                    <td><?= $totKKLP?></td>
                    <td><?= $totKKLL?></td>
                    <td><?= $totJKKP?></td>
                    <td><?= $totJKKL?></td>
                    </tr>
                    <?php ;}?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right">Jumlah</th>
                    <?php for ($i=0; $i <104 ; $i++) { ?>
                      <th></th>
                    <?php } ?>
                </tr>
                </tfoot>
              </table>
              
              <!-- kirim -->
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
                      <h4 class="modal-title">Kirim Laporan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('laporan_bulanan/sendKP'); ?>" method="post">
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
                          <option value="Laporan Bulanan"></option>
                          <option value="Laporan Tribulan"></option>
                          <option value="Laporan Tahunan"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" placeholder="Puskesmas" required>
                        </div>
                    </div>
                    <textarea name="datalb1" style="display:none"><?php echo json_encode($data)?></textarea>
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

              <!-- MODAL TAMBAH DATA -->
              <div  class="modal fade" id="tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Laporan Bulanan(LB1)</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo site_url('laporan_bulanan/addLB1'); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="kode_icdx" class="col-sm-2 control-label">Kode Penyakit</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode_icdx" id="kode_icdx" placeholder="Kode Penyakit" required>
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="kategori_umur" class="col-sm-2 control-label">Kategori Umur</label>
                      <div class="col-sm-10">
                        <input list="kategori_umur" type="text" class="form-control" name="kategori_umur" placeholder="Kategori Umur" required>
                          <datalist id="kategori_umur">
                            <option value="0-7 Hari"></option>
                            <option value="8-28 Hari"></option>
                            <option value=">29-1 Tahun"></option>
                            <option value="1-4 Tahun"></option>
                            <option value="5-9 Tahun"></option>
                            <option value="10-14 Tahun"></option>
                            <option value="15-19 Tahun"></option>
                            <option value="20-44 Tahun"></option>
                            <option value="45-54 Tahun"></option>
                            <option value="55-59 Tahun"></option>
                            <option value="60-69 Tahun"></option>
                            <option value=">70 Tahun"></option>
                          </datalist>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="kasus" class="col-sm-2 control-label">Jenis Kasus</label>
                      <div class="col-sm-10">
                        <input list="kasus" type="text" class="form-control" name="kasus" placeholder="Jenis Umur" required>
                          <datalist id="kasus">
                          <option value="Baru"></option>
                          <option value="Lama"></option>
                          <option value="KKL"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <input list="jenis_kelamin" type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis Umur" required>
                          <datalist id="jenis_kelamin">
                          <option value="Laki-laki"></option>
                          <option value="Perempuan"></option>
                          </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                      <div class="col-sm-10">
                        <div class="input-prepend">
                          <input type="date" placeholder="" name="tanggal" class="button" required><button for="tanggal" class="fa fa-calendar"></button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-dennger">Reset</button>
                      <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                    </div>
                </form>
                </div>
              </div>
            </div> 
            <!-- end modal -->

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
  <!-- <script>
  $(function () {
    $('#example1').DataTable({
      // "order": [[5, "desc"]]
    });
  })
</script> -->