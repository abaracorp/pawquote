function validateZipCode(input) {
    const zip = input.value.replace(/\D/g, '').slice(0, 5); 
    input.value = zip;

    const btn = document.getElementById('getQuoteBtn');
    btn.disabled = true; 

    if (zip.length === 5) {
        checkZipViaApi(zip, false); // enable button, not redirect
    }
}

document.getElementById('getQuoteBtn').addEventListener('click', () => {
    const zip = document.getElementById('zipCode').value.trim();
    if (zip.length === 5) {
        checkZipViaApi(zip, true); // redirect after validation
    }
});


async function checkZipViaApi(zip, shouldRedirect = false) {
    const button = document.getElementById('getQuoteBtn');
    const errorText = document.getElementById('zipError');

    try {
        const res = await fetch(`${baseUrl}/quote-zipcode`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ zip })
        });

        const data = await res.json();

        if (data?.original?.valid === true) {
            button.disabled = false;
            errorText.style.display = 'none';

            if (shouldRedirect) {
                window.location.href = `${baseUrl}/quote`;
            }
        } else {
            throw new Error('Invalid ZIP');
        }

    } catch (err) {
        button.disabled = true;
        errorText.style.display = 'block';
        errorText.textContent = 'Please enter valid zip code.';
    }
}
