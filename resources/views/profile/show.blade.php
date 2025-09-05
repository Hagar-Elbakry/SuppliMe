<x-head>
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Profile</h1>
    <x-header href="{{route('profile.show', $user)}}">Profile</x-header>
</div>
<div class="main-profile">
    <div class="container d-flex justify-content-center">
        <div class="d-flex flex-column flex-md-row align-items-start gap-5">
            <div class="image col-md-6 d-flex justify-content-center align-items-start">
                <img src="{{$user->default_image}}" class="img-fluid" alt="">

            </div>
            <div class="profile-detailes d-flex justify-content-between gap-3 flex-column col-md-6">

                <x-profile-info>
                    <x-slot:name>
                        Name :
                    </x-slot:name>
                    <x-slot:value>
                        {{$user->name}}
                    </x-slot:value>
                </x-profile-info>

                <x-profile-info>
                    <x-slot:name>
                        Email :
                    </x-slot:name>
                    <x-slot:value>
                        {{$user->email}}
                    </x-slot:value>
                </x-profile-info>

                <x-profile-info>
                    <x-slot:name>
                        Phone Number :
                    </x-slot:name>
                    <x-slot:value>
                        {{$user->phone}}
                    </x-slot:value>
                </x-profile-info>

                <x-profile-info>
                    <x-slot:name>
                        Address :
                    </x-slot:name>
                    <x-slot:value>
                        {{$user->address}}
                    </x-slot:value>
                </x-profile-info>

                <div class="bs d-flex justify-content-start align-items-center gap-4 ">
                <div class="edit-but p-4 border border-success rounded-4">
                    <i class="fa-solid fa-pen me-2 text-light"></i>
                    <a href="{{route('profile.edit', $user)}}" class="text-decoration-none text-light text-uppercase ">Edit Profile</a>
                </div>
                    @if($user->getRawOriginal('image'))
                        <div class="del p-4 border border-success rounded-4">
                        <form action="{{route('profile.deleteImage', $user)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-decoration-none text-success nav-link text-uppercase">
                                <i class="fa-solid fa-trash me-2"></i>Delete Your Image
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
