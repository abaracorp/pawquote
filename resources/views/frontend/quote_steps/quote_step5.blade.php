<div class="card-container">
  <div class="heading">
    <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What's your <span class="pet-name"> dog </span> 's age?</h2>
    <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your <span class="pet-name"> pet's </span> age.
    </p>
  </div>

  <form action="">
    <div class="form-group">
      <label for=""> Pet Age</label>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="custom-select-wrapper">
            <select name="petAgeYear" onchange="handleStepData('petAgeYear', 'select[name=petAgeYear]', 'petAgeError')"
              id="petAgeYear" class="c-dark f-16 f-w-4 freedoka">
              @for ($i = 0; $i <= 20; $i++) <option value="{{ $i }}" class="c-light f-16 f-w-4 freedoka">{{ $i }} Years
                </option>
                @endfor

            </select>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 ">
          <div class="custom-select-wrapper mb-0">
            <select name="petAgeMonth"
              onchange="handleStepData('petAgeMonth', 'select[name=petAgeMonth]', 'petAgeError')" id="petAgeMonth"
              class="c-dark f-16 f-w-4 freedoka">
              @for ($i = 0; $i <= 11; $i++) <option value="{{ $i }}" class="c-light f-16 f-w-4 freedoka" {{ $i==3
                ? 'selected' : '' }}>
                {{ $i }} Months
                </option>
                @endfor

            </select>
          </div>
        </div>
        <div id="petAgeError" class="error-message c-red f-14 f-w-4 freedoka" style="display: none;">
          Sorry, pets must be at least 2 months old.
        </div>
      </div>
    </div>
    <a href="" class="another-pet">
      <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M17.5013 5.83366C23.934 5.83366 29.168 11.0676 29.168 17.5003C29.168 23.933 23.934 29.167 17.5013 29.167C11.0686 29.167 5.83464 23.933 5.83464 17.5003C5.83464 11.0676 11.0686 5.83366 17.5013 5.83366ZM17.5013 2.91699C9.44693 2.91699 2.91797 9.44595 2.91797 17.5003C2.91797 25.5547 9.44693 32.0837 17.5013 32.0837C25.5557 32.0837 32.0846 25.5547 32.0846 17.5003C32.0846 9.44595 25.5557 2.91699 17.5013 2.91699ZM24.793 16.042H18.9596V10.2087H16.043V16.042H10.2096V18.9587H16.043V24.792H18.9596V18.9587H24.793V16.042Z"
          fill="#566369" />
      </svg>
      <span class="content">
        <h3 class="f-24 c-dark f-w-5 freedoka mb-0">Want to add a another pet ?</h3>
        <p class="f-16 c-light f-w-4 freedoka mb-0">Save up to 10% on a plan for each additional pet you enroll</p>
      </span>
    </a>
  </form>
  <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
    <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">

      <x-icons.back />

      Back</button>
    <button
      onclick="validateAndNextStep(event, [{ selector: 'select[name=petAgeMonth]', errorId: 'petAgeError' }, { selector: 'select[name=petAgeMonth]', errorId: 'petAgeError' }])"
      class="next f-14 f-w-5 montserrat">
      Next
      <x-icons.next />
    </button>

  </div>
</div>