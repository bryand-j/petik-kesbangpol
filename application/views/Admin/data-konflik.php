
              
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container ">
   
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
  <div class="kt-container  kt-grid__item kt-grid__item--fluid">
  
<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <!-- <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Data Konflik
      </h3>
    </div> -->
    <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-success" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="data_konflik" data-toggle="tab" href="#kt_tabs_7_1" role="tab"><i class="la la-cloud-upload"></i> Data Konflik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="orang_asing" data-toggle="tab" href="#kt_tabs_7_3" role="tab"><i class="la la-puzzle-piece"></i>Data Orang Asing</a>
        </li>
    </ul> 
    <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
<!--  <a href="#" class="btn btn-clean btn-icon-sm">
    <i class="la la-long-arrow-left"></i>
    Back
  </a>
  &nbsp; -->
  <div class="dropdown dropdown-inline">
    <button type="button" class="btn btn-outline-primary  btn-elevate btn-elevate-air btn-icon-sm btn-sm" title="Tambah Data Kecamatan" data-toggle="modal" data-target="#kinput">
      <i class="flaticon-file-1"></i> Tambah Data
    </button>
<form method="POST" style="float: left; margin-right: 10px;" action="<?php echo base_url()?>Admin/Data/pdf" target="_blank">
  <input type="hidden" id="ct-wilayah" name="wilayah">
  <input type="hidden" id="ct-tahun" name="tahun">
  <input type="hidden" id="ct-bidang" name="bidang">
      <button type="submit" id="cetak"  class="btn btn-outline-success  btn-elevate btn-elevate-air btn-icon-sm btn-sm" title="Tambah Data Kecamatan" >
      <i class="flaticon-file-1"></i> Laporan
    </button>
</form>
  </div>
</div>
    </div>
  </div>


<div class="modal fade" id="kinput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Konflik</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <select class="form-control form-control-sm" id="in-kab">    
                             <option value=""> -- Pilih Wilayah --</option>                         
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">Kecamatan</label>
                        <select class="form-control form-control-sm" id="in-kec"> 
                        <option value=""> -- Pilih Kabupaten Dahulu --</option>                                                         
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">Desa / Kelurahan</label>
                        <select class="form-control form-control-sm" id="in-des"> 
                        <option value=""> -- Pilih Kecamatan Dahulu --</option>                                                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Judul Konflik</label>
                       <input type="text" class="form-control form-control-sm" placeholder="Masukan Judul Konflik" name="product_name" id="in-judul" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Detail Konflik</label>
                       <textarea class="form-control form-control-sm" placeholder="Masukan detail Konflik" name="product_name" id="in-detail" > </textarea>
                    </div>
                   <div class="form-group">
                     <label for="message-text" class="form-control-label">Bidang Konflik</label>
                         <select class="form-control op" id="in-bidang">   
                          
                            </select>
                    </div>  
                     <label for="message-text" class="form-control-label">Tanggal Konflik</label>
                    <div class="input-group date" >                       
                                <input type="text" class="form-control" value="05/20/2017" data-date-format='yyyy-mm-dd' date-min-date="2000-01-01" id="kt_datepicker_3_modal"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                      </div>  
                    <br>
                   <div class="form-group">
                     <label for="message-text" class="form-control-label">Status</label>
                         <select class="form-control" id="in-status">  
                          <option value=""> -- Pilih Status Konflik --</option>                           
                            <?php foreach ($status as $row ): ?>  
                                <option value="<?=$row->IDSTATUS?>"><?=$row->NMSTATUS?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary  btn-elevate btn-elevate-air btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" id="save" class="btn btn-primary  btn-elevate btn-elevate-air btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <div class="modal-header btn-success">
                    <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon-interface-4"></i> Ubah Data Konflik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                 </div>
            <div class="modal-body">
                <form>
                    
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <select class="form-control form-control-sm" id="ed-kab">    
                             <option value="" id="sl-kab" selected></option>                         
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">Kecamatan</label>
                        <select class="form-control form-control-sm" id="ed-kec"> 
                            <option value="" id="sl-kec" selected> </option> 
                        <option value=""> -- Pilih Kabupaten Dahulu --</option>                                                         
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">Desa / Kelurahan</label>
                        <select class="form-control form-control-sm" id="ed-desa"> 
                            <option value="" id="sl-desa" selected> </option> 
                        <option value=""> -- Pilih Kecamatan Dahulu --</option>                                                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Judul Konflik</label>
                       <input type="text" class="form-control form-control-sm" placeholder="Masukan Judul Konflik" name="product_name" id="ed-judul" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Detail Konflik</label>
                       <textarea class="form-control form-control-sm" placeholder="Masukan detail Konflik" name="product_name" id="ed-detail" > </textarea>
                    </div>
                   <div class="form-group">
                     <label for="message-text" class="form-control-label">Bidang Konflik</label>
                         <select class="form-control" id="ed-bidang" selected>   
                          <option value="" id="sl-bn"> </p></option>                          
                            <?php foreach ($bidang as $row ): ?>  
                                <option value="<?=$row->IDBENTUK?>"><?=$row->NMBENTUK?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>  
                     <label for="message-text" class="form-control-label">Tanggal Konflik</label>
                    <div class="form-group">
                        <input type="date" class="form-control" format="yyyy-mm-dd"  id="kt_datepicker"/>                      
                    </div>
                    <br>
                   <div class="form-group">
                     <label for="message-text" class="form-control-label">Status</label>
                         <select class="form-control op" id="ed-status">  
                          </select>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="val-ed" class="btn btn-secondary  btn-elevate btn-elevate-air" data-dismiss="modal">Batal</button>
                <button type="submit" id="btn-edit" class="btn btn-primary  btn-elevate btn-elevate-air">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
             <div class="modal-header btn-dark">
                <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Konflik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>                                        
                    <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                   <b><p id="nhapus"></p></b></center>
                   <input type="hidden" id="delkon" >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary  btn-elevate btn-elevate-air btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" id="del-kec" class="btn btn-primary  btn-elevate btn-elevate-air btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>




  <div class="kt-portlet__body">
    <!--begin: Search Form -->
  <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-0">
    <div class="row align-items-center">
      <div class="col-xl-8 order-2 order-xl-1">
        <div class="row align-items-center">                
                  <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                      <div class="kt-form__group kt-form__group--inline">
                          <div class="kt-form__label">
                              <label>Wilayah </label>
                          </div>
                          <div class="kt-form__control">
                           <select class="form-control" id="wilayah">
                              <option value="">All</option>
                              <?php foreach ($kab as $row ): ?>  
                                  <option value="<?=$row->NMWIL?>"><?=$row->NMWIL?></option>                               
                                   <?php endforeach ?>
                              </select>
                          </div>                      
                      </div>
                  </div>
                   <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                      <div class="kt-form__group kt-form__group--inline">
                          <div class="kt-form__label">
                              <label>Bidang </label>
                          </div>
                          <div class="kt-form__control">
                           <select class="form-control" id="bidang">
                              <option value="">All</option>
                              <?php foreach ($bidang as $row ): ?>  
                                  <option value="<?=$row->NMBENTUK?>"><?=$row->NMBENTUK?></option>                               
                                   <?php endforeach ?>
                              </select>
                          </div>                      
                      </div>
                  </div>
                  <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                      <div class="kt-form__group kt-form__group--inline">
                          <div class="kt-form__label">
                              <label>Tahun </label>
                          </div>
                          <div class="kt-form__control">
                           <select class="form-control" id="tahun">
                              <option value="">All</option>
                          
                          <?php
                          $tgla=getdate();
                          for ($a=$tgla['year']; $a>= 2018;$a--)
                          {?>                          
                            <option value="<?php echo $a; ?>"><?php echo $a; ?></option>   
                          <?php  } ?>                                                               
                              </select>
                          </div>                      
                      </div>
                  </div>
                
                        </div>
                               <center>
                  <!-- <div class="col-md-3 kt-margin-b-20-tablet-and-mobile"> -->
                      <!-- <div class="kt-form__group kt-form__group--inline"> -->
                          <br>
                          <button type="submit" id="filter" class="btn btn-warning btn-icon-sm btn-sm" title="Tambah Data Kecamatan">
                              <i class="flaticon2-search-1"></i> Tampilkan
                          </button>
                      <!-- </div> -->
                  <!-- </div> -->
                  </center>
                  <!-- <hr> -->
      </div> 
    <!--  <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
        <a href="#" class="btn btn-default kt-hidden">
          <i class="la la-cart-plus"></i> New Order
        </a>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
      </div> -->
    </div>
  </div>
         <div class="table-responsive">  
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <!-- <table id="example" class="table table-striped table-bordered table-responsive" > -->
                <thead>
                    <tr style="width: auto;">
                        <th>No</th>
                        <th>Nama Konflik</th>
                        <th>Deskripsi</th>                     
                        <th>Bidang</th>
                        <th>Kab/Kota</th>      
                        <th>Kecamatan</th>
                        <th>Desa/Kelurahan</th>  
                        <th>Tanggal</th> 
                        <th>Status</th> 
                        <th>Aksi</th>                    
                    </tr>
                </thead>
                <tbody id="kecamatannn">    

                </tbody>
               
            </table>    </div> 
    <!--end: Search Form -->
  </div>  
</div>


  </div>
<!-- end:: Content -->          </div>
        </div>
                <script type="text/javascript" src="<?php echo base_url()?>assets/data/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/dataTables.bootstrap4.min.js"></script>
<script>
    
        
    var table;
    var tables;

     
    $(document).ready(function() {     
       
      load();
    
       function load(){
       table = $('#kt_table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },  
            "processing": true, 
            "serverSide": true, 
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('Admin/konflik/views')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.wilayah = $('#wilayah').val();    
                    data.bidang = $('#bidang').val();    
                    data.tahun = $('#tahun').val();     
                   
                }

            },
      
            "columnDefs": [
            { 
                "targets": [ 0 ],
                "orderable": false,  
               
            },
            ],
 
      });
        
       

   }
   $('#filter').click(function(){

      table.ajax.reload();
      wilayah = $('#wilayah').val();    
      bidang = $('#bidang').val();    
      tahun = $('#tahun').val();  

      $('#ct-wilayah').val(wilayah);
      $('#ct-tahun').val(tahun);
      $('#ct-bidang').val(bidang);  
    });
   $('#save').click(function(){
      input();
   })
    function input(){       
      var desa = $('#in-des').val();
      var kec = $('#in-kec').val();        
      var judul = $('#in-judul').val();
      var detail = $('#in-detail').val();
      var bidang = $('#in-bidang').val();  
      var tanggal = $('#kt_datepicker_3_modal').val();  
      var status = $('#in-status').val();
         $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/konflik/input')?>",
           data:'kec='+kec+'&judul='+judul+'&detail='+detail+'&bidang='+bidang+'&tanggal='+tanggal+'&status='+status+'&desa='+desa,
          success: function(response){           
            $('#kinput').modal('hide');          
             $('#kt_subheader').html(response); 
            table.ajax.reload();               
          }
        })        
       }  

     $('#in-kab').change(function(){ 
         var kab = $('#in-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#in-kec').html(response);                     
          }
        })      
        });  

        $('#in-kec').change(function(){ 
         var kec = $('#in-kec').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/konflik/deskec')?>",
           data:'kec='+kec,
          success: function(response){            
             $('#in-des').html(response);                     
          }
        })      
        });   

          $('#ed-kab').change(function(){ //button filter event click    
         var kab = $('#ed-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#ed-kec').html(response);                     
          }
        })      
        });   

         $('#ed-kec').change(function(){ //button filter event click    
         var kec = $('#ed-kec').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/deskec')?>",
           data:'kec='+kec,
          success: function(response){            
             $('#ed-desa').html(response);                     
          }
        })      
        });   

    $('body').on('click','.delete_btn',function(){       
             var id = $(this).data("id");
             var nm = $(this).data("nm");
             $('#mdelete').modal('show');
             $('#nhapus').html(nm);
             $('#delkon').val(id);
        });   

    $('body').on('click','.edit_btn',function(){       
             var id = $(this).data("id");
             var nm = $(this).data("nm");
             var bn = $(this).data("bn");
             var idbn = $(this).data("idbn");
             var kec = $(this).data("kec");
             var desa = $(this).data("desa");
             var iddesa = $(this).data("iddesa");
             var idkec = $(this).data("idkec");
             var kab = $(this).data("kab");
             var idkab = $(this).data("idkab");
              var sts = $(this).data("sts");
               var idsts = $(this).data("idsts");
             var tgl = $(this).data("tgl");
             var dt = $(this).data("dt");

             var bid = document.getElementById('ed-bidang');
            bid.selectedIndex = 0; 
             var kb = document.getElementById('ed-kab');
            kb.selectedIndex = 0; 

             var kc = document.getElementById('ed-kec');
            kc.selectedIndex = 0; 

            var kc = document.getElementById('ed-status');
            kc.selectedIndex = 0; 
             
             $('#val-ed').val(id);
             $('#ed-judul').val(nm);
             $('#ed-detail').val(dt);

             $('#sl-kab').val(idkab);
             $('#sl-kab').html(kab);

             $('#sl-kec').val(idkec);
             $('#sl-kec').html(kec);

             $('#sl-desa').val(iddesa);
             $('#sl-desa').html(desa);

              $('#sl-bn').val(idbn);
              $('#sl-bn').html(bn);

             $('#sl-st').val(idsts);
             $('#sl-st').html(sts);
             $('#kt_datepicker').val(tgl);  
             $('#kedit').modal('show');            
        });  

      $('#btn-edit').click(function(){ //button filter event click    

           var ids= $('#val-ed').val();
           var nm = $('#ed-judul').val();
           var kec = $('#ed-kec').val();
           var desa = $('#ed-desa').val();
           var dt = $('#ed-detail').val();
           var bd = $('#ed-bidang').val();
           var st = $('#ed-status').val();
           var tgl =  $('#kt_datepicker').val();
                    
     
               $.ajax({
              type:'POST',
               url: "<?php echo site_url('Admin/konflik/edit')?>",
              data:'kec='+kec+'&judul='+nm+'&detail='+dt+'&bidang='+bd+'&tanggal='+tgl+'&status='+st+'&sids='+ids+'&desa='+desa,
              success: function(response){                   
                $('#kedit').modal('hide');          
                 $('#kt_subheader').html(response); 
                table.ajax.reload();               
              }
            })        
        });  

     $('#del-kec').click(function(){ //button filter event click             
         var idkon =  $('#delkon').val();        
           $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/delete')?>",
           data:'kon='+idkon,
          success: function(response){           
            $('#mdelete').modal('hide');          
             $('#kt_subheader').html(response); 
            table.ajax.reload();               
          }
        })        
        });  

    });
$(document).ready( function(){
   $.ajax({
      type: "GET",
      url: "<?php echo base_url('admin/ubahType')?>",
      data: {
        type: 0
      },
      success: function (data) {
        table.ajax.reload();
      }
    });

   $.ajax({
      type: "GET",
      url: "<?php echo base_url('Admin/konflik/ubahType')?>",
      success: function (data) {
        
        $('.op').html('<option value=""> -- Pilih Bidang Konflik --</option>'+data);
      }

    });
});

  //
  $('#orang_asing').click(function(){
       
        $.ajax({
          type: "GET",
          url: "<?php echo base_url('admin/ubahType')?>",
          data: {
            type: 1
          },
          success: function (data) {
            table.ajax.reload();
          }
        });
        $.ajax({
      type: "GET",
      url: "<?php echo base_url('Admin/konflik/ubahType')?>",
      success: function (data) {

        $('.op').html('<option value=""> -- Pilih Bidang Konflik --</option>'+data);
      }
    });
     
      
  });
  $('#data_konflik').click(function(){

      
      $.ajax({
          type: "GET",
          url: "<?php echo base_url('admin/ubahType')?>",
          data: {
            type: 0
          },
          success: function (data) {
            table.ajax.reload();
          }
        });
      $.ajax({
      type: "GET",
      url: "<?php echo base_url('Admin/konflik/ubahType')?>",
      success: function (data) {

        $('.op').html('<option value=""> -- Pilih Bidang Konflik --</option>'+data);
      }
    });
  });




</script>