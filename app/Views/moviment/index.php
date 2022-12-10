<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Moviments</h1>

    <a href="<?= base_url('moviment/create') ?>" class="btn btn-success my-5">Add moviment</a>

    <table class="table my-3" id="moviment-list">
        <thead>
            <tr>
                <th>N°</th>
                <th>Description</th>
                <th>Date</th>
                <th>Value</th>
                <th>Type</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($moviments->getResult() as $key => $moviment): ?>
                <tr>
                    <td><?= ($key + 1) ?></td>
                    <td><?= $moviment->description ?></td>
                    <td><?= $moviment->date ?></td>
                    <td><?= $moviment->value ?></td>
                    <td><?= $moviment->type ?></td>
                    <td><?= $moviment->name ?></td>
                    <td>
                        <a href="<?= base_url('moviment/update/' . $moviment->id) ?>" class="btn btn-primary">Update</a>
                        <a href="<?= base_url('moviment/delete/' . $moviment->id) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script>
    $(document).ready( function () {
        $('#moviment-list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdfHtml5'
            ]
        });
    } );
</script>

<?= $this->endSection() ?>