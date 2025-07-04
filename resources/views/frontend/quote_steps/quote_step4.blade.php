<div class="card-container gender">
    <div class="heading">
        <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What is the gender of your <span class="pet-name"> pet </span> ?</h2>
        <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your <span class="pet-name"> pet </span>'s gender.
        </p>
    </div>
    <div class="card-pet b-blue-2 br-16">

       

        <div id="dog-Icon" style="display: none;">
        <x-icons.dog />
        <span class="c-light f-16 f-w-4 freedoka">Dog</span>
        </div>
        <div id="cat-Icon" style="display: none;">
            <x-icons.cat />
            <span class="c-light f-16 f-w-4 freedoka">Cat</span>
        </div>


    </div>
    <div class="choose-gender-card d-flex gap-3">
        <div
            class="pet-card pet-card4 selected b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
            <label class="radio-container">Male <input onclick="handleStepData('radioCatGender', 'input[name=radioCatGender]:checked', '')" type="radio" checked id="radioDogGender" name="radioCatGender" value="0"> <span
                    class="checkmark"></span>
            </label>
        </div>
        <div class="pet-card pet-card4 b-blue br-16 d-flex align-items-center justify-content-center flex-column gap-3">
            <label class="radio-container">Female <input onclick="handleStepData('radioCatGender', 'input[name=radioCatGender]:checked', '')" type="radio" id="radioCatGender" name="radioCatGender" value="1"> <span
                    class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
        <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">
            
            <x-icons.back />

            

            Back</button>
        <button onclick="validateAndNextStep(event)" class="next f-14 f-w-5 montserrat">Next
            <x-icons.next />
        </button>
    </div>

</div>
