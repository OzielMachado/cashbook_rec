<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Users</h1>

    <a href="<?= base_url('user/create') ?>" class="btn btn-success">Add user</a>

    <table class="table my-3">
        <thead>
            <tr>
                <th>N°</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $key=>$user): ?>
                <tr>
                    <td><?= ($key+1) ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->type ?></td>
                    <td>
                        <a href="<?= base_url('user/update/'.$user->id) ?>" class="btn btn-primary">Update</a>
                        <a href="<?= base_url('user/delete/'.$user->id) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>