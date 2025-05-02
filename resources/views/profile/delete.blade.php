<x-head>
    <link rel="stylesheet" href="/assets/css/login.css"/>
    <div class="main-form text-center rounded-4 py-3">
        <div class="container d-flex justify-content-center  flex-column">
            <h3>Confirm Delete Account</h3>
            <form action="/profile/{{$user->name}}/destroy" method="post" class="d-flex justify-content-between align-items-center gap-3 flex-column mt-1">
                @csrf
                @method('DELETE')
                <x-auth-input type="password" name="password" placeholder="Password"/>
                <x-form-error name="password"/>
                <x-auth-input type="password" name="password_confirmation" placeholder="Re-type Password"/>
                <x-form-error name="password_confirmation"/>
                <button type="submit" class="btn text-light fw-medium rounded-3 m-lg-2" >DELETE</button>
            </form>
            <a href="{{route('profile.show', $user)}}" class="text-decoration-none">Cancel</a>

        </div>
    </div>
</x-head>
