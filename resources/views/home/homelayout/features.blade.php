
  <div class="lonyo-section-padding2 position-relative">
      <div class="container">
          <div class="lonyo-section-title center">

              @php
                  use App\Models\Title;
                  use App\Models\Feature;
                  $title = Title::find(1);
                  $features = Feature::latest()->take(6)->get();
              @endphp

              <h2 id="features-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                  data-id="{{ $title->id }}" class="hero-title">{{ $title->features }}</h2>

          </div>
          <div class="row">
            @foreach ($features as $feature)
                 <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="500">
                      <div class="lonyo-service-title">
                          <h4>{{$feature->title}}</h4>
                          <img src="{{ $feature->image }}" alt="">
                      </div>
                      <div class="lonyo-service-data">
                          <p>{{$feature->description}}</p>
                      </div>
                  </div>
              </div>
            @endforeach
            
          </div>
      </div>
      <div class="lonyo-feature-shape"></div>
  </div>


  {{-- csrf-token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Features edit script --}}
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          const el = document.getElementById('features-title');
          const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

          const updateFeatures = (value, id) => {
              fetch(`/edit-features/${id}`, {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': csrfToken
                      },
                      body: JSON.stringify({
                          features: value
                      })
                  })
                  .then(res => res.json())
                  .then(data => console.log('Saved:', data))
                  .catch(err => console.error('Error:', err));
          };

          el.addEventListener('blur', () => updateFeatures(el.innerText, el.dataset.id));
          el.addEventListener('keydown', e => {
              if (e.key === 'Enter') {
                  e.preventDefault();
                  updateFeatures(el.innerText, el.dataset.id);
                  el.blur();
              }
          });
      });
  </script>
