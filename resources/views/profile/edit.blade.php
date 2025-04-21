<x-head>
    <link rel="stylesheet" href="/assets/css/contact-us.css" />
    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/about.css" />
<x-nav/>
<div class="main-title text-center pt-5">
    <h1>Edit Your Profile</h1>
   <x-header>Your Profile</x-header>
</div>
<div class="main-edit">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Edit Profile</h3>
                        <form>
                            <x-edit-label for="name">
                                <x-slot:name>
                                    Name
                                </x-slot:name>
                                <x-edit-input type="text" id="name" value="Name"/>
                            </x-edit-label>

                            <x-edit-label for="email">
                                <x-slot:name>
                                    Email
                                </x-slot:name>
                                <x-edit-input type="email" id="email" value="teto@gmail.com"/>
                            </x-edit-label>

                            <x-edit-label for="avatar">
                                <x-slot:name>
                                    Avatar
                                </x-slot:name>
                                <x-edit-input type="file" id="avatar"/>
                            </x-edit-label>

                            <x-edit-label for="password">
                                <x-slot:name>
                                    Password
                                </x-slot:name>
                                <x-edit-input type="password" id="password" required/>
                            </x-edit-label>

                            <x-edit-label for="password_confirmation">
                            <x-slot:name>
                                Password Confirmation
                            </x-slot:name>
                            <x-edit-input type="password" id="password_confirmation" required/>
                            </x-edit-label>

                            <div class="d-flex justify-content-between">
                                <x-button>Submit</x-button>
                                <x-button>Delete</x-button>
                                <x-button>Cancle</x-button>
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
