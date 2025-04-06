<x-guest-layout>
    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <p class="form-login">Register</p>

            <!-- Name -->
            <div class="input-box">
                <x-text-input id="name" class="login-input" type="text" name="name" :value="old('name')" required autofocus placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="input-box">
                <x-text-input id="email" class="login-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-box">
                <x-text-input id="password" class="login-input" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-box">
                <x-text-input id="password_confirmation" class="login-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button class="btn" type="submit">Register</button>

            <!-- Login Link -->
            <div class="register-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
<style>
/* Reset any previous styling that may conflict */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Wrapper */
.wrapper {
    width: 420px;
    background: rgb(2, 0, 36);
    background: linear-gradient(
        90deg,
        rgba(2, 0, 36, 1) 9%,
        rgba(9, 9, 121, 1) 68%,
        rgba(0, 91, 255, 1) 97%
    );
    backdrop-filter: blur(9px);
    color: #fff;
    border-radius: 12px;
    padding: 30px 40px;
    margin: auto;  /* Center the form */
}

/* Form Title */
.form-login {
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px;
}

/* Input box styling */
.input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.login-input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}

.login-input::placeholder {
    color: #fff;
}

/* Button styling */
.btn {
    width: 150px;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
    margin-left: 90px;
    margin-top: 10px;
}

/* Register link styling */
.register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
}

.register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.register-link p a:hover {
    text-decoration: underline;
}
</style>
