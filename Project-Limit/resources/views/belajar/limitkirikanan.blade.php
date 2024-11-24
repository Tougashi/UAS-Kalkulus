<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Limit Kiri dan Kanan</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Limit Kiri dan Kanan</div>
                        </div>
                        <p>
                            Limit kiri dan limit kanan dapat dipahami sebagai pendekatan nilai \(x_0\) dari arah yang berlawanan.
                            Limit kiri diartikan sebagai pendekatan nilai \(x_0\) dari arah bilangan yang lebih kecil, sedangkan limit kanan adalah pendekatan nilai \(x_0\) dari arah bilangan yang lebih besar.
                            Sebuah ekspresi limit dapat dikatakan *‘ada’* bila nilai pendekatan dari limit kiri dan kanannya sama.
                        </p>
                        <p>
                            Limit kiri diekspresikan sebagai berikut:
                            \[
                            \lim_{x \to c^-} f(x) = L
                            \]
                            Sedangkan limit kanan diekspresikan sebagai berikut:
                            \[
                            \lim_{x \to c^+} f(x) = L
                            \]
                            Maka:
                            <div style="overflow-x: auto; max-width: 100%;">
                                <span class="katex-display">
                                \[
                                \lim_{x \to c} f(x) = L \iff \lim_{x \to c^-} f(x) = L \, \text{dan} \, \lim_{x \to c^+} f(x) = L
                                \]
                                </span>
                            </div>
                        </p>
                        <p>
                            <strong>Contoh soal:</strong>
                            Tentukan limit kiri dan kanan dari fungsi:
                            \[
                            \lim_{x \to 1} \frac{|x - 1|}{x - 1}
                            \]
                            dan tentukan apakah fungsi tersebut memiliki nilai limit atau tidak?
                        </p>
                        <p>
                            <strong>Limit Kiri:</strong>
                            \[
                            \lim_{x \to 1^-} \frac{|x - 1|}{x - 1} = \frac{-(x - 1)}{x - 1}
                            \]
                            Sederhanakan:
                            \[
                            \lim_{x \to 1^-} = -1
                            \]
                        </p>
                        <p>
                            <strong>Limit Kanan:</strong>
                            \[
                            \lim_{x \to 1^+} \frac{|x - 1|}{x - 1} = \frac{x - 1}{x - 1}
                            \]
                            Sederhanakan:
                            \[
                            \lim_{x \to 1^+} = 1
                            \]
                        </p>
                        <p>
                            <strong>Simpulan:</strong>
                            Karena nilai limit kiri \((-1)\) tidak sama dengan nilai limit kanan \(1\), maka:
                            \[
                            \lim_{x \to 1} \frac{|x - 1|}{x - 1} \, \text{tidak ada}.
                            \]
                        </p>



                        <div class="divider">
                            <div class="divider-text">Implementasi pada Kode</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="22">
function limitKiriKanan(fungsiStr, x_limit, delta) {
    // Definisikan fungsi menggunakan Function
    const fungsi = new Function("x", `return ${fungsiStr};`);

    // Hitung limit kiri dan kanan
    const nilaiKiri = fungsi(x_limit - delta);
    const nilaiKanan = fungsi(x_limit + delta);

    // Return kedua nilai
    return {
        limitKiri: nilaiKiri,
        limitKanan: nilaiKanan
    };
}

const fungsiStr = "(x**2 - 4) / (x - 2)"; // Contoh fungsi
const x_limit = 2; // Titik limit
const delta = 0.000001; // Nilai delta

const hasil = limitKiriKanan(fungsiStr, x_limit, delta);
console.log(`Limit kiri: ${hasil.limitKiri.toFixed(2)}`);
console.log(`Limit kanan: ${hasil.limitKanan.toFixed(2)}`);
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
                                    <li><strong>Tujuan:</strong> Menghitung nilai limit kiri dan limit kanan dari fungsi matematika.</li>
                                    <li><strong>Langkah-langkah:</strong>
                                        <ol>
                                            <li>Definisikan fungsi matematika dalam bentuk string, misalnya:
                                                \[
                                                f(x) = \frac{x^2 - 4}{x - 2}.
                                                \]
                                            </li>
                                            <li>Gunakan nilai kecil (\(\delta = 0.000001\)) untuk mendekati titik limit dari kiri (\(x - \delta\)) dan kanan (\(x + \delta\)).</li>
                                            <li>Hitung nilai fungsi untuk kedua kasus tersebut.</li>
                                        </ol>
                                    </li>
                                    <li><strong>Hasil:</strong> Menampilkan nilai limit kiri dan kanan secara terpisah di console.</li>
                                    <li><strong>Contoh Hasil:</strong> Untuk fungsi \((x^2 - 4) / (x - 2)\) saat \(x \to 2\), limit kiri adalah <code>3.99</code> dan limit kanan adalah <code>4.01</code>.</li>
                                </ul>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="17">
from sympy import Symbol, limit, S

# Definisikan variabel dan fungsi
x = Symbol('x')
fungsi = (x**2 - 4) / (x - 2)  # Contoh fungsi

# Titik limit
x_limit = S(2)

# Hitung limit kiri dan kanan
limit_kiri = limit(fungsi, x, x_limit, dir='-')  # Limit dari kiri
limit_kanan = limit(fungsi, x, x_limit, dir='+')  # Limit dari kanan

# Tampilkan hasil
print(f"Limit kiri: {limit_kiri}")
print(f"Limit kanan: {limit_kanan}")
                                    </textarea>
                                    <label><img src="{{asset("assets/images/py.png")}}" alt="" class="img-fluid" style="max-width: 12px;">Python</label>
                                </div>
                                <button class="btn btn-dark mb-3" >Jalankan Kode</button>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" disabled></textarea>
                                    <label>Output</label>
                                </div>
                                <h3>Penjelasan:</h3>
                                <ul>
                                    <li><strong>Tujuan:</strong> Menghitung nilai limit kiri dan limit kanan dari suatu fungsi matematika pada titik tertentu.</li>
                                    <li><strong>Langkah-langkah:</strong>
                                        <ol>
                                            <li>Definisikan variabel simbol \(x\) menggunakan <code>Symbol</code>.</li>
                                            <li>Masukkan fungsi matematika, contohnya:
                                                \[
                                                f(x) = \frac{x^2 - 4}{x - 2}.
                                                \]
                                            </li>
                                            <li>Gunakan fungsi <code>limit</code> untuk menghitung:
                                                <ul>
                                                    <li><strong>Limit kiri:</strong> Dengan parameter <code>dir='-'</code>.</li>
                                                    <li><strong>Limit kanan:</strong> Dengan parameter <code>dir='+'</code>.</li>
                                                </ul>
                                            </li>
                                            <li>Tampilkan hasil limit kiri dan kanan ke layar.</li>
                                        </ol>
                                    </li>
                                    <li><strong>Hasil:</strong> Limit kiri dan kanan memiliki nilai yang sama yaitu <code>4</code>.</li>
                                </ul>
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
