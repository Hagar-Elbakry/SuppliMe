@props(['active' => false])
<a class="text-decoration-none text-dark text-uppercase" {{$attributes}}>
    <li class="{{$active ? 'active' : ''}}">{{$slot}}</li>
</a>
