<div class="accordion" id="faqAccordion">


    @forelse ($faqs as $key => $faq)
        
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button c-dark f-22  f-w-5 freedoka  @if (!$loop->first)  collapsed @endif " type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{ $key }}" aria-expanded="true"
                    aria-controls="collapse-{{ $key }}">
                    {{ $faq->question_text }}
                </button>
            </h2>
            <div id="collapse-{{ $key }}"
                class="accordion-collapse collapse @if ($loop->first) show @endif"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <span class=" c-light f-18  f-w-5 montserrat ">{!! $faq->content !!}</span>
                </div>
            </div>
        </div>

    @empty
    
    <h5>No Faq Found</h5>

    @endforelse

</div>
