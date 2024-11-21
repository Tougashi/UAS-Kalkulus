<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limit with Code</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/compiled/css/app.css " />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.0.0/math.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/plugins/nerdamer/nerdamer.core.js"></script>
    <script src="assets/plugins/nerdamer/Calculus.js"></script>
    <script src="assets/plugins/nerdamer/Algebra.js"></script>
    <script src="assets/plugins/nerdamer/Solve.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FD98QCZN22"></script>
    {{-- <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script> --}}

    <script src="assets/compiled/js/app.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FD98QCZN22');
    </script>
</head>
<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="particles-js"></div>
        <x-navbar></x-navbar>
        <x-header></x-header>

        <main>
            {{ $slot }}
        </main>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="footer-content">
                    <p>2024 &copy; <a href="/" class="text-dark">Limit with Code</a> |
                        Designed <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span> by <a href="https://github.com/Tougashi" class="text-dark">Tougashi</a>
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
    </script>
</body>
</html>
