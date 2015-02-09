<?php
    $title = 'Recordar contraseña';
    $this->assign('title', $title);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">JoinChat - <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">
        <form>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Ej: joinner@gmail.com">
            </div>
            <button type="submit" class="btn btn-primary pull-right">Enviar</button>
            <?php
                echo $this->Html->link(
                    '¿Ya estás registrado?',
                    array('controller' => 'public', 'action' => 'login'),
                    array('class' => 'btn btn-link pull-right', 'style' => 'margin-right: 10px;')
                ); ?>
        </form>
    </div>
</div>