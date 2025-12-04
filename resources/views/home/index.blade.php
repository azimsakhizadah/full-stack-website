@extends('home.home_master')
@section('home')



@include('home.homelayout.slider')
  <!-- end hero -->
@include('home.homelayout.features')
  <!-- end content -->

@include('home.homelayout.intros')
  <!-- end content -->

  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
  </div>
  <!-- end content -->

@include('home.homelayout.usability')

  <div class="lonyo-content-shape1">
    <img src="{{ asset('frontend/assets/images/shape/shape3.svg') }}" alt="">
  </div>
  <!-- end video -->

@include('home.homelayout.reviews')
  <!-- end testimonial -->

@include('home.homelayout.faq')

  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
  </div>
  <!-- end faq -->

@include('home.homelayout.cta')
  <!-- end cta -->
@endsection