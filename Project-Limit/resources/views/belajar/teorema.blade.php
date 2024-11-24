<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Teorema - Teorema Limit</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Teorema Limit Utama</div>
                        </div>
                        <p class="text-center">
                            <ul>
                                <li>\(\lim_{x \to c} k = k\)</li>
                                <li>\(\lim_{x \to c} x = c\)</li>
                                <li>\(\lim_{x \to c} kf(x) = k \cdot \lim_{x \to c} f(x)\)</li>
                                <li>\(\lim_{x \to c} [f(x) \pm g(x)] = \lim_{x \to c} f(x) \pm \lim_{x \to c} g(x)\)</li>
                                <li>\(\lim_{x \to c} [f(x) \cdot g(x)] = \lim_{x \to c} f(x) \cdot \lim_{x \to c} g(x)\)</li>
                                <li>\(\lim_{x \to c} \frac{f(x)}{g(x)} = \frac{\lim_{x \to c} f(x)}{\lim_{x \to c} g(x)} \quad \text{dengan syarat} \quad \lim_{x \to c} g(x) \neq 0\)</li>
                                <li>\(\lim_{x \to c} [f(x)]^n = \left(\lim_{x \to c} f(x)\right)^n\)</li>
                                <li>\(\lim_{x \to c} \sqrt[n]{f(x)} = \sqrt[n]{\lim_{x \to c} f(x)} \quad \text{dengan syarat} \quad \lim_{x \to c} f(x) > 0\)</li>
                            </ul>
                        </p>
                        <div class="divider">
                            <div class="divider-text">Teorema Substitusi</div>
                        </div>
                        <p>
                            <ul>
                                <li>\(\lim_{x \to c} f(x) = f(c)\)</li>
                            </ul>
                        </p>
                        <div class="divider">
                            <div class="divider-text">Implementasi pada Kode</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="20">
function hitungLimit(fungsiStr, x_limit, delta) {
// Definisikan fungsi matematika menggunakan Function
const fungsi = new Function("x", `return ${fungsiStr};`);

// Hitung nilai fungsi di kiri dan kanan titik limit
const nilaiKiri = fungsi(x_limit - delta);
const nilaiKanan = fungsi(x_limit + delta);

// Hitung rata-rata nilai kiri dan kanan sebagai perkiraan limit
return (nilaiKiri + nilaiKanan) / 2;
}

const fungsiStr = "(x*2 + 3)*(x-7)"; // Fungsi yang ingin dicari limitnya
const x_limit = 2; // Titik limit
const delta = 0.000001; // Nilai delta

const hasilLimit = hitungLimit(fungsiStr, x_limit, delta);
console.log(`Limit dari ${fungsiStr} saat x mendekati ${x_limit} adalah: ${hasilLimit.toFixed(2)}`);
                                      </textarea>
                                    <label><img src="{{asset("assets/images/js.png")}}" alt="" class="img-fluid" style="max-width: 12px;">Javascript</label>
                                </div>
                                <button class="btn btn-dark mb-3" >Jalankan Kode</button>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                                    <label>Output</label>
                                </div>
                                <h3>Penjelasan:</h3>
                                <ul>
                                    <li>Fungsi <code>hitungLimit</code> digunakan untuk menghitung limit suatu fungsi matematika pada titik tertentu dengan pendekatan nilai kiri dan kanan.</li>
                                    <li>Fungsi didefinisikan secara dinamis menggunakan <code>Function</code>, sehingga bisa mengevaluasi ekspresi matematika dari string.</li>
                                    <li>Proses perhitungan:
                                        <ol>
                                            <li>Hitung nilai kiri: \( x_{\text{kiri}} = x_{\text{limit}} - \text{delta} \).</li>
                                            <li>Hitung nilai kanan: \( x_{\text{kanan}} = x_{\text{limit}} + \text{delta} \).</li>
                                            <li>Ambil rata-rata nilai kiri dan kanan sebagai estimasi limit.</li>
                                        </ol>
                                    </li>
                                </ul>

                                <p><strong>Parameter:</strong></p>
                                <ul>
                                    <li><code>fungsiStr</code>: String fungsi matematika, contoh: \((x*2 + 3)*(x-7)\).</li>
                                    <li><code>x_limit</code>: Titik limit yang ingin dihitung, contoh: \( x = 2 \).</li>
                                    <li><code>delta</code>: Nilai sangat kecil (\( 0.000001 \)) untuk mendekati titik limit dari sisi kiri dan kanan.</li>
                                </ul>

                                <p><strong>Hasil:</strong></p>
                                <ul>
                                    <li>Hasil limit dicetak dalam format:
                                        \[
                                        \text{Limit dari } (x*2 + 3)(x-7) \text{ saat } x \text{ mendekati } 2 \text{ adalah: }  hasil.
                                        \]
                                    </li>
                                </ul>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="5"></textarea>
                                    <label><img src="{{asset("assets/images/py.png")}}" alt="" class="img-fluid" style="max-width: 12px;">Python</label>
                                </div>
                                <button class="btn btn-dark mb-3" >Jalankan Kode</button>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled></textarea>
                                    <label>Output</label>
                                </div>
                                <p>
                                    <h4>Penjelasan:</h4>
                                    <ul>
                                        <li>
                                            <strong>Import Library:</strong>
                                            <ul>
                                                <li>\(\text{import sympy:}\) Mengimpor library `sympy`, yang digunakan untuk perhitungan simbolik.</li>
                                                <li>\(\text{from sympy import Symbol, limit:}\) Mengimpor fungsi `Symbol` untuk mendefinisikan variabel simbolik, dan `limit` untuk menghitung limit fungsi.</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Mendefinisikan Variabel Simbolik:</strong>
                                            <ul>
                                                <li>\(x = \text{Symbol('x')}\): Membuat variabel simbolik \(x\), yang memungkinkan operasi matematika dilakukan secara simbolik.</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Mendefinisikan Fungsi:</strong>
                                            <ul>
                                                <li>\(f(x) = (2x + 3)(x - 7)\): Fungsi didefinisikan sebagai hasil perkalian dari dua ekspresi polinomial.</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Menghitung Limit:</strong>
                                            <ul>
                                                <li>\(\text{limit(f, x, 2)}:\) Menghitung nilai limit \(f(x)\) saat \(x \to 2\).</li>
                                                <li>\(f(2) = (2(2) + 3)(2 - 7) = (4 + 3)(-5) = 7 \times -5 = -35\)</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Menampilkan Hasil:</strong>
                                            <ul>
                                                <li>\(\text{print("Nilai limit:", limit_value)}:\) Menampilkan hasil limit, yaitu \(-35\).</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

    @endpush

</x-layout2>
