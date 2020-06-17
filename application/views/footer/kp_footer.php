
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2020 <a href="">Puskesmas</a>.</strong> Dinoyo
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total1 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total2 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total3 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total4 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total5 = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total6 = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total7 = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total8 = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total9 = api
                .column( 12 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total10 = api
                .column( 13 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total11 = api
                .column( 14 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total12 = api
                .column( 15 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );        
            total13 = api
                .column( 16 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total14 = api
                .column( 17 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total15 = api
                .column( 18 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total16 = api
                .column( 19 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total17 = api
                .column( 20 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total18 = api
                .column( 21 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total19 = api
                .column( 22 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total20 = api
                .column( 23 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total21 = api
                .column( 24 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total22 = api
                .column( 25 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total23 = api
                .column( 26 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total24 = api
                .column( 27 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total25 = api
                .column( 28 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total26 = api
                .column( 29 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total27 = api
                .column( 30 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total28 = api
                .column( 31 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total29 = api
                .column( 32 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total30 = api
                .column( 33 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );   
            total31 = api
                .column( 34 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total32 = api
                .column( 35 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total33 = api
                .column( 36 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total34 = api
                .column( 37 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total35 = api
                .column( 38 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total36 = api
                .column( 39 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total37 = api
                .column( 40 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total38 = api
                .column( 41 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total39 = api
                .column( 42 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total40 = api
                .column( 43 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total41 = api
                .column( 44 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total42 = api
                .column( 45 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total43 = api
                .column( 46 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );        
            total44 = api
                .column( 47 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total45 = api
                .column( 48 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total46 = api
                .column( 49 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total47 = api
                .column( 50 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total48 = api
                .column( 51 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total49 = api
                .column( 52 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total50 = api
                .column( 53 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total51 = api
                .column( 54 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total52 = api
                .column( 55 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total53 = api
                .column( 56 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total54 = api
                .column( 57 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total55 = api
                .column( 58 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total56 = api
                .column( 59 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total57 = api
                .column( 60 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total58 = api
                .column( 61 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total59 = api
                .column( 62 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total60 = api
                .column( 63 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total61 = api
                .column( 64 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total62 = api
                .column( 65 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total63 = api
                .column( 66 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total64 = api
                .column( 67 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total65 = api
                .column( 68 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total66 = api
                .column( 69 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total67 = api
                .column( 70 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total68 = api
                .column( 71 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total69 = api
                .column( 72 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total70 = api
                .column( 73 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total71 = api
                .column( 74 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total72 = api
                .column( 75 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );        
            total73 = api
                .column( 76 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total74 = api
                .column( 77 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total75 = api
                .column( 78 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total76 = api
                .column( 79 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total77 = api
                .column( 80 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total78 = api
                .column( 81 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total79 = api
                .column( 82 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total80 = api
                .column( 83 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total81 = api
                .column( 84 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total82 = api
                .column( 85 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total83 = api
                .column( 86 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total84 = api
                .column( 87 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total85 = api
                .column( 88 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total86 = api
                .column( 89 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total87 = api
                .column( 90 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total88 = api
                .column( 91 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total89 = api
                .column( 92 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total90 = api
                .column( 93 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );   
            total91 = api
                .column( 94 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total92 = api
                .column( 95 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total93 = api
                .column( 96 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total94 = api
                .column( 97 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total95 = api
                .column( 98 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total96 = api
                .column( 99 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total97 = api
                .column( 100 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total98 = api
                .column( 101 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total99 = api
                .column( 102 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total100 = api
                .column( 103 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total101 = api
                .column( 104 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total102 = api
                .column( 105 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            total103 = api
                .column( 106 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );       
            
            // Update footer
            $( api.column( 3 ).footer() ).html(total);
            $( api.column( 4 ).footer() ).html(total1);
            $( api.column( 5 ).footer() ).html(total2);
            $( api.column( 6 ).footer() ).html(total3);
            $( api.column( 7 ).footer() ).html(total4);
            $( api.column( 8 ).footer() ).html(total5);
            $( api.column( 9 ).footer() ).html(total6);
            $( api.column( 10 ).footer() ).html(total7);
            $( api.column( 11 ).footer() ).html(total8);
            $( api.column( 12 ).footer() ).html(total9);
            $( api.column( 13 ).footer() ).html(total10);
            $( api.column( 14 ).footer() ).html(total11);
            $( api.column( 15 ).footer() ).html(total12);
            $( api.column( 16 ).footer() ).html(total13);
            $( api.column( 17 ).footer() ).html(total14);
            $( api.column( 18 ).footer() ).html(total15);
            $( api.column( 19 ).footer() ).html(total16);
            $( api.column( 20 ).footer() ).html(total17);
            $( api.column( 21 ).footer() ).html(total18);
            $( api.column( 22 ).footer() ).html(total19);
            $( api.column( 23 ).footer() ).html(total20);
            $( api.column( 24 ).footer() ).html(total21);
            $( api.column( 25 ).footer() ).html(total22);
            $( api.column( 26 ).footer() ).html(total23);
            $( api.column( 27 ).footer() ).html(total24);
            $( api.column( 28 ).footer() ).html(total25);
            $( api.column( 29 ).footer() ).html(total26);
            $( api.column( 30 ).footer() ).html(total27);
            $( api.column( 31 ).footer() ).html(total28);
            $( api.column( 32 ).footer() ).html(total29);
            $( api.column( 33 ).footer() ).html(total30);
            $( api.column( 34 ).footer() ).html(total31);
            $( api.column( 35 ).footer() ).html(total32);
            $( api.column( 36 ).footer() ).html(total33);
            $( api.column( 37 ).footer() ).html(total34);
            $( api.column( 38 ).footer() ).html(total35);
            $( api.column( 39 ).footer() ).html(total36);
            $( api.column( 40 ).footer() ).html(total37);
            $( api.column( 41 ).footer() ).html(total38);
            $( api.column( 42 ).footer() ).html(total39);
            $( api.column( 43 ).footer() ).html(total40);
            $( api.column( 44 ).footer() ).html(total41);
            $( api.column( 45 ).footer() ).html(total42);
            $( api.column( 46 ).footer() ).html(total43);
            $( api.column( 47 ).footer() ).html(total44);
            $( api.column( 48 ).footer() ).html(total45);
            $( api.column( 49 ).footer() ).html(total46);
            $( api.column( 50 ).footer() ).html(total47);
            $( api.column( 51 ).footer() ).html(total48);
            $( api.column( 52 ).footer() ).html(total49);
            $( api.column( 53 ).footer() ).html(total50);
            $( api.column( 54 ).footer() ).html(total51);
            $( api.column( 55 ).footer() ).html(total52);
            $( api.column( 56 ).footer() ).html(total53);
            $( api.column( 57 ).footer() ).html(total54);
            $( api.column( 58 ).footer() ).html(total55);
            $( api.column( 59 ).footer() ).html(total56);
            $( api.column( 60 ).footer() ).html(total57);
            $( api.column( 61 ).footer() ).html(total58);
            $( api.column( 62 ).footer() ).html(total59);
            $( api.column( 63 ).footer() ).html(total60);
            $( api.column( 64 ).footer() ).html(total61);
            $( api.column( 65 ).footer() ).html(total62);
            $( api.column( 66 ).footer() ).html(total63);
            $( api.column( 67 ).footer() ).html(total64);
            $( api.column( 68 ).footer() ).html(total65);
            $( api.column( 69 ).footer() ).html(total66);
            $( api.column( 70 ).footer() ).html(total67);
            $( api.column( 71 ).footer() ).html(total68);
            $( api.column( 72 ).footer() ).html(total69);
            $( api.column( 73 ).footer() ).html(total70);
            $( api.column( 74 ).footer() ).html(total71);
            $( api.column( 75 ).footer() ).html(total72);
            $( api.column( 76 ).footer() ).html(total73);
            $( api.column( 77 ).footer() ).html(total74);
            $( api.column( 78 ).footer() ).html(total75);
            $( api.column( 79 ).footer() ).html(total76);
            $( api.column( 80 ).footer() ).html(total77);
            $( api.column( 81 ).footer() ).html(total78);
            $( api.column( 82 ).footer() ).html(total79);
            $( api.column( 83 ).footer() ).html(total80);
            $( api.column( 84 ).footer() ).html(total81);
            $( api.column( 85 ).footer() ).html(total82);
            $( api.column( 86 ).footer() ).html(total83);
            $( api.column( 87 ).footer() ).html(total84);
            $( api.column( 88 ).footer() ).html(total85);
            $( api.column( 89 ).footer() ).html(total86);
            $( api.column( 90 ).footer() ).html(total87);
            $( api.column( 91 ).footer() ).html(total88);
            $( api.column( 92 ).footer() ).html(total89);
            $( api.column( 93 ).footer() ).html(total90);
            $( api.column( 94 ).footer() ).html(total91);
            $( api.column( 95 ).footer() ).html(total92);
            $( api.column( 96 ).footer() ).html(total93);
            $( api.column( 97 ).footer() ).html(total94);
            $( api.column( 98 ).footer() ).html(total95);
            $( api.column( 99 ).footer() ).html(total96);
            $( api.column( 100 ).footer() ).html(total97);
            $( api.column( 101 ).footer() ).html(total98);
            $( api.column( 102 ).footer() ).html(total99);
            $( api.column( 103 ).footer() ).html(total100);
            $( api.column( 104 ).footer() ).html(total101);
            $( api.column( 105 ).footer() ).html(total102);
            $( api.column( 106 ).footer() ).html(total103);
        }
    } );
} );
</script>
</body>
</html>
