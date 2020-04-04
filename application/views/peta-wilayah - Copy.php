
<!DOCTYPE html>
<html>
<head>
	<title>Webgis HTML </title>
 <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
     <link rel="stylesheet" href="<?=base_url()?>assets/peta/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/peta/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
<link rel="stylesheet" href="<?=base_url()?>assets/peta/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/peta/style.css">
     <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


    <style>
       html, body {
            height: 100%;
            margin: 0;
           font-family: 'Roboto', sans-serif;
        }
        #mymap {
            width: 600px;
            height: 400px;
        }
        .right{ margin-right: 0px;}
    </style>
	 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="stylesheet" href="<?=base_url()?>assets/peta/js/leaflet-panel-layers.css"/>
   <style type="text/css">
   #mapid { height: 900px;
   padding: 10px;
    }</style>
  
</head>
<body >
   
    
        <div class="header" style="background-color: #75cff0; width:100%; height: 120px; position: static;" >
             <br>
                <form method="post" >
    <div class="row" >
    <div class="col-md-6">

    <div class="form-group" align="right">
                    <!-- <label for="exampleFormControlSelect2">Default select</label> -->
                    <select  align="left" name="wilayah" class="form-control select2 right  col-md-6"  id="exampleFormControlSelect2">
                      <option selected value="<?=$kabus->IDWIL?>"><?=$kabus->NMWIL?></option>
                      <?php foreach ($kabu as $wilayah): ?>
                         <option value="<?=$wilayah->IDWIL?>"> <?=$wilayah->NMWIL?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
    </div>
    <div class="col-md-6">
    <div class="form-group " align="left">
                   <!--  <label for="exampleFormControlSelect2">Default select</label> -->
                    <select  align="left" name="konflik" class="form-control select2  col-md-6"  id="exampleFormControlSelect2">
                       <option selected value="<?=$konfs->IDBENTUK?>"> <?=$konfs->NMBENTUK?></option>
                       <?php foreach ($konflik as $konflik): ?>
                         <option value="<?=$konflik->IDBENTUK?>"> <?=$konflik->NMBENTUK?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
    </div><div class="col-md-12"><center>
     <button type="submit" name="submit" class="btn btn-info btn-sm col-md-2"><i class="mdi mdi-file-find"></i> Tampilkan</button></center>
    </div></div></form>
    
	 <div id="mapid">
       
     </div></div>
</body>
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
     <script src="<?=base_url()?>assets/peta/js/leaflet.ajax.js"></script>
     <script src="<?=base_url()?>assets/peta/js/leaflet-panel-layers.js"></script>
   <script type="text/javascript">
   		var mymap = L.map('mapid').setView([<?php echo($kordinat) ?>], <?php echo($zoom) ?> );

   		var layarpeta = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox/streets-v11',
		    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		})
mymap.addLayer(layarpeta);


		


function iconByName(name) {
    return '<i class="icon icon-'+name+'"></i>';
}

function featureToMarker(feature, latlng) {
    return L.marker(latlng, {
        icon: L.divIcon({
            className: 'marker-'+feature.properties.amenity,
            html: iconByName(feature.properties.amenity),
            iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })
    });
}

var baseLayers = [
    {
        name: "OpenStreetMap",
        layer: layarpeta
    },
    // {
    //     name: "OpenCycleMap",
    //     layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
    // },
    // {
    //     name: "Outdoors",
    //     layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
    // }
];

<?php
    foreach ($kec as $row ): 
      $idkab = $row->IDKEC;

        $jml_konflik = $this->db->query("SELECT COUNT(IDTRXANGKET) AS JMLKONFLIK FROM tr_angket 
                                        WHERE IDKEC = '$idkab' AND IDBENTUK = '$bentuk' ")->row();
                                              ?>


 // var customPopup = "antonisji";

        var myStyle<?= str_replace(" ", "", $row->NMKEC); ?> = {
                 "color": "white",
                "fillColor" : "<?=$row->WARNAK; ?>",
                "weight": 1,
                "opacity": 1,
                "fillOpacity":2
            };
// var customPopup = {"Nama Wilayah ": "Soe",};

function popUp<?=$row->IDKEC; ?>(f,l){
    var out = [];
   
   
        // l.bindPopup(out.join("<br />"));
    if (f.properties){
      out.push("Provinsi : Nusa Tenggara Timur");
      out.push("Kabupaten/Kota: <?=$row->NMKEC?>");
      out.push("Jumlah Konflik: <?php echo($jml_konflik->JMLKONFLIK)?>");
        l.bindPopup(out.join("<br />"));
    }
}
<?php

          $arrkab[] = 

            '{
            name: "'.str_replace("_", " ", $row->NMKEC).'",
            icon: iconByName("bar"),
            layer: new L.GeoJSON.AJAX(["'.base_url().'geojson/kecamatan/'.$row->GJSONKEC.'"],{
                      onEachFeature:popUp'.$row->IDKEC.',style:myStyle'.str_replace(" ", "", $row->NMKEC).',
                      pointToLayer: featureToMarker,
                      bindPopup:customPopup}).addTo(mymap)           
         }';

?>
          
    <?php
    endforeach;

?>
   
var overLayers = [{
        group: "Layer Kecamatan",
        layers: [
            <?=implode(',', $arrkab);?>
        ]
    }
    ];
// L.marker([0.43324, 101.4143517], {
//   icon: DetriIcon
// }).bindPopup(customPopup, customOptions).addTo(mymap);
var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

mymap.addControl(panelLayers);



   </script>
  <script src="<?=base_url()?>assets/peta/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/peta/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/peta/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()      

  })
</script>
</html>