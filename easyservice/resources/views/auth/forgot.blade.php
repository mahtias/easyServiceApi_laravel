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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
       /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>
</head>
<body >
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap ">
            <h1 class="text-center">
             <a href="{{url('/')}}"><img src="{{asset('dashe/assets/images/logos.png')}}" alt="" width="200px"></a></h1>
              <p class="text-light text-center" style = "text-transform:uppercase;">Un seul guichet pour tous vos achats de tickets d'autocar!</p>

                <div class="form-container">
                    <div class="form-content">
                        <h2 class="text-center">Récupération</h2>
                        <div id="myGroup">
                        <div class="row">
                           <button id="firstButton" style="font-size:12px" class="col-md-5  mr-2 mt-2 btn btn-block btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" data-parent="#myGroup">Récupération par téléphone</button>
                           <div class="col-md-1"></div>
                           <button id="secondButton" style="font-size:12px" class="col-md-5 mt-2 btn btn-block btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" data-parent="#myGroup">Récupération par mail</button>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                              <div class="card card-body">
                                <form class="form-inline" id="phoneForm">
                                      <!--<label class="sr-only" for="inlineFormInputGroupUsername2">Votre téléphone</label>-->
                                      <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                        <input type="number" class="form-control" name="telephone" id="inlineFormInputGroupUsername2" placeholder="Numéro de connexion" required>
                                      </div>
                                    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                                </form>
                                <form class="form-inline" id="changePassword">
                                      <!--<label class="sr-only" for="inlineFormInputGroupUsername2">Votre téléphone</label>-->
                                      <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                        <input type="number" class="form-control" name="telephone" id="inlineFormInputGroupUsername2" placeholder="Numéro de connexion" required>
                                        <span id="okbtn" class="ml-3" style="font-size:2rem; color: green "><i class="fa fa-check-circle"></i></span>
                                      </div>
                                      <div id="">
                                          <span>Ajouter un nouveau mot de passe</span>
                                           <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="mot de passe" required>
                                         </div>
                                      </div>
                                    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample2">
                              <div class="card card-body">
                                  <form class="form-inline" id="formEmail">
                                      <label class="sr-only" for="inlineFormInputGroupUsername2">Votre mail</label>
                                       <div class="input-group mb-2 mr-sm-2">
                                         <div class="input-group-prepend">
                                           <div class="input-group-text">@</div>
                                         </div>
                                        <input type="email" class="form-control" name="email" id="inlineFormInputGroupUsername2" placeholder="Votre mail de connexion">
                                      </div>
                                      <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                                    </form>
                                    <form class="form-inline" id="emailchangePassword">
                                          <label class="sr-only" for="inlineFormInputGroupUsername2">Votre mail</label>
                                          <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text">@</div>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="inlineFormInputGroupUsername2" placeholder="mail de connexion" required>
                                            <span id="okbtn" class="ml-3" style="font-size:2rem; color: green "><i class="fa fa-check-circle"></i></span>
                                          </div>
                                          <div id="">
                                          <span>Ajouter un nouveau mot de passe</span>
                                             <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                              </div>
                                            <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="mot de passe" required>
                                          </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div> 
                    </div>    
                    <br>
                    <center>
                        <a class="" style="fontweight:bold; color: #f7da00" href={{url('/inscription')}}>Vous n'avez pas de compte ? Incrivez-vous ici .</a>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('dashe/assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('dashe/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('dashe/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashe/assets/js/authentication/form-2.js')}}"></script>
    <script>
        $("div#multiCollapseExample1").hide();
        $("div#multiCollapseExample2").hide();
        $("button#firstButton").on("click", function() {
                  $("div#multiCollapseExample1").show();
                  $("div#multiCollapseExample2").hide();
        });
         $("button#secondButton").on("click", function() {
                  $("div#multiCollapseExample1").hide();
                  $("div#multiCollapseExample2").show();
        });
     
    </script>
  
<script>
    
    $("form#changePassword").hide();
    var  forms =document.getElementById("phoneForm");
    var  forms2 =document.getElementById("changePassword");

    forms.addEventListener("submit",
        function (event) {
            event.preventDefault();
            sendData();
           
            // location.reload();

        });
        
        forms2.addEventListener("submit",
        function (event) {
            event.preventDefault();
            sendDatas();
            //  Swal.fire({
            //       icon: 'success',
            //       text: "Success",
                  
            //     });
            // location.reload();

        });

    async function sendData() {
        const settings = {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body:  JSON.stringify(
            {
                "telephone": forms.telephone.value
            })
        };
        forms2.telephone.value=forms.telephone.value;
        try {
            const fetchResponse = await fetch(`https://vavavoom.ci/getuserByPhone`, settings);
            const data = await fetchResponse.json();
            if(!fetchResponse.ok)
            {   
               Swal.fire({
                  icon: 'error',
                  text: data.message,
                  
                });
            } else {
              $("form#phoneForm").hide();
              $("form#changePassword").show();
              if(data.message){
                  Swal.fire({
                  icon: 'success',
                  text: data.message,
                  
                });
              }
            }
            console.log(fetchResponse.status);
            
        } catch (e) {
            return e;
        }   

    }
    
    async function sendDatas() {
        const settings = {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body:  JSON.stringify(
            {
                "telephone": forms2.telephone.value,
                "password":forms2.password.value,
            })
        };
        try {
            const fetchResponse = await fetch(`https://vavavoom.ci/findUserByPhonechange`, settings);
            const data = await fetchResponse.json();
            if(!fetchResponse.ok)
            {   
             
            } else {
              $("form#phoneForm").hide();
              $("form#changePassword").show();
              if(data.message){
                  Swal.fire({
                  icon: 'success',
                  text: data.message,
                  
                });
              }
            setTimeout(function() {
                location.reload();
            }, 800);
              
            }
            console.log(fetchResponse.status);
            
        } catch (e) {
            return e;
        }   

    }
            
</script>
<script>
    
    $("form#emailchangePassword").hide();
    var  forme =document.getElementById("formEmail");
    var  formes2 =document.getElementById("emailchangePassword");
    forme.addEventListener("submit",
        function (event) {
            event.preventDefault();
            sendDataEmail();
           
            // location.reload();

        });
        
        formes2.addEventListener("submit",
        function (event) {
            event.preventDefault();
            sendDatasEmail();
            //  Swal.fire({
            //       icon: 'success',
            //       text: "Success",
                  
            //     });
            // location.reload();

        });

    async function sendDataEmail() {
        const settings = {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body:  JSON.stringify({
                "email": forme.email.value
            })
         }
            formes2.email.value = forme.email.value;
        try {
            const fetchResponse = await fetch(`https://vavavoom.ci/getuserByEmail`, settings);
            const data = await fetchResponse.json();
            if(!fetchResponse.ok)
            {   
               Swal.fire({
                  icon: 'error',
                  text: data.message,
                  
                });
            } else {
              $("form#formEmail").hide();
              $("form#emailchangePassword").show();
              if(data.message){
                  Swal.fire({
                  icon: 'success',
                  text: data.message,
                  
                });
              }
            }
            console.log(data);
            
        } catch (e) {
            return e;
        }   

    }
    
    async function sendDatasEmail() {
        const settings = {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body:  JSON.stringify(
            {
                "email": formes2.email.value,
                "password":formes2.password.value,
            })
        };
        try {
            const fetchResponse = await fetch(`https://vavavoom.ci/getuserByEmailChange`, settings);
            const data = await fetchResponse.json();
            if(!fetchResponse.ok)
            {   
             
            } else {
              $("form#phoneForm").hide();
              $("form#emailchangePassword").show();
              if(data.message) {
                  Swal.fire({
                  icon: 'success',
                  text: data.message,
                  
                });
              }
            setTimeout(function() {
                location.reload();
            },800);
              
            }
            console.log(fetchResponse.status);
            
        } catch (e) {
            return e;
        }   

    }
            
</script>


</body>
</html>



{{-- @endsection --}}
