<a
    href="/shop?category={{ $category->id }}"
    class="text-decoration-none text-dark d-flex align-items-center flex-column gap-2"
><img src={{ asset('storage/'.$category->image) }} alt={{ $category->name }} />
    <h6 class="fw-bold">{{ $category->name }}</h6></a
>
