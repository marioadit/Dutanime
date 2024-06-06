<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    {{-- CSS untuk data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css"> --}}
    {{-- CSS untuk bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>.:Dutanime - @yield('title'):.</title>
    <style>
      .tw{
        -webkit-text-fill-color: white;
      }
    </style>
  </head>
  <body>

    <!-- div.col-lg-6 -->
    <div class="container-fluid">
        <!--header-->
        <div class="row">
            <div class="col-lg-12 bg-primary py-4 tw">
              <h1 class="text-center">.:-Dutanime-:.</h1>
              <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-person-circle"> user</i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item " href="/animes">{{ Auth::user()->name ?? "Guest"}}</a>
                  <a class="dropdown-item " href="/user">Change Password</a>
                  <a class="dropdown-item " href="/logout">Logout</a>
                </div>
              </div>
                {{-- <h1>
                {{ $key }}
                </h1> --}}
                
            </div>            
        </div> 
        <!--konten/body-->
        <!-- mt 1-4 jarak-->
        <div class="row flex-row mt-4">
            <div class="col-lg-2">
                <!-- menu -->
                <div class="flex-column">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ ($key =='Home')? "active":"" }}" id="v-pills-home-tab"  href="/h">Home</a>
                    <a class="nav-link {{ ($key =='Master Data')? "active":"" }}" id="v-pills-tentang-tab"  href="/m">Master Data</a>
                    <a class="nav-link {{ ($key =='Animes')? "active":"" }}" id="v-pills-tentang-tab"  href="/animes">Animes</a>
                    <a class="nav-link {{ ($key =='About')? "active":"" }}" id="v-pills-artikel-tab"  href="/a">About</a>
                    <a class="nav-link {{ ($key =='FAQ')? "active":"" }}" id="v-pills-kontak-tab"  href="/f">FAQ</a>
                  </div>
                </div>
            </div>
            <main class="col-lg-10 ">
                <!-- konten -->
                <div class="card">
                    {{-- <div class="card-header">JUDUL --}}
                    {{-- </div> --}}
                    <div class="card-body">{{-- KONTEN --}}
                      <h1>@yield('title')</h1>
                      <hr width="100%" size="2">
                      <p>@yield('konten')</p>
                    </div>
                </div>
            </main>
        </div> 
        <div class="row mt-4 tw">
            <div class="col-lg-12 bg-primary py-4 text-color-white">
              <h3 align="center">Template by [Mario_Aditya_Kurnianto]</h3>              
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{-- script js table --}}
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script> --}}
        {{-- script data table --}}
        <script>new DataTable('#example');</script>
  </body>
</html>