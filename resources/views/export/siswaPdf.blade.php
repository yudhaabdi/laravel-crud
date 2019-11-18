
<table style="border-collapse: collapse">
    <thead>
        <tr>
            <th style="border: 1px solid black">NAMA</th>
            <th style="border: 1px solid black">JENIS KELAMIN</th>
            <th style="border: 1px solid black">AGAMA</th>
            <th style="border: 1px solid black">RATA-RATA NILAI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $s)
        <tr>
            <td style="border: 1px solid black">{{$s->nama}}</td>
            <td style="border: 1px solid black">{{$s->jenis_kelamin}}</td>
            <td style="border: 1px solid black">{{$s->agama}}</td>
            <td style="border: 1px solid black">{{$s->rataRataNilai()}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>