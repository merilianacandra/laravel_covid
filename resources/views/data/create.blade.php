<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Covid-19 Provinsi Bali</title>
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

  <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/helper.css" rel="stylesheet">
    <link href="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/css/style.css" rel="stylesheet">
  
  <!-- Leaflet-KMZ -->
  <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" class="init">
	
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    
        </script>
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
    <a class="navbar-brand " href="/" style="margin-left: 100px;">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="35" height="35" class="d-inline-block align-top" alt="">
      Informasi Coronavirus (COVID-19) Provinsi Bali
    </a>
    <!-- <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/data">Data</a>
        </li>
      </ul>
    </div> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <!-- <ul class="navbar-nav ml-auto" style="margin-right: 100px;"> -->
          <!-- Authentication Links -->
          <!-- @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest -->
      <!-- </ul> -->
      
  </div>
</nav>

<div class="container mt-4">
  <h4 >Data Sebaran Kasus Covid-19 Sampai Dengan Tanggal {{$date}} di Bali (BALI)</h4>
  <div class="row">
    <div class="col-lg-3">
      <div class="card text-center bg-danger">              
        <center>
            <h3>POSITIF</h3>
            <img src="https://siagacorona.semarangkota.go.id:443//cc-content/themes/cicool/corona/dark/infected.png" width="150px"><br>
        </center>
        <ul class="widget-line-list m-b-15">
            <li class=""><h2 style="line-height: unset;">{{$positif}}<br><span class="color-white">ORANG</span></h2></li>
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
            <li class=""><h2 style="line-height: unset;">{{$rawat}}<br><span class="color-white">ORANG</span></h2></li>
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
            <li class=""><h2 style="line-height: unset;">{{$sembuh}}<br><span class="color-white">ORANG</span></h2></li>
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
            <li class=""><h2 style="line-height: unset;">{{$meninggal}}<br><span class="color-white">ORANG</span></h2></li>
        </ul>
      </div>
    </div>  
  </div>
</div>


  <hr>
  <div class="container mt-4">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data</h5>
              <form action="/data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal</label>
                    <input type="date" class="form-control" name="tgl_data"  placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kabupaten</label>
                  <select class="form-control" name="kabupaten" >
                    @foreach ($kabupaten as $item)
                        <option value="{{$item->id}}">{{$item->kabupaten}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah dalam Perawatan</label>
                    <input type="number" class="form-control" name="rawat" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Sembuh</label>
                    <input type="number" class="form-control" name="sembuh" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Meninggal</label>
                    <input type="number" class="form-control" name="meninggal" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
      </div>
      
  </div>
  <hr>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Data Penyebaran</h5>
                  <div class="table-responsive">
                  <table id="example" class="table table-striped" >
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">Sembuh</th>
                        <th scope="col">Positif</th>
                        <th scope="col">Dalam Perawatan</th>
                        <th scope="col">Meninggal</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($test as $item)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->sembuh }}</td>
                        <td>{{ $item->positif }}</td>
                        <td>{{ $item->rawat }}</td>
                        <td>{{ $item->meninggal }}</td>
                        <td>
                          <form action="/data/{{$item->id_kabupaten}}" method="GET">
                            <button class="btn-outline-warning" type="submit">
                                Detail
                            </button>
                        </form>
                        </td>
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

<script>

    var map = L.map('map');
    map.setView(new L.LatLng(-8.5723206,114.6667599),8.76);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
      opacity: 0.90
    });

  OpenTopoMap.addTo(map);

    // Instantiate KMZ parser (async)
    var kmzParser = new L.KMZParser({
        onKMZLoaded: function (layer, name) {
            control.addOverlay(layer, name);
            layer.addTo(map);
        }
    });
    // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
    kmzParser.load('baliregency.kmz');
    // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

    var control = L.control.layers(null, null, {
        collapsed: false
    }).addTo(map);
</script>
</body>
</html>
