<?php
    $title = 'Formulario de registro';
    $this->assign('title', $title);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">JoinChat - <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
            echo $this->Form->create('User');
            echo $this->Form->input('username', array('label' => 'Usuario', 'class' => 'form-control', 'placeholder' => 'Ej: joinnerovalle', 'div' => array('class' => 'form-group')));
            echo $this->Form->input('password', array(
                    'type' => 'password',
                    'label' => 'Contraseña',
                    'class' => 'form-control',
                    'placeholder' => '*********',
                    'div' => array('class' => 'form-group')
                )
            );
            echo $this->Form->input('passwordConfirm', array(
                    'type' => 'password',
                    'label' => 'Confirmación de contraseña',
                    'class' => 'form-control',
                    'placeholder' => '*********',
                    'div' => array('class' => 'form-group')
                )
            );
            echo $this->Form->input('alias', array(
                    'label' => 'Alias',
                    'class' => 'form-control',
                    'placeholder' => 'Ej: Joi',
                    'div' => array('class' => 'form-group'),
                    'after' => $this->Html->para('help-block', 'Será el apodo con el que las demás personas te reconoceran')
                )
            );
            echo $this->Form->input('email', array('label' => 'Correo', 'class' => 'form-control', 'placeholder' => 'Ej: joinner@gmail.com', 'div' => array('class' => 'form-group')));
            echo $this->Form->submit('Registrarme', array('class' => 'btn btn-primary pull-right'));
            echo $this->Html->link(
                '¿Ya estás registrado?',
                array('action' => 'login'),
                array('class' => 'btn btn-link pull-right', 'style' => 'margin-right: 10px;')
            );
            echo $this->Form->end();
        ?>
    </div>
</div>