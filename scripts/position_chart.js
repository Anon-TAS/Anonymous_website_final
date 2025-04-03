// example code of bar chart i used to make this- https://www.chartjs.org/docs/latest/charts/bar.html
function renderPositionChart(labels, datasets) { //creating the function for the Chart.js position plot
    const ctx = document.getElementById('positionChart').getContext('2d'); //get cancas drawing conteet https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/getContext

    new Chart(ctx, {
        type: 'bar', //bar chart
        data: {
            labels: labels, //X labels based on the bind created in analysis.php
            datasets: datasets.map((ds, index) => ({
                label: ds.label, //motif name
                data: ds.data, //y-values - motif count for each of the bins
                backgroundColor: `hsl(${(index * 47) % 360}, 70%, 60%)` //generate unique colour for each motif 
                // HSL rotates hue per motif to ensure distinguishable colours - COOL https://www.w3schools.com/colors/colors_hsl.asp
            }))
        },
        options: {
            responsive: true, //resize automatically based on screen size changes
            plugins: {
                legend: { position: 'top' }, //move legend to top of chart so its clear
                tooltip: {
                    callbacks: {
                        //custom tip - show motif X 4 motifs so when you hover over bar it shows
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y} motifs`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Start Position Section' } //label for the motif bins
                },
                y: {
                    beginAtZero: true, //make sure y-axis starts at 0
                    title: { display: true, text: 'Motif Count' }//y axis label
                }
            }
        }
    });
}
