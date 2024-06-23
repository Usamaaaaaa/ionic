$(document).ready(function () {

    var initialData;
    var dashboardRoute = "/chart" ;

    $.ajax({
        url: dashboardRoute,
        type: "GET",
        success: function (response) {
            initialData = response;
            // Update chart data
            // myChart.data.labels = initialData.labels;
            // myChart.data.datasets[0].data = initialData.data

    var ctx = document.getElementById("barChart").getContext("2d");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                'visited', 'viewed_page', 'searched'
            ],
            datasets: [
                {
                    label: "users",
                    data: initialData.data,
                    backgroundColor: "#4D61A8",
                    barThickness: 16,
                    borderWidth: 0,
                    borderRadius: 4,
                },
            ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Visitors",
                    position: "top",
                    align: "start",
                    font: {
                        color: "black",
                        size: 16,
                        weight: "bold",
                        family: "DM Serif Display",
                    },
                    padding: 30,
                },
                legend: {
                    display: false,
                },
                tooltip: {
                    enabled: true,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return value;
                        },
                    },
                },
                x: {
                    grid: {
                        display: false,
                    },
                    barPercentage: 0.8, // Adjust the width of the bars
                    categoryPercentage: 0.8,
                },
            },
        },
    });
            // Redraw the chart
            // myChart.update();
        },

    });

    });
