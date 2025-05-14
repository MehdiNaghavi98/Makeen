<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>


<body>
@if(isset($error))
    <div id="custom-error-box" class="custom-error-box">
        {{ $error }}
    </div>
@endif


    <div class="container">
        <div class="form-box login">
            <form action="#">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Phone Number" required>
                    <i class='bx bxs-phone'></i>
                </div>

                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>or login with social platforms</p>

            </form>
        </div>

        <div class="form-box register">
            <form action="{{route('Register')}}" method="POST">
                @csrf

                <div class="input-box">
                    <input name="name" type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input name="phone" type="text" placeholder="Phone Number" required>
                    <i class='bx bxs-phone'></i>
                </div>
                <div class="input-box">
                    <select name="role" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="buyer">buyer</option>
                        <option value="admin">admin</option>
                        <option value="seller">Seller</option>
                    </select>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input name="password"  type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input name="RePassword"  type="password" placeholder="Repeat Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input name="email"  type="email" placeholder="Email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>


                <button style="margin-bottom: 30px" type="submit" class="btn">Register</button>


            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Welcome</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>registration</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>


    <script src="{{asset('script.js')}}"></script>
</body>
</html>
