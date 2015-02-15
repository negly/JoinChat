<?php
    $title = 'Iniciar sesión';
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
                    'div' => array('class' => 'form-group'),
                    'after' => $this->Html->tag('p', $this->Html->link('¿Olvidó su contraseña?', array('controller' => 'public', 'action' => 'rememberPassword')))
                )
            );
            echo $this->Form->submit('Entrar', array('class' => 'btn btn-primary pull-right'));
            echo $this->Html->link(
                'Registrarme',
                array('controller' => 'public', 'action' => 'register'),
                array('class' => 'btn btn-link pull-right', 'style' => 'margin-right: 10px;')
            );
            echo $this->Form->end();
        ?>
    </div>
</div>