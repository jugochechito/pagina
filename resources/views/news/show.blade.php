<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="news-header text-center">
            <h1>{{ $news->title }}</h1>
            <h2>{{ $news->subtitle }}</h2>
        </div>
        <div class="news-image text-center mt-4">
            <img src="{{ asset('storage/' . $news->image_path) }}" class="img-fluid" alt="...">
        </div>
        <div class="news-content mt-4">
            <p>{{ $news->content }}</p>
        </div>
    </div>

    <!-- Footer -->
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
