@extends('layout.header')

@section('container')
<div class="main">
        <div class="main-content">
            <div class="main-container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inputs</h3>
                            </div>
                            <div class="panel-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <i class="fa fa-check-circle"></i> 
                                        {{session('sukses')}}
                                    </div>
                                @endif
                                @foreach ($siswa as $s)
                                    
                                    <form action="/siswa/update/{{$s->id}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $s->id }}"> <br/>
                                        <div class="form-group">
                                            <label for="inputnama">Nama siswa</label>
                                        <input name="nama" type="text" class="form-control" id="inputnama" value="{{$s->nama}}">
                                        </div>
                    
                                        <div class="form-group">
                                            <label >Jenis kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="L" @if ($s->jenis_kelamin == 'L')
                                                    selected
                                                @endif>Laki-laki</option>
                                                <option value="P" @if ($s->jenis_kelamin == 'P')
                                                    selected
                                                    @endif>Perempuan</option>
                                            </select>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="inputagama">Agama</label>
                                            <input name="agama" type="text" class="form-control" id="inputagama" value="{{$s->agama}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" id="inputalamat" rows="3">{{$s->alamat}}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('container1')

    <div class="container">
        @if (session('sukses'))
            <div class="alert alert-primary" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        @foreach ($siswa as $s)
            
        <div class="row">
            <h1>Edit data siswa</h1>
            <div class="col-lg-12">
                <form action="/siswa/update/{{$s->id}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $s->id_siswa }}"> <br/>
                    <div class="form-group">
                        <label for="inputnama">Nama siswa</label>
                    <input name="nama" type="text" class="form-control" id="inputnama" value="{{$s->nama}}">
                    </div>

                    <div class="form-group">
                        <label >Jenis kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L" @if ($s->jenis_kelamin == 'L')
                                selected
                            @endif>Laki-laki</option>
                            <option value="P" @if ($s->jenis_kelamin == 'P')
                                selected
                             @endif>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputagama">Agama</label>
                        <input name="agama" type="text" class="form-control" id="inputagama" value="{{$s->agama}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" id="inputalamat" rows="3">{{$s->alamat}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection

