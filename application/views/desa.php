
							
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
				Data Kabupaten
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
              <form method="post" action="desa/input" enctype="multipart/form-data">  
            <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Desa</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                             
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                        <select class="form-control form-control-md" id="in-kab" name="kab">   
                         <option value="" selected> -- Pilih Kecamatan --</option>                          
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
                            <label class="custom-file-label" for="customFile">Pilih File ( *Berekstensi Geojson )</label>
                        </div>
                    </div>
                   
                
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i>Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i> Simpan</button>
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
                <thead style="background-color: #4137a5; color: white;">
                    <tr style="width: auto;">
                        <th>No</th>
                        <th>Nama Desa</th>                     
                        <th>Kecamatan</th>     
                        <th>Kabupaten</th>  
                        <th>File Geojson</th>                         
                        <th>Aksi</th>                          
                    </tr>
                </thead>
                <tbody >   
                <?php $no = 0; foreach ($desa as $row): $no++; ?> 
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$row->NMDESA ?> </td>
                            <td> <?=$row->NMKEC ?> </td>                                                      
                             <td> <?=$row->NMWIL ?> </td>
                               <td> <?=$row->GJSONDES ?> </td>
                             <td>
                                <div class='dropdown dropdown-inline'>
                                    <button type='button' class='btn btn-success btn-elevate btn-elevate-air btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='flaticon-more-1'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <button class='dropdown-item btn-elevate btn-elevate-air edit_btn' data-toggle='modal'  data-target='#edit<?=$row->IDDESA ?>'><i class='la la-pencil-square  '></i> Edit</button>
                                         <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$row->IDDESA ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    </div>
                                </div> 
                            </td>

                            <div class="modal fade" id="delete<?=$row->IDDESA ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          <form method="post" action="desa/delete">     
                                        <div class="modal-header btn-dark">
                                            <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Desa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                                             
                                                <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                                               <b><p><?=$row->NMDESA ?></p></b></center>
                                               <input type="hidden" name="desa" value="<?=$row->IDDESA ?>" >
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                            <button type="submit" id="del-kec" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus</button>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="edit<?=$row->IDDESA ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="desa/edit" enctype="multipart/form-data">  
                                             <input type="hidden" class="form-control " name="iddesa" value="<?=$row->IDDESA ?>"  placeholder="Masukan Nama Desa">
                                            <div class="modal-header btn-success">
                                                <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon-interface-4"></i> Ubah Data Desa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                             
                                                          <div class="form-group">
                                                            <label for="message-text" class="form-control-label">Wilayah Kab/Kota</label>
                                                            <select class="form-control form-control-md" id="ed-kab" name="kab">      
                                                                <option value="<?=$row->IDWIL?>" selected><?=$row->NMWIL?></option>                      
                                                                <?php foreach ($kab as $rowS ): ?>  
                                                                    <option value="<?=$rowS->IDWIL?>"><?=$rowS->NMWIL?></option>                               
                                                                     <?php endforeach ?>
                                                                </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="form-control-label">Kecamatan</label>
                                                            <select class="form-control " id="ed-kec" name="kec"> 
                                                             <option value="<?=$row->IDKEC?>" selected><?=$row->NMKEC?></option>
                                                            <!-- <option value=""> -- Pilih Kabupaten Dahulu --</option>                                                          -->
                                                            </select>
                                                        </div>                                                                                                     
                                                      <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Nama Desa</label>
                                                       <input type="text" class="form-control " name="desa" value="<?=$row->NMDESA ?>"  placeholder="Masukan Nama Desa">
                                                    </div>
                                                     <div class="form-group" >
                                                        <label>File Geojson Desa (<b> <?=$row->GJSONDES ?> </b>)</label>
                                                        <div></div>
                                                        <div class="custom-file" >
                                                            <input type="file"  class="custom-file-input" id="ingeokec"  name="file">
                                                            <label  class="custom-file-label" for="customFile"><p style="float: left;">Pilih File ( *Berekstensi Geojson )<p></label>
                                                        </div>
                                                    </div>                                                   
                                                   
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-interface-4"></i> Simpan</button>
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

      $('#in-kab').change(function(){ 
         var kab = $('#in-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#in-kec').html(response);                     
          }
        })      
        });   

      $('#ed-kab').change(function(){ 
         var kab = $('#ed-kab').val();   
         // alert(kab);
          $.ajax({
          type:'POST',
           url: "<?php echo site_url('konflik/keckab')?>",
           data:'kab='+kab,
          success: function(response){            
             $('#ed-kec').html(response);                     
          }
        })      
        });   
 
    });

</script>



