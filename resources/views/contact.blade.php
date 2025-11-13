@extends('layout.master')

@section('content')

<!-- ===== Page Hero ===== -->
<section class="hero bg-light py-5">
  <div class="container text-center">
    <h1 class="display-5 fw-bold text-primary">Contact Us</h1>
    <p class="lead text-muted mt-3">
      We’d love to hear from you. Send us a message or find our contact info below.
    </p>
    <img src="https://images.pexels.com/photos/3183197/pexels-photo-3183197.jpeg" 
         alt="Contact Us" class="img-fluid rounded shadow mt-4">
  </div>
</section>

<!-- ===== Contact Form & Info ===== -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-4">
      
      <!-- Contact Form -->
      <div class="col-lg-6">
        <h2 class="fw-bold text-primary mb-4">Send Us a Message</h2>
        <form action="#" method="POST" class="needs-validation" novalidate>
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
            <div class="invalid-feedback">Please enter your name.</div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Subject" required>
            <div class="invalid-feedback">Please enter the subject.</div>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Write your message" required></textarea>
            <div class="invalid-feedback">Please write a message.</div>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-6">
        <h2 class="fw-bold text-primary mb-4">Contact Information</h2>
        <p class="mb-3"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>Tehran, Iran</p>
        <p class="mb-3"><i class="bi bi-envelope-fill me-2 text-primary"></i>info@easyedu.academy</p>
        <p class="mb-3"><i class="bi bi-telephone-fill me-2 text-primary"></i>+98 900 000 0000</p>
        
        <h5 class="fw-bold mt-4 mb-3 text-primary">Follow Us</h5>
        <div>
          <a href="#" class="social-link me-2"><i class="bi bi-facebook"></i></a>
          <a href="#" class="social-link me-2"><i class="bi bi-instagram"></i></a>
          <a href="#" class="social-link me-2"><i class="bi bi-twitter"></i></a>
          <a href="#" class="social-link me-2"><i class="bi bi-telegram"></i></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== Map Section ===== -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold text-primary mb-4">Find Us Here</h2>
    <div class="ratio ratio-16x9">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.1359542548425!2d51.38901531525443!3d35.689197980193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8df1b9a0f3a3f3%3A0x21c21db7c0cb0c34!2sTehran%2C%20Iran!5e0!3m2!1sen!2sus!4v1699812345678!5m2!1sen!2sus" 
        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

@endsection
