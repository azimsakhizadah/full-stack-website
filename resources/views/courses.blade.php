@extends('layout.master')

@section('content')

<!-- ===== Page Hero ===== -->
<section class="hero bg-light py-5">
  <div class="container text-center">
    <h1 class="display-5 fw-bold text-primary">Our Courses</h1>
    <p class="lead text-muted mt-3">
      Explore our wide range of English courses designed for learners of all levels.
    </p>
    <img src="https://images.pexels.com/photos/4145190/pexels-photo-4145190.jpeg" 
         alt="Courses Hero" class="img-fluid rounded shadow mt-4">
  </div>
</section>

<!-- ===== Courses Grid ===== -->
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="fw-bold text-primary mb-4 text-center">All Courses</h2>

    <div class="row g-4">
      <!-- Course 1 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1584697964389-13a23830d282?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="English for Beginners">
          <div class="card-body">
            <h5 class="fw-bold">English for Beginners</h5>
            <p class="text-muted">Start your English journey with grammar, vocabulary, and pronunciation basics.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Course 2 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.pexels.com/photos/4143790/pexels-photo-4143790.jpeg?auto=compress&cs=tinysrgb&w=900" 
               class="card-img-top" alt="Conversation Skills">
          <div class="card-body">
            <h5 class="fw-bold">Conversation Skills</h5>
            <p class="text-muted">Improve fluency and speaking skills through real-life topics and dialogues.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Course 3 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1590080875832-13a23830d282?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="Business English">
          <div class="card-body">
            <h5 class="fw-bold">Business English</h5>
            <p class="text-muted">Master professional communication for meetings, emails, and presentations.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Course 4 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=900" 
               class="card-img-top" alt="Advanced Grammar">
          <div class="card-body">
            <h5 class="fw-bold">Advanced Grammar</h5>
            <p class="text-muted">Deep dive into complex grammar topics for advanced learners.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Course 5 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="IELTS Preparation">
          <div class="card-body">
            <h5 class="fw-bold">IELTS Preparation</h5>
            <p class="text-muted">Get ready for IELTS exams with tips, practice tests, and expert guidance.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>

      <!-- Course 6 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="https://images.unsplash.com/photo-1578926372155-0f4c0a55f395?auto=format&fit=crop&w=900&q=80" 
               class="card-img-top" alt="Kids English">
          <div class="card-body">
            <h5 class="fw-bold">Kids English</h5>
            <p class="text-muted">Fun and engaging English lessons designed specifically for children.</p>
            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA Banner ===== -->
<section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">Ready to Enroll in a Course?</h2>
    <p class="mb-4 fs-5">Join EasyEdu and start improving your English today!</p>
    <a href="/register" class="btn btn-light btn-lg fw-bold">Enroll Now</a>
  </div>
</section>

@endsection
