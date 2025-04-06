<x-guest-layout>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <p class="form-login">Login</p>

            <!-- Email Address -->
            <div class="input-box">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-box">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember-forgot">
                <label>
                    <input id="remember_me" type="checkbox" name="remember" />
                    Remember Me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password</a>
                @endif
            </div>

            <!-- Submit Button -->
            <button class="btn" type="submit">Login</button>

            <!-- Register Link -->
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
<style>
/* From Uiverse.io by SyedShahzaib7 */ 
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
}
.form-login {
    font-size: 36px;
    text-align: center;
}
.wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}
.input-box input {
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
.input-box input::placeholder {
    color: #fff;
}

.wrapper .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}
.remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
}
.remember-forgot a {
    color: #fff;
    text-decoration: none;
}
.remember-forgot a:hover {
    text-decoration: underline;
}
.wrapper .btn {
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
.wrapper .register-link {
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
