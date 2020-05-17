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
    <a class="navbar-brand ml-5" href="/">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Provinsi Bali
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/data">Data</a>
        </li>
      </ul>
    </div>
</nav>

<div class="container mt-4">
    <h4 >Data Sebaran Kasus Covid-19 Sampai Dengan Tanggal {{$date}} di Bali (BALI)</h4>
  <div class="row mt-4 mb-4">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
              Positif
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah</h5>
              <p class="card-text">{{$positif}} Orang</p>
            </div>
          </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
              Dalam Perawatan
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah</h5>
              <p class="card-text">{{$rawat}} Orang</p>
              
            </div>
          </div> 
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
              Sembuh
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah</h5>
              <p class="card-text">{{$sembuh}} Orang</p>
              
            </div>
          </div>  
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
              Meninggal
            </div>
            <div class="card-body">
              <h5 class="card-title">Jumlah</h5>
              <p class="card-text">{{$meninggal}} Orang</p>
            </div>
          </div>    
    </div>
  </div>
  <hr>
  <div class="row mt-4">
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
