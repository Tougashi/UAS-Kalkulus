<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Limit Fungsi Trigonometri</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Limit Fungsi Trigonometri</div>
                        </div>
                        <p><strong>Teorema Limit Fungsi Trigonometri Umum:</strong></p>
                        <ul>
                            <li>\(\lim_{x \to 0} \frac{\sin(ax)}{bx} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{ax}{\sin(bx)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{\tan(ax)}{bx} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{ax}{\tan(bx)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{\tan(ax)}{\tan(bx)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{\sin(ax)}{\sin(bx)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{\tan(ax)}{\sin(ax)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to 0} \frac{\sin(ax)}{\tan(bx)} = \frac{a}{b}\)</li>
                        </ul>

                        <p><strong>Teorema Limit Fungsi Trigonometri Khusus:</strong></p>
                        <ul>
                            <li>\(\lim_{x \to 0} \frac{\sin(x)}{x} = 1\)</li>
                            <li>\(\lim_{x \to 0} \frac{x}{\sin(x)} = 1\)</li>
                            <li>\(\lim_{x \to 0} \frac{\tan(x)}{x} = 1\)</li>
                            <li>\(\lim_{x \to 0} \frac{x}{\tan(bx)} = \frac{a}{b}\)</li>
                            <li>\(\lim_{x \to \pm\infty} \left(1 + \frac{1}{x}\right)^x = e\)</li>
                            <li>\(\lim_{x \to 0} (a + x)^{1/x} = e\)</li>
                            <li>\(\lim_{x \to 0} \frac{\ln(1+x)}{x} = 1\)</li>
                            <li>\(\lim_{x \to 0} \frac{e^x - 1}{x} = 1\)</li>
                        </ul>

                        <p><strong>Contoh Soal:</strong></p>
                        <p>
                            Hitung \(\lim_{x \to 0} \frac{\sin^2(3x)}{2x \tan(3x)}\).
                        </p>
                        <p>
                            Penyelesaian:
                            \[
                            \lim_{x \to 0} \frac{\sin^2(3x)}{2x \tan(3x)} =
                            \lim_{x \to 0} \frac{\sin(3x) \cdot \sin(3x)}{2x \tan(3x)}
                            \]
                            Dengan menggunakan teorema limit trigonometri:
                            \[
                            \frac{\sin(3x)}{3x} \to 1 \, \text{dan} \, \frac{\tan(3x)}{3x} \to 1
                            \]
                            Maka:
                            \[
                            \frac{3}{2} \cdot \frac{3}{3} = \frac{3}{2}
                            \]
                        </p>
                        <p>
                            Jawaban: \(\frac{3}{2}\).
                        </p>




                        <div class="divider">
                            <div class="divider-text">Implementasi pada Kode</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    <label><img src="{{asset("assets/images/js.png")}}" alt="" class="img-fluid" style="max-width: 12px;">Javascript</label>
                                </div>
                                <button class="btn btn-dark mb-3" >Jalankan Kode</button>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                                    <label>Output</label>
                                </div>
                                <p>
                                    <ul>
                                        <li>
                                            <strong>Fungsi <code>hitungLimit</code>:</strong>
                                            Fungsi ini dirancang untuk menghitung limit suatu fungsi \( f(x) \) pada titik tertentu \( x \) dengan pendekatan numerik.
                                            <ul>
                                                <li>
                                                    <code>hitungNilaiFungsi(x):</code>
                                                    Fungsi ini mengambil parameter \( x \) dan menggunakan <code>eval</code> untuk mengevaluasi ekspresi matematika dari fungsi yang diberikan.
                                                    Fungsi ini memungkinkan untuk menghitung nilai \( f(x) \) secara dinamis.
                                                </li>
                                                <li>
                                                    <code>const nilaiKiri:</code>
                                                    Menghitung nilai fungsi \( f(x) \) di titik sedikit lebih kecil dari \( x \) (sebelah kiri limit) menggunakan
                                                    <code>hitungNilaiFungsi(x_limit - delta)</code>.
                                                    Ini mensimulasikan pendekatan nilai dari kiri.
                                                </li>
                                                <li>
                                                    <code>const nilaiKanan:</code>
                                                    Menghitung nilai fungsi \( f(x) \) di titik sedikit lebih besar dari \( x \) (sebelah kanan limit)
                                                    menggunakan <code>hitungNilaiFungsi(x_limit + delta)</code>. Ini mensimulasikan pendekatan nilai dari kanan.
                                                </li>
                                                <li>
                                                    <code>const hasil:</code>
                                                    Merupakan rata-rata dari nilai kiri dan kanan, dihitung menggunakan formula:
                                                    \[
                                                    \text{hasil} = \frac{\text{nilaiKiri} + \text{nilaiKanan}}{2}
                                                    \]
                                                    Ini memberikan perkiraan nilai limit secara numerik.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Parameter Fungsi:</strong>
                                            <ul>
                                                <li>
                                                    <code>fungsi:</code> Merupakan ekspresi fungsi matematika yang ingin dihitung limitnya, dalam bentuk string.
                                                    Misalnya: <code>"(x*2 + 3)*(x-7)"</code>.
                                                </li>
                                                <li>
                                                    <code>x_limit:</code> Merupakan titik di mana limit dihitung (contoh: \( x = 2 \)).
                                                </li>
                                                <li>
                                                    <code>delta:</code> Merupakan nilai kecil yang digunakan untuk mendekati nilai limit dari kiri dan kanan
                                                    (contoh: \( \delta = 0.000001 \)).
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <strong>Hasil:</strong>
                                            Nilai limit ditampilkan ke konsol menggunakan perintah:
                                            <code>console.log</code>. Nilainya diformat dengan dua angka desimal menggunakan
                                            <code>hasilLimit.toFixed(2)</code>.
                                        </li>
                                    </ul>
                                </p>
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
