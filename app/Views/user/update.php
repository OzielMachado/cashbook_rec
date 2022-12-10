<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Update user</h1>

    <?php 
        $id = [
            'id' => $user->id,
        ];
        $name = [
            'name' => 'name',
            'class' => 'form-control my-3',
            'value' => $user->name,
        ];
        $email = [
            'name' => 'email',
            'type' => 'email',
            'class' => 'form-control my-3',
            'value' => $user->email,
        ];

        $submit = [
            'name' => 'submit',
            'value'=> 'Salvar',
            'type' => 'submit',
            'class' => 'btn btn-primary',
        ];
    ?>

    <div class="container">
        <?= form_open('user/update/'.$user->id) ?>

            <?= form_hidden($id) ?>

            <?= form_label('Name', 'name') ?>
            <?= form_input($name) ?>

            <?= form_label('E-mail', 'email') ?>
            <?= form_input($email) ?>   

            <?= form_label('Type', 'type') ?>
            <select name="type" class="form-control">
                <?php
                    $counter = '';
                    $admin = ''; 
                    if($user->type=='counter'){
                        $counter = 'selected';
                    } else if($user->type=='admin'){
                        $admin = 'selected';
                    }
                ?>
                <option value="counter" <?= $counter ?>>Counter</option>
                <option value="admin" <?= $admin ?>>Admin</option>
            </select>

            <div class="text-center my-3">
                <?= form_submit($submit) ?>
            </div>

        <?= form_close() ?>
    </div>


</div>

<?= $this->endSection() ?>