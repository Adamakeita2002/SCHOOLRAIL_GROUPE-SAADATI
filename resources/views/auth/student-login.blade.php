@extends ('layouts.master')

<link href="/css/login.css" rel="stylesheet">

@section('content')

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
                <img src="{{ asset('/img/studentlogin.png') }}" alt="Studentlogin.png" class="img-fluid"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container" style="margin: 0px auto">

                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <img src="/assets/img/logo-sabile-12x12-1.webp" alt="HETEC"
                                    class="img-fluid rounded mx-auto d-block" style="width: 300px; height: 300px">
                            </div>
                        </div> <br>

                        @if ($academicyearP)
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4"> Connectez vous à votre compte <b> Schoolrail!</b> </h3>

                                    @include ('layouts.errors')
                                    <form role='form' method="POST" action="{{ route('student.login.submit') }}">
                                        {{ csrf_field() }}

                                        <div class="form-label-group">
                                            <input type="text" name="matricule" id="matricule" class="form-control"
                                                placeholder="Entrez votre adresse Email" required autofocus>
                                            <label for="matricule">Matricule</label>
                                        </div>

                                        @if ($errors->has('matricule'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('matricule') }}</strong>
                                            </span>
                                        @endif


                                        <div class="form-label-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Entrez votre mot de passe" required>
                                            <label for="password">Mot de passe</label>
                                        </div>
                                        <!--
                                                                                                          @if ($errors->has('password'))
    <span class="help-block">
                                                                                                          <strong>{{ $errors->first('password') }}</strong>
                                                                                                              </span>
    @endif
                                                                                            -->
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Enregistrer votre mot de
                                                passe ?</label>
                                        </div>
                                        <button
                                            class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">
                                            Connectez - Vous!
                                        </button>

                                    </form>

                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <img src="/assets/img/logo-schoolrail.png" width="150px" height="150px"
                                        alt="Schoolrail" class="img-fluid rounded mx-auto d-block">
                                </div>
                            </div>
                        @else
                            <div class="row">

                                <div class="col-md-9 col-lg-8 mx-auto">

                                    <h3 class="login-heading mb-4 text-center"> <b> La plateforme est en maintenance</b>
                                    </h3>

                                    <h3 class="login-heading mb-4 text-center"> Revenez plus tard ! </h3>

                                </div>
                            </div>


                            <div class="text-center">
                                <h5>Vous pouvez vous rendre à l'administration pour en savoir plus</h5>
                                <h5>ou envoyez un email à l'adresse suivante :</h5>
                                <p><b>info@petiteacademy.net</b></p>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <img src="/assets/img/logo-schoolrail.png" width="150px" height="150px"
                                        alt="Schoolrail" class="img-fluid rounded mx-auto d-block">
                                </div>

                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
