<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Enlace al archivo CSS externo -->

    <!-- Estilos en línea específicos -->
    
</head>
<body>
    <!-- Barra de Menú -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ url('/') }}">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Panel de Control</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carouselImages as $index => $image)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($carouselImages as $index => $image)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Contenido de la página -->
    <div class="container mt-5">
        <section class="section">
            <h2 class="section-title text-center mb-4">Noticias</h2>
            <div class="row">
                <!-- Aquí se generarán dinámicamente las tarjetas de noticias -->
                @foreach ($news as $newsItem)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="card-img-top" alt="Card Image">
                            </div>
                            <div class="card-body">
                                <p class="card-title">{{ $newsItem->title }}</p>
                                <p class="card-text">{{ $newsItem->subtitle }}</p>
                            </div>
                            <div class="footer-card">
                                <p>Escrito por <span class="by-name">{{ $newsItem->author }}</span> el <span class="date">{{ $newsItem->created_at->format('d/m/Y') }}</span></p>
                                <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="section">
            <h2 class="section-title text-center mb-4">Documentos</h2>
            <div class="row">
                <!-- Aquí se generarán dinámicamente las tarjetas de documentos -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PDFs</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($pdfs as $pdf)
                                    <li class="list-group-item"><a href="{{ asset ('storage/' . $pdf->file_path) }}" target="_blank">{{ $pdf->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Documentos de Word</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($words as $word)
                                    <li class="list-group-item"><a href="{{ asset('storage/' . $word->file_path) }}" target="_blank">{{ $word->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Documentos de Excel</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($excels as $excel)
                                    <li class="list-group-item"><a href="{{ asset('storage/' . $excel->file_path) }}" target="_blank">{{ $excel->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-left d-none d-sm-inline">
          <b>Version</b> 3.0.0
        </div>
        <strong>Copyright &copy; 2024 <a href="#">Mi sitio web</a>.</strong> All rights reserved.
        <div class="float-center d-none d-sm-inline">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </footer>
      
      
    
    
    <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
