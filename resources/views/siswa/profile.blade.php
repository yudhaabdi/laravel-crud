@extends('layout.header')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection
@section('container')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
            @endif
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">

                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$siswa->getAvatar()}}" class="img-circle" width="200" height="200" alt="Avatar">
                                <h3 class="name">{{$siswa->nama}}</h3>
                                <span class="online-status status-available">Online</span>
                            </div>

                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        
                                        {{$siswa->mapel->count()}} <span>Mata pelajaran</span>
                                            
                                        
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->rataRataNilai()}} <span>Rata-rata nilai</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data diri</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                                    <li>Agama <span>{{$siswa->agama}}</span></li>
                                    <li>Alamat <span>{{$siswa->alamat}}</span></li>
                                </ul>
                            </div>
                            
                            <div class="text-center"><a href="/siswa/edit/{{$siswa->id}}" class="btn btn-warning">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah nilai
                        </button>

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mata pelajaran</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Guru</th>
                                            <th>Nama Pelajaran</th>
                                            <th>Semester</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa->mapel as $m)
                                        <tr>
                                            <td>{{$m->kode}}</td>
                                            <td>{{$m->guru->nama}}</td>
                                            <td>{{$m->nama}}</td>
                                            <td>{{$m->semester}}</td>
                                            <td>
                                                {{-- data-pk = primarikey --}}
                                                <a href="#" class="nilai" data-type="text" data-pk="{{$m->id}}" data-url="/api/siswa/{{$siswa->id}}/edit_nilai" data-title="Masukkan nilai">{{$m->pivot->nilai}}</a>
                                            </td>
                                            <td>
                                            <a href="/siswa/{{$siswa->id}}/{{$m->id}}/delete_nilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus ?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel">
                                <div id="chartNilai">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/{{$siswa->id}}/add_nilai" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="mapel">Mata pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                            @foreach ($matapelajaran as $m)
                                <option value="{{$m->id}}">{{$m->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputnama">Nilai</label>
                        <input name="nilai" type="number" class="form-control" id="inputnama" placeholder="Masukkan nilai">
                    </div>
    
                </div>
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
        </div>
        </div>
    </div>  
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan nilai siswa'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nilai'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Nilai',
            data: {!!json_encode($data)!!}
        }]
    });

    $(document).ready(function() {
    // $('.nilai').click(function () {
    //     var url = $(this).data('url');
    //     alert(url);
    // })
    $('.nilai').editable();
});
    $(document).ready(function() {
    $('.semester').editable();
});
</script>
@endsection