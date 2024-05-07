@extends('template/template')
@section('content')

    @if ($errors->any())
    <div class="message">
        <b>Error:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
    @endif

    <form method="post" action="{{ route('plants.update', $plants->id) }}" enctype="multipart/form-data">
        {{ csrf_field()}}
        @method('put')

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $plants->name }}" class="form-control">
        
            <label for="kingdom">Kingdom</label>
            <input type="text" name="kingdom" id="kingdom" value="{{ $plants->kingdom }}" class="form-control">
        
            <label for="family">Family</label>
            <input type="text" name="family" id="family" value="{{ $plants->family }}" class="form-control">
        
            <label for="subfamily">Subfamily</label>
            <input type="text" name="subfamily" id="subfamily" value="{{ $plants->subfamily }}" class="form-control">
        
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="/images/{{ $plants->image }}" width="90" height="70">

        <button type="submit" class="submit">Submit</button>
    </form>

@endsection