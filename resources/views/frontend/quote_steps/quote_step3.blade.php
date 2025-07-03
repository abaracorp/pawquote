 <div class="card-container">
     <div class="heading">
         <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What breed of <span class="pet-type"> dog </span> is your <span class="pet-name"> pet </span> ?</h2>
         <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your <span class="pet-name"> pet </span>'s breed from the list.
         </p>
     </div>
     <form action="">
         <div class="custom-select-wrapper">
             <select class="custom-select c-dark f-16 f-w-4 freedoka" onclick="handleStepData('selectPetBreed', 'select[name=selectPetBreed]', 'petBreedError')" name="selectPetBreed" id="selectPetBreed">

                {{-- @foreach ( as )
                     <option class="c-light f-16 f-w-4 freedoka">Rottweiler</option>
                @endforeach --}}
                 <option class="c-light f-16 f-w-4 freedoka" value="">Select Breed</option>
                 <option class="c-light f-16 f-w-4 freedoka" value="1">Doberman Pinscher</option>
                 <option class="c-light f-16 f-w-4 freedoka" value="2">Boxer</option>
                 <option class="c-light f-16 f-w-4 freedoka" value="3">Siberian Husky</option>
                 <option class="c-light f-16 f-w-4 freedoka" value="4">Alaskan Malamute</option>
             </select>
         </div>
            <p id="petBreedError" class="f-14 c-red mt-2" style="display: none;">
                Please select breed of your Pet.
            </p>
     </form>

     <div class="bottom-buttons d-flex align-items-center justify-content-between mt-5">
         <button onclick="changeStep(-1)" class="back f-14 f-w-5 montserrat">
            <x-icons.back />
             Back</button>
             
         <button onclick="validateAndNextStep(event,[{ selector: 'select[name=selectPetBreed]', errorId: 'petBreedError' }])" class="next f-14 f-w-5 montserrat">Next
            <x-icons.next />
         </button>
     </div>

 </div>
