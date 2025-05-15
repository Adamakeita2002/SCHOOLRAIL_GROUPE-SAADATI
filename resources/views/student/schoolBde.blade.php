@extends ('layouts.master')


@section('content')

    <?php $school = 'activve'; ?>
    <div class="app">
        <div class="app-body">
            <!--SIDEBAR -->
            @include('layouts.sidebarS')
            <!--END SIDEBAR -->

            <div class="app-content">

                <!--NAVBAR -->
                @include('layouts.navbar')
                <!--END NAVBAR -->

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item " aria-current="page"><a href="/student">Accueil</a></li>
                        <li class="breadcrumb-item " aria-current="page">Actualités</li>
                        <li class="breadcrumb-item active " aria-current="page">APE/Conseils</li>
                    </ol>
                </nav>

                <div class="container-fluid"> <!-- container-fluid-->

                    <!-- FOR ONLY BDE PRESIDENT -->
                    @if ($student->president == 1)
                        <div class="row">

                            <div class="col-md-3">
                                <img class=" img-thumbnail card-img-top mx-auto d-block" src="/img/large/xnews.jpg"
                                    alt="Card image" style="width:250px; padding-top: 20px">
                            </div>

                            <div class="col-md-5">

                                @include ('layouts.errors')

                                <form action="/student/CreateBDE" method="post" enctype="multipart/form-data"
                                    id="theform">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                                    <div class="form-group">
                                        <label><b>Entrer le titre de l'actualité</b></label>
                                        <input type="text" name="title" class="form-control" required>
                                        <small class="text-danger">100 mots maximum</small>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Description</b></label>
                                        <textarea rows="4" name="description" class="form-control" required></textarea>
                                        <small class="text-secondary">1000 mots maximum.</small>
                                    </div>

                                    <div class="form-group">

                                        <label class="btn btn-bordo" for="my-file-selector">
                                            <input id="my-file-selector" type="file" style="display:none;"
                                                name="upload_file"
                                                onchange="$('#upload-file-info').html(this.files[0].name)" accept="image/*">
                                            Selectionner une image
                                            <i class="fa fa-camera" style="font-size: 15px"></i>
                                        </label><br>
                                        <span class='badge badge-warning' id="upload-file-info">Aucune image
                                            selectionnée</span>
                                        <small class="text-secondary">Taille recommandée (700/500).</small>


                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            Créer l'actualité
                                        </button>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    $(function() {
                                        $('#theform').submit(function() {
                                            $("button[type='submit']", this)
                                                // .val('Please Wait...')
                                                .attr('disabled', 'disabled')
                                                .html('Veuillez patienter...');
                                            return true;
                                        });
                                    });
                                </script>
                            </div>

                            <div class="col-md-4">

                                <div class="callout callout-warning">
                                    <h5>Champ obligatoire <i class="icon-pin"></i></h5>
                                    <p>Vous devez imperativement remplir le champs "TITRE"</p>
                                    <p>Vous devez imperativement remplir le champs "DESCRIPTION"</p>
                                    <p>L'ajout d'une image n'est pas obligatoire</p>
                                </div>

                            </div>


                        </div>

                        @if (session('status1'))
                            <div align="center">
                                <div class="alert alert-success text-center">
                                    <b><i class="icon-info"></i> {{ session('status1') }}<br></b>
                                </div>
                            </div>
                        @endif

                        <hr>
                    @endif
                    <!-- FOR ONLY BDE PRESIDENT -->


                    <div class="row justify-content-md-center">

                        <!-- Blog Entries Column offset-md-1 -->
                        <div class="col-md-7 ">

                            <h1 class="my-4 card-header text-center bg-primary text-white">APE/Conseils</h1>

                            <!-- Blog Post -->

                            @foreach ($BDEnews as $new)
                                <div class="card mb-4" id="B{{ $new->id }}">

                                    <div class="card-body">
                                        <h2 class="card-title">{{ $new->title }}</h2>
                                        <p class="card-text">{{ $new->description }}</p>
                                    </div>
                                    @if (!empty($new->upload))
                                        <img class="card-img-top" src="/files/schoolNews/{{ $new->upload }}"
                                            alt="IMAGE">
                                    @endif
                                    <div class="card-footer text-muted">
                                        <p>- Posté il y a <b>{{ $new->created_at->diffForHumans() }}</b></p>
                                    </div>
                                </div>
                            @endforeach


                            <!-- Pagination
            <ul class="pagination justify-content-center mb-4">
              <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
              </li>
            </ul> -->

                        </div>

                        <!-- Sidebar Widgets Column -->
                        <div class="col-md-4">

                            <!-- Categories Widget -->
                            <div class="card my-4">
                                <h5 class="card-header">Mot de la directrice</h5>
                                <img class="rounded-circle mt-4 mx-auto d-block" alt="directeur" width="200"
                                    height="200" src="/assets/img/logo-sabile-12x12-1.webp" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Bonjour</h4>
                                    <p class="card-text">Vu les conditions sanitaires déplorables <b>(Covid-19) </b>, nous
                                        avons conçu cette plateforme dans l'objectif d'accomplir notre mission, qui est de
                                        vous assurer une éducation garantie.</p>
                                    <p class="card-text">Nous espérons que cela a été plus que utile.</p>
                                    <p class="card-text"><i>Cordialement!</i></p>
                                </div>

                            </div>

                            <!-- Contact Important -->
                            <!--
            <div class="card my-4">
              <h5 class="card-header">Contacts Importants</h5>
              <div class="card-body">
                <h2 class="text-center"><b>HETEC - Email: </b><br><span style="font-size: 20px">info@hetec-mali.com</span> </h2>
                <div class="row">
                  <div class="col-sm-6">
                    <h6><b>Chargé de l'information: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

                    <h6><b>Sécretaire générale</b> <br><span style="font-size: 14px">77557950</span> </h6>
                  </div>
                  <div class="col-sm-6">
                  <h6><b>Chargé de la formation: </b><br><span style="font-size: 14px">makeita777@gmail.com</span> </h6>

                  <h6><b>Chargé de l'organisation</b> <br><span style="font-size: 14px">77557950</span> </h6>
                  </div>
                </div>
              </div>
            </div>
          -->


                        </div>

                    </div>
                    <!-- /.row -->

                </div> <!-- END container-fluid -->


            </div>
        </div>
    </div>

    <!-- CARD CAROUSEL JS
    <script type="text/javascript">
        (function($) {
            "use strict";
            // Auto-scroll
            $('#myCarousel').carousel({
                interval: 200
            });

            // Control buttons
            $('.next').click(function() {
                $('.carousel').carousel('next');
                return false;
            });
            $('.prev').click(function() {
                $('.carousel').carousel('prev');
                return false;
            });

            // On carousel scroll
            $("#myCarousel").on("slide.bs.carousel", function(e) {
                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 3;
                var totalItems = $(".carousel-item").length;
                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide -
                        (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        // append slides to end
                        if (e.direction == "left") {
                            $(
                                ".carousel-item").eq(i).appendTo(".carousel-inner");
                        } else {
                            $(".carousel-item").eq(0).appendTo(".carousel-inner");
                        }
                    }
                }
            });
        })
        (jQuery);
    </script>  -->

@endsection
