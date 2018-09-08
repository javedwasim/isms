</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <!--      <div class="row">
            <div class="col-md-6">
               Brand Logo 
              <a href="<?php echo base_url(); ?>" class="">
                <img src="<?php echo base_url(); ?>assets/dist/img/company-logo.png ?>" alt="EILIT Logo" class="brand-image-footer img-circle elevation-3"
                style="opacity: .8">
              </a>    
            </div>
            <div class="col-md-6">
               Brand Logo 
              <a href="<?php echo base_url(); ?>" class="pull-right">
                <img src="<?php echo base_url(); ?>assets/dist/img/company-logo.png ?>" alt="EILIT Logo" class="brand-image-footer img-circle elevation-3"
                style="opacity: .8">
              </a>
            </div>
          </div>-->

    <div class="footer-text-align">
        <strong>Copyright&copy;2018 <a href="<?php echo base_url(); ?>">Integrated School Managment System</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </div>
</footer>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- Phone num with country flag script -->
<script src="<?php echo base_url(); ?>assets/plugins/intlTelInput/js/intlTelInput.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/intlTelInput/js/utils.js"></script>
<!-- Radio toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Bootstrap mbforms -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/mbbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/mbbootstrap/js/mdb.min.js"></script>
<!-- toster alerts -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/toster/build/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- custom scripts -->
<script src="<?php echo base_url(); ?>assets/dist/js/script.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/custom.js"></script>
<script>
    $("#nationality").change(function () {
        var country = $('#nationality').val();
        $.ajax({
            url: '/isms/students/get_state/'+country,
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('#country_states').empty();
                    $('#country_states').append(response.states_html);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    });

    $("#country_states").change(function () {
        var state = $('#country_states').val();
        $.ajax({
            url: '/isms/students/get_origin/'+state,
            cache: false,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    $('#lga_of_origin').empty();
                    $('#lga_of_origin').append(response.origin_html);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    });


    var $loading = $('#spinner').hide();
    //Attach the event handler to any element
    $(document)
        .ajaxStart(function () {
            //ajax request went so show the loading image
            $loading.show();
        })
        .ajaxStop(function () {
            //got response so hide the loading image
            $loading.hide();
    });

</script>

</body>
</html>