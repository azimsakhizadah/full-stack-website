@extends('home.home_master')
<div class="breadcrumb-wrapper light-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <h1 class="breadcrumb-title pb-0">Our Team</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><img src="{{asset('frontend/assets/images/blog/right-arrow.svg')}}" alt="right-arrow"></li>
                <li aria-current="page">Our Team</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  <!-- End breadcrumb -->

  @php
      $team_members = App\Models\Team::all();
  @endphp
  <section class="lonyo-section-padding9">
    <div class="container">
      <div class="lonyo-section-title max-w616">
        <h2>Meet our brilliant team members</h2>
      </div>
      <div class="row g-4">
    @foreach ($team_members as $member)
        <div class="col-lg-3 col-md-6">
            <div class="text-center border-0">
                <img src="{{ $member->image }}" alt="{{ $member->name }}">
                <div class="card-body">
                    <a href="{{route('team.profile', $member->id )}}" class="fw-bold mb-1">{{ $member->name }}</a>
                    <p class="text-primary fw-semibold">{{ $member->position }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

    </div>
  </section>

  <!-- end content -->

  <div class="lonyo-content-shape">
    <img src="{{asset('frontend/assets/images/shape/shape2.svg')}}" alt="">
  </div>

  @include('home.homelayout.cta')