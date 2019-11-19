@extends('layout.header')
@section('container')
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Tables</h3>
                <div class="row">
                    <div class="col-md-6">
                        <!-- BASIC TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Guru</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Kode</th>
                                            <th>Nama Pelajaran</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru as $g)
                                        <tr>
                                            <td>{{ $g->nama }}</td>
                                            <td>
                                                @foreach ($g->mapel as $m)
                                                <li> {{ $m->kode }} </li> 
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($g->mapel as $m)
                                                    <li> {{ $m->nama }} </li> 
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($g->mapel as $m)
                                                    <li> {{ $m->semester }} </li> 
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC TABLE -->
                    </div>
                    <div class="col-md-6">
                        <!-- TABLE NO PADDING -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Detail Guru</h3>
                                <div class="right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal" data-target="#modalTambahGuru">
                                        <i class="lnr lnr-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover" id="tabelguru">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Telfon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru as $g)
                                        <tr>
                                            <td>{{$g->nama}}</td>
                                            <td>{{$g->telp}}</td>
                                            <td>{{$g->alamat}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TABLE NO PADDING -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
<!-- Modal guru-->
<div class="modal fade" id="modalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="formsave" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputnama">Nama guru</label>
                    <input name="nama" type="text" class="form-control" id="inputnama" placeholder="Masukkan nama">
                </div>

                <div class="form-group">
                    <label for="inputagama">Telefon</label>
                    <input name="telp" type="number" class="form-control" id="inputagama" placeholder="Masukkan nomor">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="inputalamat" rows="3"></textarea>
                </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> 
</div> 
@endsection
@section('container1')
    <div class="main">
        <div class="main-content">
            <div class="main-container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data guru</h3>
                                <div class="right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal" data-target="#modalTambahGuru">
                                        <i class="lnr lnr-plus-circle"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Nama Guru</th>
                                                <th>Kode</th>
                                                <th>Nama Pelajaran</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guru as $g)
                                            <tr>
                                                <td>{{ $g->nama }}</td>
                                                <td>
                                                    @foreach ($g->mapel as $m)
                                                    <li> {{ $m->kode }} </li> 
                                                    @endforeach   
                                                </td>
                                                <td> 
                                                    @foreach ($g->mapel as $m)    
                                                        <li> {{ $m->nama }} </li>   
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($g->mapel as $m)
                                                        <li> {{ $m->semester }} </li> 
                                                    @endforeach
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
        </div>
    </div>

@endsection
@section('footer')
    <script>
        $(document).ready(function () {
           $('#datatable').DataTable(); 
        });

        $(document).ready(function () {
           $('#tabelguru').DataTable(); 
        });

        $('#formsave').submit(function(e){
            e.preventDefault();
            var request = new FormData(this);
            $.ajax({
                url: "{{ url('/guru/create') }}",
                method: "POST",
                data: request,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    window.location.reload();
                }
            });
        });
    </script>
@endsection