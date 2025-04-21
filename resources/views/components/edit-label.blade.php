@props([
    'name'
])
<div class="mb-3">
    <label {{$attributes}} class="form-label text-uppercase">{{$name}}</label>
    {{$slot}}
</div>
