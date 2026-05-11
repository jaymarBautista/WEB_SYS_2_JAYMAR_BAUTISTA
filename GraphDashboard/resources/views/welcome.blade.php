<div style="width: 500px; background: #1e1e2e; padding: 24px; border-radius: 16px; box-shadow: 0 8px 32px rgba(0,0,0,0.3);">
    <h3 style="color: #cdd6f4; font-family: sans-serif; margin: 0 0 16px 0; font-size: 16px; letter-spacing: 1px; text-transform: uppercase;">Status Check</h3>
    <canvas id="testChart"></canvas>
</div>
@vite(['resources/js/app.js'])
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('testChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    label: 'Status Check',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(243, 139, 168, 0.8)',
                        'rgba(137, 180, 250, 0.8)',
                        'rgba(249, 226, 175, 0.8)'
                    ],
                    borderColor: [
                        'rgb(243, 139, 168)',
                        'rgb(137, 180, 250)',
                        'rgb(249, 226, 175)'
                    ],
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                plugins: {
                    legend: { labels: { color: '#cdd6f4', font: { family: 'sans-serif' } } }
                },
                scales: {
                    x: { ticks: { color: '#cdd6f4' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                    y: { ticks: { color: '#cdd6f4' }, grid: { color: 'rgba(255,255,255,0.05)' }, beginAtZero: true }
                }
            }
        });
    });
</script>