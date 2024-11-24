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
                            <div style="overflow-x: auto; max-width: 100%;">
                                <span class="katex-display">
                                    \[
                                    \lim_{x \to 0} \frac{\sin^2(3x)}{2x \tan(3x)} =
                                    \lim_{x \to 0} \frac{\sin(3x) \cdot \sin(3x)}{2x \tan(3x)}
                                    \]
                                </span>
                            </div>
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
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="15">
function hitungLimit(x) {
return (Math.sin(3*x) ** 2) / (2*x * Math.tan(3*x));
}

//kita tidak bisa langsung substitusi x = 0,
//kita akan mengganti nilai x mendekati 0.
const x = 0.00001;
let a = "(sin(3*x) ** 2) / (2*x * tan(3*x))";
let b = "saat x mendeketi 0,";
const hasilLimit = hitungLimit(x);

console.log("Nilai limit dari",a,b,"adalah:", hasilLimit.toFixed(2));
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
                                    <li><strong>Fungsi:</strong> Fungsi limit yang dihitung adalah:
                                        \[
                                        f(x) = \frac{\sin^2(3x)}{2x \cdot \tan(3x)}
                                        \]
                                    </li>
                                    <li><strong>Pendekatan:</strong> Karena \( x = 0 \) menyebabkan pembagian dengan nol, nilai \( x \) yang sangat kecil (\( x = 0.00001 \)) digunakan sebagai pendekatan.</li>
                                    <li><strong>Langkah Perhitungan:</strong>
                                        <ol>
                                            <li>Hitung sinus \( \sin(3x) \) dan kuadratkan.</li>
                                            <li>Hitung tangen \( \tan(3x) \).</li>
                                            <li>Substitusi nilai \( x = 0.00001 \) ke dalam fungsi.</li>
                                        </ol>
                                    </li>
                                    <li><strong>Hasil:</strong> Nilai limitnya adalah <code>2.25</code>.</li>
                                </ul>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="12">
import sympy
from sympy import sin,tan,symbols,limit

# Definisi simbol x dan fungsi
x = symbols('x')
f = (sin(3*x)**2) / (2*x * tan(3*x))

# Hitung limit saat x mendekati 0
nilai_limit = limit(f, x, 0)

print(nilai_limit)
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
                                    <li><strong>Fungsi:</strong> Fungsi yang dihitung adalah:
                                        \[
                                        f(x) = \frac{\sin^2(3x)}{2x \cdot \tan(3x)}
                                        \]
                                    </li>
                                    <li><strong>Langkah Perhitungan:</strong>
                                        <ol>
                                            <li>Mendefinisikan variabel \( x \) sebagai simbol menggunakan SymPy.</li>
                                            <li>Mendefinisikan fungsi \( f(x) \).</li>
                                            <li>Menghitung limit \( f(x) \) saat \( x \to 0 \) menggunakan teorema limit trigonometri:
                                                <div style="overflow-x: auto; max-width: 100%;">
                                                    <span class="katex-display">
                                                        \[
                                                        \lim_{x \to 0} \frac{\sin(ax)}{x} = a \quad \text{dan} \quad \lim_{x \to 0} \frac{\tan(ax)}{x} = a.
                                                        \]
                                                    </span>
                                                </div>
                                            </li>
                                            <li>Menyederhanakan hasil untuk mendapatkan:
                                                \[
                                                \lim_{x \to 0} \frac{\sin^2(3x)}{2x \cdot \tan(3x)} = \frac{3}{2}.
                                                \]
                                            </li>
                                        </ol>
                                    </li>
                                    <li><strong>Hasil:</strong> Nilai limitnya adalah <code>3/2</code>.</li>
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
