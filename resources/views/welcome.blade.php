<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- CSS/SCRIPTS -->
        <link rel="stylesheet" href="css/home.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            .hero-image {
                background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) ),url({{ URL::asset('img/bg.jpg') }});
                margin-top:-22%;
                height: 500px;
                width:202vh;
                margin-left:-27vh;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
            }   
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="#" class="nav-link" style="cursor: pointer; margin-left:-13vh;" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                        <a href="#" class="nav-link" style="cursor: pointer; margin-top:-3vh" data-toggle="modal" data-target="#registerModal">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="hero-image">
                    <div class="title"><br>
                        SchoolWork Tracker
                        <h3>Keep track of your classes, tasks and exams</h3>
                    </div>
                </div>

                <div class="features"><br>
                    <h1 class="header">Manage your study time better</h1>
                    <div class="row" style="margin-bottom:3%;"> 
                        <div class="col-sm-3">
                            <i class="fa fa-calendar fa-5x" aria-hidden="true"></i>
                        </div>
                        
                        <div class="col-sm-3" id="features" style="margin-right:5%;">
                            <h3>Scheduling</h3>
                            <p>Plot your schedules for deadlines and exams as you keep track of your obligations</p>
                        </div>

                        <div class="col-sm-3">
                            <i class="fa fa-list-alt fa-5x" aria-hidden="true"></i>
                        </div>
                    
                        <div class="col-sm-3" id="features">
                            <h3>Tasks</h3>
                            <p>Keep track of your tasks with a checklist</p>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-sm-3">
                            <i class="fa fa-bell-o fa-5x" aria-hidden="true"></i>
                        </div>
                        
                        <div class="col-sm-3" id="features" style="margin-right:5%;">
                            <h3>Reminders</h3>
                            <p>Get notified with unfinished tasks and upcoming lectures and exams</p>
                        </div>

                        <div class="col-sm-3">
                            <i class="fa fa-clock-o fa-5x" aria-hidden="true"></i>
                        </div>
                        
                        
                        <div class="col-sm-3" id="features">
                            <h3>Save Time</h3>
                            <p>Save time having to write reminders on paper when you can type and click away</p>
                        </div>
                    </div><br>
                </div>            
            </div>



            <!--LOGIN MODAL!-->
            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" id="loginModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="loginModal" style="margin-left:42%">LOGIN</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="loginBtn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="forgotpass">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" id="forgot">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!--REGISTER MODAL!-->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="registerModal" style="margin-left:38%">REGISTER</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="registerBtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
