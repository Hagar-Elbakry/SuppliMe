@props([
    'color',
    'discount',
    'category',
    'description',
    'img'
])
<div class="{{$color}} d-flex p-4 rounded-4 align-items-center">
    <div class="disc">
        <p class="of rounded-pill p-1 text-center mb-4">{{$discount}}</p>
        <h4>{{$category}}</h4>
        <p class="text-black-50 lh-sm">
            {{$description}}
        </p>
        <a
            class="btn rounded-3 text-light main-btn p-1 mt-4"
            href="/shop"
            target="_blank"
        >
            Shop Now
        </a>
    </div>
    <div class="image">
        <img
            src="{{$img}}"
            class="img-fluid"
            alt=""
        />
    </div>
</div>
