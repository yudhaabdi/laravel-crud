@extends('layout.header')
@section('container')
<div class="main">
    <div class="main-content">
        <div class="main-container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ranking 3 besar</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>RANKING</th>
                                        <th>NAMA</th>
                                        <th>NILAI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $ranking = 1;
                                    @endphp
                                    @foreach (ranking5Besar() as $s)
                                    <tr>
                                        <td>{{$ranking}}</td>
                                        <td>{{$s->nama}}</td>
                                        <td>{{$s->rataRataNilai}}</td>
                                    </tr>
                                    @php
                                        $ranking++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{totalSiswa()}}</span>
                            <span class="title">Total Siswa</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{totalGuru()}}</span>
                            <span class="title">Total Guru</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection