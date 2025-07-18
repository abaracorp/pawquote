@extends('frontend.master')
@section('title', 'Quote Steps')
@section('content')
<main id="get-quote-step">
  <section class="banner">

    <div class="hero ">
      <div class="container">
        <!-- Added Pet -->

        <span id="renderMultiplePets"></span>

        
        <!-- Progress Bar -->
        <div class="progress mb-3" role="progressbar">
          <div class="progress-bar" id="progressBar" style="width: 17%"></div>
        </div>

        <!-- Step Indicator -->
        <div class="step-indicator d-flex align-items-center justify-content-between mb-4">
          <p>Step <span id="stepNumber">1</span> of 6</p>
          <p><span id="stepPercent">17</span>% Complete</p>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">

          <div class="tab-pane fade show active" id="step1">

            @include('frontend.quote_steps.quote_step1')

          </div>

          <div class="tab-pane fade" id="step2">

            @include('frontend.quote_steps.quote_step2')

          </div>

          <div class="tab-pane fade" id="step3">

            @include('frontend.quote_steps.quote_step3',['breeds' => $breeds])

          </div>

          <div class="tab-pane fade" id="step4">

            @include('frontend.quote_steps.quote_step4')

          </div>
          <div class="tab-pane fade" id="step5">

            @include('frontend.quote_steps.quote_step5')

          </div>
          <div class="tab-pane fade" id="step6">

            @include('frontend.quote_steps.quote_step6')

          </div>
        </div>


      </div>
    </div>

  </section>
</main>

@push('scripts')

<script src="{{asset('js/pet.js')}}"></script>

<script>
  if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
    window.location.replace('/get-quote');
  }
</script>


@endpush


@endsection