<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.0.0/math.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/plugins/nerdamer/nerdamer.core.js"></script>
    <script src="assets/plugins/nerdamer/Calculus.js"></script>
    <script src="assets/plugins/nerdamer/Algebra.js"></script>

</head>
<body>

    <x-navbar></x-navbar>
    <x-header></x-header>

    <main>
        {{ $slot }}
    </main>
    <script src="js/script.js"></script>
</body>
</html>
