
@include('component.datatable.datatable')
<table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus datatable-nosort">No.</th>
            <th>Nama Diagnosa</th>
            <th>Nama Gejala </th>
            <th>Bobot</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dg as $key => $data)
        <tr>
            <td class="table-plus">{{$key+1}}</td>
            <td>{{$data->diagnosa}}</td>
            <td>{{$data->gejala}}</td>
            <td>{{$data->weight}}</td>
            

        </tr>

        @endforeach
    </tbody>
</table>