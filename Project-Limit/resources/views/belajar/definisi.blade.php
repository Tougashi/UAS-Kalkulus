<x-layout2>
    <div id="main-content">
        <div class="row">
            <div class="col-12">
                <div class="row match-height">
                    <div class="col-12 mb-1">
                    <h2 class="section-title text-uppercase text-center">Limit</h2>
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
                                <div class="form-group with-title">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled>def limit(f, x):
return f(x)
# Contoh fungsi f(x) = x^2 + 3x
result = limit(lambda x: x**2 + 3*x, 2)
print("Hasil limit:", result)
                                    </textarea>
                                    <label>Python</label>
                                </div>
                                <button id="runCodeBtn" class="btn btn-dark mb-3">Jalankan Kode</button>
                                <div class="form-group with-title">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" disabled>
                                    </textarea>
                                    <label>Output</label>
                                </div>
                                <p class="">
                                    <ul>
                                        Penjelasan:
                                        <li>
                                        \(\text{def limit(f, x):}\)
                                        Fungsi ini menerima dua parameter:</li>
                                        <ul>
                                            <li>\(f: \) Fungsi matematis yang ingin dihitung limitnya.</li>
                                            <li>\(x: \) Nilai yang didekati oleh variabel } x.</li>
                                            Fungsi ini memanggil fungsi \(f(x)\) dengan nilai \(x\) secara langsung, karena definisi intuitif limit pada kasus ini cukup mengganti \(x\) dengan nilai mendekati \(c\).
                                        </ul>
                                    <li>lambda \(x: x^2 + 3x\)</li>
                                    Lambda adalah fungsi anonim yang merepresentasikan \(f(x) = x^2 + 3x\).
                                    <li>\(\text{result = limit}...\)</li>
                                    Memanggil fungsi limit dengan parameter fungsi lambda dan nilai \(x = 2\).
                                    </ul>

                                </p>

                                <div class="form-group with-title mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" disabled>function limit(f, x) {
return f(x);
}

// Contoh fungsi f(x) = x^2 + 3x
const result = limit(x => x ** 2 + 3 * x, 2);
console.log("Hasil limit:", result);       </textarea>
                                    <label>JavaScript</label>
                                </div>
                                <button id="runCodeBtn" class="btn btn-dark mb-3">Jalankan Kode</button>
                                <div class="form-group with-title">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" disabled>
                                    </textarea>
                                    <label>Output</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout2>
