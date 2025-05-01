<x-head>
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Profile</h1>
    <x-header href="/profile/{{auth()->user()->name}}">Profile</x-header>
</div>
<div class="main-profile">
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="image me-4 col-md-6 d-flex justify-content-center align-items-start">
                <img src="{{$user->profile_image}}" class="img-fluid" alt="">
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


                <div class="edit-but p-4 border border-success rounded-4">
                    <i class="fa-solid fa-pen me-2 text-light"></i>
                    <a href="/profile/{{auth()->user()->name}}/edit" class="text-decoration-none text-light text-uppercase ">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
</x-head>
