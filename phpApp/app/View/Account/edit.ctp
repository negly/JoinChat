<?php
    $title = 'Editar Perfil';
    $this->assign('title', $title);
?>
<h3><?php echo $title; ?></h3>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('alias', array(
            'label' => 'Alias',
            'class' => 'form-control',
            'placeholder' => 'Ej: Joi',
            'div' => array('class' => 'form-group'),
            'after' => $this->Html->para('help-block', 'Será el apodo con el que las demás personas te reconoceran')
        )
    );
    echo $this->Form->input('email', array('label' => 'Correo', 'class' => 'form-control', 'placeholder' => 'Ej: joinner@gmail.com', 'div' => array('class' => 'form-group')));
    echo $this->Form->submit('Enviar', array('class' => 'btn btn-primary pull-right'));
    echo $this->Form->end();
?>