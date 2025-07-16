 $(function () {
    const today = new Date();

    $("#dateFrom").datepicker({
        dateFormat: "dd-mm-yy",
        maxDate: 0, 
        onSelect: function (selectedDate) {
            const fromDate = $(this).datepicker('getDate');
            $("#dateTo").datepicker("option", "minDate", fromDate);
        }
    });

    $("#dateTo").datepicker({
        dateFormat: "dd-mm-yy",
        maxDate: 0, 
        onSelect: function (selectedDate) {
            const fromDate = $("#dateFrom").datepicker('getDate');
            const toDate = $(this).datepicker('getDate');

            if (toDate < fromDate) {
                alert("End date cannot be earlier than start date.");
                $(this).val(""); // Clear invalid date
            }
        }
    });
});