<label class="d-block">
        <a class="text-decoration-none text-black" {{$attributes}}>
        <input type="radio" name="category" value="{{$category->id}}" onchange="this.form.submit()"/>
        {{$slot}}
        </a>
</label>


