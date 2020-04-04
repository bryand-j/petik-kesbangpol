
							
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
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Data Partai Politik
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
		<button type="button" class="btn btn-outline-primary btn-icon-sm btn-sm" title="Tambah Data Kecamatan" data-toggle="modal" data-target="#kinput">
			<i class="flaticon-file-1"></i> Tambah Data
		</button>
	</div>
</div>
		</div>
	</div>


<div class="modal fade" id="kinput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <form method="post" action="parpol/input" enctype="multipart/form-data">  
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                             
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Partai Politik</label>
                       <input type="text" class="form-control " name="pol"  >
                    </div>                   
                     <div class="form-group">
                        <label>Logo Partai Politik</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" id="ingeokec"  name="file">
                            <label class="custom-file-label" for="customFile">Pilih File ( *jpg|jpeg|png )</label>
                        </div>
                    </div>
                   
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" id="savera" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>






	<div class="kt-portlet__body">
		<!--begin: Search Form -->

		<!--end: Search Form -->
	</div>
       <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-0">
       
            <div class="row align-items-center" style="padding: 0px 2%;">                
                <div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-input-icon kt-input-icon--left">
                </td>
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <!-- <table id="example" class="table table-striped table-bordered table-responsive" > -->
                <thead>
                    <tr style="width: auto;">
                        <th>No</th>
                        <th>Nama Partai Politik</th>                     
                        <th>Logo Partai</th>  
                        <th>Total Suara</th>                             
                        <th>Aksi</th>                          
                    </tr>
                </thead>
                <tbody >   
                <?php $no = 0; foreach ($parpol as $row): $no++; ?> 
                    
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$row->NMPARPOL ?> </td>
                            <td><img src="<?php echo base_url('assets/gambar/'.$row->LOGOPARPOL.'') ?> " style="max-width:45px; max-height:45px; "> </td> 
                             <td> <?=$row->NMPARPOL ?> </td>                          
                             <td>
                                <div class='dropdown dropdown-inline'>
                                    <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='flaticon-more-1'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <button class='dropdown-item edit_btn' data-toggle='modal'  data-target='#edit<?=$row->IDPARPOL ?>'><i class='la la-pencil-square  '></i> Edit</button>
                                         <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$row->IDPARPOL ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    </div>
                                </div> 
                            </td>

                            <div class="modal fade" id="delete<?=$row->IDPARPOL ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          <form method="post" action="parpol/delete">     
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                                             
                                                <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                                               <b><p><?=$row->NMPARPOL ?></p></b></center>
                                               <input type="hidden" name="pol" value="<?=$row->IDPARPOL ?>" >
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" id="del-kec" class="btn btn-primary">Simpan</button>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edit<?=$row->IDPARPOL ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="parpol/edit" enctype="multipart/form-data">  
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                             
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Nama Kabupaten</label>
                                                         <input type="hidden" class="form-control form-control-sm" name="idpol" value=" <?=$row->IDPARPOL ?>" >
                                                       <input type="text" class="form-control " name="pol" value=" <?=$row->NMPARPOL ?>" >
                                                    </div>
                                                     <div class="form-group" >
                                                        <label>File Geojson Kabupaten</label>
                                                        <div></div>
                                                        <div class="custom-file" >
                                                            <input type="file"  class="custom-file-input" id="ingeokec"  name="file">
                                                            <label class="custom-file-label" for="customFile" ><p style="float: left; align-items: left;">Pilih File ( *jpg | png  )<p></label>
                                                        </div>
                                                    </div>
                                                   
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                    </tr>
                <?php endforeach; ?>
                </tbody>
               
            </table>    </div>  </div>  </div>  </div>  
	<div class="kt-portlet__body kt-portlet__body--fit">
		<!--begin: Datatable -->

		<div class="kt-datatable" id="local_data"></div>
       

		<!--end: Datatable -->
        
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



