
							
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
	
</div>
		</div>
	</div>







	<div class="kt-portlet__body">
     


             <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-40">
  <div class="row align-items-center">
    <div class="col-xl-8 order-2 order-xl-1">
    
        <div class="row align-items-center ">      
    

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
                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                    <center>
                
                        <button type="button" id="filter" class="btn btn-warning btn-icon-sm btn-sm" title="Tambah Data Kecamatan">
                            <i class="flaticon2-search-1"></i> Tampilkan
                        </button>
                 
                    </center>
                    
                </div>              
              
        </div>
                
              
    </div>
      
  
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

    
      

        //############ -- Delete Data Desa ###################\\


  
    
        //############ -- End Delete Data Desa ###################\\

        //############# - Edit Data Desa #########################\\


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
           table.ajax.reload();     //just reload table
    });



  

       var kab ="<?php echo $this->session->userdata('IDWIL') ; ?>";   
       // alert(kab);
        $.ajax({
        type:'POST',
         url: "<?php echo site_url('Operator/konflik/keckab')?>",
         data:'kab='+kab,
        success: function(response){

           $(response).appendTo('#fl-kec');                     
        }
      });      
    

 
    });

</script>



