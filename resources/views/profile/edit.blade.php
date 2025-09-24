<x-head>
    <link rel="stylesheet" href="{{asset('assets/css/contact-us.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}"/>
    <x-nav/>
    <div class="main-title text-center pt-5">
        <h1>Edit Your Profile</h1>
        <x-header href="{{route('profile.edit', $user)}}">Your Profile</x-header>
    </div>
    <div class="main-edit">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <h3 class="card-title mb-4 text-center">Edit Profile</h3>
                            <form action="{{route('profile.update', $user)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <x-edit-label for="name">
                                    <x-slot:name>
                                        Name
                                    </x-slot:name>
                                    <x-edit-input name="name" type="text" id="name" value="{{$user->name}}" required/>
                                </x-edit-label>
                                <x-form-error name="name"/>

                                <x-edit-label for="email">
                                    <x-slot:name>
                                        Email
                                    </x-slot:name>
                                    <x-edit-input name="email" type="email" id="email" value="{{$user->email}}"
                                                  required/>
                                </x-edit-label>
                                <x-form-error name="email"/>


                                <x-edit-label for="image">
                                    <x-slot:name>
                                        Image
                                    </x-slot:name>
                                    <x-edit-input name="image" type="file" id="image"/>
                                </x-edit-label>
                                <x-form-error name="image"/>

                                <x-edit-label for="password">
                                    <x-slot:name>
                                        Password
                                    </x-slot:name>
                                    <x-edit-input name="password" type="password" id="password" required/>
                                </x-edit-label>
                                <x-form-error name="password"/>

                                <x-edit-label for="password_confirmation">
                                    <x-slot:name>
                                        Password Confirmation
                                    </x-slot:name>
                                    <x-edit-input name="password_confirmation" type="password"
                                                  id="password_confirmation" required/>
                                </x-edit-label>
                                <x-form-error name="password_confirmation"/>

                                <div class="d-flex justify-content-between">
                                    <x-button>Save</x-button>
                                    <a href="{{route('profile.delete', $user)}}" class="mt-2 text-decoration-none"
                                       style="color: green">Delete Account</a>
                                    <a href="{{route('profile.show', $user)}}" class="mt-2 text-decoration-none"
                                       style="color: green">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
</x-head>
