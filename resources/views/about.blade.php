@extends('layout.master')

@section('content')

<!-- ===== Page Hero ===== -->
<section class="hero bg-light py-5">
  <div class="container text-center">
    <h1 class="display-5 fw-bold text-primary">About EasyEdu</h1>
    <p class="lead text-muted mt-3">
      Learn about our mission, vision, and team behind EasyEdu Academy.
    </p>
    <img src="https://images.pexels.com/photos/4145190/pexels-photo-4145190.jpeg" 
         alt="About Us" class="img-fluid rounded shadow mt-4">
  </div>
</section>

<!-- ===== About Section ===== -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="https://images.unsplash.com/photo-1590080875832-13a23830d282?auto=format&fit=crop&w=900&q=80" 
             alt="Our Story" class="img-fluid rounded shadow">
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold text-primary mb-3">Our Story</h2>
        <p class="text-muted">
          EasyEdu Academy was founded to help learners of all ages improve their English skills with fun, modern, and practical lessons. We believe learning should be accessible, interactive, and confidence-building.
        </p>
        <p class="text-muted">
          Since our launch, thousands of students have joined EasyEdu to enhance their language skills, advance in their careers, and connect with others worldwide.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ===== Mission / Vision / Values ===== -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Our Mission, Vision & Values</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-bullseye text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Mission</h5>
            <p class="text-muted">Empower students worldwide to learn English easily and effectively with modern tools and expert guidance.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-eye text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Vision</h5>
            <p class="text-muted">Become the leading online academy for English learners, creating confident and fluent communicators globally.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-heart text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Values</h5>
            <p class="text-muted">Quality, accessibility, innovation, and a supportive learning community for all students.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Team Section ===== -->
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Meet Our Team</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=600&q=80" 
               class="card-img-top rounded-circle mt-3 mx-auto d-block" 
               alt="Team Member" style="width:150px;height:150px;object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-1">Alice Johnson</h5>
            <p class="text-muted mb-0">Founder & CEO</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&w=600&q=80" 
               class="card-img-top rounded-circle mt-3 mx-auto d-block" 
               alt="Team Member" style="width:150px;height:150px;object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-1">Mark Smith</h5>
            <p class="text-muted mb-0">Lead Instructor</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a4?auto=format&fit=crop&w=600&q=80" 
               class="card-img-top rounded-circle mt-3 mx-auto d-block" 
               alt="Team Member" style="width:150px;height:150px;object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-1">Sara Lee</h5>
            <p class="text-muted mb-0">Course Designer</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?auto=format&fit=crop&w=600&q=80" 
               class="card-img-top rounded-circle mt-3 mx-auto d-block" 
               alt="Team Member" style="width:150px;height:150px;object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="fw-bold mb-1">John Doe</h5>
            <p class="text-muted mb-0">Marketing Head</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA Banner ===== -->
<section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">Join EasyEdu Today</h2>
    <p class="mb-4 fs-5">Sign up and start improving your English with our expert team and interactive courses.</p>
    <a href="/register" class="btn btn-light btn-lg fw-bold">Get Started</a>
  </div>
</section>

@endsection
