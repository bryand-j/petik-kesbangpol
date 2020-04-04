
							
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
				Data Berita Konflik
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
		<a type="button" class="btn btn-outline-primary btn-icon-sm btn-sm" href="<?=base_url()?>operator/berita/inputform" title="Tambah Data Berita" >
			<i class="flaticon-file-1"></i> Tambah Data
		</a>
	</div>
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
                        <th>Nama Konflik</th>                     
                        <th>Judul Berita</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Viewer</th>
                        <th>Aksi</th>                            
                    </tr>
                </thead>
                <tbody >   

                <?php $no=0; foreach ($berita as $row): $no++;  ?>
                    <tr>
                        <td> <?=$no ?> </td>
                        <td> <?=substr($row->NMANGKET,0,50)."..." ?> </td>
                        <td> <?=substr($row->JUDUL,0,50)."..."?></td>
                       
                        <td> 
                            <?php if ($row->STATUS=='1'): ?>
                               <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill">Published</span>
                            <?php else: ?>
                                <span class="kt-badge kt-badge--warning  kt-badge--inline kt-badge--pill">Not Published</span>
                            <?php endif ?>
                        </td>
                        <td><?=$row->NMUSER?></td>
                        <td> <span class="flaticon-eye"></span><?=" ".$row->VIEWER?></td>
                        <td>
                            <div class='dropdown dropdown-inline'>
                                <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='flaticon-more-1'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-right'>
                                    <a class='dropdown-item edit_btn' href="<?=base_url()?>operator/berita/editform/<?=$row->IDKONFLIK ?>"><i class='la la-pencil-square  '></i> Edit</a>
                                    <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$row->IDKONFLIK ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#detail<?=$row->IDKONFLIK ?>'><i class='la la-eye'></i> Detail</button>
                                </div>
                            </div> 
                        </td>

                            <div class="modal fade" id="delete<?=$row->IDKONFLIK ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">                                
                                                <center><p>Apakah Anda Yakin ingin Menghapus Berita Ini</p>
                                               <b><p><?=$row->JUDUL ?></p></b></center>
                                               
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <a  id="del-kec" class="btn btn-primary" href="<?=base_url()?>operator/berita/delete/<?=$row->IDKONFLIK ?>">Hapus</a>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="detail<?=$row->IDKONFLIK ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                      
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">                                
                                        <h3><?=$row->JUDUL?></h3>
                                        <br>
                                           <?=$row->ISI?>
                                    </div>
                            
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
<script src="<?php echo base_url()?>assets/js/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
<script >
     $(document).ready(function() {   
    
      load();         
       function load(){
       $('#kt_table').DataTable({
         
        });
      
   }
 
    });

</script>



