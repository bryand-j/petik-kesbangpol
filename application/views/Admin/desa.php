
							
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
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-file"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Data Desa
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
<!-- 	<a href="#" class="btn btn-clean btn-icon-sm">
		<i class="la la-long-arrow-left"></i>
		Back
	</a>
	&nbsp; -->
	<div class="dropdown dropdown-inline">
		<button type="button" class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon-sm btn-sm" title="Tambah Data Desa" data-toggle="modal" data-target="#kinput">
			<i class="flaticon-file-1"></i> Tambah Data
		</button>
	</div>
</div>
		</div>
	</div>


<div class="modal fade" id="kinput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
               
            <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Desa</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
              <form id="upload_form" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <select class="form-control form-control-md" id="in-kab" name="kab">   
                         <option value="" selected> -- Pilih Kabupaten --</option>                          
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Kecamatan</label>
                        <select class="form-control " id="in-kec" name="kec"> 
                        <option value=""> -- Pilih Kabupaten Dahulu --</option>                                                         
                        </select>
                    </div>                   
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Desa</label>
                       <input type="text" class="form-control " name="desa" placeholder="Masukan Nama Desa">
                    </div>
                     <div class="form-group">
                        <label>File Geojson Desa</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" id="ingeokec" application-accept="geo+json"  name="file">
                            <label class="custom-file-label" id="label" for="customFile">Pilih File ( *Berekstensi Geojson )</label>
                        </div>
                    </div>
                   
                
            </div>
            <div class="modal-footer ">
                <button type="button" id="cancel" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i>Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="mdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-dark">
                    <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Desa/Kelurahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            <div class="modal-body">
                <form>                                        
                    <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                   <b><p id="nhapus"></p></b></center>
                   <input type="hidden" id="deldesa" >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="del-desa" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="kedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon-interface-4"></i> Ubah Data Kecamatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
             </div>
            <div class="modal-body">
                <form id="edit_form" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <input type="hidden" class="form-control "  id="iddesa" name="iddesa">
                        <select class="form-control form-control-sm" id="e-kab" name="ekab">   
                            <option id="eidkab" selected ><p id="enmkab"></p></option>                            
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Kecamatan</label>
                        <select class="form-control " id="e-kec" name="ekec"> 
                        <option id="e-idkec" selected ><p id="e-nmkec"></p></option>       
                        <option value=""> -- Pilih Kabupaten Dahulu --</option>                                                         
                        </select>
                    </div>    
                     <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Desa</label>
                       <input type="text" class="form-control " id="edesa" name="edesa" placeholder="Masukan Koordinat Kecamatan ( Contoh : -10.4904256,122.4295641)">
                    </div>
                    <div class="form-group">
                        <label>File Geojson Kecamatan</label> (<b id="gjson-desa"></b>)
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" name="file" id="egeo">
                            <label class="custom-file-label" for="customFile">Pilih File ( *Berekstensi Geojson )</label>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-interface-4"></i>  Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


	<div class="kt-portlet__body">
     


             <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-0">
  <div class="row align-items-center">
    <div class="col-xl-8 order-2 order-xl-1">
    
        <div class="row align-items-center">      
    
                <div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Wilayah </label>
                        </div>
                        <div class="kt-form__control">
                         <select class="form-control" id="fl-kab" name="fl-kab">
                            <option value="">All</option>
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                        </div>                      
                    </div>
                </div>
                 <div class="col-md-6 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Kecamatan </label>
                        </div>
                        <div class="kt-form__control">
                         <select class="form-control" id="fl-kec" name="fl-kec">
                            <option value="">All</option>                          
                            </select>
                        </div>                      
                    </div>
                </div>              
              
                      </div>
                             <center>
                <!-- <div class="col-md-3 kt-margin-b-20-tablet-and-mobile"> -->
                    <!-- <div class="kt-form__group kt-form__group--inline"> -->
                        <br>
                        <button type="button" id="filter" class="btn btn-warning btn-icon-sm btn-sm" title="Tambah Data Kecamatan">
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
   <script type="text/javascript" src="<?php echo base_url()?>assets/data/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/dataTables.bootstrap4.min.js"></script>

		<!--begin: Search Form -->
              <div class="table-responsive">  
        <table class="table table-striped- table-bordered table-hover " id="kt_table" style="width: 100%;">            
                <thead style="background-color: #4137a5; color: white;">
                    <tr style="">
                        <th>No</th>
                        <th>Nama Desa</th>                     
                        <th>Kecamatan</th>     
                        <th>Kabupaten/Kota</th>  
                        <th>File Geojson</th>                         
                        <th>Aksi</th>                          
                    </tr>
                </thead>
                <tbody >   
  
                </tbody>
               
            </table> </div>
		<!--end: Search Form -->
	</div>
  
</div>


	</div>
<!-- end:: Content -->					</div>
				</div>
             
<script >
     $(document).ready(function() {   

           $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/desa/input",                        
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(response)  
                     {  
                         $('#kinput').modal('hide');          
                         $('#kt_subheader').html(response); 
                        table.ajax.reload();    
                     }  
                }); 

                $('#upload_form').trigger("reset"); 
                $('#label').html(" Pilih File ( *Berekstensi Geojson ) ");                               
            
      });  

      

        //############ -- Delete Data Desa ###################\\

        $('body').on('click','.delete_btn',function(){       
             var id = $(this).data("id");
             var nm = $(this).data("nm");
             $('#mdelete').modal('show');
             $('#nhapus').html(nm);
             $('#deldesa').val(id);
        }); 

        $('#del-desa').click(function(){ 

         var iddesa =  $('#deldesa').val();        
           $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/desa/delete')?>",
           data:'desa='+iddesa,
          success: function(response){           
            $('#mdelete').modal('hide');          
            $('#kt_subheader').html(response); 
            table.ajax.reload();               
          }
        })        
        });    
    
        //############ -- End Delete Data Desa ###################\\

        //############# - Edit Data Desa #########################\\

             $('body').on('click','.edit_btn',function(){       
             var id = $(this).data("id");
             
             var nmdesa = $(this).data("nmdesa");
             var idkab = $(this).data("idwil");
              var nmkab = $(this).data("nmwil");
              var idkec = $(this).data("idkec");
              var nmkec = $(this).data("nmkec");
              var geo = $(this).data("geo");
             $('#kedit').modal('show');            
             $('#gjson-desa').html(geo);
             $('#e-idkec').val(idkec);
             $('#e-idkec').html(nmkec);
             $('#edesa').val(nmdesa);
             $('#eidkab').val(idkab);
             $('#eidkab').html(nmkab);            
             $('#iddesa').val(id);
        });  

        $('#edit_form').on('submit', function(e){  
           e.preventDefault();  
           
                $.ajax({  
                     url:"<?php echo base_url(); ?>Admin/desa/edit",                        
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(response)  
                     {  
                         $('#kedit').modal('hide');          
                         $('#kt_subheader').html(response); 
                        table.ajax.reload();    
                     }  
                });  

                $('#edit_form').trigger("reset");             
            
      });  

              //############ -- End Edit Data Desa ###################\\

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
                        "url": "<?php echo site_url('Admin/desa/view')?>",
                        "type": "POST",
                        "data": function ( data ) {
                            data.kecamatan = $('#fl-kec').val();  
                            data.kabupaten = $('#fl-kab').val();                    
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
 
   $('#filter').on('click',function(){  //button filter event click
       var kab = $('#fl-kec').val();
           table.ajax.reload();     //just reload table             
        });


      $('#in-kab').change(function(){ 
         var kab = $('#in-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#in-kec').html(response);                     
          }
        })      
        });  

         $('#e-kab').change(function(){ 
         var kab = $('#e-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#e-kec').html(response);                     
          }
        })      
        });   

       $('#fl-kab').change(function(){ 
         var kab = $('#fl-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('Admin/konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#fl-kec').html(response);                     
          }
        })      
        });   


      $('#ed-kab').change(function(){ 
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
 
    });

</script>



