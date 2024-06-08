
@include('component.datatable.datatable')
<table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus datatable-nosort">No.</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Username</th>
            <th>Status Akun</th>
            <th>Alamat</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $key => $data)
        @if(session()->get('id') == $data->id || session()->get('level') == 'admin')
        <tr>
            <td class="table-plus">{{$key+1}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->umur}} Tahun</td>
            <td>{{$data->username}}</td>
            <td>{{$data->status}}</td>
            <td>{{$data->alamat}}</td>
            <td>

                <button type="button" onclick="editData({{json_encode($data)}})" class="btn btn-outline-primary mx-2"><i class="icon-copy dw dw-edit"></i></button>
            @if(session()->get('level') ==  'admin')
                <button type="button" onclick="alertHapus({{$data->id}})" class="btn btn-outline-danger mx-2"><i class="icon-copy dw dw-delete"></i></button>
            @endif
            </td>
        </tr>
        @endif

        @endforeach
    </tbody>
</table>