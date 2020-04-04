
							
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
				Data Kecamatan
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
		<button type="button" class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon-sm btn-sm" title="Tambah Data Kecamatan" data-toggle="modal" data-target="#kinput">
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
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Kecamatan</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data"> 
                    
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <select class="form-control form-control-md" id="kab" name="kab">   
                        <option value=""> -- Pilih Kabupaten -- </option>                          
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Kecamatan</label>
                       <input type="text" class="form-control form-control-md"  id="kec" name="kec">
                    </div>
                     <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Koordinat</label>
                       <input type="text" class="form-control form-control-md" id="kor" name="kor" placeholder="Masukan Koordinat Kecamatan ( Contoh : -10.4904256,122.4295641)">
                    </div>
                    <div class="form-group">
                        <label>File Geojson Kecamatan</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" id="ingeokec"  name="ingeokec">
                            <label id="label" class="custom-file-label" for="customFile">Pilih File ( *Berekstensi Geojson )</label>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i>  Simpan</button>
            </div> </form>
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
                        <input type="hidden" class="form-control "  id="idkec" name="idkec">
                        <select class="form-control form-control-sm" name="ekab">   
                             <option id="e-idkab" selected ><p id="enmkab"></p></option>                            
                            <?php foreach ($kab as $row ): ?>  
                                <option value="<?=$row->IDWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Kecamatan</label>
                       <input type="text" class="form-control " name="ekec" id="ekec" >
                    </div>
                     <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Koordinat</label>
                       <input type="text" class="form-control " id="ekor" name="ekor" placeholder="Masukan Koordinat Kecamatan ( Contoh : -10.4904256,122.4295641)">
                    </div>
                    <div class="form-group">
                        <label>File Geojson Kecamatan</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" name="egeo" id="egeo">
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
<div class="modal fade" id="mdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-dark">
                    <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            <div class="modal-body">
                <form>                                        
                    <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                   <b><p id="nhapus"></p></b></center>
                   <input type="hidden" id="delkec" >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="del-kec" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus</button>
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
					<div class="kt-input-icon kt-input-icon--left">
						
					</div>
				</div>
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
				
					</div>
				</div>
                			</div>
		</div>
	</div>
</div>

        <!-- <div class="table-responsive">   -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <!-- <table id="example" class="table table-striped table-bordered table-responsive" > -->
                <thead>
                    <tr style="width: auto;">
                        <th>NO</th>
                        <th>Kabupaten</th>                     
                        <th>Kecamatan</th>     
                        <th>Koordinat</th>  
                        <th>File Geojson</th> 
                        <th>Aksi</th>                   
                        
                    </tr>
                </thead>
                <tbody >    

                </tbody>
               
            </table>   
             <!-- </div>  -->
		<!--end: Search Form -->
	</div>
     	
</div>


	</div>
<!-- end:: Content -->					</div>
				</div>
                <script type="text/javascript" src="<?php echo base_url()?>assets/data/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/dataTables.bootstrap4.min.js"></script>
<script>
    
        
    var table;
     var tables;
     
    $(document).ready(function() {
        // $('#kab').select2();
        $('#cancel').on('click', function(){

                $('#upload_form').trigger("reset"); 
                $('#label').html(" Pilih File ( *Berekstensi Geojson ) ");                  
        });


        $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/kecamatan/upload",                        
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


    $('#edit_form').on('submit', function(e){  
           e.preventDefault();  
           
                $.ajax({  
                     url:"<?php echo base_url(); ?>Admin/kecamatan/edit",                        
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
            
      });  

       
      load();     
       // loads();       
       function load(){
       table = $('#kt_table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },  
            "processing": true, 
            "serverSide": true, 
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('Admin/kecamatan/view')?>",
                "type": "POST",
                "data": function ( data ) {
                    data.wilayah = $('#wilayah').val();                    
                }

            },
      
            "columnDefs": [
            { 
                "targets": [ 0 ],
                "orderable": false,  
               
            },
            ],
 
        });

        $('#tampil').click(function(){ //button filter event click
            table.ajax.reload();  //just reload table
        });
       

   }
    function input(){       
      var kecam = $('#kec').val();
      var kab = $('#in-kab').val();     
     var  koord = $('#in-koorkec').val();
      var geo = $('#in-geokec').val();  
         $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/kecamatan/input')?>",
           data:'kab='+kab+'&kec='+kecam+'&koord='+koord+'&geo='+geo,
          success: function(response){           
            $('#kinput').modal('hide');          
             $('#kt_subheader').html(response); 
            table.ajax.reload();               
          }
        })        
       }
    $('#savera').click(function(){ //button filter event click       
          // input();
        }); 

     $('#wilayah').change(function(){ //button filter event click       
          table.ajax.reload();  
        });   

    $('body').on('click','.delete_btn',function(){       
             var id = $(this).data("id");
             var nm = $(this).data("nm");
             $('#mdelete').modal('show');
             $('#nhapus').html(nm);
             $('#delkec').val(id);
        });   

    $('body').on('click','.edit_btn',function(){       
             var id = $(this).data("id");
             var nm = $(this).data("nm");
             var koor = $(this).data("koor");
             var idkab = $(this).data("idwil");
              var nmkab = $(this).data("nmwil");
             $('#kedit').modal('show');
             $('#nhapus').html(nm);
             $('#ekec').val(nm);
             $('#ekor').val(koor);
             $('#e-idkab').val(idkab);
             $('#e-idkab').html(nmkab);
             $('#idkec').val(id);
        });  

     $('#del-kec').click(function(){ //button filter event click    

         var idkec =  $('#delkec').val();        
           $.ajax({
          type:'POST',
           url: "<?php echo site_url('admin/kecamatan/delete')?>",
           data:'kec='+idkec,
          success: function(response){           
            $('#mdelete').modal('hide');          
             $('#kt_subheader').html(response); 
            table.ajax.reload();               
          }
        })        
        });  

    });



</script>