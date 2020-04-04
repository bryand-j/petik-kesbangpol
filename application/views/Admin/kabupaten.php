
							
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
              <form method="post" action="kabupaten/input" enctype="multipart/form-data">  
            <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Kabupaten</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                             
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Kabupaten</label>
                       <input type="text" class="form-control " name="kab"  >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Koordinat</label>
                       <input type="text" class="form-control " name="koor" placeholder="Masukan Koordinat Kecamatan ( Contoh : -10.4904256,122.4295641)" >
                    </div>
                     <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Zoom View</label>
                       <input type="text" class="form-control " name="zoom" >
                    </div>
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Kode Warna</label>
                       <input type="color" class="form-control " name="warna" placeholder="Masukan Kode Warna Wilayah ( Contoh :red = merah)">
                    </div>
                     <div class="form-group">
                        <label>File Geojson Kabupaten</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" id="ingeokec" application-accept="geo+json"  name="file">
                            <label class="custom-file-label" for="customFile">Pilih File ( *Berekstensi Geojson )</label>
                        </div>
                    </div>
                   
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal btn-elevate btn-elevate-air btn-sm"><i class="flaticon-circle"></i> Batal</button>
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
                    <tr style="width: auto;">
                        <th>No</th>
                        <th>Kabupaten</th>                     
                        <th>Koordinat</th>     
                        <th>Zoom View</th>  
                        <th>Kode Warna</th> 
                        <th>File Geojson</th> 
                        <th>Aksi</th>                          
                    </tr>
                </thead>
                <tbody >   
                <?php $no = 0; foreach ($kab as $row): $no++; ?> 
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$row->NMWIL ?> </td>
                            <td> <?=$row->KORDKAB ?> </td>
                            <td> <?=$row->ZOOMVK ?> </td>
                            <td> <small type="button" class="btn btn-md "  style="background-color:<?=$row->WARNAK?>"></small>&nbsp; <?=$row->WARNAK ?> </td>
                             <td> <?=$row->FILEGJSON ?> </td>
                             <td>
                                <div class='dropdown dropdown-inline'>
                                    <button type='button' class='btn btn-success btn-elevate btn-elevate-air btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='flaticon-more-1'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <button class='dropdown-item edit_btn' data-toggle='modal'  data-target='#edit<?=$row->IDWIL ?>'><i class='la la-pencil-square  '></i> Edit</button>
                                         <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$row->IDWIL ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    </div>
                                </div> 
                            </td>

                            <div class="modal fade" id="delete<?=$row->IDWIL ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          <form method="post" action="kabupaten/delete">     
                                       <div class="modal-header btn-dark">
                                            <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-rubbish-bin-delete-button"></i> Hapus Data Kabupaten</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                                             
                                                <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                                               <b><p><?=$row->NMWIL ?></p></b></center>
                                               <input type="hidden" name="kab" value="<?=$row->IDWIL ?>" >
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                            <button type="submit" id="del-kec" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon2-rubbish-bin-delete-button"></i> Simpan</button>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="edit<?=$row->IDWIL ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="kabupaten/edit" enctype="multipart/form-data">  
                                            <div class="modal-header btn-success">
                                                <h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon-interface-4"></i> Ubah Data Kabupaten</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                             </div>
                                            <div class="modal-body">
                                                             
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Nama Kabupaten</label>
                                                         <input type="hidden" class="form-control " name="idwil" value=" <?=$row->IDWIL ?>" >
                                                       <input type="text" class="form-control form-control-sm" name="kab" value=" <?=$row->NMWIL ?>" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Koordinat</label>
                                                       <input type="text" class="form-control " name="koor" value="<?=$row->KORDKAB ?>" placeholder="Masukan Koordinat Kecamatan ( Contoh : -10.4904256,122.4295641)" >
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Zoom View</label>
                                                       <input type="text" class="form-control " name="zoom" value="<?=$row->ZOOMVK ?>" >
                                                    </div>
                                                      <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Kode Warna</label>
                                                       <input type="color" class="form-control " name="warna" value="<?=$row->WARNAK ?>"  placeholder="Masukan Kode Warna Wilayah ( Contoh :red = merah)">
                                                    </div>
                                                     <div class="form-group" >
                                                        <label>File Geojson Kabupaten</label>
                                                        <div></div>
                                                        <div class="custom-file" >
                                                            <input type="file"  class="custom-file-input" id="ingeokec"  name="file">
                                                            <label  class="custom-file-label" for="customFile"><p style="float: left;">Pilih File ( *Berekstensi Geojson )<p></label>
                                                        </div>
                                                    </div>                                                   
                                                   
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-elevate btn-elevate-air btn-sm" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-interface-4"></i>  Simpan</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                    </tr>
                <?php endforeach; ?>
                </tbody>
               
            </table>  </div>  
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



