const bulkActionSelect = document.getElementById('bulkActionSelect');
const bulkActionForm = document.getElementById('bulkActionForm');
const componentTable = document.getElementById('component-table');

if (bulkActionSelect && bulkActionForm && componentTable) {
    bulkActionSelect.addEventListener('change', function () {
        const selectedValue = this.value;

        if (selectedValue !== "") {
            const checkboxes = componentTable.querySelectorAll('.row-checkbox:checked');
            if (checkboxes.length === 0) {
                alert("Please select at least one row.");
                bulkActionForm.reset();
                return;
            }

            bulkActionForm.submit();
        }
    });

    document.addEventListener('change', function (e) {
        if (e.target && e.target.id === 'selectAllChecked') {
            const checkboxes = componentTable.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => cb.checked = e.target.checked);
        }
    });
}




// document.getElementById('bulkActionSelect').addEventListener('change', function () {
//     const selectedValue = this.value;

//     if (selectedValue !== "") {
//         const checkboxes = document.querySelectorAll('#component-table .row-checkbox:checked');
//         if (checkboxes.length === 0) {
//             alert("Please select at least one row.");
//             document.getElementById('bulkActionForm').reset();
//             return;
//         }

//         document.getElementById('bulkActionForm').submit();
//     }
// });

// document.addEventListener('change', function (e) {
//     if (e.target && e.target.id === 'selectAllChecked') {
//         const checkboxes = document.querySelectorAll('#component-table .row-checkbox');
//         checkboxes.forEach(cb => cb.checked = e.target.checked);
//     }
// });




let timer;
const searchInput = document.getElementById('moduleSearchInput');
const url = searchInput.getAttribute('data-url');
const resultContainer = document.getElementById('tableResults');
const countContainer = document.getElementById('statusCounts');

searchInput.addEventListener('keyup', function () {
    clearTimeout(timer);

    timer = setTimeout(() => {
        const query = this.value.trim();

        fetch(`${baseUrl}/admin/${url}?search=${encodeURIComponent(query)}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Search request failed");
                }
                return response.json();
            })
            .then(data => {

                if (data.tableData && resultContainer) {
                    resultContainer.innerHTML = data.tableData;
                }

                if (data.countFilterPage && countContainer) {
                    countContainer.innerHTML = data.countFilterPage;
                }
            })
            .catch(error => {
                console.error(error);
                if (resultContainer) {
                    resultContainer.innerHTML = "<p class='error-msg'>Something went wrong.</p>";
                }
            });
    }, 300);
});


document.addEventListener('click', function (e) {
    if (e.target.closest('#paginationLinks a')) {
        e.preventDefault();

        const url = e.target.closest('a').getAttribute('href');

        fetch(url, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Search request failed");
                }
                return response.json();
            })
            .then(data => {

                if (data.tableData && resultContainer) {
                    resultContainer.innerHTML = data.tableData;
                }

                if (data.countFilterPage && countContainer) {
                    countContainer.innerHTML = data.countFilterPage;
                }
            })
            .catch(error => {
                console.error(error);
                if (resultContainer) {
                    resultContainer.innerHTML = "<p class='error-msg'>Something went wrong.</p>";
                }
            });
    }
});