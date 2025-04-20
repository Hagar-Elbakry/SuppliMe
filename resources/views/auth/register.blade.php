<x-head>
    <link rel="stylesheet" href="/assets/css/login.css" />
<div class="main-form text-center rounded-4 py-3">
    <div class="container d-flex justify-content-center  flex-column">
        <h3>Register</h3>
        <form action="/register" method="post" class="d-flex justify-content-between align-items-center gap-3 flex-column mt-1">
            @csrf
           <x-auth-input type="test" name="name" placeholder="Name" required/>
            <x-form-error name="name"/>
            <x-auth-input type="email" name="email" placeholder="Email" required/>
            <x-form-error name="email"/>
            <x-auth-input type="password" name="password" placeholder="Password" required/>
            <x-form-error name="password"/>
            <x-auth-input type="password" name="password_confirmation" placeholder="Re-type Password" required/>
            <x-form-error name="password_confirmation"/>
            <x-auth-input type="text" name="phone" placeholder="Phone" required/>
            <x-form-error name="phone"/>
            <x-auth-input type="text" name="address" placeholder="Address" required/>
            <x-form-error name="address"/>
            <button type="submit" class="btn text-light fw-medium mt-3 rounded-3 m-lg-2">Register</button>
        </form>

        <div class="sign d-flex justify-content-center mt-2">
            <p class="me-2">Already have an account?</p>
            <a href="/login" class=" fw-medium text-decoration-none">Log In</a>
        </div>
    </div>
</div>

</x-head>
