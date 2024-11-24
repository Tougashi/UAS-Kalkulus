<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Limit Takhingga ∞</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Limit Takhingga ∞</div>
                        </div>
                        <p>
                            Sebelum belajar bagaimana cara menyelesaikan limit fungsi di takhingga, mari kita berkenalan dengan takhingga.
                            Jika berbicara tentang definisi, simbol tak hingga (\(\infty\)) adalah sebuah konsep abstrak yang menggambarkan sesuatu yang tanpa batas.
                            Konsep ini relevan dalam sejumlah bidang, terutama matematika dan fisika.
                            Tak hingga diberi simbol \(\infty\), yang menunjukkan “sesuatu” yang lebih besar dari bilangan mana pun tetapi bukan bilangan itu sendiri.
                            Dengan kata lain, tidak ada bilangan yang lebih besar dari \(\infty\).
                        </p>
                        <p>
                            Cara menyelesaikan limit di takhingga dapat dibagi menjadi beberapa metode, seperti:
                            <ul>
                                <li>
                                    <strong>Pembagian Menggunakan Pangkat Tertinggi</strong>
                                    <br>
                                    Contoh:
                                    \[
                                    \lim_{x \to \infty} \frac{x^2 - 6x + 5}{2x^2 + 5x - 3}
                                    \]
                                    Untuk menyelesaikannya, kita membagi setiap suku dengan pangkat tertinggi dari variabel \(x\), yaitu \(x^2\):
                                    \[
                                    \lim_{x \to \infty} \frac{\frac{x^2}{x^2} - \frac{6x}{x^2} + \frac{5}{x^2}}{\frac{2x^2}{x^2} + \frac{5x}{x^2} - \frac{3}{x^2}}
                                    \]
                                    Sederhanakan:
                                    \[
                                    \lim_{x \to \infty} \frac{1 - \frac{6}{x} + \frac{5}{x^2}}{2 + \frac{5}{x} - \frac{3}{x^2}}
                                    \]
                                    Saat \(x \to \infty\), suku-suku dengan pembagi \(x\) atau lebih besar (\(\frac{1}{x}\), \(\frac{1}{x^2}\)) akan mendekati nol:
                                    \[
                                    \frac{1 - 0 + 0}{2 + 0 - 0} = \frac{1}{2}
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
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="12">
function hitungLimit(x) {
// Fungsi untuk menghitung limit
return (1 - 6/x + 5/(x*x)) / (2 + 5/x - 3/(x*x));
}

// Hitung nilai limit saat x mendekati tak hingga
//digunakan nilai 1000000 sebagai pengganti nilai tak hingga
let pengganti_takhingga = 1000000;
let hasilLimit = hitungLimit(pengganti_takhingga);

console.log("Nilai limitnya adalah:", hasilLimit.toFixed(2));
                                    </textarea>
                                    <label><img src="{{asset("assets/images/js.png")}}" alt="" class="img-fluid" style="max-width: 12px;">Javascript</label>
                                </div>
                                <button class="btn btn-dark mb-3" >Jalankan Kode</button>
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                                    <label>Output</label>
                                </div>
                                <h3>Penjelasan:</h3>
                                <p><strong>Penjelasan Kode:</strong></p>
                                <ul>
                                    <li><strong>Definisi Fungsi:</strong> Fungsi limit yang diberikan:
                                        \[
                                        f(x) = \frac{1 - \frac{6}{x} + \frac{5}{x^2}}{2 + \frac{5}{x} - \frac{3}{x^2}}
                                        \]
                                    </li>
                                    <li><strong>Pendekatan Nilai Tak Hingga:</strong>
                                        Menggunakan nilai besar \( x = 1000000 \) untuk menggantikan \( \infty \).
                                    </li>
                                    <li><strong>Hasil Perhitungan:</strong>
                                        Ketika \( x \to \infty \), limit mendekati:
                                        \[
                                        f(x) \to \frac{1}{2} = 0.50
                                        \]
                                    </li>
                                </ul>
                                <p><strong>Output:</strong></p>
                                <ul>
                                    <li>Nilai limitnya adalah: <code>0.50</code>.</li>
                                </ul>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="10">
import sympy
from sympy import symbols,limit

x = symbols('x')
f = (x**2 - 6*x -5)/(2*x**2 + 5*x -3)

# menghitung limit
nilai_limit = limit(f,x,sympy.oo) # oo == takhingga
print(nilai_limit)
                                    </textarea>
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
                                        <li><strong>Definisi Fungsi:</strong> Fungsi limit yang diberikan:
                                            \[
                                            f(x) = \frac{x^2 - 6x - 5}{2x^2 + 5x - 3}
                                            \]
                                        </li>
                                        <li><strong>Metode:</strong> Fungsi `limit` dari SymPy digunakan untuk menghitung limit saat \( x \to \infty \).</li>
                                        <li><strong>Hasil Perhitungan:</strong> Nilai limitnya adalah:
                                            \[
                                            \lim_{x \to \infty} f(x) = \frac{1}{2}
                                            \]
                                        </li>
                                    </ul>

                                    <p><strong>Output:</strong></p>
                                    <ul>
                                        <li>Hasil limit: <code>1/2</code>.</li>
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
