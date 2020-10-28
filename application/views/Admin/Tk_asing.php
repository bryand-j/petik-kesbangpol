
							
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
				Data Tenaga Kerja Asing
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
		<a type="button" class="btn btn-outline-primary btn-icon-sm btn-sm" href="#" data-toggle="modal" data-target="#kinput" title="Tambah Data Berita" >
			<i class="flaticon-file-1"></i> Tambah Data
		</a>
	</div>
</div>
		</div>
	</div>




	<div class="kt-portlet__body"></div>
    <div class="kt-form kt-form--label-right kt-margin-t-0 kt-margin-b-0">
      <div class="row align-items-center" style="padding: 0px 2%;">               
        <div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
          <div class="kt-input-icon kt-input-icon--left"></div>
          <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table">
            <thead>
                <tr style="width: auto;">
                    <th>id</th>
                    <th>No</th>
                    <th>Nama</th>                     
                    <th>L/P</th>
                    <th>Kebangsaan</th>
                    <th>Sponsor</th>
                    <th>Alamat</th>
                    <th>Aksi</th>                            
                </tr>
            </thead>
            <tbody class="tbody">   

            <?php $no=0; foreach ($tb as $row): $no++;  ?>
                <tr>
                    <td><?=$row->IDTKASING ?></td>
                    <td><?=$no ?></td>
                    <td><?=$row->NMTKASING ?></td>
                    <td><?=$row->JENISKELAMIN ?></td>
                    <td><?=$row->KEBANGSAAN ?></td>
                    <td><?=$row->SPONSOR ?></td>
                    <td><?=$row->ALAMAT ?></td>
                   
                    <td>
                        <div class='dropdown dropdown-inline'>
                            <button type='button' class='btn btn-success btn-elevate-hover btn-icon btn-sm btn-icon-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='flaticon-more-1'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a href="<?=$row->IDTKASING ?>" class='dropdown-item tmbl-edit'><i class='la la-pencil-square  '></i> Edit</a>
                                <a href="<?=base_url()?>Admin/Tk_asing/delete/<?=$row->IDTKASING ?>" class='dropdown-item delete_btn'><i class='la la-trash-o  '></i> Hapus</a>
                            </div>
                        </div> 
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
                 
          </table>
        </div>
      </div>
    </div>  
</div>
<div class="modal fade" id="kinput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <form method="post" action="<?=base_url()?>Admin/Tk_asing/add" enctype="multipart/form-data">  
            <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Tenaga Kerja Asing</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                             
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Nama</label>
                  <input type="text" class="form-control " name="Nama"  >
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div class="kt-radio-inline">
                    <label class="kt-radio kt-radio--brand">
                      <input type="radio" value="L" name="jk"> Pria
                      <span></span>
                    </label>
                    <label class="kt-radio kt-radio--success">
                      <input type="radio" value="P" name="jk"> Wanita
                      <span></span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Kebangsaan</label>
                   <input type="text" class="form-control " name="Kebangsaan" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Sponsor</label>
                   <input type="text" class="form-control " name="Sponsor" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Alamat</label>
                    <textarea class="form-control " name="Alamat"></textarea>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" id="savera" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i>  Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <form method="post" action="<?=base_url()?>Admin/Tk_asing/edit" enctype="multipart/form-data">  
            <div class="modal-header btn-primary">
                <center><h5 class="modal-title" style="color: white; text-align: center;" id="exampleModalLabel"><i class="flaticon2-plus-1"></i> Tambah Data Tenaga Kerja Asing</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">        
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Nama</label>
                  <input type="text" class="form-control " name="Nama"  >
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div class="kt-radio-inline">
                    <label class="kt-radio kt-radio--brand">
                      <input type="radio" value="L" name="jk"> Pria
                      <span></span>
                    </label>
                    <label class="kt-radio kt-radio--success">
                      <input type="radio" value="P" name="jk"> Wanita
                      <span></span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Kebangsaan</label>
                   <input type="text" class="form-control " name="Kebangsaan" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Sponsor</label>
                   <input type="text" class="form-control " name="Sponsor" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Alamat</label>
                    <textarea class="form-control " name="Alamat"></textarea>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="flaticon-circle"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-elevate btn-elevate-air btn-sm"><i class="flaticon-file-1"></i>  Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


</div>
<!-- end:: Content -->
<?php $this->load->view('admin/include/footer'); ?>
<script >
  $(document).ready(function() {   
             
    let tabel = $('#kt_table').DataTable({
      "columnDefs": [{
        "targets": [0],
        "visible": false,
      }]
    });

    // notify
    let berhasil ="<?= $this->session->flashdata('success'); ?>";
    let gagal ="<?= $this->session->flashdata('error'); ?>";
    if (berhasil!="") {
      notif("success", berhasil);
    }
    if (gagal!="") {
      notif("error", gagal);
    }


    // ambil data
    $('.tmbl-edit').on('click', function (e) {
      e.preventDefault();
      let id=$(this).attr("href");
      let url_1 = "<?=base_url()?>Admin/Tk_asing/getData";
      var dt_set = function (data) {
        $('#edit-modal [name="id"]').val(data.IDTKASING);
        $('#edit-modal [name="Nama"]').val(data.NMTKASING);
        $('#edit-modal [value="'+data.JENISKELAMIN+'"]').attr('checked',true);
        $('#edit-modal [name="Kebangsaan"]').val(data.KEBANGSAAN);
        $('#edit-modal [name="Sponsor"]').val(data.SPONSOR);
        $('#edit-modal [name="Alamat"]').val(data.ALAMAT);
        console.log(data.NMTKASING);
      }

      set(url_1, id, dt_set);
      $('#edit-modal').modal({
        keyboard: false,
        backdrop: 'static',
      });

    });
      
  });

</script>



