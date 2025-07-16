

// $(function () {

//     const today = new Date();

//     $("#dateFrom").datepicker({
//         dateFormat: "dd-mm-yy",
//         maxDate: today,
//         onSelect: function (selectedDate) {
//             // Set minDate for dateTo
//             const fromDate = $(this).datepicker('getDate');
//             $("#dateTo").datepicker("option", "minDate", fromDate);
//         }
//     });

//     $("#dateTo").datepicker({
//         dateFormat: "dd-mm-yy",
//         maxDate: today,
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


const chartOptions = {
    series: [{
        name: "Visitors",
        data: []
    }],
    chart: {
        height: 350,
        type: 'line',
        zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    title: {
        text: 'Visitors',
        align: 'left'
    },
    grid: {
        row: {
            colors: ['#f3f3f3', 'transparent'],
            opacity: 0.5
        }
    },
    xaxis: {
        categories: []
    }
};

const chart = new ApexCharts(document.querySelector("#chart"), chartOptions);
chart.render();

function getFormattedDate(d) {
    return d.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short'
    }); // 09 Jul
}

function randomData(length) {
    return Array.from({
        length
    }, () => Math.floor(Math.random() * 100));
}


async function generateApiData(range, from = null, to = null) {
    const params = new URLSearchParams({ range });
    if (from) params.append('from', from);
    if (to) params.append('to', to);

    const res = await fetch(`${baseUrl}/admin/dashboard-data?${params.toString()}`);
    const json = await res.json();
    return json;
}

async function updateChart(range, from = null, to = null) {
    const { categories, data, trafficSources, totalVisitors, totalEngagementRate, totalQuotesCount, getQuotesData } = await generateApiData(range, from, to);
    chart.updateOptions({
        xaxis: { categories },
        series: [
            { name: 'Visitors', data },
            // {name: 'Page View',data }
        ]
    });


    renderTrafficSources(trafficSources)
    renderQuotesDataFn(getQuotesData)

    document.getElementById('totalVisitorsRender').innerText = totalVisitors ?? 0;
    document.getElementById('totalQuotesRender').innerText = totalQuotesCount ?? 0;
    document.getElementById('appendEngagementRate').innerText = `${totalEngagementRate} %` ?? '0 %';


}


const rangeSelect = document.getElementById("rangeSelect");
const customRangeDiv = document.getElementById("custom-date-range");
const applyCustom = document.getElementById("applyCustom");

rangeSelect.addEventListener("change", function () {
    const selected = this.value;
    if (selected === "custom") {
        customRangeDiv.style.display = "block";
    } else {
        customRangeDiv.style.display = "none";
        updateChart(selected);
    }
});

applyCustom.addEventListener("click", function () {
    const from = document.getElementById("dateFrom").value;
    const to = document.getElementById("dateTo").value;

    console.log(from, 'from');


    if (from && to) {
        updateChart("custom", from, to);
    }
});


updateChart("last7");

function renderTrafficSources(trafficSources) {
    const totalSessions = trafficSources.reduce((sum, item) => sum + parseInt(item.sessions), 0);
    const ul = document.getElementById('appendSourcesData');


    ul.innerHTML = '';

    trafficSources.forEach(item => {
        const sourceLabel = formatSource(item.sessionSource, item.sessionMedium);
        const sessionCount = parseInt(item.sessions);
        const percent = totalSessions > 0 ? Math.round((sessionCount / totalSessions) * 100) : 0;

        const li = document.createElement('li');
        li.innerHTML = `
                        <h3 class="f-22 c-dark f-w-5 freedoka">${sourceLabel}</h3>
                        <div class="rightside">
                            <p class="f-20 c-light f-w-5 montserrat">${sessionCount}</p>
                            <div class="progress" role="progressbar" aria-valuenow="${percent}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: ${percent}%;"></div>
                            </div>
                        </div>
                    `;
        ul.appendChild(li);
    });
}


function renderQuotesDataFn(quotesData) {
    const ul = document.getElementById('renderQuotesData');


    ul.innerHTML = '';

    quotesData.forEach(item => {

        console.log("item :", item);

        const li = document.createElement('li');
        li.innerHTML = `
                                <div class="left-content">
                                    <strong class="f-22 c-dark f-w-5 freedoka">${getUserName(item?.email_address)}</strong>
                                    <p class="f-14 c-light f-w-4 montserrat">${item?.email_address}
                                        <span>${item?.zip_code}</span><span>${filterPet(item?.get_pet_details)}</span>
                                    </p>
                                </div>
                                <div class="right-content" >
                                    <span class="f-14 c-light f-w-4 freedoka">${item?.time}</span>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pet-details" 
                            onclick="viewPetDetails(${item?.id})" class="f-14 c-dark f-w-4 freedoka"> View </a>
                                </div>
                `;
        ul.appendChild(li);

    });

}

function filterPet(arr) {
  return arr
    .map(item => item.pet_text)               
    .filter(text => typeof text === 'string' || Array.isArray(text)) 
    .map(text => Array.isArray(text) ? text.join(',') : text) 
    .join(','); 
}




function formatSource(source, medium) {
    if (source === "(direct)" && medium === "(none)") return "Direct";
    if (source === "(not set)" || medium === "(not set)") return "Other";
    return source.charAt(0).toUpperCase() + source.slice(1);
}

function getUserName(input) {
    if (!input) {
        return ''
    }
    if (!input.includes('@')) {
        return input;
    } else {
        const cleanedInput = input.split('@')[0]?.replace(/[^\w]/g, ' ').split(' ');
        const capitalizedInput = cleanedInput?.map(word => {
            return word[0]?.toUpperCase() + word.substring(1);
        }).join(' ');

        return capitalizedInput;
    }
}

