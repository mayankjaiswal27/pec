<x-app-layout>

    <style>

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
    

    
        .grid-child-one img {
            margin-left: 15%;
            opacity: 0;
            animation: fadeIn 1.5s ease-in-out forwards;
        }
    
        .grid-child-two {
            background-color: #EDF5FF;
            height: 100%;
        }
    
        .about-text, .about-text-2 {
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
    
        .about-text-2 {
            margin-top: 25%;
        }
    
        .btn {
            padding: 2%;
            padding-left: 5%;
            padding-right: 5%;
            border-radius: 38px;
            background: #407BFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }
    
        .btn-text {
            color: #FFF;
            font-family: Roboto;
            font-size: 25px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
    
        .footer-1 {
            background-color: black;
            color: white;
            padding: 1%;
            display: flex;
            justify-content: center;
            font-size: 20px;
        }
    
        a.navb {
            color: #407bff;
            font-size: 20px;
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
        form {
            text-align: center;
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
        .anc-foot{
            text-decoration: underline;
        }
    </style>
    
    <div class="py-3">
        <div class="">
            <div class="">
                <div class="grid-container">

                    <div class="grid-child-one">
                        <img src="../assets/logo.svg"/>
                        <div class="about-text"><br>
                            <b>Welcome {{ Auth::user()->name }} !! </b><br><br>
                            <p>
                                Confused what to do in life? Why to worry?
                                Take our tests to find out, what career
                                suits the most to your personality .
                                Are you ready?</p><br><br>
                                <a href="{{route('quiz.index')}}"><button class="btn"><span class="btn-text">Take Test</span></button></a>
                                <img src="../assets/dashboardimg.svg"/>
                        </div>
                        
                    </div>
                
                    <div class="grid-child-two">
                        
                        <div class="navb">

                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('quiz.index')" :active="request()->routeIs('dashboard')">
                                {{ __('Take Test') }}
                            </x-nav-link>
    
                            <x-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-nav-link>
                            <x-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                            
                                                this.closest('form').submit();">
                                                
                                {{ __('Log Out') }}
                                    
                            </x-nav-link>
                        </form>
                        </div>
                    <div class="about-text-2">
                        <b>Why to take tests?</b><br><br>
                        <p>
                            <b>AkankshAI</b> takes your personality and aptitude
                            tests, to find what type of person you are.
                            
                            AkankshAI takes into account the choice of 
                            both the students and parents.
                            
                            We provide the detailed analysis and all
                            suitable career paths for the user, along with
                            future opportunities, admission processes, top
                            institutions and also provide assistance from
                            government certified counselors.</p>
                    </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="footer-1"><footer>Made with ❤️ by <a href="{{ route('meet') }}" class="anc-foot">Team Smart Under Criticism</a></footer></div>
</x-app-layout>