@extends('template/template')
@section('content')

    @if ($message = Session::get('success'))
    <div class="message"><p>{{ $message }}</p></div>
    @endif

    <a class="link" href="{{ route('plants.create') }}">Add data</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Kingdom</th>
            <th>Family</th>
            <th>Subfamily</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($plants as $data)
        <tr>
            <td style="text-align: center; font-weight: bold;">{{ ++$i }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->kingdom }}</td>
            <td>{{ $data->family }}</td>
            <td>{{ $data->subfamily }}</td>
            <td style="text-align: center;"><img src="/images/{{ $data->image }}" width="90" height="70"></td>
            <td style="text-align: center;">
                <form action="{{ route('plants.destroy', $data->id) }}" method="post">
                    <a href="{{ route('plants.edit', $data->id) }}">Edit</a>
                    
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $plants->links() !!}
@endsection