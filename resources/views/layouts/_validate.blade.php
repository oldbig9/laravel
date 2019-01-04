<div>
    <ul class="list-group">
        @if (count($errors) > 0)
            @foreach ($errors as $error)
                <li class="list-group-item list-group-item-danger">{{$error}}</li>
            @endforeach
        @endif
    </ul>
</div>