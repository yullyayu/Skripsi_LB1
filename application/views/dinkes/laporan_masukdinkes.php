  
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
                  <th scoop="col" rowspan="2">No</th>
                  <th scoop="col" rowspan="2">Tanggal</th>
                  <th scoop="col" rowspan="2">Nama Puskesmas</th>
                  <th scoop="col" colspan="3">Jenis Laporan</th>
                  <th scoop="col" rowspan="2">Status</th>
                </tr>
                <tr>
                  <th scope="col">Bulanan</th>
                  <th scope="col">Tribulan</th>
                  <th scope="col">Tahunan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no =0; foreach ($status as $st ): $no++; ?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $st->tanggal?></td>
                  <td><?php echo $st->nama_puskesmas?></td>
                  <td><?php if ($st->jenis_laporan == 'Bulanan' && $st->status == 2) {  ?>
                    <a class='fa fa-fw fa-edit' href="<?php echo site_url('dinkes/detailLBdinkes/' . $st->id_laporan);?>"><span class="menu-icon icon-edit"></span></a>
                  <?php  } elseif ($st->jenis_laporan == 'Bulanan' && $st->status == 0 || $st->status == 1){ ?>
                    <a>-</a>
                  <?php }elseif ($st->jenis_laporan == 'Bulanan' && $st->status == 3) { ?>
                    <a class="fa fa-fw fa-check"></a>
                  <?php } ?></td> 
                  <td><?php if ($st->jenis_laporan == 'Tribulan' && $st->status == 2) {  ?>
                    <a class='fa fa-fw fa-edit' href="<?php echo site_url('dinkes/detailLBdinkes/' . $st->id_laporan); ?>"><span class="menu-icon icon-edit"></span></a>
                  <?php  } elseif ($st->jenis_laporan == 'Tribulan' && $st->status == 0 || $st->status == 1){ ?>
                    <a>-</a>
                  <?php } elseif ($st->jenis_laporan == 'Tribulan' && $st->status == 3) { ?>
                    <a class="fa fa-fw fa-check"></a>
                  <?php } ?> </td> 
                  <td><?php if ($st->jenis_laporan == 'Tahunan' && $st->status == 2) {  ?>
                    <a class='fa fa-fw fa-edit' href="<?php echo site_url('dinkes/detailLBdinkes/' . $st->id_laporan); ?>"><span class="menu-icon icon-edit"></span></a>
                  <?php  } elseif ($st->jenis_laporan == 'Tahunan' && $st->status == 0 || $st->status == 1){ ?>
                    <a>-</a>
                  <?php } elseif ($st->jenis_laporan == 'Tahunan' && $st->status == 3) { ?>
                    <a class="fa fa-fw fa-check"></a>
                  <?php } ?> </td> 
                  <td>
                    <?php if ($st->status == 2) {
                            echo "Perlu persetujuan dinkes";
                          }else if ($st->status == 1 || $st->status == 0) {
                            echo "Belum dikirim";
                          }elseif ($st->status == 3) {
                            echo "Telah disetujui";
                          }
                    ?>
                  </td>
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