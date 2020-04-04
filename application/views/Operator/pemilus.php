
							
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
              <form method="post" action="pemilu/input" enctype="multipart/form-data">  
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Tahun</label>
                        <select class="form-control " id="tahun" name="tahun">                            
                            <?php foreach ($thn as $row ): ?>  
                                <option value="<?=$row->IDTAHUN?>"><?=$row->NMTAHUN?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>   
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Kecamatan</label>
                        <select class="form-control " id="kec" name="kec">                            
                            <?php foreach ($kec as $row ): ?>  
                                <option value="<?=$row->IDKEC?>"><?=$row->NMKEC?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>        
                  <div class="form-group">
                        <label for="message-text" class="form-control-label">Partai Politik</label>
                        <select class="form-control " id="parpol" name="parpol">                            
                            <?php foreach ($parpol as $row ): ?>  
                                <option value="<?=$row->IDPARPOL?>"><?=$row->NMPARPOL?></option>                               
                                 <?php endforeach ?>
                            </select>
                    </div>  
                     <div class="form-group">
                        <label for="recipient-name"  class="form-control-label">Total Suara</label>
                       <input type="text" class="form-control form-control-sm" id="suara"  name="suara" >
                    </div>                    
                
            </div>
             <script type="text/javascript">        
                  var pagu = document.getElementById('suara');
                  pagu.addEventListener('keyup', function(e){  
               
                  pagu.value = formatRupiah(pagu.value, '');
                });      
               
                function formatRupiah(angka, prefix){
                  var number_string = angka.replace(/[^\d]/,'').toString(),
                  split       = number_string.split(''),
                  sisa        = split[0].length % 3,
                  rupiah        = split[0].substr(0, sisa),
                  ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
                  
                  if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                  }

                  rupiah = split[1] != undefined ? rupiah + '' + split[1] : rupiah;
                  return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                }
              </script>
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
        <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-0">
    <div class="row align-items-center">
        <div class="col-xl-8 order-2 order-xl-1">
            <div class="row align-items-center">                                
                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Wilayah </label>
                        </div>
                        <div class="kt-form__control">
                         <select class="form-control" name="wilayah">
                            <option value="">All</option>
                            <?php foreach ($wil as $row ): ?>  
                                <option value="<?=$row->NMWIL?>"><?=$row->NMWIL?></option>                               
                                 <?php endforeach ?>
                            </select>
                        </div>                      
                    </div>
                </div>
                 <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Bidang </label>
                        </div>
                        <div class="kt-form__control">
                         <select class="form-control" name="parpol">
                            <option value="">All</option>
                            <?php foreach ($parpol as $row ): ?>  
                                <option value="<?=$row->IDPARPOL?>"><?=$row->NMPARPOL?></option>                               
                                 <?php endforeach ?>
                            </select>
                        </div>                      
                    </div>
                </div>
                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Tahun </label>
                        </div>
                        <div class="kt-form__control">
                         <select class="form-control" name="tahun">
                             <option value="">All</option>
                            <?php foreach ($thn as $row ): ?>  
                                <option value="<?=$row->IDTAHUN?>"><?=$row->NMTAHUN?></option>                               
                                 <?php endforeach ?>
                        </select>
                        </div>                      
                    </div>
                </div>
              
                            </div>
                             <center>
                <!-- <div class="col-md-3 kt-margin-b-20-tablet-and-mobile"> -->
                    <!-- <div class="kt-form__group kt-form__group--inline"> -->
                        <br>
                        <button type="submit" id="filter" class="btn btn-warning btn-icon-sm btn-sm" title="Tambah Data Kecamatan">
                            <i class="flaticon2-search-1"></i> Tampilkan
                        </button>
                    <!-- </div> -->
                <!-- </div> -->
                </center>
                <hr>
        </div> 
    <!--    <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
            <a href="#" class="btn btn-default kt-hidden">
                <i class="la la-cart-plus"></i> New Order
            </a>
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
        </div> -->
    </div>
</div>
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
                        <th>Kecamatan</th>                     
                        <th>Partai Politik</th>     
                        <th>Tahun</th>  
                        <th>Total Suara</th>                       
                        <th>Aksi</th>                          
                    </tr>
                </thead>
                <tbody >   
                <?php $no = 0; foreach ($kab as $rows): $no++; ?> 
                    <tr>
                            <td> <?=$no ?> </td>
                            <td> <?=$rows->NMKEC ?> </td>
                            <td> <?=$rows->NMPARPOL ?> </td>                           
                            <td>  <?=$rows->NMTAHUN ?> </td>
                            <td> <?=$rows->TOTALSUARA ?> </td>
                             <td>
                                <div class='dropdown dropdown-inline'>
                                    <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='flaticon-more-1'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-right'>
                                        <button class='dropdown-item edit_btn' data-toggle='modal'  data-target='#edit<?=$rows->IDTRXPEMILU ?>'><i class='la la-pencil-square  '></i> Edit</button>
                                         <button  class='dropdown-item delete_btn'  data-toggle='modal'  data-target='#delete<?=$rows->IDTRXPEMILU ?>'><i class='la la-trash-o  '></i> Hapus</button>
                                    </div>
                                </div> 
                            </td>

                            <div class="modal fade" id="delete<?=$rows->IDTRXPEMILU ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                          <form method="post" action="pemilu/delete">     
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                                             
                                                <center><p>Apakah Anda Yakin ingin Menghapus data Ini</p>
                                              <!--  <b><p><?=$row->NMWIL ?></p></b></center> -->
                                               <input type="hidden" name="id" value="<?=$rows->IDTRXPEMILU ?>" >
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" id="del-kec" class="btn btn-primary">Simpan</button>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edit<?=$rows->IDTRXPEMILU ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="kabupaten/edit" enctype="multipart/form-data">  
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                             
                                                   <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="message-text" class="form-control-label">Tahun</label>
                                                            
                                                            <select class="form-control " id="tahun" name="tahun" disabled> 
                                                                <option value="<?=$rows->IDTAHUN?>" selected><?=$rows->NMTAHUN?></option> 
                                                                <?php foreach ($thn as $row ): ?>  
                                                                    <option value="<?=$row->IDTAHUN?>"><?=$row->NMTAHUN?></option>                               
                                                                     <?php endforeach ?>
                                                                </select>
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="message-text" class="form-control-label">Kecamatan</label>
                                                            
                                                            <select class="form-control " id="kec" name="kec" disabled>                            
                                                                <option value="<?=$rows->IDKEC?>" selected><?=$rows->NMKEC ?></option>
                                                                <?php foreach ($kec as $row ): ?>  
                                                                    <option value="<?=$row->IDKEC?>"><?=$row->NMKEC?></option>                               
                                                                     <?php endforeach ?>
                                                                </select>
                                                        </div>        
                                                      <div class="form-group">
                                                            <label for="message-text" class="form-control-label">Partai Politik</label>
                                                            
                                                            <select class="form-control " id="parpol" name="parpol" disabled>                            
                                                                <option value="<?=$rows->IDPARPOL ?>" selected><?=$rows->NMPARPOL ?></option>
                                                                <?php foreach ($parpol as $row ): ?>  
                                                                    <option value="<?=$row->IDPARPOL?>"><?=$row->NMPARPOL?></option>                               
                                                                     <?php endforeach ?>
                                                                </select>
                                                        </div>  
                                                         <div class="form-group">
                                                            <label for="recipient-name"  class="form-control-label">Total Suara</label>
                                                           <input type="text" class="form-control " id="suara"  name="suara" value="<?=$rows->TOTALSUARA?>" >
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



