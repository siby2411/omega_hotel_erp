<h2>📊 Analytics ERP Hôtel</h2>

<div class="card p-3">
<canvas id="chart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: ['Revenus', 'Charges'],
        datasets: [{
            label: 'FCFA',
            data: [
                <?= $revenus ?>,
                <?= $charges ?>
            ]
        }]
    }
});
</script>
