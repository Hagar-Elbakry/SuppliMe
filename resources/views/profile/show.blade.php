<x-head>
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <x-nav/>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">User Profile</h1>
            <x-header href="{{route('profile.show', $user)}}">Profile</x-header>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="row g-0">

                        <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                            <img src="{{$user->default_image}}"
                                    class="img-fluid rounded-circle border border-3 border-success shadow-sm"
                                    alt="User Image"
                                    style="width: 200px; height: 200px; object-fit: cover;">
                        </div>

                        <div class="col-md-7 p-4 d-flex flex-column justify-content-center">

                            <h3 class="fw-bold mb-3">{{$user->name}}</h3>
                            <p class="text-muted mb-4"><i class="fa-solid fa-envelope me-2"></i>{{$user->email}}</p>

                            <div class="mb-3">
                                <x-profile-info>
                                    <x-slot:name>Joined:</x-slot:name>
                                    <x-slot:value>{{ $user->created_at->format('d M Y') }}</x-slot:value>
                                </x-profile-info>
                            </div>

                            <div class="d-flex gap-3 mt-4">
                                <a href="{{route('profile.edit', $user)}}"
                                    class="btn btn-success px-4 py-2 rounded-3 text-uppercase fw-semibold">
                                    <i class="fa-solid fa-pen me-2"></i>Edit
                                </a>

                                @if($user->getRawOriginal('image'))
                                <form action="{{route('profile.deleteImage', $user)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="btn btn-outline-danger px-4 py-2 rounded-3 text-uppercase fw-semibold">
                                        <i class="fa-solid fa-trash me-2"></i>Delete Image
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer/>
</x-head>
