
<!DOCTYPE html>
<html>
<head>
  <title>Webgis HTML</title>
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
           