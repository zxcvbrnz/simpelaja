{{-- text/x-generic excel.blade.php ( HTML document, ASCII text ) --}}
<table>
    <thead>
        <tr>
            <th>No</th>
            <!--<th data-priority="2">id_alat</th>-->
            <th>nama</th>
            <!--<th>foto</th>-->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
