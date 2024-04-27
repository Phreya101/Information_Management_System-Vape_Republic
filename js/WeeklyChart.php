<script>
    let labels1 = ['Week 1', 'Week 2',
        'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'
    ];
    let dataset2Data = [50000, 80000, 54000, 67000, 74950, 61890, 70950];

    // Creating line chart
    let ctx1 =
        document.getElementById('WeeklyChart').getContext('2d');
    let myLineChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Weekly Income',
                data: dataset2Data,
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