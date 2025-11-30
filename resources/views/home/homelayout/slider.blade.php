  <div class="lonyo-hero-section light-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">
            @php
              use App\Models\Slider;
              $slider = Slider::first();
            @endphp
            <h1 id="slider-title" contenteditable="{{ auth()->check() ? 
            'true' : 'false'}}" data-id="{{ $slider->id }}" class="hero-title">{{ $slider->title}}</h1>
            
            <p id="slider-description" contenteditable="{{ auth()->check() ? 
            'true' : 'false'}}" data-id="{{ $slider->id }}" class="text">{{ $slider->description}}</p>
            
            <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
              <a href="{{$slider->link}}" class="lonyo-default-btn hero-btn">Let's Talk</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
            <img src="{{ $slider->image }}" alt="">
            <div class="lonyo-hero-shape">
              <img src="{{ asset('frontend/assets/images/shape/hero-shape1.svg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- slider edit script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const sliderTitle = document.getElementById('slider-title');
  const sliderDescription = document.getElementById('slider-description');

  function updateSlider(field, value, id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let data = {};
    data[field] = value;

    fetch(`/edit-slider/${id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify(data)
    })
    .then(async response => {
        const text = await response.text();
        try {
            return JSON.parse(text);
        } catch (e) {
            console.error("Server returned HTML instead of JSON:", text);
            throw e;
        }
    })
    .then(data => console.log('Saved:', data))
    .catch(error => console.error('Error:', error));
  }

  function handleEnterSave(element, field) {
    element.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        const id = this.dataset.id;
        const value = this.innerText;
        updateSlider(field, value, id);
        this.blur();
      }
    });
  }

  sliderTitle.addEventListener('blur', () => {
    updateSlider('title', sliderTitle.innerText, sliderTitle.dataset.id);
  });

  sliderDescription.addEventListener('blur', () => {
    updateSlider('description', sliderDescription.innerText, sliderDescription.dataset.id);
  });

  handleEnterSave(sliderTitle, 'title');
  handleEnterSave(sliderDescription, 'description');
});
</script>
