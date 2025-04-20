@props([
    'name'
])
<div class="mb-3">
    <label class="form-label">{{$name}}</label>
    {{$slot}}
</div>
