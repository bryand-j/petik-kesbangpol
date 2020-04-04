
							
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
		<button type="button" class="btn btn-outline-primary btn-icon-sm btn-sm btn-elevate btn-elevate-air" title="Tambah Data Kecamatan" data-toggle="modal" data-target="#kinput">
			<i class="flaticon-file-1"></i> Tambah Data
		</button>
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
                        <th width="5%">Aksi</th>                            
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
                             <td>
                                <div class='dropdown dropdown-inline'>
                                    <button type='button' class='btn btn-success btn-elevate btn-elevate-air btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='flaticon-more-1'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <button class='dropdown-item edit_btn' data-toggle='modal'  data-target='#edit<?=$row->IDSUBBIDANG ?>'><i class='la la-pencil-square  '></i> Edit</button>
                                         <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$row->IDSUBBIDANG ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    </div>
                                </div> 
                            </td>

                            <div class="modal fade" id="delete<?=$row->IDSUBBIDANG ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          <form method="post" action="<?php echo base_url() ?>Admin/sub_bidang/delete">     
                                        <div class="modal-header btn-dark">
                                            <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Bidang Konflik</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">                                
                                                <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                                               <b><p><?=$row->NMSUBBIDANG ?></p></b></center>
                                               <input type="hidden" name="subbidang" value="<?=$row->IDSUBBIDANG ?>" >
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                            <button type="submit" id="del-kec" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon2-rubbish-bin-delete-button"></i> Simpan</button>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edit<?=$row->IDSUBBIDANG ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="<?php echo base_url()?>Admin/sub_bidang/edit">  
                                             <div class="modal-header btn-success">
                                                <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon-interface-4"></i> Ubah Data Kabupaten</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                             </div>
                                            <div class="modal-body">
                                                   <div class="form-group">
                                                      <label for="message-text" class="form-control-label">Bidang Konflik</label>
                                                      <select class="form-control form-control-md" id="bidang" name="bidang">   
                                                       <option value="<?=$row->IDBENTUK ?>" selected> <?=$row->NMBENTUK ?></option>                          
                                                          <?php foreach ($bidang as $rows ): ?>  
                                                              <option value="<?=$rows->IDBENTUK?>"><?=$rows->NMBENTUK?></option>                               
                                                               <?php endforeach ?>
                                                          </select>
                                                  </div>              
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Nama Bidang</label>
                                                         <input type="hidden" class="form-control form-control-sm" name="idsubbidang" value=" <?=$row->IDSUBBIDANG ?>" >
                                                       <input type="text" class="form-control form-control-sm" name="subbidang" value=" <?=$row->NMSUBBIDANG ?>" >
                                                    </div>
                                                                                                         
                                                   <div class="form-group">
                                                      <label for="recipient-name" class="form-control-label">Deskripsi</label>
                                                     <textarea class="form-control form-control-sm" name="deskripsi" ><?=$row->DESKRIPSI ?></textarea>
                                                  </div>

                                                      
                                                   
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"> <i class="flaticon-interface-4"></i> Simpan</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
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



