
							
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
				<i class="kt-font-brand flaticon2-layers"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Data Bidang Konflik
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
	</div>
</div>
		</div>
	</div>




	<div class="kt-portlet__body">
		<!--begin: Search Form -->
                 <div class="table-responsive">  
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <!-- <table id="example" class="table table-striped table-bordered table-responsive" > -->
                <thead>
                    <tr align="center" style="width: auto;">
                        <th width="5%">No</th>
                        <th width="18%">Bidang</th>                     
                        <th width="12%">Kode Warna</th>
                        <th width="60%">Deskrpisi</th>                                            
                    </tr>
                </thead>
                <tbody >   

                <?php $no=0;
                foreach ($bidang as $row): $no++;                     
                      ?>
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$row->NMBENTUK ?> </td>                            
                            <td > <small type="button" class="btn btn-md "  style="background-color:<?=$row->WARNABNTK?>"></small> &nbsp;<?=$row->WARNABNTK?> </td>
                             <td> <?=$row->DESKRIPSI ?> </td>
                           
                          
          
                    </tr>
                <?php endforeach; ?>
                </tbody>
               
            </table>    </div>
		<!--end: Search Form -->
	</div>

</div>


	</div>
<!-- end:: Content -->					</div>
				</div>
                <script type="text/javascript" src="<?php echo base_url()?>assets/data/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data/dataTables.bootstrap4.min.js"></script>
<script >
     $(document).ready(function() {   
    
      load();         
       function load(){
       $('#kt_table').DataTable({
         
        });
      
   }
 
    });

</script>



