<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/service/DataTables/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/service/DataTables/dataTables.bootstrap4.min.css"/>
 

</head>
<body>
	<br>
	<div >
		<div class="">
		  <div class="card-body">
		  	<div>
	  			<div class="form-row align-items-center">
		  			<div class="col-sm-3 my-1">
					  	<label class="sr-only" for="inlineFormInputName2">Bidang</label>
					  	<select class="form-control"  id="bidang">
							<option id= "semua" value="" >Semua Bidang</option>
							<?php foreach ($bidang as $key ): ?>	
								<option value="<?= $key->NMBENTUK;?>"><?= $key->NMBENTUK;?></option>
							<?php endforeach ?>
					   	</select>
					</div>
					<div class="col-sm-3 my-1">

				   		<label class="sr-only" for="inlineFormInputName2">Wilayah</label>
					  	<select class="form-control"  id="wilayah">
							<option id="ntt" value="">NTT</option>
							<?php foreach ($kab as $key ): ?>
							<option value="<?= $key->NMWIL;?>"><?= $key->NMWIL;?></option>
							<?php endforeach ?>
					   	</select>
					</div>
					<div class="col-auto my-1">

				   		<label class="sr-only" for="inlineFormInputName2">Tahun</label>
					  	<select class="form-control"  id="tahun">
							<option  value="2020">2020</option>
							<option  value="2019">2019</option>
							<option  value="2018">2018</option>

							
					   	</select>
					</div>
					<div class="col-auto my-1">
				  		<button type="" id="tampil" class="btn btn-primary">Tampilkan</button>
				  	</div>
				</div>
				
		  	</div>
		  	<br>
		  	<br>
			  <div class="table-responsive">
		    <table id="example" class="table table-striped table-bordered" width="100%">
		        <thead>
		            <tr>
		                <th>NO</th>
		                <th>TGL/Kab/Kota</th>
		                <th>Bidang</th>
		                <th>Judul</th>
		                <th>Uraian</th>
		                <th>Status</th>
		               
		            </tr>
		        </thead>
		       
		       
		    </table>
			</div>
		  </div>
		</div>
		
    </div>



<script type="text/javascript" src="<?php echo base_url()?>asset/service/DataTables/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset/service/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset/service/DataTables/dataTables.bootstrap4.min.js"></script>
<script>
	
	    
    var table;
    $(document).ready(function() {
 
        //datatables
        table = $('#example').DataTable({
        	"language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
	        }, 
 
            "processing": true, 
            "serverSide": true, 
            "order": [],
            
             
            "ajax": {
                "url": "<?php echo site_url('service/data/get_data_user')?>",
                "type": "POST",
                "data": function ( data ) {
	                data.wilayah = $('#wilayah').val();
	                data.bidang = $('#bidang').val();
	                data.tahun = $('#tahun').val();
	                
	            }

            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ],
                "orderable": false,  
               
            },
            ],
 
        });
        $('#tampil').click(function(){ //button filter event click
	        table.ajax.reload();  //just reload table
	    });
 
    });

</script>
</body>
</html>