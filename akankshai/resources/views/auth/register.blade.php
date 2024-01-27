<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            
        }
        .navbar {
            padding-top: 1%;
            margin-left: 2.5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            margin-left: 0.5%;
        }
        .nav-links {
            display: flex;
            margin-right: 3.5%;
        }
        .navbar a {
            margin-left: 20px; /* Adjust spacing between links if necessary */
            color: #407bff;
            font-size: 95%;
            text-decoration: none; /* Optional: remove underline from links */
        }
        .register{
            margin-top: 5%;
            background-color: #EDF5FF;
            margin-left: 4%;
            margin-right: 4%;
            overflow: hidden;
        }
        .details{
            display: flex;
            padding:2%;
        }
        .first{
            background-color: #FFFFFF;
            margin-left: 3%; 
            margin-top:1%;
            width:30%;
            padding-left:9%;
            padding-right:5%;
        }
        .second{
            background-color: #FFFFFF;
            width:30%;
            padding-left:9%;
            padding-right:5%;
            margin-top:1%;
            margin-left: 6%; 
        }
        input {
            margin-top: 12%;
            margin-left: -25%;
            margin-right: 4%;
            width: 135%;
            border-spacing: 3%;
            padding: 5%;
            margin-bottom: 7%;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }
        input::placeholder {
            color: #888;
        }
        .btn{
            text-align: center;
        }
        .btn button {
            background-color: #407BFF;
            color: #FFFFFF;
            padding: 1%;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn button:hover {
            background-color: #305AA8; 
        }
        .elements{
            padding-bottom: 2%;
            overflow: hidden;
        }
        .google{
            text-align: center;
            padding-left:3%;
            margin-left: 1%;
            padding-right: 2%;
            margin: 1% auto;
        }
        .image{
           margin-top: -18%;
        } 
        .google button{
            margin-bottom: 2%;
            background-color: #407BFF;
            color: #FFFFFF;
            padding: 1.5%;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        h6{
            text-align: center;
            color: #666666;
        }
        p{
            text-align: center
            font-size: 25%;
        }
        .google a{
            text-align: center;
            color: black;
        }
        .google a:hover {
            text-decoration: none;
        }
        .robot{
            text-align: center;
            padding: 3%;
        }
        .footer-1 {
            background-color: black;
            color: white;
            padding: 1%;
            text-align: center;
            justify-content: center;
            font-size: 20px;
            /* width: 100%; */
            margin-top: 10px;
            margin-left: 4%;
            margin-right: 4%;
        }
        .anc-foot {
            text-decoration: underline;
        }
        a.anc-foot {
            color: white;
            padding-left: 0%;
            padding-right: 0%;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../assets/logo.svg"/>
        </div>
        <div class="nav-links">
            <a href="{{ url('/dashboard') }}" class="">Home</a>{{--student dashboard page--}}
            <a href="{{ url('/') }}" class="">About Us</a> {{--meet page--}}
            <a href="{{ url('/') }}" class="">Take Test</a> {{--quiz page--}}
        </div>
    </div>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <div class="register">
        <form action="{{ url('/register') }}" method="post">
            @csrf
        <div class="details">
            <div class="first">
                <label for="name"></label>
                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required><br>

                <label for="email"></label>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required><br>
            </div>
            <div class="second">
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password"required><br>

                <label for="password_confirmation"></label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"required><br>
            </div>
        </div>
        <div class="elements">
            <div class="btn">
                <button type="submit">Create Account</button>
            </div>
            <h6>Or Sign up with google</h6>
                <div class="google">
                    {{-- Google button  --}}
                    <button>Sign Up with Google</button>
                    <p>Already have an account?</p>
                    <a href="{{ url('/') }}" class="">Login</a>
                </div> 
                <div class="image">
                    <img src="../assets/Sign-Up.svg">
                </div>
            </div>
        </form>
    </div>
    {{-- I am not a robot button(center) --}}
    <div class="robot">
        <button>I am not a robot</button>
    </div>
    <div class="footer-1">
        <footer>Made with ❤️ by  <a href="{{ route('meet') }}" class="anc-foot">Team Smart Under Criticism</a></footer>
    </div>
</body>
</html>