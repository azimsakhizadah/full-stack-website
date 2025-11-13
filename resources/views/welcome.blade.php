@extends('layout.master')

@section('content')
<!-- ===== Hero Section ===== -->
<section class="hero bg-light py-5">
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-lg-6 text-lg-start text-center mb-4 mb-lg-0">
        <h1 class="display-5 fw-bold text-primary">Learn English the Easy Way</h1>
        <p class="lead text-muted mt-3">
          Join thousands of students improving their English with EasyEdu’s fun and interactive lessons.
        </p>
        <a href="/courses" class="btn btn-primary btn-lg mt-3">Start Learning</a>
        <a href="/about" class="btn btn-outline-primary btn-lg mt-3 ms-2">Learn More</a>
      </div>
      <div class="col-lg-6">
        <img src="https://images.pexels.com/photos/4145190/pexels-photo-4145190.jpeg" 
             alt="Learning English" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- ===== About / Features ===== -->
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Why Choose EasyEdu?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-chat-dots text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Interactive Learning</h5>
            <p class="text-muted">
              Practice speaking, listening, and writing with real examples and fun activities.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-people text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Expert Teachers</h5>
            <p class="text-muted">
              Learn with experienced teachers who guide you step-by-step to success.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <i class="bi bi-trophy text-primary display-5 mb-3"></i>
            <h5 class="fw-bold">Proven Results</h5>
            <p class="text-muted">
              Our students achieve fluency faster with structured, easy-to-follow lessons.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Courses Preview ===== -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Popular Courses</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1584697964389-f1d6b4e5a95c?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="Course 1">
          <div class="card-body">
            <h5 class="fw-bold">English for Beginners</h5>
            <p class="text-muted">
              Learn essential grammar, vocabulary, and pronunciation to start speaking confidently.
            </p>
            <a href="/courses" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.pexels.com/photos/4143790/pexels-photo-4143790.jpeg?auto=compress&cs=tinysrgb&w=900" 
               class="card-img-top" alt="Course 2">
          <div class="card-body">
            <h5 class="fw-bold">Conversation Skills</h5>
            <p class="text-muted">
              Improve your fluency and natural speaking skills through real-life topics.
            </p>
            <a href="/courses" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1590080875832-13a23830d282?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="Course 3">
          <div class="card-body">
            <h5 class="fw-bold">Business English</h5>
            <p class="text-muted">
              Master English for meetings, emails, and professional communication.
            </p>
            <a href="/courses" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA Banner ===== -->
<section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">Ready to Start Your English Journey?</h2>
    <p class="mb-4 fs-5">Join EasyEdu today and see how quickly you can improve your English!</p>
    <a href="/register" class="btn btn-light btn-lg fw-bold">Join Now</a>
  </div>
</section>
@endsection
