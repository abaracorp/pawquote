<div class="card-container">
    <div class="heading">
        <h2 class="f-32 c-dark f-w-6 l-h-38 freedoka">What's your <span class="pet-type"> dog </span>'s name?</h2>
        <p class="f-20 c-light f-w-4 l-h-38 montserrat">Let us know what to call your furry
            friend.
        </p>
    </div>
    <form action="">
        <div class="form-group">
            <label for="pet-name" class="f-18 c-dark f-w-4 freedoka">Pet Name</label>
            <input type="text" oninput="handleStepData('petName', 'input[name=petName]', 'petNameError')" name="petName" class="br-12" id="petName" placeholder="Your pet’s name..." required>
        </div>
         <p id="petNameError" class="f-14 c-red mt-2" style="display: none;">
        Please enter a valid pet name or tick the 'I don't have my pet yet' checkbox
        </p>
        <label class="check-container ">I don't have my pet yet
            <input 
                type="checkbox" 
                name="isHavePet" 
                value="1" 
                id="isHavePet"
                onclick="handleStepData('isHavePet', 'input[name=isHavePet]', 'petNameError'); handleIsHavePet(this);"
            >

            <span class="checkmark"></span>
        </label>
    </form>
    <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
        <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">
            <x-icons.back />
            Back</button>
        <button onclick="validateAndNextStep(event,[{ selector: 'input[name=petName]', errorId: 'petNameError' }])" class="next f-14 f-w-5 montserrat">Next
            <x-icons.next />
        </button>
    </div>
</div>
