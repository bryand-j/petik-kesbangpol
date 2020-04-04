
							
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
	
</div>
		</div>
	</div>




	<div class="kt-portlet__body">
		<!--begin: Search Form -->


        <!-- <div class="table-responsive">   -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <!-- <table id="example" class="table table-striped table-bordered table-responsive" > -->
                <thead>
                    <tr style="width: auto;">
                        <th>NO</th>
                        <th>Kabupaten</th>                     
                        <th>Kecamatan</th>     
                        <th>Koordinat</th>                         
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