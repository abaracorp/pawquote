<div class="card-container">
    <div class="heading">
        <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">Let Us Know How to Reach You</h2>
        <p class="f-20 c-light f-w-4 l-h-38 montserrat">We'll send your quotes to this email
            address.
        </p>
    </div>

    <form action="">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="" oninput="handleStepData('email', 'input[name=email]', 'emailError')" id="email" name="email" placeholder="Your Email Address">
        </div>
        <p id="emailError" class="f-14 c-red mt-2" style="display: none;">
        Please enter a valid email address so we can reach you.
        </p>
        <div class="form-group">
            <label for="phone">Phone Number (Optional)</label>
            <input type="text" class="" oninput="handleStepData('phone', 'input[name=phone]', 'emailError')" id="phone" name="phone" placeholder="Your Phone Number (optional)">
            <p class="c-light f-12 montserrat mb-0">Providing your phone number allows us to
                send you important updates via call or SMS.</p>
        </div>
        <p id="phoneError" class="f-14 c-red mt-2" style="display: none;">
        Please enter a valid phone number .
        </p>
    </form>
    <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
        <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">

            <x-icons.back />

            Back</button>


        <button onclick="validateAndNextStep(event, [{ selector: 'input[name=email]', errorId: 'emailError' }, { selector: 'input[name=phone]', errorId: 'phoneError' }])" class="next f-14 f-w-5 montserrat">

        See Results
                <x-icons.next />
        </button>
    </div>
</div>
