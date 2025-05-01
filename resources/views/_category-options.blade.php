<div class="options">
    <div class="shop-title p-2 border-bottom">
        <h4>Filter Options</h4>
    </div>
    <div class="shop-category p-2 border-bottom">
        <h5 class="py-2">Category</h5>
        <div class="category list-unstyled fs-4">
            <form action="{{ route('shop.index') }}" method="get">
                @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category" value="{{$category->id}}" @checked(request('category') == $category->id) onchange="this.form.submit()">
                    <label class="form-check-label" for="category">{{$category->name}}</label>
                </div>
                @endforeach
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="categoryAll" value="" @checked(request('category') == '') onchange="this.form.submit()">
                    <label class="form-check-label" for="categoryAll">All</label>
                </div>
            </form>
            
        </div>
    </div>

</div>
