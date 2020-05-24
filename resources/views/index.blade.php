<!DOCTYPE html>
<html lang="en">
<head>
  <title>PROVINSI BALI TANGGAP COVID-19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- Leaflet (JS/CSS) -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
  <!-- Leaflet-KMZ -->
  <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/helper.css" rel="stylesheet">
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/style.css" rel="stylesheet">
  
  <style>
    html,
    body,
    #map {
        height: 400px;
        width: 100%;
        padding: 0;
        margin: 0;
    }
  </style>

</head>

<body>

<!-- Image and text -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-5" href="/">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="35" height="35" class="d-inline-block align-top" alt="">
      Informasi Coronavirus (COVID-19) Provinsi Bali
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto" style="margin-right: 100px;">
        <li class="nav-item active">
          <a class="nav-link" href="/data">DATA</a>
        </li>
      </ul>
    </div>

</nav>


<div class="container">
  <br>
  <br>
  <br>
  <h4 >Data Sebaran Kasus Covid-19 Sampai Dengan Tanggal {{$tanggalSekarang}} di Bali (BALI)</h4>

<div class="div class="col-lg-12 col-md-12 col-12" style="margin-top: 30px">
      <div class="mx-auto">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Filter Data</h5>
              <form action="/search" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" id="tanggalSearch"  @if(isset($tanggal)) value="{{$tanggal}}" @endif>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat">Cari</button>
                </div>
              </form>
          </div>
      </div>

<div class="row">
  <div class="col-lg-3">
    <div class="card text-center bg-danger">              
      <center>
          <h3>POSITIF</h3>
          <img src="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/infected.png" width="150px"><br>
      </center>
      <ul class="widget-line-list m-b-15">
          <li class=""><h2 style="line-height: unset;">{{$positif[0]->positif}}<br><span class="color-white">ORANG</span></h2></li>
      </ul>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card text-center bg-warning">              
      <center>
          <h3>PERAWATAN</h3>
          <img src="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/patient.png" width="150px"><br>
      </center>
      <ul class="widget-line-list m-b-15">
          <li class=""><h2 style="line-height: unset;">{{$rawat[0]->rawat}}<br><span class="color-white">ORANG</span></h2></li>
      </ul>
    </div>
  </div>  

  <div class="col-lg-3">
    <div class="card text-center bg-primary">              
      <center>
          <h3>SEMBUH</h3>
          <img src="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/stay-at-home.png" width="150px"><br>
      </center>
      <ul class="widget-line-list m-b-15">
          <li class=""><h2 style="line-height: unset;">{{$sembuh[0]->sembuh}}<br><span class="color-white">ORANG</span></h2></li>
      </ul>
    </div>
  </div>  

  <div class="col-lg-3">
    <div class="card text-center" style="background-color:#5f27cd">              
      <center>
          <h3>MENINGGAL</h3>
          <img src="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/treatment.png" width="150px"><br>
      </center>
      <ul class="widget-line-list m-b-15">
          <li class=""><h2 style="line-height: unset;">{{$meninggal[0]->meninggal}}<br><span class="color-white">ORANG</span></h2></li>
      </ul>
    </div>
  </div>  
</div>

      <div class="mx-auto">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Peta Penyebaran Covid Provinsi Bali <strong>{{$tanggalSekarang}}</strong></h5>
              <div id="map"></div>
            </div>
            <div class="card-footer" style="background: white">
              <div class="row">
                <div class="col-6">
                  Color Start
                  <input type="color" value="#E5000D" class="form-control" id="colorStart">
                </div>
                <div class="col-6">
                  Color End
                  <input type="color" value="#FFFFFF" class="form-control" id="colorEnd">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <button class="btn btn-primary form-control" id="btnGenerateColor">Generate Color</button>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>

  <hr>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Data Penyebaran Tanggal {{$tanggalSekarang}}</h5>
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-dark rounded" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">Sembuh</th>
                        <th scope="col">Positif</th>
                        <th scope="col">Dalam Perawatan</th>
                        <th scope="col">Meninggal</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->sembuh }}</td>
                        <td>{{ $item->positif }}</td>
                        <td>{{ $item->rawat }}</td>
                        <td>{{ $item->meninggal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
                </div>
              </div> 
        </div>
    </div>
</div>
<script src="https://pendataan.baliprov.go.id/assets/frontend/map/leaflet.markercluster-src.js"></script>
<script type="text/javascript" class="init">
	
  $(document).ready(function() {
      $('#example').DataTable();
  } );
  
</script>
<script>
  $(document).ready(function () {
    var dataMap=null;
    var colorMap=[
      "679b9b",
      "aacfcf",
      "d291bc",
      "ffcbcb",
      "2fc4b2",
      "e71414",
      "562349",
      "303960",
      "f9ccce"
    ];
    var tanggal = $('#tanggalSearch').val();
    console.log(tanggal);
    $.ajax({
      async:false,
      url:'getData',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response;
      }
    });
    console.log(dataMap);

    $.ajax({
      async:false,
      url:'getPositif',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataPos = response;
      }
    });
    console.log(dataPos);
    
    $('#btnGenerateColor').on('click',function(e){
      var colorStart = $('#colorStart').val();
      var colorEnd = $('#colorEnd').val();
      $.ajax({
        async:false,
        url:'/create-pallete',
        type:'get',
        dataType:'json',
        data:{start: colorStart, end:colorEnd},
        success: function(response){
          colorMap = response;
          setMapColor();
        }
      });
      
    });

    var map = L.map('map');
    map.setView(new L.LatLng(-8.374187,115.172922), 9);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
      opacity: 0.90
    });

    OpenTopoMap.addTo(map);
    setMapColor();
    // define variables
    var lastLayer;
    var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    var selStyle = {color:'#0000FF',opacity:'1',fillColor:'#00FF00',fillOpacity:'1'};
    
    function setMapColor(){
      var markerIcon = L.icon({
        iconUrl: '/mar.png',
        iconSize: [40, 40],
      });
      var BADUNG,BULELENG,BANGLI,DENPASAR,GIANYAR,JEMBRANA,KARANGASEM,KLUNGKUNG,TABANAN;
      dataPos.forEach(function(value,index){
        var colorKab = dataPos[index].kabupaten.toUpperCase();
        console.log(colorKab);
        if(colorKab == "BADUNG"){
          BADUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="BANGLI"){
          BANGLI = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        } else if(colorKab=="BULELENG"){
          BULELENG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="DENPASAR"){
          DENPASAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="GIANYAR"){
          GIANYAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="JEMBRANA"){
          JEMBRANA = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KARANGASEM"){
          KARANGASEM = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KLUNGKUNG"){
          KLUNGKUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="TABANAN"){
          TABANAN = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }

      });

    // Instantiate KMZ parser (async)
    var kmzParser = new L.KMZParser({
        onKMZLoaded: function (layer, name) {
          control.addOverlay(layer, name);
          var markers = L.markerClusterGroup();
          var layers = layer.getLayers()[0].getLayers();

            // fetching sub layer
      	  layers.forEach(function(layer, index){
          
          var kab  = layer.feature.properties.NAME_2;
          kab = kab.toUpperCase();
          var prov = layer.feature.properties.NAME_1;
          
          //
          if(!Array.isArray(dataMap) || !dataMap.length == 0 ){
            // set sub layer default style positif covid
            if(kab == 'BADUNG'){
              layer.setStyle(BADUNG);
            }else if(kab == 'BANGLI'){
              layer.setStyle(BANGLI);
            }else if(kab == 'BULELENG'){
              layer.setStyle(BULELENG);
            }else if(kab == 'DENPASAR'){
              layer.setStyle(DENPASAR);
            }else if(kab == 'GIANYAR'){
              layer.setStyle(GIANYAR);
            }else if(kab == 'JEMBRANA'){
              layer.setStyle(JEMBRANA);
            }else if(kab == 'KARANGASEM'){
              layer.setStyle(KARANGASEM);
            }else if(kab == 'KLUNGKUNG'){
              layer.setStyle(KLUNGKUNG);
            }else if(kab == 'TABANAN'){
              layer.setStyle(TABANAN);
            } 


            
            // peparing data format
            var data = '<table width="300">';
                data +='  <tr>';
                data +='    <th colspan="2">Keterangan</th>';
                data +='  </tr>';
              
              
              data +='  <tr>';
              data +='    <td>Kabupaten</td>';
              data +='    <td>: '+kab+'</td>';
              data +='  </tr>';              

              
              data +='  <tr style="color:red">';
              data +='    <td>Positif</td>';
              data +='    <td>: '+dataMap[index].positif+'</td>';
              data +='  </tr>';
              

              data +='  <tr style="color:green">';
              data +='    <td>Sembuh</td>';
              data +='    <td>: '+dataMap[index].sembuh+'</td>';
              data +='  </tr>'; 

              data +='  <tr style="color:black">';
              data +='    <td>Meninggal</td>';
              data +='    <td>: '+dataMap[index].meninggal+'</td>';
              data +='  </tr>';

          
              data +='  <tr style="color:blue">';
              data +='    <td>Dalam Perawatan</td>';
              data +='    <td>: '+dataMap[index].rawat+'</td>';
              data +='  </tr>';               
              
              
            data +='</table>';
    
            if(kab == 'BANGLI'){
              markers.addLayer( 
                L.marker([-8.254251, 115.366936] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );
            }
            else if(kab == 'GIANYAR'){
              markers.addLayer( 
                L.marker([-8.422739, 115.255700] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );

            }else if(kab == 'KLUNGKUNG'){
              markers.addLayer( 
                L.marker([-8.487338, 115.380029] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );

            }else{
              markers.addLayer( 
                L.marker(layer.getBounds().getCenter(),{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );
            }

          }else{
            var data = "Tidak ada Data pada tanggal tersebut"
            layer.setStyle(defStyle);
          }
          layer.bindPopup(data);
      	});
        map.addLayer(markers);
        layer.addTo(map);
        }
    });
  
    // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
    kmzParser.load('bali-kabupaten.kmz');
    // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

    var control = L.control.layers(null, null, {
        collapsed: false
    }).addTo(map);
    $('.leaflet-control-layers').hide();
    }
  });
</script>
</body>
</html>
