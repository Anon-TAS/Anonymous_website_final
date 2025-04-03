function renderPositionChart(labels, datasets) {
    const ctx = document.getElementById('positionChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets.map((ds, index) => ({
                label: ds.label,
                data: ds.data,
                backgroundColor: `hsl(${(index * 47) % 360}, 70%, 60%)`
            }))
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y} motifs`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Start Position Section' }
                },
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Motif Count' }
                }
            }
        }
    });
}
