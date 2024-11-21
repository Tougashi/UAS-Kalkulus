<x-layout>
    <div class="container">
        <h1>Kalkulator Limit</h1>

        <!-- Form untuk Limit Kiri Kanan -->
        <h2>Limit Kiri Kanan</h2>
        <form id="limitForm">
            <div id="functionsContainer">
                <div class="functionInput">
                    <label for="function">Masukkan Fungsi Kiri (misal: x^2 + 3*x - 2):</label>
                    <input type="text" class="function" placeholder="f(x)">
                    <label for="function">Masukkan Fungsi Kanan (misal: x^2 + 3*x - 2):</label>
                    <input type="text" class="function" placeholder="f(x)">
                </div>
            </div>

            <label for="variable">Variabel:</label>
            <input type="text" id="variable" value="x" placeholder="x">

            <label for="value">Nilai Limit:</label>
            <input type="number" id="value" placeholder="nilai limit">

            <label for="direction">Arah Limit:</label>
            <select id="direction">
                <option value="both">Dari Kiri dan Kanan</option>
                <option value="left">Dari Kiri</option>
                <option value="right">Dari Kanan</option>
            </select>

            <button type="button" onclick="calculateLimit()">Hitung Limit</button>
        </form>

        <!-- Form untuk Limit Tak Hingga -->
        <h2>Limit Tak Hingga</h2>
        <form id="infinityLimitForm">
            <div id="functionsContainerInfinity">
                <div class="functionInput">
                    <label for="functionInfinity">Masukkan Fungsi (misal: x^2 + 3*x - 2):</label>
                    <input type="text" class="functionInfinity" placeholder="f(x)">
                </div>
            </div>

            <label for="variableInfinity">Variabel:</label>
            <input type="text" id="variableInfinity" value="x" placeholder="x">

            <label for="directionInfinity">Arah Limit:</label>
            <select id="directionInfinity">
                <option value="infinity">Tak Hingga Positif</option>
                <option value="negative_infinity">Tak Hingga Negatif</option>
            </select>

            <button type="button" onclick="calculateInfinityLimit()">Hitung Limit</button>
        </form>

            <!-- Form untuk Limit Trigonometri -->
        <h2>Limit Trigonometri</h2>
        <form id="trigonometricLimitForm">
            <div class="functionInput">
                <label for="functionTrigonometric">Masukkan Fungsi Trigonometri (misal: sin(x)/x):</label>
                <input type="text" id="functionTrigonometric" placeholder="f(x)">
            </div>

            <label for="variableTrigonometric">Variabel:</label>
            <input type="text" id="variableTrigonometric" value="x" placeholder="x">

            <label for="valueTrigonometric">Nilai:</label>
            <input type="text" id="valueTrigonometric" placeholder="0">

            <button type="button" onclick="calculateTrigonometricLimit()">Hitung Limit</button>
        </form>
        
        <div id="result"></div>
        <canvas id="chart" width="400" height="200"></canvas> <!-- Untuk grafik -->
    </div>
</x-layout>
