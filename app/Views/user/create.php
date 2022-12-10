<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Add user</h1>

    <?php 
        $name = [
            'name' => 'name',
            'class' => 'form-control my-3',
        ];
        $email = [
            'name' => 'email',
            'type' => 'email',
            'class' => 'form-control my-3',
        ];
        $password = [
            'name' => 'password',
            'type' => 'password',
            'class' => 'form-control my-3',
        ];
        $repeatPassword = [
            'name' => 'repeatPassword',
            'type' => 'password',
            'class' => 'form-control my-3',
        ];

        $submit = [
            'name' => 'submit',
            'value'=> 'Salvar',
            'type' => 'submit',
            'class' => 'btn btn-primary',
        ];
    ?>

    <div class="container">
        <?= form_open('user/create') ?>

            <?= form_label('Name', 'name') ?>
            <?= form_input($name) ?>

            <?= form_label('E-mail', 'email') ?>
            <?= form_input($email) ?>

            <?= form_label('Password', 'password') ?>
            <?= form_input($password) ?>

            <?= form_label('Repeat password', 'repeatPassword') ?>
            <?= form_input($repeatPassword) ?>

            <?= form_label('Type', 'type') ?>
            <select name="type" class="form-control">
                <option value="counter">Counter</option>
                <option value="admin">Admin</option>
            </select>

            <div class="text-center my-3">
                <?= form_submit($submit) ?>
            </div>

        <?= form_close() ?>
    </div>


</div>

<?= $this->endSection() ?>