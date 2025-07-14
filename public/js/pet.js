const petType = {
    0: 'dog',
    1: 'cat'
};

function getPetType(val) {

    return petType[val] || '';

}



let currentPetIndex = 0;

    const formData = {
        email: '',
        phone: '',
        pets: [
            {
                petName: '',
                petType: 0,
                isHavePet: 0,
                radioCatGender: 0,
                petAgeYear: 0,
                petAgeMonth: 3,
                selectPetBreed: ''
            }
        ]
    };

function validateField(fieldEl, selector) {

    if (!fieldEl) {
        return { isValid: false, message: 'Field not found.' };
    }

    const value = fieldEl.value.trim(); 

    if (fieldEl.type === 'checkbox') {
        return fieldEl.checked
            ? { isValid: true }
            : { isValid: false, message: 'Please check this box to continue.' };
    }

    if (
        selector === 'select[name=petAgeYear]' ||
        selector === 'select[name=petAgeMonth]'
    ) {
        const year = parseInt(document.querySelector('select[name=petAgeYear]')?.value || 0);
        const month = parseInt(document.querySelector('select[name=petAgeMonth]')?.value || 0);
        const totalMonths = year * 12 + month;

        return totalMonths >= 2
            ? { isValid: true }
            : { isValid: false, message: 'Pets must be at least 2 months old.' };
    }

    if (selector.includes('petName')) {
        if (value === '') {
            return { isValid: false, message: `Please enter a valid pet name or tick the 'I don't have my pet yet' checkbox` };
        }
    }

    if (selector.includes('selectPetBreed')) {
        if (value === '') {
            return { isValid: false, message: `Please select breed of your Pet` };
        }
    }

    if (fieldEl.type === 'email' || selector.includes('email')) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (value === '') {
            return { isValid: false, message: `Email field is required` };
        } else {
            return emailRegex.test(value)
                ? { isValid: true }
                : { isValid: false, message: 'Please enter a valid email address.' };
        }
    }

    if (selector.includes('phone')) {
        if (value.trim() === '') {
            return { isValid: true }; 
        }

        const usPhoneRegex = /^(?:\+1\s?)?(?:\(?\d{3}\)?[\s.-]?)?\d{3}[\s.-]?\d{4}$/;

        return usPhoneRegex.test(value.trim())
            ? { isValid: true }
            : { isValid: false, message: 'Please enter a valid phone number.' };
    }

    return { isValid: true };
}



function showOrHideError(isValid, errorEl) {
    if (!errorEl) return;
    errorEl.style.display = isValid ? 'none' : 'block';
}


function handleStepData(fieldName, selector, errorId) {
    const input = document.querySelector(selector);
    const errorEl = errorId ? document.getElementById(errorId) : null;

    if (!input) return;

    const { isValid, message } = validateField(input, selector);

    if (!formData.pets[currentPetIndex]) {
        formData.pets[currentPetIndex] = {};
    }

    if (isValid) {
        if (fieldName === 'email' || fieldName === 'phone') {
            formData[fieldName] = input.value;
        } else {
            formData.pets[currentPetIndex][fieldName] = input.value;
        }
    } else {
        if (fieldName === 'email' || fieldName === 'phone') {
            delete formData[fieldName];
        } else {
            delete formData.pets[currentPetIndex][fieldName];
        }
    }

    showOrHideError(isValid, errorEl);
    updatePetDataHTML();

    if (fieldName === "petType") {
        select2Options(getPetType(input.value));
    }
}


function updateDataOfSelect2(input) {
    const el = document.querySelector(`#${input.id}`);
    const error = document.querySelector(`#petBreedError`);

    if (!el) {
        console.warn("Select2 element not found!");
        return;
    }

    const selectedValue = el.value;

    if (!formData.pets[currentPetIndex]) {
        formData.pets[currentPetIndex] = {};
    }

    formData.pets[currentPetIndex]['selectPetBreed'] = selectedValue;

    console.log("Updated formData:", formData);

    if (selectedValue && error) {
        error.style.display = 'none';
    }
}



function validateAndNextStep(e, fields = []) {
    e.preventDefault();

    if (fields.length === 0) {
        changeStep(1);
        return;
    }

    let hasError = false;

    fields.forEach(({ selector, errorId }) => {
        const fieldEl = document.querySelector(selector);
        const errorEl = document.getElementById(errorId);

        const { isValid, message } = validateField(fieldEl, selector);

        if (errorEl) {
            if (!isValid) {
                errorEl.textContent = message || 'This field is required.';
                errorEl.style.display = 'block';
                hasError = true;
            } else {
                errorEl.style.display = 'none';
            }
        }
    });

    if (!hasError) {
        changeStep(1);
    }
}


function updatePetDataHTML() {
    const pet = formData.pets[currentPetIndex];

    const petNameEls = document.getElementsByClassName('pet-name');
    for (let el of petNameEls) {
        el.innerHTML = pet?.isHavePet != 1 ? pet?.petName || '' : 'pet';
    }

    const petTypeEls = document.getElementsByClassName('pet-type');
    for (let el of petTypeEls) {
        el.innerHTML = getPetType(pet?.petType);
    }

    togglePetIcon(getPetType(pet?.petType));
}


function togglePetIcon(type) {
    const types = ['dog', 'cat'];

    types.forEach(petType => {
        const icon = document.getElementById(`${petType}-Icon`);
        if (icon) {
            icon.style.display = petType === type ? 'block' : 'none';
        }
    });

    
}

let allSelectOptions = [];

$(document).ready(function () {
    const $select = $('#selectPetBreed');

    $select.select2({
        placeholder: 'Start typing or select breed...',
        allowClear: true
    });

    allSelectOptions = $select.children().clone();

    select2Options('dog');
});



function select2Options(petType) {


    console.log("hit");
    

    const $select = $('#selectPetBreed');
    $select.empty(); // clear existing options

    
    allSelectOptions.each(function () {
        if (this.tagName === 'OPTGROUP') {
            const $optgroup = $('<optgroup>').attr('label', $(this).attr('label'));
            const matchingOptions = $(this)
                .children('option')
                .filter(function () {
                    return $(this).data('type') === petType || $(this).val() === "";
                });

            if (matchingOptions.length > 0) {
                $optgroup.append(matchingOptions.clone());
                $select.append($optgroup);
            }
        } else if (this.tagName === 'OPTION') {
           
            if ($(this).data('type') === petType || $(this).val() === "") {
                $select.append($(this).clone());
            }
        }
    });

   
    $select.select2({
        placeholder: 'Start typing or select breed...',
        allowClear: true
    });

    $select.val(null).trigger('change');
}


function handleIsHavePet(checkbox) {
    const input = document.getElementById('petName');

    if (checkbox.checked) {
        input.setAttribute('readonly', true);
        input.value = "Your Pet Name"
        formData['isHavePet'] = 1;

    } else {
        input.removeAttribute('readonly');
        input.value = "";
        delete formData['isHavePet'];
    }
}


let currentStep = 1;
const initialSteps = 6;
const totalSteps = 7;

function showStep(step) {
    document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
    document.querySelector(`#step${step}`).classList.add('show', 'active');

    document.getElementById('stepNumber').textContent = step;
    document.getElementById('stepPercent').textContent = Math.round((step / initialSteps) * 100);
    document.querySelector('.progress-bar').style.width = `${Math.round((step / initialSteps) * 100)}%`;

  
    const header = document.querySelector('.heading');
    header.style.display = (step === 1) ? 'block' : 'none';

    
}

function changeStep(direction) {
    currentStep += direction;
    if (currentStep < 1) currentStep = 1;
    if (currentStep > totalSteps) currentStep = totalSteps;

    if (currentStep === 7) {
        sendStepSevenAjax();
    } else {
        if (currentStep === 1) {
            renderPetForm(currentPetIndex);
        }
        showStep(currentStep);
    }
}


document.addEventListener('DOMContentLoaded', () => {
    showStep(currentStep);
});


function addAnotherPet() {

    const petAgeErrorEl = document.getElementById('petAgeError');

    if (petAgeErrorEl && getComputedStyle(petAgeErrorEl).display === 'block') {
        return; 
    }

    formData.pets.push({
        petName: '',
        petType: 0,
        isHavePet: 0,
        radioCatGender: 0,
        petAgeYear: 0,
        petAgeMonth: 3,
        selectPetBreed: ''
    });

    currentPetIndex = formData.pets.length - 1;

    renderPetList();            
    renderPetForm(currentPetIndex); 
    currentStep = 1;
    showStep(currentStep);

}

// function renderPetForm(index) {
//     const pet = formData.pets[index] || {};

//     document.querySelector('input[name="petName"]').value = pet.petName || '';
//     document.querySelector('select[name="petAgeYear"]').value = pet.petAgeYear || 0;
//     document.querySelector('select[name="petAgeMonth"]').value = pet.petAgeMonth || 0;

    
//     const petTypeRadios = document.querySelectorAll('input[name="petType"]');
//     petTypeRadios.forEach(radio => {
//         radio.checked = parseInt(radio.value) === parseInt(pet.petType || 0);
//     });

//     const genderRadios = document.querySelectorAll('input[name="radioCatGender"]');
//     genderRadios.forEach(radio => {
//         radio.checked = parseInt(radio.value) === parseInt(pet.radioCatGender || 0);
//     });

//     $('#selectPetBreed').val(pet.selectPetBreed || '').trigger('change');

//     if (parseInt(pet.isHavePet) === 1) {
//         document.getElementById('petName').setAttribute('readonly', true);
//         document.getElementById('petName').value = "Your Pet Name";
//     } else {
//         document.getElementById('petName').removeAttribute('readonly');
//     }

//     select2Options(getPetType(pet.petType || 0));
//     updatePetDataHTML();
// }

function renderPetForm(index) {
    const pet = formData.pets[index] || {};

    document.querySelector('input[name="petName"]').value = pet.petName || '';
    document.querySelector('select[name="petAgeYear"]').value = pet.petAgeYear || 0;
    document.querySelector('select[name="petAgeMonth"]').value = pet.petAgeMonth || 0;
    

    document.querySelectorAll('input[name="petType"]').forEach(radio => {
        const isMatch = +radio.value === +(pet.petType || 0);
        radio.checked = isMatch;
        radio.closest('label')?.classList.toggle('selected', isMatch);
    });

    document.querySelectorAll('input[name="radioCatGender"]').forEach(radio => {
        const isMatch = +radio.value === +(pet.radioCatGender || 0);
        radio.checked = isMatch;
        radio.closest('label')?.classList.toggle('selected', isMatch);
    });

    // document.querySelectorAll('input[name="radioCatGender"]').forEach(radio => {
    //     radio.checked = +radio.value === +(pet.radioCatGender || 0);
    // });

    $('#selectPetBreed').val(pet.selectPetBreed || '').trigger('change');

    const petNameInput = document.getElementById('petName');
    const isHavePet = document.getElementById('isHavePet');
    isHavePet.checked = false;

    if (+pet.isHavePet === 1) {
        petNameInput.readOnly = true;
        petNameInput.value = "Your Pet Name";
    } else {
        petNameInput.readOnly = false;
    }

    select2Options(getPetType(pet.petType || 0));
    updatePetDataHTML();
}


function renderPetList() {
    const container = document.getElementById('renderMultiplePets');
    if (!container) return;

    container.innerHTML = ''; 

    let html = `
    <div class="add-pet">
        <h1 class="f-32 c-dark f-w-5 freedoka">Added Pets</h1>
        <div class="inner">
    `;

    // Only render pets except the last one (used for editing/filling)
    for (let index = 0; index < formData.pets.length - 1; index++) {
        const pet = formData.pets[index];
        const petName = pet.isHavePet == 1 ? 'Pet' : (pet.petName || 'Unnamed');
        const breed = pet.selectPetBreed || 'Unknown Breed';
        const gender = parseInt(pet.radioCatGender) === 1 ? 'Female' : 'Male';
        const ageStr = `${pet.petAgeYear ?? 0} year${pet.petAgeYear !== 1 ? 's' : ''} ${pet.petAgeMonth ?? 0} month${pet.petAgeMonth !== 1 ? 's' : ''}`;

        html += `
            <div class="pet-detail">
                <div class="leftside">
                    ${getPetSvg(pet.petType)}
                    <div class="content">
                        <h3 class="name f-20 c-dark f-w-4 freedoka mb-0">${petName}</h3>
                        <ul>
                            <li>${breed}</li>
                            <li>${gender}</li>
                            <li>${ageStr}</li>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void(0)" onclick="removePet(${index})" class="remove-pet f-16 c-light f-w-4 freedoka">
                    Remove pet
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.3333 3.33301C13.5101..." fill="currentColor" />
                    </svg>
                </a>
            </div>
        `;
    }

    html += `
        </div>
    </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}



function removePet(index) {
    formData.pets.splice(index, 1);

    
    if (currentPetIndex >= formData.pets.length) {
        currentPetIndex = formData.pets.length - 1;
    }

    
    if (formData.pets.length > 0) {
        renderPetForm(currentPetIndex);
        showStep(1);
    } else {
        document.getElementById('renderMultiplePets').innerHTML = '';
        currentPetIndex = 0;
    }

    renderPetList();
}


async function sendStepSevenAjax() {

    const formDataFixed = {
    ...formData,
    pets: JSON.stringify(formData.pets)  // Convert array/object to string manually
    };

// body: new URLSearchParams(formDataFixed)

    try {
        const res = await fetch(`${baseUrl}/save-quote-steps-data`, {
            method: 'POST',
            headers: {
                // 'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            // body: JSON.stringify({ formData })
            body: new URLSearchParams(formDataFixed)
        });

        const data = await res.json();

         if (data.success && data.uuid) {
            window.location.href = `${baseUrl}/quote-allresults/${data.uuid}`;
        } else {
            throw new Error('UUID missing in response');
        }

    } catch (err) {
       console.error('Error saving quote:', err);
    }
}

// for showing background color on selected radio input tags

document.querySelectorAll('.pet-card1').forEach(card => {
    card.addEventListener('click', () => {

        document.querySelectorAll('.pet-card1').forEach(c => c.classList.remove('selected'));

        card.classList.add('selected');
        const radio = card.querySelector('input[type="radio"]');
        if (radio) radio.checked = true;
    });
});

document.querySelectorAll('.pet-card4').forEach(card => {
    card.addEventListener('click', () => {

        document.querySelectorAll('.pet-card4').forEach(c => c.classList.remove('selected'));


        card.classList.add('selected');


        const radio = card.querySelector('input[type="radio"]');
        if (radio) radio.checked = true;
    });
});

function getPetSvg(type) {
    if (type == 0) {
        // Dog SVG
        return `
       <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M31.88 9.98571C17.335 9.61071 12.625 20.8707 12.265 25.0957C11.985 28.3807 10.575 40.3957 17.425 48.4657C20.96 52.6307 26.625 54.7057 32.63 54.5657C38.685 54.4257 44.155 53.2207 47.835 48.3707C54.03 40.2057 53.37 28.0057 52.53 24.0607C51.74 20.3907 48.675 10.4157 31.88 9.98571Z"
                    fill="#FEA145" />
                <path
                    d="M48.4098 32.2157C48.9248 36.1207 47.2298 39.8457 42.7648 40.1107C38.6798 40.3557 36.1598 37.7507 35.9598 33.9157C35.7548 29.9857 37.9048 26.3307 41.3198 25.9557C44.9248 25.5607 47.8998 28.3107 48.4098 32.2157Z"
                    fill="white" />
                <path
                    d="M9.45057 13.3603C9.45057 13.3603 4.53557 15.2853 3.35057 18.1453C1.75557 21.9953 2.49057 29.6353 3.35057 32.6003C4.19557 35.5103 6.44557 38.5153 9.92057 38.4203C13.3956 38.3253 16.4456 34.8053 17.5206 30.2103C18.6006 25.6103 18.8356 17.7303 19.1606 16.3203C19.4856 14.9103 20.0506 13.7853 20.0506 13.7853C20.0506 13.7853 15.7356 9.60533 9.45057 13.3603ZM50.6056 12.7503C50.6056 12.7503 57.2706 12.9853 58.8656 13.6903C60.4606 14.3953 61.9156 17.5853 61.7756 21.8553C61.6356 26.1253 61.3556 33.0303 59.1956 35.4153C57.4106 37.3853 53.8006 37.5253 51.7806 35.0853C49.7606 32.6453 48.4956 28.5153 48.0256 25.8403C47.5556 23.1653 46.7606 19.6953 46.2406 18.1453C45.7256 16.5953 44.4556 13.5003 43.8006 12.7953C43.1406 12.0953 44.4556 11.4353 50.6056 12.7503Z"
                    fill="#FFE5CC" />
                <path
                    d="M14.9847 11.1555C11.3697 10.9255 5.40972 13.7855 4.18972 16.7405C2.96972 19.6955 3.68472 29.2855 4.70972 32.0855C5.78972 35.0405 8.03972 38.7505 11.9347 35.5605C15.8297 32.3705 16.8597 24.3455 17.2397 21.7655C17.6147 19.1855 18.1297 16.0405 18.6947 15.3855C19.2597 14.7305 20.0547 13.7905 20.0547 13.7905C20.0547 13.7905 19.4447 11.4355 14.9847 11.1555ZM51.3997 10.5455C54.7947 10.7805 58.4847 12.0455 59.8447 15.0055C61.2047 17.9605 60.6897 24.9555 60.1747 28.2855C59.6597 31.6155 58.4397 35.0905 55.3897 34.7155C52.3397 34.3405 50.7897 30.2105 49.8547 26.3155C48.9147 22.4205 47.9297 18.5255 46.7097 15.7105C45.9747 14.0105 43.4247 12.7555 43.4247 12.7555C43.4247 12.7555 44.5497 10.0755 51.3997 10.5455Z"
                    fill="#FEA145" />
                <path
                    d="M25.2495 33.8442C25.0495 35.5542 24.1695 36.9342 22.2595 36.7342C20.9045 36.5892 19.9945 34.9742 20.1945 33.2592C20.3945 31.5492 20.9895 30.3192 22.5895 30.3492C25.0745 30.3942 25.4495 32.1292 25.2495 33.8442ZM44.8695 33.3642C44.9495 35.0842 44.2695 36.5542 42.2845 36.6992C40.5595 36.8242 39.6745 35.3292 39.5995 33.6092C39.5195 31.8892 40.3745 30.5092 42.0195 30.3042C44.1545 30.0292 44.7895 31.6442 44.8695 33.3642ZM37.5595 42.0342C37.6395 43.7542 36.4795 45.3642 32.8645 45.3192C29.3445 45.2742 28.0645 43.8492 27.9845 42.1292C27.9045 40.4092 29.9045 38.8642 32.7695 38.7992C36.7145 38.6992 37.4795 40.3092 37.5595 42.0342Z"
                    fill="black" />
                <path
                    d="M29.5801 48.9793C29.5801 48.9793 30.0051 53.0643 30.4251 54.2843C31.3151 56.8643 35.0651 56.4343 35.7301 54.0043C36.2951 51.9393 35.9201 48.3743 35.9201 48.3743L32.5901 47.9043L29.5801 48.9793Z"
                    fill="#E94B8C" />
                <path
                    d="M32.9801 50.3403C32.3951 50.3653 32.4151 50.9053 32.4151 52.1453C32.4151 53.3903 32.4851 54.1403 33.0501 54.1153C33.6151 54.0903 33.5451 53.1303 33.5451 52.2403C33.5451 51.3503 33.5901 50.3153 32.9801 50.3403Z"
                    fill="#EF87B2" />
                <path
                    d="M25.0746 45.1044C24.3996 46.0994 25.7096 46.9794 26.7896 47.7094C27.8696 48.4344 29.1796 49.5394 30.7296 49.5144C32.4646 49.4894 32.9346 48.3194 32.9346 48.3194C32.9346 48.3194 33.4996 49.7044 35.9596 49.4444C37.2746 49.3044 38.8946 47.8294 39.3846 47.4994C40.3246 46.8644 41.4496 46.0694 40.9546 45.4094C40.3896 44.6544 39.1946 45.6694 37.9746 46.2994C36.7546 46.9344 36.3346 47.2394 35.4196 47.2394C34.5046 47.2394 33.8696 46.8644 33.8246 45.3394C33.7846 44.0944 33.7996 43.8594 33.7996 43.8594H31.7096C31.7096 43.8594 31.7796 45.1744 31.7796 45.5494C31.7796 46.5344 31.2646 46.9594 30.2796 47.0044C29.2946 47.0494 28.2396 46.2294 27.7196 45.9244C27.2096 45.6244 25.6146 44.3094 25.0746 45.1044Z"
                    fill="black" />
            </svg>
        `;
    } else if (type == 1) {
        // Cat SVG
        return `
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M57.3352 35.0954C56.3552 22.1104 47.2202 13.1504 32.0002 13.1504C16.7802 13.1504 7.62522 22.6654 6.72522 35.6554C6.20022 43.2254 9.01522 49.9704 14.6802 53.8154C18.4102 56.3504 23.6202 57.7554 32.0652 57.7554C40.6552 57.7554 45.5802 55.9004 49.3102 53.3904C55.5252 49.2154 57.9002 42.5554 57.3352 35.0954Z"
                    fill="#FEA145" />
                <path
                    d="M26.8602 21.2998C23.1502 11.6998 15.0502 5.16982 11.9352 4.19482C10.7602 3.82482 9.28519 3.78982 8.62019 4.86982C6.94019 7.59482 4.79019 16.3448 9.54519 28.7598L26.8602 21.2998Z"
                    fill="#FEA145" />
                <path
                    d="M18.0605 17.1052C18.8305 16.4602 19.2055 15.8302 18.3605 14.5252C17.0505 12.5002 14.6955 10.1352 13.7805 9.41025C12.2805 8.22025 11.1205 7.82025 10.6755 9.73525C9.85045 13.2752 9.91545 18.0802 10.8005 20.7302C11.1105 21.6652 12.0705 22.1602 12.8105 21.5152L18.0605 17.1052Z"
                    fill="white" />
                <path
                    d="M27.0602 22.5103C27.6252 22.9903 28.7702 22.9203 29.4352 22.1503C30.2402 21.2153 31.0802 18.0653 30.5552 13.1953C28.2202 13.2803 26.0102 13.6153 23.9502 14.1803C25.6152 16.9103 26.0152 21.6203 27.0602 22.5103ZM36.9402 22.5103C36.3752 22.9903 35.2302 22.9203 34.5652 22.1503C33.7602 21.2153 32.9202 18.0653 33.4452 13.1953C35.7802 13.2803 37.9902 13.6153 40.0502 14.1803C38.3852 16.9103 37.9852 21.6203 36.9402 22.5103Z"
                    fill="#FFE5CC" />
                <path
                    d="M39.9502 14.6101C43.9902 8.40514 49.6402 4.23514 51.9852 3.49014C53.1452 3.12014 54.4952 3.18014 55.1552 4.26514C56.8152 6.99014 58.2202 15.3851 54.9452 27.1401L42.9802 21.3701L39.9502 14.6101Z"
                    fill="#FEA145" />
                <path
                    d="M48.7746 19.1145C49.9896 20.3295 50.9796 21.1445 51.6946 21.9195C52.1696 22.4345 53.0396 22.1995 53.1796 21.5095C54.4046 15.6095 54.0146 10.5795 53.1796 9.25948C52.7796 8.62948 52.0346 8.46448 51.3546 8.69448C50.1346 9.09948 47.0246 11.4195 44.8296 14.8045C44.5746 15.1995 44.6696 15.7295 45.0596 15.9945C45.8496 16.5295 47.2296 17.5645 48.7746 19.1145Z"
                    fill="white" />
                <path
                    d="M27.8352 38.8757C27.8102 37.3357 30.0202 36.6007 32.1052 36.5657C34.1952 36.5307 36.4452 37.2107 36.4702 38.7507C36.4952 40.2907 33.8602 42.3157 32.2002 42.3157C30.5452 42.3157 27.8652 40.4107 27.8352 38.8757Z"
                    fill="black" />
                <path
                    d="M3.3502 35.5159C3.5202 35.7209 5.5552 35.6909 10.5302 38.0509M1.4502 41.4309C1.4502 41.4309 4.6602 40.3109 10.1802 41.2909M4.4052 46.1459C4.4052 46.1459 5.7752 45.4559 10.7402 45.0209M60.4352 33.7559C60.4352 33.7559 58.7302 33.9209 53.4652 36.9259M61.2102 39.2459C61.2102 39.2459 58.6652 39.0659 53.1852 40.2309M60.2252 44.5259C60.2252 44.5259 57.8102 43.6709 52.8352 43.4009"
                    stroke="#000200" stroke-width="0.375" stroke-miterlimit="10" stroke-linecap="round" />
                <path
                    d="M48.0454 33.185C47.8754 35.94 46.1654 37.455 44.2204 37.455C42.2754 37.455 40.7004 35.515 40.7004 33.125C40.7004 30.735 42.3404 28.77 44.5254 28.89C47.0604 29.035 48.1854 30.935 48.0454 33.185ZM23.0004 32.905C23.3904 35.71 22.2104 37.42 20.2554 37.815C18.3004 38.21 16.6254 36.895 16.1404 34.495C15.6504 32.09 16.5904 29.835 18.8104 29.51C21.3854 29.135 22.6804 30.61 23.0004 32.905Z"
                    fill="#000200" />
                <path
                    d="M22.4952 42.5808C21.2102 43.4158 22.7302 45.3508 23.6202 46.0058C24.5102 46.6608 26.1102 47.4658 28.4552 47.2258C31.2252 46.9458 32.0202 44.8808 32.0202 44.8808C32.0202 44.8808 33.0052 47.1808 36.4302 47.2758C39.9052 47.3708 40.9802 45.4908 41.4502 44.9308C41.9202 44.3658 42.3902 42.9108 41.5902 42.3508C40.7902 41.7858 40.2302 42.4908 39.3852 43.6658C38.5402 44.8408 36.8052 45.4958 35.1152 44.6958C33.4252 43.8958 33.3302 41.1758 33.3302 41.1758L30.9352 41.3158C30.9352 41.3158 30.5602 43.6608 29.4802 44.4108C28.4002 45.1608 25.8202 45.3508 24.7402 43.7058C24.2652 42.9758 23.5752 41.8758 22.4952 42.5808Z"
                    fill="black" />
            </svg>
        `;
    } else {
        return ''; // fallback
    }
}
