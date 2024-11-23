<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limit with Code</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
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
    <script src="{{ asset('assets/plugins/katex/dist/katex.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/katex/dist/katex.min.css') }}">

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
        <x-sidebar></x-sidebar>
        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const sidebarOverlay = document.createElement("div");
        sidebarOverlay.id = "sidebar-overlay";
        document.body.appendChild(sidebarOverlay);

        const closeSidebar = document.querySelector(".close-sidebar");
        const burgerMenu2 = document.querySelector(".burger-menu2");

        // Toggle sidebar visibility
        function toggleSidebar() {
            sidebar.classList.toggle("active");
            sidebarOverlay.style.display = sidebar.classList.contains("active") ? "block" : "none";
        }

        sidebarOverlay.addEventListener("click", toggleSidebar);
        closeSidebar.addEventListener("click", toggleSidebar);
        burgerMenu2.addEventListener("click", toggleSidebar);
        });

        document.addEventListener('DOMContentLoaded', () => {
            const getCurrentPath = () => {
                return window.location.pathname;
            };
            const setActiveMenu = () => {
                const currentPath = getCurrentPath();
                const menuItems = document.querySelectorAll('.sidebar-item');
                menuItems.forEach(item => {
                    item.classList.remove('active');
                    const link = item.querySelector('.sidebar-link');
                    if (link) {
                        link.classList.remove('active');
                    }
                });
                menuItems.forEach(item => {
                    const link = item.querySelector('.sidebar-link');
                    if (link && link.getAttribute('href')) {
                        const menuPath = link.getAttribute('href');
                        if (menuPath && (currentPath === menuPath || currentPath.startsWith(menuPath + '/'))) {
                            item.classList.add('active');
                            link.classList.add('active');
                        }
                    }
                });
            };

            setActiveMenu();

            window.addEventListener('popstate', setActiveMenu);
        });

    </script>


</body>
</html>
