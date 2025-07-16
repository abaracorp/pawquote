//  $(function () {
//     const today = new Date();

//     $("#dateFrom").datepicker({
//         dateFormat: "dd-mm-yy",
//         maxDate: 0, 
//         onSelect: function (selectedDate) {
//             const fromDate = $(this).datepicker('getDate');
//             $("#dateTo").datepicker("option", "minDate", fromDate);
//         }
//     });

//     $("#dateTo").datepicker({
//         dateFormat: "dd-mm-yy",
//         maxDate: 0, 
//         onSelect: function (selectedDate) {
//             const fromDate = $("#dateFrom").datepicker('getDate');
//             const toDate = $(this).datepicker('getDate');

//             if (toDate < fromDate) {
//                 alert("End date cannot be earlier than start date.");
//                 $(this).val(""); // Clear invalid date
//             }
//         }
//     });
// });




    function showCustomDateDiv(input, id) {
    const sourceEl = document.getElementById(input.id);
    const targetEl = document.getElementById(id);

    if (!sourceEl || !targetEl) return;

    targetEl.style.display = sourceEl.value === 'custom_date' ? '' : 'none';
    }

    function submitFilterData(formID){

        const resultContainer = document.getElementById('tableResults');
        const searchQuery = document.querySelector(`#${formID} #moduleSearchInput`).value;
        const selectDays = document.querySelector(`#${formID} #selectDays`).value;

        let queryParts = [];

        if (searchQuery.trim() !== '') {
            queryParts.push(`searchQuery=${encodeURIComponent(searchQuery)}`);
        }

        if (selectDays.trim() !== '') {
            queryParts.push(`selectDays=${encodeURIComponent(selectDays)}`);
        }

        if (selectDays === 'custom_date') {
            const dateFrom = document.querySelector(`#${formID} #dateFrom`).value;
            const dateTo = document.querySelector(`#${formID} #dateTo`).value;

            if (dateFrom.trim() !== '') {
                queryParts.push(`dateFrom=${encodeURIComponent(dateFrom)}`);
            }

            if (dateTo.trim() !== '') {
                queryParts.push(`dateTo=${encodeURIComponent(dateTo)}`);
            }
        }

        const query = queryParts.join('&');



        fetch(`${baseUrl}/admin/filter-pet-details?${query}`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
        }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
             if (data.tableData && resultContainer) {
                    resultContainer.innerHTML = data.tableData;
                }
            
        })
        .catch(error => {
            console.error('Error:', error);
        });
        
    }

    
  function viewPetDetails(getQuoteID) {
    fetch(`${baseUrl}/admin/view-pet-details?quote_id=${encodeURIComponent(getQuoteID)}`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        console.log('Response:', data);

        const container = document.getElementById('appendPetDetails');
        container.innerHTML = ''; // clear previous contents

        data.forEach((pet, index) => {
            const petHTML = `
                <ul class="pet-detail mt-3">
                    <h3 class="f-20 c-dark f-w-5 freedoka">Pet ${index + 1}</h3>
                    <li><p class="f-18 c-dark f-w-4 freedoka">Pet</p> <p class="f-18 c-dark f-w-4 freedoka">${pet.pet_text}</p></li>
                    <li><p class="f-18 c-dark f-w-4 freedoka">Pet name</p> <p class="f-18 c-dark f-w-4 freedoka">${pet.pet_name || 'No Pet Yet'}</p></li>
                    <li><p class="f-18 c-dark f-w-4 freedoka">Pet breed</p> <p class="f-18 c-dark f-w-4 freedoka">${pet.pet_breed || ''}</p></li>
                    <li><p class="f-18 c-dark f-w-4 freedoka">Gender</p> <p class="f-18 c-dark f-w-4 freedoka">${pet.pet_gender_text}</p></li>
                    <li><p class="f-18 c-dark f-w-4 freedoka">Pet age</p> <p class="f-18 c-dark f-w-4 freedoka">${pet.pet_age_years} year ${pet.pet_age_months} months</p></li>
                </ul>
            `;
            container.insertAdjacentHTML('beforeend', petHTML);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}