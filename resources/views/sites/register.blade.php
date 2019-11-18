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
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-black">
                    Pendaftaran Siswa Baru <br>
                    SMPN 1 Wlingi
                </h1>
                <p>
                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
                </p>
                
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
                <form class="form-wrap" action="#" method="POST">
                    @csrf
                    <h4 class="text-black pb-20 text-center mb-30">Pendaftaran</h4>		
                    <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                    <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'">
                    <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
                    <div class="form-select" id="service-select">
                        <select style="display: none;">
                            <option datd-display="">Choose Course</option>
                            <option value="1">Course One</option>
                            <option value="2">Course Two</option>
                            <option value="3">Course Three</option>
                            <option value="4">Course Four</option>
                        </select><div class="nice-select" tabindex="0"><span class="current">Choose Course</span><ul class="list"><li data-value="Choose Course" class="option selected">Choose Course</li><li data-value="1" class="option">Course One</li><li data-value="2" class="option">Course Two</li><li data-value="3" class="option">Course Three</li><li data-value="4" class="option">Course Four</li></ul></div>
                    </div>									
                    <button class="primary-btn text-uppercase">Submit</button>
                </form>
            </div>
        </div>
    </div>	
</section>
@endsection