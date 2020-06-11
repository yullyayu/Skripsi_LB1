  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Status LB1 Dinas kesehatan Kota Malang
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
              <h3 class="box-title">Tabel Status Pengiriman LB1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th >Jenis Laporan</th>
                  <th >Tanggal</th>
                  <th style="width: 140px" >Action</th>
                  <th >Status</th>
                  <th >Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no =0; foreach ($status as $st ): $no++; ?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $st->jenis_laporan?></td>
                  <td><?php echo $st->tanggal?></td>
                  <?php if ($st->status == 0 ) { ?>
                    <td style="text-align: center;">-</td>
                  <?php }elseif ($st->status == 11 || $st->status == 4) {?>
                    <td style="text-align: center;"><span class="fa fa-fw fa-times"></span></td>
                  <?php }elseif ($st->status == 1 && $st->id_jp == 1 || $st->id_jp == 2 || $st->id_jp == 3) { ?>
                    <td><a class='fa fa-fw fa-edit' href="<?php echo site_url('laporan_bulanan/detailLB/' . $st->id_laporan);?>"><span class="menu-icon icon-edit"></span></a></td>
                  <?php }elseif ($st->status == 1 && $st->id_jp == 4) { ?>
                    <td><a class='fa fa-fw fa-edit' href="<?php echo site_url('laporan_bulanan/detailPBln/' . $st->id_laporan);?>"><span class="menu-icon icon-edit"></span></a></td>
                  <?php }elseif ($st->status == 1 && $st->id_jp == 5) { ?>
                    <td><a class='fa fa-fw fa-edit' href="<?php echo site_url('laporan_bulanan/detailPTri/' . $st->id_laporan);?>"><span class="menu-icon icon-edit"></span></a></td>
                  <?php }elseif ($st->status == 1 && $st->id_jp == 6) { ?>
                    <td><a class='fa fa-fw fa-edit' href="<?php echo site_url('laporan_bulanan/detailPThn/' . $st->id_laporan);?>"><span class="menu-icon icon-edit"></span></a></td>
                  <?php }elseif ($st->status == 2 || $st->status == 3) { ?>
                    <td style="text-align: center;"><span class="fa fa-fw fa-check"></span></td>
                  <?php } ?>
                  
                  <td>
                    <?php if ($st->status == 0) {
                            echo "Perlu persetujuan Kepala puskesmas";
                        } else if ($st->status == 1) {
                            echo "Telah disetujui Kepala puskesmas";
                        } else if ($st->status == 2) {
                            echo "Dikirim ke Dinkes";
                        } elseif ($st->status == 3) {
                          echo "Laporan telah diterima";
                        } elseif ($st->status == 11) {
                          echo "Tidak disetujui Kepala puskesmas";
                        } elseif ($st->status == 4) {
                          echo "Tidak disetujui Dinkes";
                        }
                    ?>
                  </td>
                  <td><?php echo $st->ket ?></td>
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