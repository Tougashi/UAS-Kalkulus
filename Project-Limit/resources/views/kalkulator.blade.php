<x-layout>
    <div class="container" style=" padding-top: 80px;">
        <h1 class="my-5 text-center">Kalkulator Limit</h1>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-4">
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body d-flex flex-column">
                            <div>
                                <h2>Limit Kiri Kanan</h2>
                                <form id="limitForm">
                                    <div id="functionsContainer">
                                        <div class="functionInput">
                                            <label for="function">Masukkan Fungsi Kiri misal: x^2 + 3*x - 2:</label>
                                            <input type="text" class="function form-control mb-2" placeholder="f(x)">
                                            <label for="function">Masukkan Fungsi Kanan misal: x^2 + 3*x - 2:</label>
                                            <input type="text" class="function form-control mb-2" placeholder="f(x)">
                                        </div>
                                    </div>
                                    <label for="variable">Variabel:</label>
                                    <input type="text" id="variable" class="form-control mb-2" value="x" placeholder="x">
                                    <label for="value">Nilai Limit:</label>
                                    <input type="number" id="value" class="form-control mb-2" placeholder="nilai limit">
                                    <label for="direction">Arah Limit:</label>
                                    <select id="direction" class="form-control form-select mb-2">
                                        <option value="both">Dari Kiri dan Kanan</option>
                                        <option value="left">Dari Kiri</option>
                                        <option value="right">Dari Kanan</option>
                                    </select>
                                </form>
                            </div>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-dark w-100" onclick="calculateLimit()">Hitung Limit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body d-flex flex-column">
                            <div>
                                <h2>Limit Tak Hingga</h2>
                                <form id="infinityLimitForm">
                                    <div id="functionsContainerInfinity">
                                        <div class="functionInput">
                                            <label for="functionInfinity">Masukkan Fungsi misal: x^2 + 3*x - 2:</label>
                                            <input type="text" class="functionInfinity form-control mb-2" placeholder="f(x)">
                                        </div>
                                    </div>
                                    <label for="variableInfinity">Variabel:</label>
                                    <input type="text" id="variableInfinity" class="form-control mb-2" value="x" placeholder="x">
                                    <label for="directionInfinity">Arah Limit:</label>
                                    <select id="directionInfinity" class="form-control form-select mb-2">
                                        <option value="infinity">Tak Hingga Positif</option>
                                        <option value="negative_infinity">Tak Hingga Negatif</option>
                                    </select>
                                </form>
                            </div>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-dark w-100" onclick="calculateInfinityLimit()">Hitung Limit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body d-flex flex-column">
                            <div>
                                <h2>Limit Trigonometri</h2>
                                <form id="trigonometricLimitForm">
                                    <div class="functionInput">
                                        <label for="functionTrigonometric">Masukkan Fungsi Trigonometri misal: (sin(4x) + sin(2x)) / (3x cos(x)):</label>
                                        <input type="text" id="functionTrigonometric" class="form-control mb-2" placeholder="f(x)">
                                    </div>
                                    <label for="variableTrigonometric">Variabel:</label>
                                    <input type="text" id="variableTrigonometric" class="form-control mb-2" value="x" placeholder="x">
                                    <label for="valueTrigonometric">Nilai:</label>
                                    <input type="text" id="valueTrigonometric" class="form-control mb-2" placeholder="0">
                                </form>
                            </div>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-dark w-100" onclick="calculateTrigonometricLimit()">Hitung Limit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="mt-2 text-center">Hasil</h1>
        <div class="card mb-4">
            <div id="result" class="text-center"></div>
            <canvas id="chart" width="400" height="200"></canvas> <!-- Untuk grafik -->
        </div>
    </div>
</x-layout>
