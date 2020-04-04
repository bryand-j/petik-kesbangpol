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
                      <option value="all" selected>  Nusa Tenggara Timur</option>
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
                                        LEFT JOIN m_kabkota ON m_kabkota.IDWIL = m_kecamatan.IDKAB WHERE m_kabkota.IDWIL = ' $idkab' AND tr_angket.IDBENTUK = '$bentuk'")->row();
                                       if ($jml_konflik->JMLKONFLIK > 0 ) {
                                        $real = $jml_konflik->JMLKONFLIK;
                                       }
                                       else {  $real = 0; }
                                      
                                        if ($real <= 0 && $max <= 0) {
                                          $fill = 0;
                                        }
                                        else{
                                          $fill = ($real / $max) * 100;
                                        }
                                    ?>

 // var customPopup = "antonisji";

        var myStyle<?= str_replace(" ", "", $row->NMWIL); ?> = {
                 "color": "white",
                "fillColor" : "<?=$konfs->WARNABNTK; ?>",
                "weight": 1,
                "opacity": 1,
                "fillOpacity": "<?=$fill;?>"
            };
var customPopup = {"Nama Wilayah ": "Soe",};

function popUp<?=$row->IDWIL; ?>(f,l){
    var out = [];
   
    // out.push("Provinsi : <?=$row->IDWIL; ?>");
  
        // l.bindPopup(out.join("<br />"));
    if (f.properties){
      out.push("<center><b style='color:#3837a5;'>Data Konflik Provinsi Nusa Tenggara Timur</b></center>");
      out.push("<b style='width:45%;float:left'>Kabupaten / Kota</b> <div style='float:left'><b>: <?=$row->NMWIL?></b></div>");
      out.push("<b style='width:45%;float:left'>Jumlah Konflik</b> <div style='float:left'><b>: <?php echo($jml_konflik->JMLKONFLIK)?></b></div><br />");
        l.bindPopup(out.join("<br />"));
    }
}
<?php

          $arrkab[] = 

            '{
            name: "'.str_replace("_", " ", $row->NMWIL).'",
            icon: iconByName("bar"),
            layer: new L.GeoJSON.AJAX(["'.base_url().'geojson/'.$row->FILEGJSON.'"],{
                      onEachFeature:popUp'.$row->IDWIL.',style:myStyle'.str_replace(" ", "", $row->NMWIL).',
                      pointToLayer: featureToMarker,
                      bindPopup:customPopup}).addTo(mymap)           
         }';

?>
          
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