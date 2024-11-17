<x-layout>
    <div class="container">
        <h1>Kalkulator Limit Kiri Kanan</h1>
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
        <div id="result"></div>
        <canvas id="chart" width="400" height="200"></canvas> <!-- Untuk grafik -->
      </div>
</x-layout>
