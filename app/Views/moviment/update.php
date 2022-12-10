<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Update moviment</h1>

    <?php 
        $id = [
            'id' => $moviment->id,
        ];
        $description = [
            'name' => 'description',
            'class' => 'form-control my-3',
            'value' => $moviment->description,
        ];
        $value = [
            'name' => 'value',
            'type' => 'number',
            'class' => 'form-control my-3',
            'step' => '.01',
            'value' => $moviment->value,
        ];

        $submit = [
            'name' => 'submit',
            'value'=> 'Salvar',
            'type' => 'submit',
            'class' => 'btn btn-primary',
        ];
    ?>

    <div class="container">
        <?= form_open('moviment/update/'.$moviment->id) ?>

            <?= form_hidden($id) ?>

            <?= form_label('Description', 'description') ?>
            <?= form_input($description) ?>

            <?= form_label('Value', 'value') ?>
            <?= form_input($value) ?>

            <?= form_label('Type', 'type') ?>
            <select name="type" class="form-control">
                <?php
                    $input = '';
                    $output = ''; 
                    if($moviment->type=='input'){
                        $input = 'selected';
                    } else if($moviment->type=='output'){
                        $output = 'selected';
                    }
                ?>
                <option value="input" <?= $input ?>>Input</option>
                <option value="output" <?= $output ?>>Output</option>
            </select>

            <div class="text-center my-3">
                <?= form_submit($submit) ?>
            </div>

        <?= form_close() ?>
    </div>

</div>

<?= $this->endSection() ?>