							
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container ">
 
    </div>
</div>
<!-- end:: Subheader -->



<!-- begin:: Content -->
<div class="kt-container  kt-grid__item kt-grid__item--fluid">
	<div class="row">
	    <div class="col">
	        <div class="alert alert-light alert-elevate fade show" role="alert">
	            <div class="alert-icon"><i class="flaticon-paper-plane-1 kt-font-brand"></i></div>
	            <div class="alert-text">
	                Input Data Berita
	                
	            </div>
	        </div>
	    </div>
	</div>

<!--begin::Portlet-->
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Berita
			</h3>
		</div>
	</div>
	<!--begin::Form-->
	<form class="kt-form--label-right" method="post" action="<?=base_url()?>operator/berita/add">
		<div class="kt-portlet__body">

			<div class="form-group ">
				<label>Pilih Konflik</label>	
				
				<select class="form-control" name="id" id="id-ang">
						<option selected="" disabled="">Pilih Konflik</option>
					<?php foreach ($konflik as $key): ?>
						<option value="<?=$key->IDTRXANGKET?>"><?=$key->TGLANGKET?> - <?=$key->NMANGKET?></option>	
					<?php endforeach ?>
				    
				</select>

				
			</div>
			<div class="form-group">
				<label>Judul Berita</label>
				<input type="text" class="form-control" name="judul" placeholder="masukan Judul Berita">
			</div>
			<div class="form-group">
				<label class="">Isi Berita</label>
				<textarea class="summernote" id="kt_summernote_1" name="isi">
					
				</textarea>
			</div>
		</div>
		<div class="kt-portlet__foot">
			<div class="row">
				<div class="col-lg-9">
					<button type="submit" class="btn btn-brand cekdata">Simpan</button>
					<a href="<?=base_url()?>operator/berita/index" class="btn btn-secondary">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>
<!--end::Portlet-->



</div>
<!-- end:: Content -->					</div>
</div>

</div>
</div>
</div>

 