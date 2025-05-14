@extends ('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-md-center">

        <div class="col-md-5">

            <div class="card mx-auto d-block mt-5">
                <h2 class="text-center pt-4"> <b>BIENVENUE !</b></h2>

                <p class="text-center">
                    <img class="card-img-top img-fluid mx-auto d-block mt-5" style="width:372.5px;"
                    src="/assets/img/logo-hetec.jpg" alt="Card image">
                </p>

                <p class="text-center">
                        <img class="card-img-top img-fluid mx-auto d-block" style="width:272.5px;"
                        src="/assets/img/logo-schoolrail.png" alt="Card image">
                </p>


                <div class="card-body">
                    <h4 class="card-title text-center"> <b>ACCEDER A VOTRE COMPTE</b> </h4>

                    <div class="row justify-content-md-center">

                        <div class="col-md-6 mt-2">
                            <p class="card-text text-center">
                                <a href="/student" class="btn btn-primary"><b>COMPTE ETUDIANT</b></a>
                            </p>
                        </div>

                        <div class="col-md-6 mt-2">
                            <p class="card-text text-center">
                                <a href="/teamator/login?opt=teacher" class="btn btn-success"><b>COMPTE PROFESSEUR</b></a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

@endsection
