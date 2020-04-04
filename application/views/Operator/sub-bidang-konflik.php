
							
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


<div class="modal fade" id="kinput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <form method="post" action="<?php echo base_url()?>Admin/sub_bidang/input">  
             <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Bidang Konflik</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                     <div class="form-group">
                        <label for="message-text" class="form-control-label">Bidang Konflik</label>
                        <select class="form-control form-control-md" id="bidang" name="bidang">   
                         <option value="" selected> -- Pilih Bidang --</option>                          
                            <?php foreach ($bidang as $row ): ?>  
                                <option value="<?=$row->IDBENTUK?>"><?=$row->NMBENTUK?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>        
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Sub Bidang</label>
                       <input type="text" class="form-control form-control-sm" name="subbidang"  >
                    </div>                    
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Deskripsi</label>
                       <textarea class="form-control form-control-sm" name="deskripsi" ></textarea>
                    </div>
                   
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i>  Simpan</button>
            </div>
            </form>
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
                        <th width="12%">Sub Bidang</th>
                        <th width="60%">Deskrpisi</th>
                                              
                    </tr>
                </thead>
                <tbody >   

                <?php $no=0;
                foreach ($subbidang as $row): $no++;                     
                      ?>
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$row->NMBENTUK ?> </td>                            
                            <td >  <?=$row->NMSUBBIDANG ?>  </td>
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



