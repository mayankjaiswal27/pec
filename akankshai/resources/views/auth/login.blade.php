<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body{
        decoration:none;
        margin-top:-0125%;
    }
      .grid-child-one, .grid-child-two {

      }
      
      @keyframes fadeIn {
          from {
              opacity: 0;
              transform: translateY(+80px);
          }
          to {
              opacity: 1;
              transform: translateY(0);
          }
      }
      
      .grid-container {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-gap: 20px;
      }
  
      .grid-child-two {
          background-color: #EDF5FF;
          height: 100%;
      }
        .login{
            margin-top:5%;
            text-align:left;
            float:left;
        }
        .login input{
            margin-left:20%;
            text-align:left;
            width: 250%; /* Adjust the width as needed */
            padding: 10.5%; /* Adjust the padding as needed */
            margin-bottom: 15px; /* Optional: Add some space between the input fields */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }
        input::placeholder {
            color: #888;
        }
        .logo{
        margin-left:2%;
        margin-top:1%;
        }
        h5{
            color:grey;
            margin-top: -4%;
            margin-left:42%;
            
        }
        .text{
            margin-top:4%;
            margin-left:6%;
        }
        h2{
            color:#3751FE;
        }
        .rem-me{
            margin-left:3%;
            margin-top:28%;
        }
        .buttons{
            display:flex;
            padding: 3%;
        }
        button{
            margin-top:2%;
            padding: 1%;
            margin-left:2%;
        }
        .buttons {
            text-align: center; /* Center the buttons */
        }
        .btn1 {
    background-color: #3751FE; /* Green background color */
    color: white; /* White text color */
    padding: 10px 20px; /* Padding for the button */
    border: none; /* Remove default button border */
    border-radius: 1px; /* Add a slight border-radius for a rounded look */
    cursor: pointer; /* Change cursor to pointer on hover */
    margin-right: 5%; /* Optional: Add some space between buttons */
    margin-left: 10%;
}
.btn2 {
    background-color: white; /* Blue background color */
    color:  #3751FE; /* White text color */
    padding: 10px 20px; /* Padding for the button */
    border: 1px solid  #3751FE; /* Remove default button border */
    border-radius: 1px; /* Add a slight border-radius for a rounded look */
    cursor: pointer; /* Change cursor to pointer on hover */
}
.btn1:hover{
    background-color: #407BFF; 
}
.btn2:hover{
    background-color: #407BFF; 
    color:white;
}

      .img {
          margin-top: 3.2%;
          color: rgba(0, 0, 0, 0.91);
          font-family: Roboto;
          padding-left: 10%;
          padding-right: 10%;
          font-size: 28px;
          font-style: normal;
          font-weight: 400;
          line-height: normal;
          opacity: 0;
          animation: fadeIn 1.5s ease-in-out forwards;
      }
  
      .img {
          margin-top: 25%;
      }
      a.navb {
          color: #407bff;
          font-size: 20px;
          
      }
      a{
          color: #407bff;
          font-size: 20px;
          text-align: right;
          padding-top: 1%;
          padding-left: 1.5%;
          padding-right: 4.5%;
          text-decoration:none;
      }
  
      a.navb:hover {
          color: #000000;
          font-size: 20px;
      }
  
      .navb-active {
          color: #000000;
          font-size: 20px;
      }
  
      .navb,
      form{
          text-align: right;
          padding-top: 1%;
          padding-left: 1.5%;
          padding-right: 4.5%;
      }
  
      .navb-active {
          color: #407bff;
          text-align: center;
          padding-top: 2%;
          padding-left: 1.5%;
          padding-right: 4.5%;
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
  <div class="py-3">

      <div class="">
        <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/234c02a7-0512-43be-80c3-996ede7fb743/webchat/config.js" defer></script>
          <div class="">
              <div class="grid-container">
                  <div class="grid-child-one">
                        <div class="logo">
                            <img src="../assets/logo.svg"/>
                        </div>
                        <div class="text">
                            <h2>Akanshao se safalta tak </h2>
                            <p>Welcome back please login to your account</p>
                        </div>  
                        <div class="login"><br>
                            @if(session('error'))
                                <p style="color: red;">{{ session('error') }}</p>
                            @endif
                            <form action="{{ url('/login') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required><br>
                                <input type="password" name="password" placeholder="password" required><br>
                            </div>
                            <div class="rem-me">
                                <input type="checkbox">
                                <label>Remember Me</label>
                            </div>
                            <div class="forgot-pass">
                                <h5>Forgot password?</h5>
                            </div>
                            <div class="buttons">
                                <button class="btn1" type="submit">Login</button>
                                <button class="btn2" type="submit">SignUp</button>
                            </div>
                            </form>
                              <!-- <a href="{{route('login')}}"><button class="btn"><span class="btn-text">Login</span></button></a> -->
                         
                    </div>
              
                  <div class="grid-child-two">
                      
                      <div class="navb">

                            @if (Route::has('login'))
                                <div class="navb">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="">Log in</a>
                
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="">Register</a>
                                        @endif
                                    @endauth
                                    <a href="{{ route('meet') }}" class="">Meet the Team</a>
                                </div>
                            @endif
                      </div>
                  <div class="img">
                      <img src="../assets/OBJECTS.svg">
                  </div>
                  </div>
                
              </div>
          </div>
      </div>
  </div>
  <div class="footer-1">
        <footer>Made with ❤️ by  <a href="{{ route('meet') }}" class="anc-foot">Team Smart Under Criticism</a></footer>
    </div>
    </body>
    </html>
