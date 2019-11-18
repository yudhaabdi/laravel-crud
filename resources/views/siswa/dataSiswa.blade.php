@foreach ($siswa as $s)
<tr>
    <td>{{ $s->nama }}</td>
    <td>{{ $s->jenis_kelamin }}</td>
    <td>{{ $s->agama }}</td>
    <td>{{ $s->alamat }}</td>
    <td>
        <a class="btn btn-primary" href="/siswa/edit/{{$s->id}}" role="button">Edit</a>
        |
        <a href="#" class="btn btn-danger delete" siswa-id="{{$s->id}}" nama-siswa="{{$s->nama}}">Delete</a>
        |
        <a class="btn btn-info" href="/siswa/{{$s->id}}/profile" role="button">Detail</a>
    </td>
</tr>
@endforeach