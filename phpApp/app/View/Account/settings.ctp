<?php
    $this->assign('title', 'Configuración');
?>
<h3>Mi Perfil</h3>
<div class="list-group">
    <div class="list-group-item">
        <h4 class="list-group-item-heading">Alias (Apodo)</h4>
        <div class="list-group-item-text">Joi</div>
    </div>
    <div class="list-group-item">
        <h4 class="list-group-item-heading">Usuario</h4>
        <div class="list-group-item-text">joinnerovalle</div>
    </div>
    <div class="list-group-item">
        <h4 class="list-group-item-heading">Correo</h4>
        <div class="list-group-item-text">joinner@gmail.com</div>
    </div>
</div>
<?php
    echo $this->Html->link('Editar', array('action' => 'edit'), array('class' => 'btn btn-link'));
    echo $this->Html->link('Cambiar clave', array('action' => 'changePassword'), array('class' => 'btn btn-link'));
?>