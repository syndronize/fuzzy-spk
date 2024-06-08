
@include('component.datatable.datatable')
<table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus datatable-nosort">No.</th>
            <th>Nama</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gejala as $key => $data)
        <tr>
            <td class="table-plus">{{$key+1}}</td>
            <td>{{$data->nama}}</td>
            <td>

            @if(session()->get('level') ==  'admin')
                <button type="button" onclick="editData({{json_encode($data)}})" class="btn btn-outline-primary mx-2"><i class="icon-copy dw dw-edit"></i></button>
                <button type="button" onclick="alertHapus({{$data->id}})" class="btn btn-outline-danger mx-2"><i class="icon-copy dw dw-delete"></i></button>
            @else
            <h1>-</h1>
            @endif
            </td>
        </tr>

        @endforeach
    </tbody>
</table>