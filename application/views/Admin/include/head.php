  <?php 
         if (($_SESSION['LEVEL'] != "Admin") && empty($session->USERID)) {
          redirect('login/logout');
         }         
  ?>
<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    
<!-- Mirrored from keenthemes.com/metronic/preview/demo9/dashboards/fluid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 16:11:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8"/>

        <title><?php echo $title;?></title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
       <!--  //<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">        <!--end::Fonts -->
 
                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="<?php echo base_url()?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
        
        
        <!--begin::Global Theme Styles(used by all pages) -->
                    <link href="<?php echo base_url()?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
                    <link href="<?php echo base_url()?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/data/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/data/dataTables.bootstrap4.min.css"/>
 
        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

        <link rel="shortcut icon" href="<?php echo base_url()?>/assets/gambar/logo_.png" />

        <!-- Hotjar Tracking Code for keenthemes.com -->
      <style type="text/css">
        div#kt_table_filter.dataTables_filter{
            float: right;
          }
        input.form-control.form-control-sm{
            /*width: 300px;*/
        }
        ul.pagination{
            float: right;
        }
        @media(max-width: 360px)
        {
          div#kt_table_filter.dataTables_filter{
            float: none;
          }
        input.form-control.form-control-sm{            
        }
        ul.pagination{
            float: none;
        }
        }
      </style>
<!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1070954,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-37564768-1');
</script>   
 </head>
   <body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading"  >

                
                <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                     