<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 text-center" style=" padding-top: 150px;">
            <div class="logo">
              <img
                src="{{asset("assets/compiled/png/logo_transparent.png")}}"
                alt=""
                width="100"
                srcset=""
              />
            </div>
            <h1></h1>

            <h1 class="typing-effect" id="typing-text" style="margin-top: 30px"></h1>

            <p class="lead mt-4">
                Belajar Limit Kalkulus I dalam sebuah Kode
            </p>
            <hr />
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-8 offset-md-2 mt-4">
            <div class="card-group">
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/definisi-intuitif">
                    <div class="card-body">
                        <h4 class="card-title">
                        Definisi Intuitif
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/teorema-limit">
                    <div class="card-body">
                        <h4 class="card-title">
                        Teorema - Teorema Limit
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/limit-0per0">
                    <div class="card-body">
                        <h4 class="card-title">
                            Limit Fungsi Membentuk \( \frac{0}{0} \)
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8 offset-md-2 mt-4">
            <div class="card-group">
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/limit-takhingga">
                    <div class="card-body">
                        <h4 class="card-title">
                            Limit Takhingga ∞
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/limit-kirikanan">
                    <div class="card-body">
                        <h4 class="card-title">
                            Limit Kiri dan Limit Kanan
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card">
                <div class="card-content mt-2">
                  <a href="/limit-trigonometri">
                    <div class="card-body">
                        <h4 class="card-title">
                            Limit Fungsi Trigonometri
                        </h4>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="section" id="panduan">
            <div class="row">
                <div class="col-12">
                    <div class="row match-height">
                        <div class="col-12 mb-1">
                        <h2 class="section-title text-uppercase text-center">Panduan Belajar</h2>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="divider">
                                <div class="divider-text">Hallo Semuanya!</div>
                            </div>
                            <p class="text-center">
                                Sebelum memulai, ada beberapa hal penting yang perlu kamu ketahui. Limit with Code adalah tempat belajar dan berbagi tentang Limit Kalkulus I dengan bantuan bahasa pemrograman. Di sini, kamu bisa belajar sekaligus berkontribusi dalam mengembangkan ilmu Limit Kalkulus I melalui kode!.
                            </p>
                            <div class="divider">
                                <div class="divider-text">Persyaratan!</div>
                            </div>
                            <p class="text-center">
                                Fokus kita ada pada bagaimana konsep Limit Kalkulus I diterapkan dalam pemrograman. Jadi, kita tidak akan membahas hal-hal seperti cara menginstal kode editor, menulis kode dasar dan sebagainya namun beberapa konsep dasar pemrograman akan kita bahas.
                                Nah karena itu sebelum memulai, kami harap kamu sudah paham dasar-dasar pemrograman gak perlu jago banget sih, yang penting kamu bisa memahami kode-kode yang akan kita bahas.
                            </p>
                            <div class="divider">
                                <div class="divider-text">Bahasa Pemrograman!</div>
                            </div>
                            <p class="text-center">
                                Dalam situs ini, kita akan menggunakan berbagai bahasa pemrograman untuk menjelaskan konsep Limit Kalkulus I. Beberapa bahasa yang akan kita gunakan antara lain:
                            </p>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-dark btn-icon icon-left me-2">
                                    <img src="{{asset("assets/images/js.png")}}" alt="" class="img-fluid" style="max-width: 24px;"> JavaScript
                                </button>
                                <button type="button" class="btn btn-dark btn-icon icon-left">
                                    <img src="{{asset("assets/images/py.png")}}" alt="" class="img-fluid" style="max-width: 24px;"> Python
                                </button>

                            </div>
                            <p class="text-center mt-3">
                                Setiap bahasa punya keunikan tersendiri dalam cara mereka menangani Limit Kalkulus I. Jadi, siap-siap untuk mengeksplorasi banyak hal baru dalam perjalanan belajar ini!
                                Di beberapa materi, mungkin bahasa pemrograman yang disebutkan tidak tersedia.
                                Jangan khawatir, kamu tetap bisa mengikuti konsep yang diajarkan dengan bahasa lain yang ada, konsepnya gak jauh beda kok. Intinya, fokus pada implementasinya, ya!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Groups section start -->
        <section id="groups">
            <div class="row match-height">
              <div class="col-12 mb-1">
                <h2 class="section-title text-uppercase text-center" id="kontributor">Kontributor</h2>
              </div>
            </div>
            <div class="row match-height">
              <div class="col-12">
                <div class="card-group">
                  <!-- Card 1 -->
                  <div class="card">
                    <div class="card-content">
                      <img
                        class="card-img-top img-fluid"
                        src="{{asset("./assets/images/adryan.jpg")}}"
                        alt="Card image cap"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Muhammad Adryan Suryaman</h4>
                        <p class="text-muted">Full Stack</p>
                        <button type="button" class="btn btn-dark" id="toastBtnAdryan">Pesan</button>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                          <div id="toastAdryan" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#007aff"></rect>
                              </svg>
                              <strong class="me-auto">Adryan</strong>
                              <small>Sekarang</small>
                              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">Semangat belajarnya agar kalian jago!.</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card 2 -->
                  <div class="card">
                    <div class="card-content">
                      <img
                        class="card-img-top img-fluid"
                        src="{{asset("./assets/images/farhan.jpg")}}"
                        alt="Card image cap"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Farhan Esha Putra Kusuma Atmaja</h4>
                        <p class="text-muted">Riset Materi</p>
                        <button type="button" class="btn btn-dark" id="toastBtnFarhan">Pesan</button>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                          <div id="toastFarhan" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#007aff"></rect>
                              </svg>
                              <strong class="me-auto">Farhan</strong>
                              <small>Sekarang</small>
                              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">Berpikirlah 2 kali sebelum kamu tidak berpikir.</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card 3 -->
                  <div class="card">
                    <div class="card-content">
                      <img
                        class="card-img-top img-fluid"
                        src="{{asset("./assets/images/farid.jpg")}}"
                        alt="Card image cap"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Farid Syah Fadillah</h4>
                        <p class="text-muted">Back End</p>
                        <button type="button" class="btn btn-dark" id="toastBtnFarid">Pesan</button>
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                          <div id="toastFarid" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#007aff"></rect>
                              </svg>
                              <strong class="me-auto">Farid</strong>
                              <small>Sekarang</small>
                              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">Kalian harus mengikuti kuis nya dikarenakan seru :D.</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Hubungi Kami</h2>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>
                        Jika anda membutuhkan bantuan, atau akan melaporkan ketidaksesuaian web seperti <code>Bug</code>
                        <code>Perhitungan kalkulator yang salah</code>
                        <code>Materi yang kurang tepat atau salah</code> dan
                        <code>Hal lainnya</code>.
                        Maka silahkan untuk menghubungi kontak pada platform media sosial yang anda pakai dibawah!
                    </p>
                    <ul class="list-group">
                        <a href="https://wa.me/6285877171626">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center text-dark">
                            <span>WhatsApp | +6285877171626</span>
                            <span
                                class="badge badge-pill badge-round ms-1 border border-rounded border-dark"><img src="{{asset("assets/images/ws.png")}}" alt=""></span>
                            </li>
                        </a>
                        <a href="https://instagram.com/adryannn">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center text-dark">
                            <span>Instagram | adryannn</span>
                            <span
                                class="badge badge-pill badge-round ms-1 border border-rounded border-dark"><img src="{{asset("assets/images/ig.png")}}" alt=""></span>
                            </li>
                        </a>
                        <a href="mailto:rootougashi@gmail.com">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center text-dark">
                            <span>Email | rootougashi@gmail.com</span>
                            <span
                                class="badge badge-pill badge-round ms-1 border border-rounded border-dark"><img src="{{asset("assets/images/gm.png")}}" alt=""></span>
                            </li>
                        </a>
                        <a href="https://github.com/Tougashi">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center text-dark">
                            <span>Github | tougashi</span>
                            <span
                                class="badge badge-pill badge-round ms-1 border border-rounded border-dark"><img src="{{asset("assets/images/gh.png")}}" alt=""></span>
                            </li>
                        </a>
                        <a href="https://discordapp.com/users/627121036181110814">
                            <li
                            class="list-group-item d-flex justify-content-between align-items-center text-dark">
                            <span>Discord | tougashi</span>
                            <span
                                class="badge badge-pill badge-round ms-1 border border-rounded border-dark"><img src="{{asset("assets/images/dc.png")}}" alt=""></span>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>



    </div>


@push('scripts')
<script>
    const text = "Limit with Code";
        const typingText = document.getElementById("typing-text");
        let index = 0;
        let isDeleting = false;
        function typeEffect() {
            if (!isDeleting) {
                typingText.textContent = text.slice(0, index + 1);
                index++;
                if (index === text.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 1000);
                } else {
                    setTimeout(typeEffect, 100);
                }
            } else {
                typingText.textContent = text.slice(0, index - 1);
                index--;
                if (index === 0) {
                    isDeleting = false;
                    setTimeout(typeEffect, 500);
                } else {
                    setTimeout(typeEffect, 50);
                }
            }
        }
        typeEffect();


    const toastTriggerAdryan = document.getElementById("toastBtnAdryan");
    const toastAdryan = document.getElementById("toastAdryan");
    if (toastTriggerAdryan) {
        toastTriggerAdryan.addEventListener("click", () => {
            const toastInstance = new bootstrap.Toast(toastAdryan);
            toastInstance.show();
        });
    }

    const toastTriggerFarhan = document.getElementById("toastBtnFarhan");
    const toastFarhan = document.getElementById("toastFarhan");
    if (toastTriggerFarhan) {
        toastTriggerFarhan.addEventListener("click", () => {
            const toastInstance = new bootstrap.Toast(toastFarhan);
            toastInstance.show();
        });
    }

    const toastTriggerFarid = document.getElementById("toastBtnFarid");
    const toastFarid = document.getElementById("toastFarid");
    if (toastTriggerFarid) {
        toastTriggerFarid.addEventListener("click", () => {
            const toastInstance = new bootstrap.Toast(toastFarid);
            toastInstance.show();
        });
    }

</script>
@endpush
</x-layout>
