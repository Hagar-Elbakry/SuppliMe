<x-head>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}"/>
    <div class="main-form text-center rounded-4 py-3">
        <div class="container d-flex justify-content-center  flex-column">
            <h3>Log In</h3>
            <form action="{{route('login')}}" method="post"
                  class="d-flex justify-content-between align-items-center gap-3 flex-column mt-1">
                @csrf
                <x-auth-input type="email" name="email" placeholder="Email" value="{{ old('email') }}"/>
                <x-form-error name="email"/>
                <x-auth-input type="password" name="password" placeholder="Password"/>
                <button type="submit" class="btn text-light fw-medium rounded-3 m-lg-2">Log In</button>
            </form>

            <div class="sign d-flex justify-content-center mt-2">
                <p class="me-2">Don`t have an account?</p>
                <a href="{{route('register')}}" class=" fw-medium text-decoration-none">Register</a>
            </div>
        </div>
    </div>

</x-head>
