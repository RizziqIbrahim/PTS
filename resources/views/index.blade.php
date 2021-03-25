@extends('master')

@section("content")
            <div class="panel-header panel-header-lg">
                <canvas id="bigDashboardChart"></canvas>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Global Sales</h5>
                                <h4 class="card-title">Shipped Products</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                        <i class="now-ui-icons loader_gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExample"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">2018 Sales</h5>
                                <h4 class="card-title">All products</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                        <i class="now-ui-icons loader_gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Email Statistics</h5>
                                <h4 class="card-title">24 Hours Performance</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="barChartSimpleGradientsNumbers"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                            <tr>
                                <h5 class="card-category">All Persons List</h5>
                                <h4 class="card-title"> Employees Stats</h4>
                                <a href="{{ route("create")}}"><button class="btn btn-lg btn-rounded btn-success">create</button></a>
                                <a href="{{ route("karyawanExport")}}"><button class="btn btn-lg btn-rounded btn-primary">Export</button></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-lg btn-rounded btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Import
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('karyawanImport') }}"method="post"enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Choose File</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="file" required="required">
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">import</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th >
                                    Name
                                  </th>
                                  <th >
                                    Hadir
                                  </th>
                                  <th >
                                    Izin
                                  </th>
                                  <th>
                                      bolos
                                  </th>
                                  <th>
                                      telat
                                  </th>
                                  <th>
                                      keterangan
                                  </th>
                                  <th  class="text-center" >
                                    Action
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->namaKaryawan}}</td>
                                        <td>{{$item->hadirMasuk}}</td>
                                        <td>{{$item->izinMasuk}}</td>
                                        <td>{{$item->bolosMasuk}}</td>
                                        <td>{{$item->telatMasuk}}</td>
                                        <td>
                                            {{$item->bolosMasuk + $item->telatMasuk < 3 ? "karyawan terbaik" : 
                                             ( $item->bolosMasuk + $item->telatMasuk > 7 ? "karyawan terburuk" :
                                             ( $item->hadirMasuk < 60 ? "karyawan terburuk" : 
                                              ""))
                                            }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('edit', $item->id)}}"><button class="btn btn-warning btn-rounded">Edit</button></a>
                                            <a href="{{route('deleteData', $item->id)}}"><button class="btn btn-danger btn-rounded">Hapus</button></a>
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
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Designed by
                        <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection