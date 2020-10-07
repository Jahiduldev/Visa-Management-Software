
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo $base_url ?>public/js/jquery.js"></script>
<script src="<?php echo $base_url ?>public/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $base_url ?>public/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $base_url ?>public/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $base_url ?>public/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo $base_url ?>public/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo $base_url ?>public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo $base_url ?>public/js/owl.carousel.js" ></script>
<script src="<?php echo $base_url ?>public/js/jquery.customSelect.min.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo $base_url ?>public/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>public/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo $base_url ?>public/js/respond.min.js" ></script>

<!--date-->
<script type="text/javascript" src="<?php echo $base_url ?>public/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!--datetime picker-->
<script type="text/javascript" src="<?php echo $base_url ?>public/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<!--this page  script only-->
<!--<script src="<?php //echo $base_url ?>public/js/advanced-form-components.js"></script>-->
<!--right slidebar-->
<script src="<?php echo $base_url ?>public/js/slidebars.min.js"></script>
<!--common script for all pages-->
<script src="<?php echo $base_url ?>public/js/common-scripts.js"></script>
<!--toastr-->
<script src="<?php echo $base_url ?>public/assets/toastr-master/toastr.js"></script>
<!--script for this page-->
<script src="<?php echo $base_url ?>public/js/sparkline-chart.js"></script>
<script src="<?php echo $base_url ?>public/js/easy-pie-chart.js"></script>
<script src="<?php echo $base_url ?>public/js/count.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>public/js/jquery.validate.min.js"></script>
<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

<script type="text/javascript">

      $('.default-date-picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"

    });

    $(function() {
          var title="<?php echo $this->session->userdata('msg_title'); ?>";
          if(title !=""){
        var msg_title="<?php echo $this->session->userdata('msg_title'); ?>";
        var msg_body="<?php echo $this->session->userdata('msg_body'); ?>";
        var msg_type='';
        if(msg_title=='Success'){
            msg_type='success';
        }else if(msg_title=='Error'){
            msg_type='error';
        }else if(msg_title=='Warning'){
            msg_type='warning';
        }
        else{
            msg_type='info';
        }
        toastr[msg_type](msg_body, msg_title);
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        }
    });
</script>

<!--</body>
</html>-->
