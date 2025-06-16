<div class="card">
    <div class="card-body">
        <h2 class="text-center">Permohonan Papan Iklan</h2>

        <!-- Carousel Section -->
        <div class="row my-4">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50"
                            alt="Billboard Kecil">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Billboard Kecil</h5>
                            <p>Lokasi: Pintu Masuk Utama</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50"
                            alt="Billboard Besar">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Billboard Besar</h5>
                            <p>Lokasi: Kawasan Foyer Perpustakaan</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url('images/logo_umt.png') ?>" class="d-block w-50"
                            alt="Contoh Iklan">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Contoh Paparan Iklan</h5>
                            <p>Reka bentuk dan susun atur yang disyorkan</p>
                        </div>
                    </div>
                </div>
                <!-- Buttons for carousel navigation -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Seterusnya</span>
                </button>
            </div>
        </div>

        <!-- Billboard Selection Section -->
        <div class="row p-3">
            <h4 class="text-center mb-3">Sila pilih saiz papan iklan:</h4>
            <div class="d-flex justify-content-center gap-4">
                <input type="radio" class="btn-check" name="billboard" id="billboard-kecil" value="kecil"
                    autocomplete="off" onclick="loadForm()">
                <label class="btn btn-outline-primary btn-lg" for="billboard-kecil">Billboard Kecil</label>

                <input type="radio" class="btn-check" name="billboard" id="billboard-besar" value="besar"
                    autocomplete="off" onclick="loadForm()">
                <label class="btn btn-outline-primary btn-lg" for="billboard-besar">Billboard Besar</label>
            </div>
        </div>

        <div id="form_billboard" style="display: none;">
            <form action="<?php echo module_url('permohonan/tambah_billboard') ?>" method="post">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Maklumat Papan Iklan</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row align-items-center">
                            <label for="Seksyen" class="form-label fw-semibold col-sm-3 col-form-label text-end">Gambar
                                Papan Iklan</label>
                            <div class="col-sm-9">
                                <div class="d-flex align-items-center">
                                    <input class="form-control bg-white text-dark me-3" type="file" accept="image/*"
                                        name="gambar_cend" id="file" onchange="loadFile(event)"
                                        style="background-color: white;">

                                </div>
                            </div>
                        </div>

                        <script>
                            const form = document.getElementById('form_billboard');

                            function loadForm() {
                                form.style.display = 'block';
                            }
                        </script>

                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText7"
                                class="form-label fw-semibold col-sm-3 col-form-label text-end">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputText7" name="nama_cenderamata"
                                    placeholder="Sila Masukkan Catatan (Jika ada)"></textarea>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Hantar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JS to handle selection -->
<script>
    document.querySelectorAll('input[name="billboard"]').forEach((radio) => {
        radio.addEventListener('change', function () {
            console.log('Pilihan pengguna:', this.value);
            // You can show a form, redirect, or update the UI here
        });
    });
</script>