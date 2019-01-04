<div>
    <ul class="list-group">
        @foreach (['success','danger','warning'] as $i)
            @if (session()->has($i))
    <li class="list-group-item list-group-item-{{$i}}">{{session()->get($i)}}</li>
            @endif
        @endforeach
    </ul>
</div>