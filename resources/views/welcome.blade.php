<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Wisata Sumenep</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('landing') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('landing') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Siimple
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-bootstrap-landing-page/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container-fluid">

            <div class="logo">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{ asset('landing') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
            <nav class="nav-menu">
                <ul>
                    <li class="active"><a href="#header" class="scrollto">Home</a></li>
                    <li><a href="#Wisata" class="scrollto">Wisata</a></li>
                    <li><a href="#pesan" class="scrollto">Pesan Tiket</a></li>
                    <li><a href="#riwayat" class="scrollto">Riwayat Pemesanan</a></li>
                    <li><a href="#contact" class="scrollto">Contact Us</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="nav-link">
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h1>Welcome !!!</h1>
            <h2>Pemesanan Tiket Wisata Kabupaten Sumenep</h2>
        </div>
    </section><!-- #hero -->

    <main id="main">

        {{-- <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('landing') }}/assets/img/about-img.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</li>
                            <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit.</li>
                            <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section --> --}}

        <!-- ======= Why Us Section ======= -->
        <section id="wisata" class="why-us section-bg">
            <div class="container">

                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <img src="{{ Storage::url('public/wisata/') . $item->gambar }}" class="card-img-top"
                                    alt="{{ $item->nama }}">
                                <div class="card-icon">
                                    <i class="bx bx-book-reader">
                                    </i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama }} - @currency($item->harga)</h5>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                </div>
                                <a class="btn btn-warning" style="float:center" href="">pesan</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Frequenty Asked Questions Section ======= -->
        <section class="pesan">
            <div class="container">
                <div class="section-title">
                    <h2>Pesan Tiket</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('pesan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-6" style="display:none">
                            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                                name="nama_pemesan" id="nama_pemesan" value="{{ Auth::user()->name }}">
                            @error('nama_pemesan')
                                <div class="alert alert-danger mt=2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="nama_wisata" class="form-label">Nama Wisata</label>
                                <select name="nama_wisata" id="nama_wisata" class="form-select">
                                    @foreach ($data as $p)
                                        <option value="{{ $p->nama }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" name="nama_wisata" id="nama_wisata"> -->
                                @error('nama_wisata')
                                    <div class="alert alert-danger mt=2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" id="tanggal">
                                @error('tanggal')
                                    <div class="alert alert-danger mt=2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                                <select name="harga_tiket" id="harga_tiket" class="form-select">
                                    @foreach ($data as $p)
                                        <option value="{{ $p->harga }}">{{ $p->harga }}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control @error('harga_tiket') is-invalid @enderror" name="harga_tiket" id="harga_tiket"> -->
                                @error('harga_tiket')
                                    <div class="alert alert-danger mt=2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                                <input type="number" class="form-control @error('jumlah_tiket') is-invalid @enderror"
                                    name="jumlah_tiket" id="jumlah_tiket">
                                @error('jumlah_tiket')
                                    <div class="alert alert-danger mt=2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>&ensp;
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </section><!-- End Frequenty Asked Questions Section -->

        <section class="riwayat">
            <div class="container">
                <div class="section-title">
                    <h2>Riwayat Pemesanan Tiket</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DATA Pemesanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemesan</th>
                                            <th>Nama Wisata</th>
                                            <th>Tanggal</th>
                                            <th>Harga Tiket</th>
                                            <th>Jumlah Tiket</th>
                                            <th>Harga Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($data1 as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->nama_pemesan }}</td>
                                                <td>{{ $item->nama_wisata }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>@currency($item->harga_tiket)</td>
                                                <td>{{ $item->jumlah_tiket }}</td>
                                                <td>@currency($item->harga_total)</td>

                                                <td>
                                                    <form action="{{ route('pesan.destroy', $item->id) }}"
                                                        method="post" style="display:inline">
                                                        <a href="{{ route('pesan.edit', $item->id) }}"
                                                            class="btn btn-sm btn-warning">EDIT</a>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data ? Data tidak dapat dipulihkan')">DELETE</button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </section>
        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-3 col-md-5 mb-5 mb-md-0">
                        <div class="info">
                            <div class="address">
                                <i class="bx bx-map"></i>
                                <p>A108 Adam Street<br>New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bx bx-envelope"></i>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bx bx-phone-call"></i>
                                <p>+1 5589 55488 55s</p>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-5 col-md-7">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="copyright">
            <strong><span>Dwi Fatlillah</span></strong>
        </div>
    </footer><!-- End #footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing') }}/assets/js/main.js"></script>

</body>

</html>
