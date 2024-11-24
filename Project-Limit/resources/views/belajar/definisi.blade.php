<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Definisi Intuitif Limit</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Pemisalan</div>
                        </div>
                        <p class="text-center">
                            Bayangkan Anda berada di sebuah lorong yang memiliki pintu di ujungnya dan Anda akan bergerak menuju pintu tersebut. Bila diimplementasikan, jarak antara Anda dengan pintu saat ini adalah
                            <span>\(\boldsymbol{\lim_{x \to a} f(x)}\)</span>, dan pintu yang akan Anda tuju adalah nilai \(\boldsymbol{a}\) yang hendak Anda gapai dengan pendekatan hasil dari nilai \(\boldsymbol{f(x)}\).
                            Semakin jauh jarak Anda dengan pintu, maka semakin besar nilai \(\boldsymbol{a}\), dan sebaliknya.
                        </p>
                        <div class="divider">
                            <div class="divider-text">Definisi Intuitif</div>
                        </div>
                        <p class="text-center">
                            Misalkan kita akan mencari nilai batas sebuah fungsi:
                            \(\boldsymbol{f(x) = \frac{x^3 - 1}{x - 1}}\)
                            dengan pendekatan nilai \(\boldsymbol{x = 1}\). Maka kita bisa menotasikannya sebagai
                            \(\boldsymbol{\lim_{x \to 1} f(x) = \frac{x^3 - 1}{x - 1}}\).
                            <br>
                            Terlihat dengan jelas bahwa fungsi tersebut tidak terdefinisi pada \(\boldsymbol{x = 1}\),
                            karena pada titik ini \(\boldsymbol{f(x)}\) akan berbentuk \(\boldsymbol{\frac{0}{0}}\).
                            Meskipun demikian, kita dapat mengamati apa yang terjadi pada \(\boldsymbol{f(x)}\) ketika \(\boldsymbol{x}\) mendekati \(\boldsymbol{1}\).
                            Perhatikan tabel, diagram skematis, dan grafik pada gambar.
                        </p>
                        <img src="{{asset("assets/images/di.png")}}" alt="" class="mx-auto d-block img-fluid mb-3">
                        <p class="text-center">
                            Terlihat bahwa nilai dari pendekatan \(\boldsymbol{x = 1}\) pada fungsi
                            \(\boldsymbol{f(x) = \frac{x^3 - 1}{x - 1}}\) mendekati nilai \(\boldsymbol{3}\).
                            Maka dapat didefinisikan bahwa
                            \(\boldsymbol{\lim_{x \to c} f(x) = a}\),
                            apabila \(\boldsymbol{x}\) dekat tetapi berlainan dari \(\boldsymbol{c}\),
                            maka \(\boldsymbol{f(x)}\) dekat ke \(\boldsymbol{a}\).
                        </p>
                        <div class="divider">
                            <div class="divider-text">Implementasi pada Kode</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="20">
function hitungLimit(fungsi, x_limit, delta) // Fungsi untuk menghitung nilai fungsi di titik x
{
  function hitungNilaiFungsi(x) {
    return eval(fungsi); // Menggunakan eval untuk mengevaluasi ekspresi fungsi
  }
  // Hitung nilai fungsi di sebelah kiri dan kanan titik limit
  const nilaiKiri = hitungNilaiFungsi(x_limit - delta);
  const nilaiKanan = hitungNilaiFungsi(x_limit + delta);
  // Hitung rata-rata nilai kiri dan kanan sebagai perkiraan limit
  const hasil = (nilaiKiri + nilaiKanan) / 2;

  return hasil;
}
const fungsi = "(x**3 - 1)/(x-1)"; // Fungsi yang ingin dicari limitnya
const x_limit = 1; // Titik limit
const delta = 0.0001; // Nilai delta

const hasilLimit = hitungLimit(fungsi, x_limit, delta);
console.log("Limit dari " + fungsi + " saat x mendekati " + x_limit + " adalah: " + hasilLimit);
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
                                    <li>Fungsi <code>hitungLimit</code> menerima parameter:
                                        <ul>
                                            <li><code>fungsiStr</code>: Ekspresi fungsi dalam bentuk string, seperti <code>(x**3 - 1) / (x - 1)</code>.</li>
                                            <li><code>x_limit</code>: Nilai yang didekati, yaitu <code>1</code>.</li>
                                            <li><code>delta</code>: Nilai kecil untuk mendekati titik limit, yaitu <code>0.0001</code>.</li>
                                        </ul>
                                    </li>
                                    <li>Fungsi didefinisikan menggunakan <code>new Function</code>, memungkinkan kita untuk mengevaluasi ekspresi string sebagai fungsi JavaScript yang valid.</li>
                                    <li>Nilai di kiri (<code>nilaiKiri</code>) dihitung dengan <code>x_limit - delta</code>, sedangkan nilai di kanan (<code>nilaiKanan</code>) dihitung dengan <code>x_limit + delta</code>.</li>
                                    <li>Limit dihitung dengan rata-rata dari <code>nilaiKiri</code> dan <code>nilaiKanan</code>.</li>
                                    <li>Hasil limit dicetak menggunakan <code>console.log</code>.</li>
                                </ul>
                                <strong>Contoh Penggunaan:</strong>
                                <ul>
                                    <li>Fungsi: \((x^3 - 1) / (x - 1)\)</li>
                                    <li>Titik limit: \(x = 1\)</li>
                                    <li>Delta: \(0.0001\)</li>
                                    <li>Hasil limit akan dicetak di konsol: <code>Limit dari (x**3 - 1) / (x - 1) saat x mendekati 1 adalah: 3.000000999998501</code>.</li>
                                </ul>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="10">
import sympy
from sympy import Symbol, limit

x = Symbol('x')
f = ((x**2)-1)/(x-1)

# Mencari limit x mendekati 2
limit_value = limit(f, x, 1)
print("Nilai limit:", limit_value)
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
                                    <li>Library <code>sympy</code> digunakan untuk menghitung perhitungan simbolik, seperti limit fungsi matematika.</li>
                                    <li>Variabel simbolik <code>x</code> didefinisikan menggunakan <code>Symbol</code>.</li>
                                    <li>Fungsi yang ingin dihitung limitnya adalah:
                                        \[
                                        f(x) = \frac{x^2 - 1}{x - 1}
                                        \]
                                    </li>
                                    <li>Limit dihitung menggunakan fungsi <code>limit</code> dari <code>sympy</code>:
                                        \[
                                        \lim_{x \to 1} \frac{x^2 - 1}{x - 1}
                                        \]
                                    </li>
                                    <li>Hasil perhitungan limit dicetak menggunakan <code>print</code>.</li>
                                </ul>
                                <strong>Contoh Penggunaan:</strong>
                                <ul>
                                    <li>Fungsi: \(\frac{x^2 - 1}{x - 1}\)</li>
                                    <li>Titik limit: \(x = 1\)</li>
                                    <li>Hasil perhitungan limit akan dicetak di konsol sebagai:
                                        <code>Nilai limit: 2</code>
                                    </li>
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
