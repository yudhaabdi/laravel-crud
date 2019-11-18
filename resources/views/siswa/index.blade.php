@extends('layout.header')
@section('container')
    <div class="main">
        <div class="main-content">
            <div class="main-container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data siswa</h3>
                                <div class="right">
                                    <a href="/siswa/export_pdf" class="btn btn-sm btn-primary">Export pdf</a>
                                    <a href="/siswa/export_excel" class="btn btn-sm btn-primary">Export excel</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal" data-target="#modalTambah">
                                        <i class="lnr lnr-plus-circle"></i>
                                    </button>
                                      
                                </div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>jenis kelamin</th>
                                            <th>agama</th>
                                            <th>alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $s)
                                        <tr>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->jenis_kelamin }}</td>
                                            <td>{{ $s->agama }}</td>
                                            <td>{{ $s->alamat }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs" onclick="window.location='/siswa/edit/{{$s->id}}'" role="button"><li class="fa fa-pencil"></li></button>
                                                    <button type="button" class="btn btn-danger btn-xs delete" siswa-id="{{$s->id}}" nama-siswa="{{$s->nama}}"><li class="fa fa-trash"></li></button>
                                                    <button type="button" class="btn btn-info btn-xs" onclick="window.location='/siswa/{{$s->id}}/profile'" role="button"><li class="fa fa-eye"></li></button>
                                                </div>
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
    <!-- Modal -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="formSave" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputnama">Nama siswa</label>
                    <input name="nama" type="text" class="form-control" id="inputnama" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="inputnama">Email</label>
                    <input name="email" type="email" class="form-control" id="inputnama" placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label >Jenis kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="inputagama">Agama</label>
                    <input name="agama" type="text" class="form-control" id="inputagama" placeholder="Masukkan agama">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="inputalamat" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button id="closeFormTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>  
@endsection

@section('footer')
    <script>
        
        //delete data siswa
        $('.delete').click(function () {
           var siswa_id = $(this).attr('siswa-id');
           var nama_siswa = $(this).attr('nama-siswa');
           swal({
            title: "Yakin?",
            text: "Mau di hapus data dari "+nama_siswa+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/siswa/delete/"+siswa_id+"";    
            } else {
                swal("Data kamu tidak di hapus");
            }
            });
        });
        //dattable
        $(document).ready(function () {
           $('#datatable').DataTable(); 
        });
        //input data siswa
        $('#formSave').submit(function(e){
            e.preventDefault();
            var request = new FormData(this);
            $.ajax({
                url: "{{ url('/siswa/create') }}",
                method: "POST",
                data: request,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    window.location.reload();
                    // if (data == 'sukses') {
                    //     $('#closeModalTambah').click();
                    //     // $('#formSave')[0].reset();
                    //     // $('#dataTable').reset();
                    //     // alert('berhasil menambahkan data')
                    //     // $('#datatable').DataTable(); 
                    //     location.reload();
                    // }
                }
            });
        });
    </script>
@endsection