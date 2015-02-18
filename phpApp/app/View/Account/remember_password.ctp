<?php
    $title = 'Recordar contraseña';
    $this->assign('title', $title);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">JoinChat - <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
            echo $this->Form->create('User');
            echo $this->Form->input('email', array('label' => 'Correo', 'class' => 'form-control', 'placeholder' => 'Ej: joinner@gmail.com', 'div' => array('class' => 'form-group')));
            echo $this->Form->submit('Enviar', array('class' => 'btn btn-primary pull-right'));
            echo $this->Html->link(
                '¿Ya estás registrado?',
                array('action' => 'login'),
                array('class' => 'btn btn-link pull-right', 'style' => 'margin-right: 10px;')
            );
            echo $this->Form->end();
        ?>
    </div>
</div>