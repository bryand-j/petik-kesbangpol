 
<!DOCTYPE html>
<html>
<head>
  <title>peranKo | Peta Konflik</title>
 <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
     <link rel="stylesheet" href="<?=base_url()?>assets/peta/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/peta/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
<link rel="stylesheet" href="<?=base_url()?>assets/peta/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/peta/style.css">
     <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
     <link href="https://fonts.googleapis.com/css?family=Oswald|Questrial&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Sen&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>



       <!-- <link href="<?php echo base_url()?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />  -->


       <link href="<?php echo base_url()?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <!-- <link href="<?php echo base_url()?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->




    <style>
       html, body {
            height: 100%;
            margin: 0;
            font-family: 'Questrial', sans-serif;
            /*font-family: 'Oswald', sans-serif;*/
           /**/
           /*font-family: 'Sen', sans-serif;*/
           /*font-family: 'Roboto Slab', serif;*/
        }
        #mymap {
            width: 600px;
            height: 400px;
            font-family: 'Questrial', sans-serif;
        }
        #mapid{
             font-family: 'Sen', sans-serif;
             /*font-family: 'Crimson Text', serif;*/
        }
        .right{ margin-right: 0px;
          }
          div.leaflet-panel-layers.expanded.leaflet-control.leaflet-control-layers-expanded{
            width: 200px;
          }
          label{
            margin-bottom: 0rem;
          }
          div.leaflet-popup-content-wrapper{
            overflow: auto;
          }
          .ser{
           width: 10%; height: 10%; border-radius: 4px;float: left; margin-right: 8px; position: relative;
          }         
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
                <form method="post" action="<?=base_url()?>peta/wilayah">
    <div class="row" >
    <div class="col-md-6">

    <div class="form-group" align="right">
      <?php  $color = '<div style="background-color: red; width: 10px; height: 10px; border-radius: 2px;"></div>';     
                                              ?>
      <!-- <div style="background-color: red; width: 10px; height: 10px; border-radius: 2px;"></div> -->
                    <!-- <label for="exampleFormControlSelect2">Default select</label> -->
                    <select  align="left" name="wilayah" class="form-control select2 right  col-md-6"  id="exampleFormControlSelect2">
                      <option selected> -- Pilih Wilayah --</option>
                      <option value="all">  Nusa Tenggara Timur</option>
                      <?php foreach ($kab as $wilayah): ?>
                         <option value="<?=$wilayah->IDWIL?>"> <?=$wilayah->NMWIL?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
    </div>
    <div class="col-md-6">
    <div class="form-group " align="left">
                   <!--  <label for="exampleFormControlSelect2">Default select</label> -->
                    <select  align="left" name="konflik" class="form-control select2  col-md-6"  id="exampleFormControlSelect2">
                       <option selected> -- Pilih Konflik --</option>
                       <?php foreach ($konflik as $konflik): ?>
                         <option value="<?=$konflik->IDBENTUK?>"> <?=$konflik->NMBENTUK?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
    </div><div class="col-md-12"><center>
     <button type="submit" name="submit" class="btn btn-info btn-sm col-md-2"><i class="mdi mdi-file-find"></i> Tampilkan</button></center>
    </div></div></form>
    <marquee><?php foreach($hari as $daily): ?>  <?=$daily->NAMA ?> <?php endforeach; ?></marquee>
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
    // {
    //     name: "Data Wilayah Kabupaten/Kota",
    //     layer: layarpeta
    // },
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
    foreach ($kab as $row ): 
      $idkab = $row->IDWIL;

        $jml_konflik = $this->db->query("SELECT COUNT(IDTRXANGKET) AS JMLKONFLIK FROM tr_angket 
                                        LEFT JOIN m_kecamatan ON m_kecamatan.IDKEC =tr_angket.IDKEC 
                                        LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB WHERE m_kabkota.IDWIL = '$idkab'")->row();                
               $now = date("Y-m-d"); 
               $last = date('Y-m-d', strtotime('-3 days', strtotime($now))); 


               $radar = $this->db->query(" SELECT * FROM tr_angket
                          LEFT JOIN m_kecamatan ON m_kecamatan.`IDKEC` = tr_angket.`IDKEC`
                          LEFT JOIN m_kabkota ON m_kabkota.`IDWIL` = m_kecamatan.`IDKAB` 
                          WHERE TGLANGKET >= '$last' AND TGLANGKET <= '$now' AND  m_kabkota.`IDWIL` = '$idkab' ORDER BY TGLANGKET DESC");
               $img_radar = "";
               if ($radar->num_rows() > 0) {
                  $img_radar = "spinner.gif";
               }

               $angket = $this->db->query("SELECT tr_angket.`NMANGKET`, tr_angket.`TGLANGKET` FROM tr_angket 
                LEFT JOIN m_kecamatan ON m_kecamatan.`IDKEC` = tr_angket.`IDKEC`
                LEFT JOIN m_kabkota ON m_kabkota.`IDWIL` = m_kecamatan.`IDKAB` 
                WHERE m_kabkota.`IDWIL` = '$idkab' ORDER BY TGLANGKET DESC LIMIT 3")->result();


            ?>


 // var customPopup = "antonisji";

        var myStyle<?= str_replace(" ", "", $row->NMWIL); ?> = {
                 "color": "white",
                "fillColor" : "<?=$row->WARNAK; ?>",
                "weight": 1,
                "opacity": 1,
                "fillOpacity":2,
                
            };
var customPopup = {"Nama Wilayah ": "Soe",};


var greenIcon<?=$row->IDWIL; ?> = L.icon({
    iconUrl: '<?php echo base_url()?>assets/<?=$img_radar?>',    

    iconSize:     [40, 30], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [10, 24], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});



function popUp<?=$row->IDWIL; ?>(f,l){
    var out = [];
   
    // out.push("Provinsi : <?=$row->IDWIL; ?>");
  
        // l.bindPopup(out.join("<br />"));
    if (f.properties){
      out.push("<center><b style='color:#3837a5;'>Data Konflik Provinsi Nusa Tenggara Timur</b></center>");
      out.push("<b style='width:45%;float:left'>Kabupaten / Kota</b> <div style='float:left'><b>: <?=$row->NMWIL?></b></div>");
      out.push("<b style='width:45%;float:left'>Jumlah Konflik</b> <div style='float:left'><b>: <?php echo($jml_konflik->JMLKONFLIK)?></b></div>");
      out.push("<b style='width:100%;float:left'>Konflik Terbaru</b> <div style='float:left'><b style='color:#962222; text-align:justify; padding:0px 3px;'><?php foreach($angket as $rowsa):?> <li> <?php echo $rowsa->NMANGKET ?> - <?php echo $rowsa->TGLANGKET ?> </li> <?php endforeach; ?></b></div><br />");
        l.bindPopup(out.join("<br />"));
    }
}
<?php

          $arrkab[] = 

            '{
            name: "<div class='.'ser'.' style='.'background-color:'.$row->WARNAK.'>&nbsp;</div>'.str_replace("_", " ", $row->NMWIL).'",
            icon: iconByName("bar"),
            layer: new L.GeoJSON.AJAX(["'.base_url().'geojson/'.$row->FILEGJSON.'"],{
                      onEachFeature:popUp'.$row->IDWIL.',style:myStyle'.str_replace(" ", "", $row->NMWIL).',
                      pointToLayer: featureToMarker,
                      bindPopup:customPopup}).addTo(mymap)           
         }';

?>
    L.marker([<?php echo($row->KORDKAB) ?>], {icon: greenIcon<?=$row->IDWIL; ?>}, ).addTo(mymap);            
    <?php
    endforeach;

?>
   
var overLayers = [{
        group: "Layer Kabupaten",
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
      <script src="<?php echo base_url()?>/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
             <script src="<?php echo base_url()?>/assets/js/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="<?php echo base_url()?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
 <script src="<?php echo base_url()?>/assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
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
 <?php echo $this->session->flashdata('message'); ?>  
</html>