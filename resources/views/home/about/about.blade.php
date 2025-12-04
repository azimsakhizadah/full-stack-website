@extends('home.home_master')
<div class="breadcrumb-wrapper light-bg">
    <div class="container">

      <div class="breadcrumb-content">
        <h1 class="breadcrumb-title pb-0">About Us</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><img src="{{asset('frontend/assets/images/blog/right-arrow.svg')}}" alt="right-arrow"></li>
                <li aria-current="page">About Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End breadcrumb -->
  
  <div class="lonyo-section-padding10">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-thumb">
              <img src="{{asset('frontend/assets/images/about-us/img1.png')}}" alt="">
            </div>
            <div class="lonyo-about-us-thumb">
              <img src="{{asset('frontend/assets/images/about-us/img2.png')}}" alt="">
              <div class="lonyo-about-us-card">
                <img src="{{asset('frontend/assets/images/about-us/card1.svg')}}" alt="">
              </div>
            </div>
          </div>
          <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="700">
            <img src="{{asset('frontend/assets/images/about-us/img3.png')}}" alt="">
            <div class="lonyo-about-us-card2">
              <img src="{{asset('frontend/assets/images/about-us/card2.svg')}}" alt="">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap">
            <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="500">
              <img src="{{asset('frontend/assets/images/about-us/img4.png')}}" alt="">
            </div>
            <div class="lonyo-about-us-thumb-wrap">
              <div class="lonyo-about-us-thumb">
                <img src="{{asset('frontend/assets/images/about-us/img5.png')}}" alt="">

              </div>
              <div class="lonyo-about-us-thumb" data-aos="fade-up" data-aos-duration="700">
                <img src="{{asset('frontend/assets/images/about-us/img6.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content -->


@include('home.homelayout.intros')


  <div class="lonyo-section-padding6">
    <div class="container">
      <div class="lonyo-section-title center">
        <p>We already have 25k+ positive reviews and ratings</p>
      </div>
      <div class="row">
        @php
            $reviews = App\Models\Review::latest()->take(3)->get(); 
        @endphp
        @foreach ($reviews as $review)
            <div class="col-xl-4 col-lg-6">
          <div class="lonyo-rating-wrap pt-0" data-aos="fade-right" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{asset('frontend/assets/images/v3/star.svg')}}" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>{{$review->message}}</p>
              <span>{{$review->name}}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end rating -->
