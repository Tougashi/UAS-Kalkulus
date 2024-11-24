<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Limit with Code</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.0.0/math.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/plugins/nerdamer/nerdamer.core.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Calculus.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Algebra.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Solve.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Extra.js') }}"></script>
    <script src="{{ asset('assets/plugins/katex/dist/katex.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/katex/dist/katex.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FD98QCZN22"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FD98QCZN22');
    </script>
</head>
<body>

    <div id="app">
        <div id="particles-js"></div>
        <x-navbar></x-navbar>

        <main>
            {{ $slot }}
        </main>

        <footer class="mt-4">
            <div class="footer clearfix mb-0 text-muted">
                <div class="footer-content">
                    <p>2024 &copy; <a href="/" class="text-dark">Limit with Code</a>
                    </p>
                </div>
            </div>
        </footer>

    </div>
    <script src="assets/js/script.js"></script>
    <script src="{{ asset('assets/js/particles.js') }}"></script>
    <script src="{{ asset('assets/js/particle.js') }}"></script>
    @stack('scripts')
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        document.addEventListener('DOMContentLoaded', () => {
            const navbarToggler = document.querySelector('.navbar-toggler');
            navbarToggler.addEventListener('click', () => {
                console.log('Navbar toggler clicked');
            });
        });
    </script>
</body>
</html>
