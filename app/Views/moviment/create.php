<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center">Add moviment</h1>

    <?php 
        $description = [
            'name' => 'description',
            'class' => 'form-control my-3',
        ];
        $value = [
            'name' => 'value',
            'type' => 'number',
            'class' => 'form-control my-3',
            'step' => '.01'
        ];

        $submit = [
            'name' => 'submit',
            'value'=> 'Salvar',
            'type' => 'submit',
            'class' => 'btn btn-primary',
        ];
    ?>

    <div class="container">
        <?= form_open('moviment/create') ?>

            <?= form_label('Description', 'description') ?>
            <?= form_input($description) ?>

            <?= form_label('Value', 'value') ?>
            <?= form_input($value) ?>

            <?= form_label('Type', 'type') ?>
            <select name="type" class="form-control">
                <option value="input">Input</option>
                <option value="output">Output</option>
            </select>

            <div class="text-center my-3">
                <?= form_submit($submit) ?>
            </div>

        <?= form_close() ?>
    </div>

</div>

<?= $this->endSection() ?>