@extends('home.home_master')
  <div class="breadcrumb-wrapper light-bg">
    <div class="container">

      <div class="breadcrumb-content">
        <h1 class="breadcrumb-title pb-0">Services</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><img src="{{asset('frontend/assets/images/blog/right-arrow.svg')}}" alt="right-arrow"></li>
                <li aria-current="page">Services</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End breadcrumb -->

  <section class="lonyo-section-padding7">
    <div class="container">
      <div class="row">         
          @include('home.homelayout.intros')
      </div>
    </div>
  </section>
  <!-- end content -->


  <div class="lonyo-section-padding10 position-relative">
    <div class="container">
      <div class="row">
        @include('home.homelayout.features')
      </div>
    </div>
  </div>
  <!-- end content -->


  <div class="lonyo-section-padding4 section pt-0">
    <div class="container">
      @include('home.homelayout.faq')
    </div>
  </div>
  <!-- end faq -->

  <div class="lonyo-content-shape">
    <img src="assets/images/shape/shape2.svg" alt="">
  </div>