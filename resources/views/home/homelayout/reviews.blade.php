  <div class="lonyo-section-padding position-relative overflow-hidden">
      <div class="container">
          <div class="lonyo-section-title">
              <div class="row">
                  <div class="col-xl-8 col-lg-8">

                      @php
                          use App\Models\Title;
                          $title = Title::find(1);
                      @endphp

                      <h2 id="reviews-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                          data-id="{{ $title->id }}" class="hero-title">{{ $title->reviews }}</h2>

                  </div>
                  <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
                      <div class="lonyo-title-btn">
                          <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="lonyo-testimonial-slider-init">

          @php
              use App\Models\Review;
              $reviews = Review::latest()->take(10)->get(); // get 10 latest review
          @endphp
          @foreach ($reviews as $review)
              <div class="lonyo-t-wrap wrap2 light-bg">
                  <div class="lonyo-t-ratting">
                      <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
                  </div>
                  <div class="lonyo-t-text">
                      <p>"{{ $review->message }}"</p>
                  </div>
                  <div class="lonyo-t-author">
                      <div class="lonyo-t-author-thumb">
                          <img src="{{ asset($review->image ? $review->image : 'frontend/assets/images/logo/bastan.svg') }}"
                              alt="" style="width: 50px; hiegth:50px; border-radius:10%;">
                      </div>
                      <div class="lonyo-t-author-data">
                          <p>{{ $review->name }}</p>
                          <span>{{ $review->position }}</span>
                      </div>
                  </div>
              </div>
          @endforeach


      </div>

      <div class="lonyo-t-overlay2">
          <img src="{{ asset('frontend/assets/images/v2/overlay.png') }}" alt="">
      </div>
  </div>


  {{-- csrf-token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Reviews edit script --}}
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          const el = document.getElementById('reviews-title');
          const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

          const updateReviews = (value, id) => {
              fetch(`/edit-reviews/${id}`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': csrfToken
                      },
                      body: JSON.stringify({
                          reviews: value
                      })
                  })
                  .then(res => res.json())
                  .then(data => console.log('Saved:', data))
                  .catch(err => console.error('Error:', err));
          };

          el.addEventListener('blur', () => updateReviews(el.innerText, el.dataset.id));
          el.addEventListener('keydown', e => {
              if (e.key === 'Enter') {
                  e.preventDefault();
                  updateReviews(el.innerText, el.dataset.id);
                  el.blur();
              }
          });
      });
  </script>
