<?php
    $title = 'Cambiar clave';
    $this->assign('title', $title);
?>
<h3><?php echo $title; ?></h3>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('oldPassword', array(
            'type' => 'password',
            'label' => 'Contraseña actual',
            'class' => 'form-control',
            'div' => array('class' => 'form-group')
        )
    );
    echo $this->Form->input('password', array(
            'type' => 'password',
            'label' => 'Nueva contraseña',
            'class' => 'form-control',
            'div' => array('class' => 'form-group')
        )
    );
    echo $this->Form->input('passwordConfirm', array(
            'type' => 'password',
            'label' => 'Confirmación de nueva contraseña',
            'class' => 'form-control',
            'div' => array('class' => 'form-group')
        )
    );
    echo $this->Form->submit('Enviar', array('class' => 'btn btn-primary pull-right'));
    echo $this->Form->end();
?>