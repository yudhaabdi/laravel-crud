@extends('frontend.header')
@section('container')
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Pendaftaran				
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Pendaftaran</a></p>
            </div>	
        </div>
    </div>
</section>
<section class="search-course-area relative" style="background: unset;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-3 col-md-6 search-course-left">
                <h1 class="text-black">
                    Pendaftaran Siswa Baru <br>
                    SMPN 1 Wlingi
                </h1>
                <p>
                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
                </p>
                
            </div>
            <div class="col-lg-48 col-md-6 search-course-right section-gap">
                <form class="form-wrap" action="/postRegister" method="POST">
                    @csrf
                    <h4 class="text-black pb-20 text-center mb-30">Pendaftaran</h4>		

                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" onfocus="this.placeholder =
                     ''" onblur="this.placeholder = 'Masukkan nama'">

                    <input type="text" class="form-control" name="agama" placeholder="Masukkan agama" onfocus="this.placeholder =
                     ''" onblur="this.placeholder = 'Masukkan agama'">
                    
                    <input type="textarea" class="form-control" name="alamat" placeholder="Masukkan alamat" onfocus="this.placeholder =
                     ''" onblur="this.placeholder = 'Masukkan alamat'">

                    <div class="form-select" id="service-select">
                        <select name="jenis_kelamin" style="display: none;">
                            <option datd-display="">Jenis kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>	

                    <input type="email" class="form-control" name="email" placeholder="Masukkan email" onfocus="this.placeholder =
                     ''" onblur="this.placeholder = 'Masukkan email'">

                    <input type="password" class="form-control" name="password" placeholder="Masukkan password" onfocus="this.placeholder =
                     ''" onblur="this.placeholder = 'Masukkan password'">
                    
                    <button type="submit" class="primary-btn text-uppercase">Submit</button>
                </form>
            </div>
        </div>
    </div>	
</section>
@endsection