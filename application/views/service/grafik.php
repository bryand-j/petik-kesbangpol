<!doctype html>
<html>

<?php $kabu="";
$x="";
$bid=""; 
foreach ($kab as $key ) {
	$kabu .="'".$key->NMWIL."',";
} 

foreach ($bidang as $key ) {
	$bid .="'".$key->NMBENTUK."',";
} 

?>
<?php 

foreach ($hasil as $data) {
	$bentuk[]=$data->NMBENTUK;
	$Jumlah[]=(float) $data->Jumlah;
}
 ?>

<head>
	<title>Grafik Konflik NTT </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/service/DataTables/bootstrap.min.css"/>
	<script type="text/javascript" src="<?php echo base_url();?>asset/service/DataTables/jquery-3.3.1.min.js"></script>

	<script src="<?php echo base_url()?>asset/service/Chart.min.js"></script>
	<script src="<?php echo base_url()?>asset/service/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>


<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="form-group">
		
				    <select class="form-control" id="bidang" onchange="change1()">
				    	<option disabled="" selected="">Bidang</option>
				    	<?php foreach ($bidang as $key ): ?>
							<option value="<?= $key->IDBENTUK;?>"><?= $key->NMBENTUK;?></option>
						<?php endforeach ?>
				      	<option id= "semua" selected="">Semua Bidang</option>
				    </select>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="form-group">
				    <select class="form-control" id="wilayah">
				    	<option  disabled="" selected="">Wilayah</option>
						<option id="ntt" value=""  selected="">NTT</option>				    	
						<?php foreach ($kab as $key ): ?>
							<option value="<?= $key->IDWIL;?>"><?= $key->NMWIL;?></option>
				      	<?php endforeach ?>
				    </select>
				</div>
			</div>
			<div class="col-md-2 col-xs-12">
				<div class="form-group">
				    <select class="form-control" id="tanun">
						<option selected="" disabled="">Tahun</option>
						<option selected="" value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>
				    </select>
				</div>
			</div>
			<div class="col-3 col-xs-12">
				<div class="form-group">
					
					<button class="btn btn-primary" id="btntampil" onclick="tampil();">Tampilkan</button>
				</div>
			</div>

		</div>
		<br>
		<div style="width:100%;">
			<canvas  id="canvas" style="position: relative;"></canvas>
			<canvas  id="canvas1" style="position: relative;"></canvas>
		</div>
		
		
		
		
	</div>



	
	
	<script>
		let lab='Bidang ';
		let thn='2019';


		let label=[];
		let value=[];

			let ctx = document.getElementById('canvas').getContext('2d');
			let myLineChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		    	labels:[],
		    	datasets :[{
		    		label:''+lab,
		    		
					
					data :[],
					backgroundColor: [
						'rgba(54, 162, 235, 1)',
		                'rgba(255, 99, 132, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],

		    	},
		    	],
		    },
		    options: {
		    	legend: {
		            display: false,
		        },
				responsive: true,
				title: {
					display: true,
					fontSize:20,
					text: 'Grafik Konflik Prov NTT'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: false
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Bidang',
						}
					}],
					yAxes: [{
						display: true,
						ticks: {
	                  		fontColor: "#4c4c4c",
	                  		stepSize: 1,
	                  		beginAtZero:true,
	                  		suggestedMax: 10

	             
	                	},
						scaleLabel: {
							display: true,
							labelString: 'Jumlah'
						}
					}]
				}
			}
		});

		



			function ambildata(wilayah,tahun){
				// lab=$('#wilayah').val();
				// thn=$('#tahun').val();
				// //.log(lab);
				//$('#canvas').hide();
				$('#canvas1').hide();
				$('#canvas').show();
				$.ajax({
		            url:"<?php echo site_url('service/grafik/get_data')?>",
		            type:"POST",
		            
		            data:{
		            	wilayah:wilayah,
		            	tahun:tahun
		            },  
		            dataType:'JSON',
		            success:function(hasils){
		            	console.log(hasils.jumlah);
		            	myLineChart.reset();
		            	myLineChart.data.labels=hasils.bentuk;
		            	myLineChart.data.datasets[0].data=hasils.jumlah;

		            	
		            	myLineChart.update({
						    duration: 800,
						    lazy: true,
						    easing: 'easeOutBounce'
						});
                        //chart1();
                    

		            }
		        });
			}

			function ambildata1(bidang,tahun){
				
				$('#canvas1').hide();
				$('#canvas').show();
				$.ajax({
		            url:"<?php echo site_url('service/grafik/get_data1')?>",
		            type:"POST",  
		            data:{
		            	bidang:bidang,
		            	tahun:tahun
		            },  
		            dataType:'JSON',
		            success:function(hasils){
		            	console.log(hasils.jumlah);
		            	myLineChart.reset();
		            	myLineChart.data.labels=hasils.wilayah;
		            	myLineChart.data.datasets[0].data=hasils.jumlah;

		            	
		            	myLineChart.update({
						    duration: 800,
						    lazy: true,
						    easing: 'easeOutBounce'
						});
                        //chart1();
                    

		            }
		        });
			}

			$(document).ready(function(){
				ambildata();
				
			});
			function tampil() {

				if ($('#bidang').val()=="Semua Bidang"){
					
					lab= $('#wilayah').val();
					thn=$('#tanun').val();
					//console.log(lab);
					ambildata(lab,thn);
					
				}
				if ($('#bidang').val()!="Semua Bidang"){
					
					bid= $('#bidang').val();
					thn=$('#tanun').val();
					//console.log(lab);
					ambildata1(bid,thn);
					
				}
				
				
			}
		
	</script>
	<script>
	
		function change1() {
			if( $('#bidang').val()=='Semua Bidang')
			{
				$( "#wilayah" ).prop( "disabled", false );
				console.log($('#bidang').val());
			
			}
			
			if( $('#bidang').val()!='Semua Bidang')
			{
				$( "#wilayah" ).prop( "disabled", true);
				$( "#ntt" ).prop( "selected", true);
				console.log($('#bidang').val());
			}
			}
			
		
		
	</script>


</body>

</html>
