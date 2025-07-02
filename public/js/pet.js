const petType = {
    0: 'dog',
    1: 'cat'
};

function getPetType(val) {

    return petType[val] || '';

}



const formData = {
    petType: 0,
    radioCatGender: 0,
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

    const isValid = validateField(input, selector);

    if (isValid) {
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
}


function handleIsHavePet(checkbox) {
    const input = document.getElementById('petName');
    const petName = document.getElementById('petName');

    if (checkbox.checked) {
        input.setAttribute('readonly', true);
        petName.value = "Your Pet Name"

    } else {
        input.removeAttribute('readonly');
        petName.value = "";
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
const totalSteps = 6;

function showStep(step) {
    document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
    document.querySelector(`#step${step}`).classList.add('show', 'active');

    document.getElementById('stepNumber').textContent = step;
    document.getElementById('stepPercent').textContent = Math.round((step / totalSteps) * 100);
    document.querySelector('.progress-bar').style.width = `${Math.round((step / totalSteps) * 100)}%`;

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
    showStep(currentStep);
}


document.addEventListener('DOMContentLoaded', () => {
    showStep(currentStep);
});
