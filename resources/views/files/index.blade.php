<!DOCTYPE html>
<html>
<body>
    <div class="row">
        <div class="col-md-12">
            <h3>File List</h3>
                @csrf
                @foreach($filedata as $resource)
                    <a href="{{ route('resources.show', $resource) }}">{{ $resource->name }}</a><br/>
                @endforeach
        </div>
    </div>
</body>
</html>
