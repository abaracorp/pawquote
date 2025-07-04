 <div class="card-container">
     <div class="heading">
         <h2 class="f-32 c-dark f-w-5 l-h-38 freedoka">What breed of <span class="pet-type"> dog </span> is your <span class="pet-name"> pet </span> ?</h2>
         <p class="f-20 c-light f-w-4 l-h-38 montserrat">Select your <span class="pet-name"> pet </span>'s breed from the list.
         </p>
     </div>
     <form action="">
         <div class="custom-select-wrapper">
             <select class="custom-select c-dark f-16 f-w-4 freedoka" onchange="updateDataOfSelect2(this)"  name="selectPetBreed" id="selectPetBreed">

              

                @php
                    $grouped = collect($breeds)->groupBy(function ($item) {
                        return empty($item['group']) ? 'Domestic/Mixed Breeds' : $item['group'];
                    });
                @endphp

                @foreach ($grouped as $groupLabel => $groupBreeds)
                    <optgroup label="{{ $groupLabel }}">
                        @foreach ($groupBreeds as $breed)
                            <option 
                                value="{{ $breed['value'] }}"
                                data-type="{{ $breed['type'] }}"
                                @if (!empty($breed['breedType'])) data-breed-type="{{ $breed['breedType'] }}" @endif
                            >
                                {{ $breed['text'] }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach

                 
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
             
         <button onclick="validateAndNextStep(event,[{ selector: 'select[name=selectPetBreed]', errorId: 'petBreedError' }]); " class="next f-14 f-w-5 montserrat">Next
            <x-icons.next />
         </button>
     </div>

 </div>
