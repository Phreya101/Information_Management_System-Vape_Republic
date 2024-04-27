<script>
    let labels = ['Monday', 'Tuesday',
        'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
    ];
    let dataset1Data = [10500, 12500, 20000, 15000, 9000, 30000, 11460];

    // Creating line chart
    let ctx =
        document.getElementById('DailyChart').getContext('2d');
    let myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Daily Income',
                data: dataset1Data,
                borderColor: 'blue',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>