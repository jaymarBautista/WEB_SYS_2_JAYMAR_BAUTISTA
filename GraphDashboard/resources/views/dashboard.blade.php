<!DOCTYPE html>
<html>

<head>
    <title>Laravel Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            font-family: sans-serif;
        }
        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 32px;
            max-width: 900px;
            margin: 60px auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }
        h2 {
            color: #e2e8f0;
            font-size: 1.6rem;
            margin-bottom: 8px;
        }
        p.subtitle {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>📈 Monthly Sales Overview</h2>
        <p class="subtitle">Revenue performance by month</p>

        <!-- Chart Container -->
        <canvas id="salesChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const labels = @json($labels);
        const data = @json($data);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Sales ($)',
                    data: data,
                    borderColor: 'rgb(139, 92, 246)',
                    backgroundColor: 'rgba(139, 92, 246, 0.15)',
                    pointBackgroundColor: 'rgb(196, 148, 255)',
                    pointBorderColor: '#fff',
                    pointRadius: 6,
                    pointHoverRadius: 9,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#e2e8f0', font: { size: 13 } }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 12, 41, 0.9)',
                        titleColor: '#c4b5fd',
                        bodyColor: '#e2e8f0',
                        borderColor: 'rgba(139, 92, 246, 0.5)',
                        borderWidth: 1
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#94a3b8' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#94a3b8' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    }
                }
            }
        });
    </script>
</body>

</html>