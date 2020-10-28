			<!-- begin:: Footer -->
<div class="kt-footer kt-grid__item" id="kt_footer">
	<div class="kt-container ">
		<div class="kt-footer__wrapper">
			<div class="kt-footer__copyright">
				2020&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">Peta Rawan Konflik - Beta   </a>
			</div>
			<div class="kt-footer__menu">
				<!-- <a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">About</a>
				<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Team</a> -->
				<a href="#" target="_blank" class="kt-link"><b>Badan Kesatuan Bangsa dan Politik - Provinsi Nusa Tenaggara Timur</b></a>
			</div>
		</div>
	</div>
</div>
<!-- end:: Footer -->			</div>
		</div>
	</div>
	
<!-- end:: Page -->

           <div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <h4 class="kt-demo-panel__title">
           Informasi Konflik
            <!--<small>5</small>-->
        </h4>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body">
        <div class="kt-demo-panel__item ">
                   
                           <?php                                 

                          $data = $this->db->query("SELECT
                                                  tr_angket.NMANGKET   AS NAMA,
                                                  m_status.NMSTATUS    AS STATUS,
                                                  m_kecamatan.NMKEC    AS KECAMATAN,
                                                  m_kabkota.NMWIL    AS KABUPATEN,
                                                  m_btkangket.NMBENTUK AS BIDANG,
                                                  tr_angket.TGLANGKET  AS TANGGAL
                                                FROM tr_angket
                                                     LEFT JOIN m_kecamatan
                                                       ON m_kecamatan.IDKEC = tr_angket.IDKEC
                                                      LEFT JOIN m_kabkota
                                                       ON m_kabkota.IDWIL = m_kecamatan.IDKAB
                                                    LEFT JOIN m_btkangket
                                                      ON m_btkangket.IDBENTUK = tr_angket.IDBENTUK
                                                   LEFT JOIN m_status
                                                     ON m_status.IDSTATUS = tr_angket.STATUS WHERE WEEK(tr_angket.TGLANGKET) = WEEK(NOW())")->result();

                          $jml = $this->db->query(" SELECT COUNT(IDTRXANGKET) AS JMLKONFLIK FROM tr_angket                    
                         WHERE WEEK(tr_angket.TGLANGKET) = WEEK(NOW())")->row();
                          $no =1;
                         foreach ($data as $data): ?>
                        <div class="">
                            <p class="kt-widget2__title" style="text-align: justify;">
                                <b style="text-align: justify;"><?=$no?>. <?php echo $data->NAMA ?> </b> 
                            </p>                             
                            <p class="kt-widget2__username">
                                <div style="float: left; width: 30%;">Bidang</div> <div style="float: right; width: 70%;"> :  <?php echo $data->BIDANG ?> </div>
                            </p>    
                            <p class="kt-widget2__username">
                                <div style="float: left; width: 30%;">Kab/Kota</div><div style="float: right; width: 70%;"> :  <?php echo $data->KABUPATEN ?> </div>
                            </p>    
                            <p class="kt-widget2__username">
                                <div style="float: left; width: 30%;">Status</div><div style="float: right; width: 70%;"> : <?php echo $data->STATUS ?> </div>
                            </p> 
                             <p class="kt-widget2__username"> <?php echo $data->TANGGAL ?></p>                                
                        </div>
                     <?php $no++; endforeach ?> <!-- </div>                     -->
                </div>
       
    </div>
</div>

    
    <!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->

            <!-- begin::Sticky Toolbar -->
<ul class="kt-sticky-toolbar" style="margin-top: 30px;">
   
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand"  data-toggle="kt-tooltip"  title="Tambah Data" data-placement="right">
		<a  data-toggle="modal" data-target="#kinput"><i class="flaticon-file-1"></i></a>
	</li>
     <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_demo_panel_toggle" data-toggle="kt-tooltip"  title="Peringatan Konflik" data-placement="right">
        <a href="#" class=""><i class="flaticon2-notification"></i></a>
    </li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" data-toggle="kt-tooltip" title="Pengaturan" data-placement="left">
        		<a href="config" ><i class="flaticon2-gear"></i></a>
	</li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Unduh Manual Book" data-placement="left">
        <?php $book = $this->db->query("SELECT * FROM manual_book")->row(); ?>
		<a href="<?=$book->URLBOOK?>" target="_blank"><i class="flaticon2-download"></i></a>
	</li>
</ul>
<!-- end::Sticky Toolbar -->
        <!-- begin::Demo Panel -->


<div class="data-text">
  
</div>

 

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {"colors":{"state":{"brand":"#591df1","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
</script>
<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="<?php echo base_url()?>/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>            
<script src="<?php echo base_url()?>/assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->
<script src="<?php echo base_url()?>/assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?php echo base_url()?>/assets/js/pages/components/extended/toastr.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/js/pages/dashboard.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/js/pages/crud/datatables/advanced/column-rendering.js"></script>
<script src="<?php echo base_url()?>/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/js/pages/crud/forms/editors/summernote.js" type="text/javascript"></script>
<?php echo $this->session->flashdata('message'); ?>  
                        
<script type="text/javascript">

  var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
  var  berita = location.pathname.split("/").slice(-2)[0];
  var editber= location.pathname.split("/").slice(-3)[0];
      
  $('.kt-menu__item a[href~="'+location.href+'"]').addClass('nav-active');

  if ((berita=="berita") | (editber=="berita")){

  $('.kt-menu__item a[href~="<?php echo base_url()?>Operator/berita"]').addClass('nav-active');
  }

   switch (current) {
          case "desa":
             
          case "kecamatan":

          case "kabupaten":
            $('.wilayah-drop a[href~="javascript:;"]').addClass('nav-active');
          break;

          case "bidang":
             
          case "sub_bidang":

          case "status":
            $('.konflik-drop a[href~="javascript:;"]').addClass('nav-active');
          break;

             
        
  }
</script>


</script>  

</body>
   
</html>
