@foreach ($users as $user)
    <tr>
        <td><img class="card-img-top" src="{{ $user->photo }}" alt={{ $user->name }}></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i')}}</td>
    </tr>
@endforeach
