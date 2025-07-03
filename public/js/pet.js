const petType = {
    0: 'dog',
    1: 'cat'
};

function getPetType(val) {

    return petType[val] || '';

}



const formData = {
    petName:'',
    petType: 0,
    isHavePet: 0,
    radioCatGender: 0,
    petAgeYear:0,
    petAgeMonth:3,
};



function validateField(fieldEl, selector) {

    const value = fieldEl.value.trim();

    if (!fieldEl) {
        return { isValid: false, message: 'Field not found.' };
    }


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
        }else{
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

    // event.preventDefault();

    const input = document.querySelector(selector);
    const errorEl = errorId ? document.getElementById(errorId) : null;

    if (!input) return;

    const isValid = validateField(input, selector);

    if (isValid) {

        console.log("input.value :",input.value,"selector :",selector);
        
        formData[fieldName] = input.value;
    } else {
        delete formData[fieldName];
    }

    showOrHideError(isValid, errorEl);
    updatePetDataHTML();
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

function updateDataOfSelect2(input) {

    console.log(input.id, 'input');

    const el = document.querySelector(`#${input.id}`); 

    formData['selectPetBreed'] = el.value;
    
}


function updatePetDataHTML() {
    const petNameEls = document.getElementsByClassName('pet-name');

    for (let el of petNameEls) {
        el.innerHTML = formData?.isHavePet != 1 ? formData.petName : 'pet';
    }

    const petTypeEls = document.getElementsByClassName('pet-type')

    for (let el of petTypeEls) {
        el.innerHTML = getPetType(formData.petType)
    }

    togglePetIcon(getPetType(formData.petType))
    


}

function togglePetIcon(type) {
    const types = ['dog', 'cat'];

    types.forEach(petType => {
        const icon = document.getElementById(`${petType}-Icon`);
        if (icon) {
            icon.style.display = petType === type ? 'block' : 'none';
        }
    });

    select2Options(type)
    
}

let allSelectOptions = [];

$(document).ready(function () {
    const $select = $('#selectPetBreed');

    
    $select.select2({
        placeholder: 'Select a breed',
        allowClear: true
    });

    allSelectOptions = $select.find('option').clone();

    select2Options('dog');
});

function select2Options(petType) {
    const $select = $('#selectPetBreed');

    const filteredOptions = allSelectOptions.filter(function () {
        return $(this).data('type') === petType || $(this).val() === "";
    });

    
    $select.empty().append(filteredOptions.clone());

    
    $select.select2({
        placeholder: 'Select a breed',
        allowClear: true
    });

    
    $select.val(null).trigger('change');
}


        


function handleIsHavePet(checkbox) {
    const input = document.getElementById('petName');
    // const petName = document.getElementById('petName');

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





let currentStep = 1;
const initialSteps = 6;
const totalSteps = 7;

function showStep(step) {
    document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
    document.querySelector(`#step${step}`).classList.add('show', 'active');

    document.getElementById('stepNumber').textContent = step;
    document.getElementById('stepPercent').textContent = Math.round((step / initialSteps) * 100);
    document.querySelector('.progress-bar').style.width = `${Math.round((step / initialSteps) * 100)}%`;

    // Hide/show navigation buttons
    document.querySelector('.back').style.display = (step === 1) ? 'none' : 'inline-flex';
    document.querySelector('.next').style.display = (step === totalSteps) ? 'none' : 'inline-flex';


    const header = document.querySelector('.heading');
    header.style.display = (step === 1) ? 'block' : 'none';

    
}

function changeStep(direction) {
    currentStep += direction;
    if (currentStep < 1) currentStep = 1;
    if (currentStep > totalSteps) currentStep = totalSteps;

    console.log("currentStep :",currentStep);

    if (currentStep === 7) {
        sendStepSevenAjax();
    }else{
        showStep(currentStep);
    }
    
}



async function sendStepSevenAjax() {


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
            body: new URLSearchParams(formData)
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


document.addEventListener('DOMContentLoaded', () => {
    showStep(currentStep);
});
