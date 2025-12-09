<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
            color: #fff;
            font-family: 'Arial', sans-serif;
            background-image: url('https://via.placeholder.com/1920x1080/000000/ffffff?text=Movie+BG');
            background-size: cover;
            background-attachment: fixed;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.8) !important;
        }
        .navbar-brand {
            font-family: 'Cinzel', serif;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-top: 2rem;
            color: #fff;
        }
        
        .btn {
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

       
        .cinema-btn {
            border-radius: 0; 
            border: 2px solid #ff4500; 
            color: #fff;
            background: transparent;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            padding: 8px 20px;
            box-shadow: 0 0 10px rgba(255, 69, 0, 0.5); 
        }

        .cinema-btn:hover {
            background: #ff4500; 
            color: #1a1a1a;
            transform: scale(1.05);
            border-color: #fff;
            box-shadow: 0 0 20px #ff4500, 0 0 40px #ff4500; 
        }

        
        .cinema-btn.btn-register {
            border-color: #00ffff; 
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .cinema-btn.btn-register:hover {
            background: #00ffff;
            color: #1a1a1a;
            border-color: #fff;
            box-shadow: 0 0 20px #00ffff, 0 0 40px #00ffff;
        }
        
        
        .btn-link.text-light {
            color: #ff4500 !important; 
        }
        .btn-link.text-light:hover {
            text-decoration: underline;
            color: #00ffff !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/movies"><i class="bi bi-film"></i> Movies</a>
    <a href="/" class="btn cinema-btn me-2"><i class="bi bi-house"></i> Back to Dashboard</a>
    
    @if(Session::has('user_id'))
        <form method="POST" action="/logout" class="ms-auto">{{ csrf_field() }}<button type="submit" class="btn btn-link text-light"><i class="bi bi-box-arrow-right"></i> Logout</button></form>
    @else
        <div class="ms-auto">
            <a href="/login" class="btn cinema-btn me-2"><i class="bi bi-person"></i> Login</a>
            <a href="/register" class="btn cinema-btn btn-register"><i class="bi bi-person-plus"></i> Register</a>
        </div>
    @endif
</nav>
<div class="container">@yield('content')</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
