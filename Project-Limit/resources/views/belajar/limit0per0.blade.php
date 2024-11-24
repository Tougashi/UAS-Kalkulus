<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Limit Fungsi Membentuk \( \frac{0}{0} \)</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Limit Fungsi Membentuk \( \frac{0}{0} \)</div>
                        </div>
                        <p>
                            Lazim dalam beberapa bentuk soal limit fungsi, kita menemukan keadaan di mana setelah kita mencari nilai dari sebuah fungsi dengan mensubstitusi nilai pendekatan \(x\), maka terbentuk nilai \( \frac{0}{0} \), dan hasil tersebut tidak valid.
                            Maka untuk menyelesaikannya diperlukan beberapa metode, seperti:
                            <ul>
                                <li>
                                    <strong>Faktorisasi</strong>
                                    <br>
                                    Contoh:
                                    \[
                                    \lim_{x \to 2} \frac{x^2 - 4}{x - 2}
                                    \]
                                    Jika dilakukan substitusi secara langsung, maka akan membentuk hasil \( \frac{0}{0} \).
                                    Maka dilakukan faktorisasi untuk mengubah bentuk fungsinya menggunakan pemfaktoran:
                                    <div style="overflow-x: auto; max-width: 100%;">
                                        <span class="katex-display">
                                            \[
                                            \lim_{x \to 2} \frac{x^2 - 4}{x - 2} =
                                            \lim_{x \to 2} \frac{(x - 2)(x + 2)}{x - 2} =
                                            \lim_{x \to 2} (x + 2)
                                            \]
                                        </span>
                                    </div>
                                    Dengan substitusi:
                                    \[
                                    2 + 2 = 4
                                    \]
                                </li>
                                <li>
                                    <strong>Perkalian Sekawan</strong>
                                    <br>
                                    Contoh:
                                    \[
                                    \lim_{x \to 4} \frac{\sqrt{x} - 2}{x - 4}
                                    \]
                                    Jika dilakukan substitusi secara langsung, maka akan membentuk hasil \( \frac{0}{0} \).
                                    Maka dilakukan perkalian akar sekawan untuk mengubah bentuk fungsinya:
                                    <div style="overflow-x: auto; max-width: 100%;">
                                        <span class="katex-display">
                                        \[
                                        \lim_{x \to 4} \frac{\sqrt{x} - 2}{x - 4} =
                                        \lim_{x \to 4} \frac{(\sqrt{x} - 2)(\sqrt{x} + 2)}{(x - 4)(\sqrt{x} + 2)}
                                        \]
                                        </span>
                                    </div>
                                    Sederhanakan:
                                    <div style="overflow-x: auto; max-width: 100%;">
                                        <span class="katex-display">
                                        \[
                                        \lim_{x \to 4} \frac{x - 4}{(x - 4)(\sqrt{x} + 2)} =
                                        \lim_{x \to 4} \frac{1}{\sqrt{x} + 2}
                                        \]
                                        </span>
                                    </div>
                                    Dengan substitusi:
                                    \[
                                    \frac{1}{\sqrt{4} + 2} = \frac{1}{2 + 2} = \frac{1}{4}
                                    \]
                                </li>
                            </ul>
                        </p>

                        <div class="divider">
                            <div class="divider-text">Implementasi pada Kode</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="20">
function hitungLimit(x) {
// Fungsi untuk memfaktorkan ekspresi (x^2 - 4)
function faktorisasi(x) {
    return (x + 2)*(x - 2);
}

// Sederhanakan ekspresi dengan membagi dengan (x - 2)
let fungsi_terfaktorisasi = faktorisasi(x) / (x - 2);

return fungsi_terfaktorisasi;
}
// Untuk menghindari pembagian dengan nol,
//kita bisa menggunakan nilai yang sangat dekat dengan 2
let x = 2.00001;
let a = "fungsi (x^2-4)/(x-2)";
let b = "saat x mendeketi 2,";
nilai_Limit = hitungLimit(x);

console.log("Nilai limit dari",a,b,"adalah:", nilai_Limit.toFixed(2));
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
                                    <li>Fungsi <code>faktorisasi</code> digunakan untuk memfaktorkan ekspresi <code>x^2 - 4</code> menjadi <code>(x + 2)(x - 2)</code>.</li>
                                    <li>Ekspresi kemudian disederhanakan dengan membagi hasil faktorisasi dengan <code>x - 2</code>, menghasilkan <code>x + 2</code>.</li>
                                    <li>Untuk menghindari pembagian dengan nol, nilai <code>x</code> diambil mendekati 2, misalnya <code>x = 2.00001</code>.</li>
                                    <li>Hasil limit dihitung menggunakan fungsi tersebut dan dicetak dalam format dua angka desimal.</li>
                                </ul>

                                <p><strong>Contoh Eksekusi:</strong></p>
                                <ul>
                                    <li>Fungsi awal:
                                        \[
                                        \frac{x^2 - 4}{x - 2}
                                        \]
                                    </li>
                                    <li>Setelah disederhanakan menjadi:
                                        \[
                                        x + 2
                                        \]
                                    </li>
                                    <li>Jika \( x = 2.00001 \), maka hasilnya adalah:
                                        \[
                                        2.00001 + 2 = 4.00001 \approx 4.00
                                        \]
                                    </li>
                                    <li>Output: <code>Nilai limit dari fungsi (x^2-4)/(x-2) saat x mendekati 2, adalah: 4.00</code>.</li>
                                </ul>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="15">
from sympy import *

x = symbols('x')
f = (sqrt(x) - 2) / (x - 4)

# Perkalian dengan akar sekawan secara manual
f = f * (sqrt(x) + 2) / (sqrt(x) + 2)
f = simplify(f)

# Hitung limit
nilai_limit = limit(f, x, 4)

print(nilai_limit)  # Hasil: 1/4
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
                                    <li><strong>Definisi Fungsi:</strong> Fungsi <code>f(x)</code> yang diberikan:
                                        \[
                                        f(x) = \frac{\sqrt{x} - 2}{x - 4}
                                        \]
                                    </li>
                                    <li><strong>Perkalian dengan Akar Sekawan:</strong>
                                        Fungsi dikalikan dengan akar sekawan \((\sqrt{x} + 2)\) untuk menyederhanakan pembilang:
                                        <div style="overflow-x: auto; max-width: 100%;">
                                            <span class="katex-display">
                                                \[
                                                f(x) = \frac{(\sqrt{x} - 2)(\sqrt{x} + 2)}{(x - 4)(\sqrt{x} + 2)} = \frac{1}{\sqrt{x} + 2}
                                                \]
                                            </span>
                                        </div>
                                    </li>
                                    <li><strong>Perhitungan Limit:</strong>
                                        Nilai limit dihitung saat \( x \to 4 \):
                                        \[
                                        f(x) = \frac{1}{\sqrt{4} + 2} = \frac{1}{4}
                                        \]
                                    </li>
                                </ul>

                                <p><strong>Output:</strong></p>
                                <ul>
                                    <li>Nilai limit dari fungsi \( f(x) \) adalah: <code>1/4</code>.</li>
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
