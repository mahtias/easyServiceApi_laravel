{{-- @extends('layouts.apps') --}}

{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VAVAVOOM</title>
    <link rel="icon" type="image/png" href="{{asset('dashe/assets/img/favicon.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('dashe/assets/img/favicon.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('dashe/assets/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashe/assets/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashe/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <style>
        body {
            /* background-image: url('{{asset('assets/img/bg-gradient-3.jpg')}}');
            background-repeat: no-repeat;
            background-size: cover; */
            background-color: #2873eb;
        }
        .form-form .form-form-wrap form .field-wrapper svg.feather-eye {
            top: 46px;
        }
       
    </style>
</head>
<body >
    <div class="Container form-container outer">
        <div class="form-form">
            <div class="form-form-wrap ">
            <h1 class="text-center">
             <a href="{{url('/')}}"><img src="{{asset('dashe/assets/images/logos.png')}}" alt="" width="200px"></a></h1>
              <p class="text-light text-center" style = "text-transform:uppercase;">Un seul guichet pour tous vos achats de tickets d'autocar!</p>

                <div class="form-container">
                    <div class="form-content">

                        <h1 class="text-center">Connexion</h1>
                        <h5 id="error-mail" class="text-danger"></h5>
                        
                        <form method="POST" action="{{ route('login') }}" class="text-left">

                            @csrf

                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Email ou Téléphone</label>
                                    <p class="invalid-feedback"></p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="email" type="text" placeholder="Email ou Téléphone" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">MOT DE PASSE</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="display:none" class="" type="checkbox" name="remember" >
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" id="send-button" value="">{{ __('Se connecter') }}</button>
                                    </div>
                                </div>

                                <div class="division">
                                </div>

                            </div>
                        </form>
                    </div>    
                    <br>
                    <center>
                        <a class="text-light" href={{url('/inscription')}}>Vous n'avez pas de compte ? Inscrivez-vous ici .</a>
                        <br>
                         <a class="text-light" href={{url('/mot-passe-oublier')}}>Mot de passe oublié ? Cliquez ici .</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('front/js/jquery-1.11.3.min.js')}}"></script>             <!-- jQuery (https://jquery.com/download/) -->
<script>
$(document).ready(function() {
    $( "input#email" )
  .keyup(function() {
    var value = $( this ).val();
    
   if($.isNumeric(value)!=true && value !=""){
       var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        if(pattern.test(value)){
            $("h3#error-mail" ).text("");
            $("button#send-button").show();
        } else{
          $("h5#error-mail" ).text("Entrer un mail valide contenant un arrobase(@).");
          $("button#send-button").hide();
        }
   }
    
  })
  .keyup();
});
</script>

    <script src="{{asset('dashe/assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('dashe/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('dashe/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashe/assets/js/authentication/form-2.js')}}"></script>
</body>
</html>



{{-- @endsection --}}
