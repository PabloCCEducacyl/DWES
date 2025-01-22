<?php
// Generate some cool ass data
$labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
$data1 = [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)];
$data2 = [rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100), rand(10, 100)];

// Calculate the median for each point
$medianData = [];
for ($i = 0; $i < count($data1); $i++) {
    $medianData[] = ($data1[$i] + $data2[$i]) / 2; // Median of two numbers is their average
}

// Convert data to JSON for JavaScript
$labels_json = json_encode($labels);
$data1_json = json_encode($data1);
$data2_json = json_encode($data2);
$medianData_json = json_encode($medianData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cool Ass Graphs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        canvas {
            background-color: #2e2e2e;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }
        .controls {
            margin-bottom: 20px;
        }
        .controls button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .controls button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="controls">
        <button onclick="changeChartType('bar')">Bar Chart</button>
        <button onclick="changeChartType('line')">Line Chart</button>
        <button onclick="changeChartType('pie')">Pie Chart</button>
        <button onclick="changeChartType('doughnut')">Doughnut Chart</button>
    </div>
    <div style="width: 800px;">
        <canvas id="coolAssChart"></canvas>
    </div>

    <script>
        // Get the data from PHP
        const labels = <?php echo $labels_json; ?>;
        const data1 = <?php echo $data1_json; ?>;
        const data2 = <?php echo $data2_json; ?>;
        const medianData = <?php echo $medianData_json; ?>;

        // Chart configuration
        const config = {
            type: 'line', // Default chart type
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Dataset 1',
                        data: data1,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Dataset 2',
                        data: data2,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Median',
                        data: medianData,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        borderDash: [5, 5], // Dashed line for the median
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                animation: {
                    duration: 1000, // Smooth animations
                    easing: 'easeInOutQuad'
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#fff'
                        },
                        grid: {
                            color: '#444'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#fff'
                        },
                        grid: {
                            color: '#444'
                        }
                    }
                }
            }
        };

        // Initialize the chart
        const ctx = document.getElementById('coolAssChart').getContext('2d');
        const chart = new Chart(ctx, config);

        // Function to change chart type
        function changeChartType(type) {
            chart.config.type = type;
            chart.update();
        }

        // Simulate real-time data updates
        setInterval(() => {
            const newData1 = data1.map(() => Math.floor(Math.random() * 100));
            const newData2 = data2.map(() => Math.floor(Math.random() * 100));
            const newMedianData = newData1.map((value, index) => (value + newData2[index]) / 2); // Recalculate median
            chart.data.datasets[0].data = newData1;
            chart.data.datasets[1].data = newData2;
            chart.data.datasets[2].data = newMedianData;
            chart.update();
        }, 3000); // Update every 3 seconds
    </script>
</body>
</html>