  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

  <script src="{{asset('js/globalVar.js')}}"></script>

    <script>
        const xValues = [];
        const yValues = [];
        generateData("Math.sin(x)", 0, 10, 0.5);
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    pointRadius: 2,
                    borderColor: "rgba(0,0,255,0.5)",
                    data: yValues
                }]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "y = sin(x)",
                    fontSize: 16
                }
            }
        });
        function generateData(value, i1, i2, step = 1) {
            for (let x = i1; x <= i2; x += step) {
                yValues.push(eval(value));
                xValues.push(x);
            }
        }
    </script>