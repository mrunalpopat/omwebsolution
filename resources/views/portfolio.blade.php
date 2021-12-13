@extends('front.layouts.header')
@section('content')
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Portfolio</h2>
      <h3>Check our <span>Portfolio</span></h3>
      <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
    </div>

    <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>
      </div>
    </div> -->

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach($getData as $pdata)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;width: 31% !important;margin: 10px 10px;">
          <img src="{{asset('portfolio/').'/'.$pdata->images}}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{$pdata->title}}</h4>
            <p>{{$pdata->type}}</p>
            <a href="#" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
<!-- End Portfolio Section -->
@endsection