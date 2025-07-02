<div class="card-container dog-cat">
    <div class="heading">
        <h2 class="f-32 c-dark f-w-6 l-h-38 freedoka">Would you like a dog or cat quote?</h2>
        <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select the type of pet you want to
            insure.
        </p>
    </div>
    <div class="choose-content">
        <div class="pet-card pet-card1 selected b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
            
            <x-icons.dog />

            <label class="radio-container">Dog <input type="radio" onclick="handleStepData('petType', 'input[name=petType]:checked', '')" checked id="radioDog" name="petType" value="0"> <span
                    class="checkmark"></span>
            </label>
        </div>
        <div class="pet-card pet-card1  b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
            
            <x-icons.cat />

            <label class="radio-container">Cat <input onclick="handleStepData('petType', 'input[name=petType]:checked', '')" type="radio" id="radioCat" name="petType" value="1"> <span
                    class="checkmark"></span>
            </label>
        </div>
    </div>
    {{-- <p id="petTypeError" class="f-14 c-red mt-2" style="display: none;">
    Please select Dog or Cat before proceeding.
    </p> --}}

    <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
        <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">
            <x-icons.back />
            Back</button>
        <button onclick="validateAndNextStep(event)" class="next f-14 f-w-5 montserrat">Next
            <x-icons.next />
        </button>
    </div>

</div>
