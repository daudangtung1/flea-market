<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $key => $value)
        <tr>
            <td>{{$value->key + 1}}</td>
            <td>{{$value->full_name}}</td>
            <td>{{$value->arr_role_output[$value->role]}}</td>
            <td>{{$value->arr_status_output[$value->status]}}</td>
        </tr>
        @empty
        <tr>No data</tr>
        @endforelse
    </tbody>
</table>