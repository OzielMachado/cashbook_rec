<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Moviment: <?= $count_moviment ?></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">R$ <?php foreach($sum_moviment as $row){echo $row->sum;} ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Input: <?= $count_input ?></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">R$ <?php foreach($sum_input as $row){echo $row->sum_input;} ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Output: <?= $count_output ?></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">R$ <?php foreach($sum_output as $row){echo $row->sum_output;} ?></h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center">Cashbalance</div>
                    <div class="card-body">
                        <h5 class="card-title text-center">R$ <?php foreach($cashbalance as $row){echo $row->cashbalance;} ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h4 class="text-center">Moviment per type</h4>
                <canvas id="moviment_type"></canvas>
            </div>
            <div class="col">
            <h4 class="text-center">Moviment per date</h4>
                <canvas id="moviment_date"></canvas>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="<?= base_url('chartjs/Chart.bundle.min.js') ?>"></script>

    <script>

        var moviment_type = document.getElementById('moviment_type');
        var data_moviment_type = [];
        var label_moviment_type = [];

        <?php foreach($moviment_per_type->getResult() as $key => $value): ?>
            data_moviment_type.push(<?= $value->count ?>);
            label_moviment_type.push('<?= $value->type ?>');
        <?php endforeach ?>

        var data_moviment_per_type = {
            datasets:[{
                data: data_moviment_type,
                backgroundColor: [
                    '#198754',
                    '#dc3545',
                ],
            }],
            labels: label_moviment_type,
        }

        var chart_moviment_type = new Chart(moviment_type, {
            type: 'doughnut',
            data: data_moviment_per_type
        });



        var moviment_date = document.getElementById('moviment_date');
        var data_moviment_date = [];
        var label_moviment_date = [];

        <?php foreach($moviment_per_date->getResult() as $key => $value): ?>
            data_moviment_date.push(<?= $value->count ?>);
            label_moviment_date.push(<?= $value->date ?>);
        <?php endforeach ?>

        var data_moviment_per_date = {
            datasets: [{
                label: 'count',
                data: data_moviment_date,
                backgroundColor: [
                    '#0d6efd',
                ],
            }],
            labels: label_moviment_date,
        }

        var chart_moviment_date = new Chart(moviment_date, {
            type: 'bar',
            data: data_moviment_per_date,
        });

    </script>

<?= $this->endSection() ?>