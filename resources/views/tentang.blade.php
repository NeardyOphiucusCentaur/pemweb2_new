<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Bootstrap</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #28a745; /* Warna hijau Bootstrap */
            --gradient-start: #28a745; /* Hijau */
            --dark-color: #2a2a2a;
            --light-color: #f8f9fa;
            --accent-color: #ff6584;
            
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .navbar {
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white !important;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            color: var(--dark-color) !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
        }
        
        .hero-section {
            padding: 100px 0 60px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
            color: var(--dark-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: var(--primary-color);
            bottom: -10px;
            left: 0;
        }
        
        .project-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .project-img-placeholder {
            width: 70%;
            height: 300px;
            background: linear-gradient(45deg, #28a745, #fdfdfd);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.2);
        }
        
        .project-img-placeholder:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0.3) 0%,
                rgba(255, 255, 255, 0) 60%
            );
            transform: rotate(30deg);
        }
        
        .project-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 30px 0;
            margin-top: 80px;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.2rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/kasir.png" alt="Logo" style="width: 60px; height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/landing') }}"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Projects Section -->
    <section class="py-5 hero-section">
        <div class="container">
            <h2 class="text-center mb-5 section-title animate__animated animate__fadeIn">Anomali Yang Nge-Developer Nya</h2>            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInLeft">
                    <div class="project-card">
                        <h3 class="project-title">faiz (Captain)</h3>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam 
                            placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo 
                            commodi quo itaque! Ipsam!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInRight">
                    <div class="project-img-placeholder">
                        <img src="img/paiz.jpg" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>

                        <div class="row align-items-center">
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInLeft">
                    <div class="project-card">
                        <h3 class="project-title">abza (Vice-Captain)</h3>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam 
                            placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo 
                            commodi quo itaque! Ipsam!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInRight">
                    <div class="project-img-placeholder">
                        <img src="img/abja.jpg" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInLeft">
                    <div class="project-card">
                        <h3 class="project-title">fikas</h3>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam 
                            placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo 
                            commodi quo itaque! Ipsam!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInRight">
                    <div class="project-img-placeholder">
                        <img src="img/pikas.jpg" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInLeft">
                    <div class="project-card">
                        <h3 class="project-title">syafiq</h3>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam 
                            placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo 
                            commodi quo itaque! Ipsam!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInRight">
                    <div class="project-img-placeholder">
                        <img src="img/sapik.jpg" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInLeft">
                    <div class="project-card">
                        <h3 class="project-title">gryphon</h3>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam 
                            placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo 
                            commodi quo itaque! Ipsam!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 animate__animated animate__fadeInRight">
                    <div class="project-img-placeholder">
                        <img src="img/pong.jpg" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

    

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="social-icons mb-3">
                <a href="#">Faiz</i></a>
                <a href="#">Abza</a>
                <a href="#">Syafiq</i></a>
                <a href="#">Fikas</a>
                <a href="#">Gryphon</a>
            </div>
            <p class="mb-0">© 2023 Start Bootstrap. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add animation on scroll
        window.addEventListener('scroll', function() {
            const elements = document.querySelectorAll('.animate__animated');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if(elementPosition < screenPosition) {
                    element.style.opacity = '1';
                }
            });
        });
    </script>
</body>
</html>