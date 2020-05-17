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
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Edit Data Penyebaran Kabupaten</h5>
                <form action="/data/{{ $data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Sembuh</label>
                <input type="number" class="form-control" name="sembuh" value="{{$data->sembuh}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah dalam Perawatan</label>
                    <input type="number" class="form-control" name="rawat" value="{{$data->rawat}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Meninggal</label>
                    <input type="number" class="form-control" name="meninggal" value="{{$data->meninggal}}">
                </div>
                
                <input type="submit" value="submit" class="btn btn-primary">    
              </form>
                </div>
              </div> 
        </div>
    </div>
</div>
</body>
</html>