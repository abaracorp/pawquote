<div class="card-container">
    <div class="heading">
        <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What's your <span class="pet-name"> dog </span> 's age?</h2>
        <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your <span class="pet-name"> pet's </span> age.
        </p>
    </div>

    <form action="">
        <div class="form-group">
            <label for="">  Pet Age</label>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="custom-select-wrapper">
                        <select name="petAgeYear" onchange="handleStepData('petAgeYear', 'select[name=petAgeYear]', 'petAgeError')" id="petAgeYear"class="c-dark f-16 f-w-4 freedoka">
                            <option value="0" class="c-light f-16 f-w-4 freedoka">0 Years
                            </option>
                            <option value="1" class="c-light f-16 f-w-4 freedoka">1 Years
                            </option>
                            <option value="2" class="c-light f-16 f-w-4 freedoka">2 Years
                            </option>
                            <option value="3" class="c-light f-16 f-w-4 freedoka">3 Years
                            </option>
                            <option value="4" class="c-light f-16 f-w-4 freedoka">4 Years
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 ">
                    <div class="custom-select-wrapper mb-0"> 
                        <select name="petAgeMonth" onchange="handleStepData('petAgeMonth', 'select[name=petAgeMonth]', 'petAgeError')" id="petAgeYear" class="c-dark f-16 f-w-4 freedoka">
                            <option value="0"  class="c-light f-16 f-w-4 freedoka">0 Months
                            </option>
                            <option value="1"  class="c-light f-16 f-w-4 freedoka">1 Months
                            </option>
                            <option value="2"  class="c-light f-16 f-w-4 freedoka">2 Months
                            </option>
                            <option value="3" selected class="c-light f-16 f-w-4 freedoka">3 Months
                            </option>
                            <option value="4" class="c-light f-16 f-w-4 freedoka">4 Months
                            </option>
                        </select>
                    </div>
                </div>
                <div id="petAgeError" class="error-message c-red f-14 f-w-4 freedoka" style="display: none;">
                    Sorry, pets must be at least 2 months old.
                </div>
            </div>
        </div>
    </form>
    
    <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
        <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">
            
            <x-icons.back />

            Back</button>
        <button onclick="validateAndNextStep(event, [{ selector: 'select[name=petAgeMonth]', errorId: 'petAgeError' }, { selector: 'select[name=petAgeMonth]', errorId: 'petAgeError' }])" class="next f-14 f-w-5 montserrat">
  Next
  <x-icons.next />
</button>

    </div>
</div>
