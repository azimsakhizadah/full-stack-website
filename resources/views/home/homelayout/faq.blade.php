  <div class="lonyo-section-padding4">
    <div class="container">
      <div class="lonyo-section-title center">
          @php
                  use App\Models\Title;
                  $title = Title::find(1);
                  $faqs = App\Models\Faq::all();
              @endphp
              <h2 id="answers-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                  data-id="{{ $title->id }}" class="hero-title">{{ $title->answers }}</h2>
      </div>
      <div class="lonyo-faq-shape"></div>
      <div class="lonyo-faq-wrap1">
        @foreach ($faqs as $faq)
          <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500">
          <div class="lonyo-faq-header">
            <h4>{{$faq->title}}</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
              <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>{{$faq->description}}</p>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
        <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
      </div>
    </div>
  </div>

    {{-- csrf-token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Answers edit script --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('answers-title');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const updateAnswers = (value, id) => {
        fetch(`/edit-answers/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ answers: value })
        })
        .then(res => res.json())
        .then(data => console.log('Saved:', data))
        .catch(err => console.error('Error:', err));
    };

    el.addEventListener('blur', () => updateAnswers(el.innerText, el.dataset.id));
    el.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            e.preventDefault();
            updateAnswers(el.innerText, el.dataset.id);
            el.blur();
        }
    });
});
</script>

