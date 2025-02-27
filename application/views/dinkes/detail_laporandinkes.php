<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Data Kesakitan(Bulan)</h3>
            </div>
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
                    
                    <?php 
                    $datalaporan = json_decode($detail[0]->datalb1);
                    foreach ($datalaporan as $d) {?>
                    <th scope="row"><?= $d->kode_dx?></th>
                    <th scope="row"><?= $d->kode_icdx?></th>
                    <th scope="row"><?= $d->nama_penyakit?></th>
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
              </table>
              
              <!-- kirim -->
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
                    <form class="form-horizontal" action="<?php echo site_url('dinkes/accLB1/'. $detail[0]->id_laporan); ?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="tanggal">Tanggal Laporan</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="" name="tanggal" class="form-control" value="<?php echo $detail[0]->tanggal?>">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="jenis_laporan" class="col-sm-2 control-label">Jenis Laporan</label>
                      <div class="col-sm-10">
                        <input list="jenis_laporan" type="text" class="form-control" name="jenis_laporan" value="<?php echo $detail[0]->jenis_laporan?>">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-2 control-label">Puskesmas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" value="<?php echo $detail[0]->nama_puskesmas?>">
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
                    <form class="form-horizontal" action="<?php echo site_url('dinkes/evaluasiLB1/'. $detail[0]->id_laporan); ?>" method="post">
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