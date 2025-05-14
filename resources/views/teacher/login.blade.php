@extends ('layouts.master')

<link href="/css/login.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
                <img src="" alt="banniere">
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4"> Connectez vous à votre compte <b> iKaschool!</b> </h3>
                                <form>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control"
                                            placeholder="Entrez votre adresse Email" required autofocus>
                                        <label for="inputEmail">Entrez votre adresse email</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                            placeholder="Entrez votre mot de passe" required>
                                        <label for="inputPassword">Entrez votre mot de passe</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    <button
                                        class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                        type="submit">Connectez - Vous!</button>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="#">Vous avez oublié votre mot de passe ?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
