<?php
    $title = 'Iniciar sesión';
    $this->assign('title', $title);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">JoinChat - <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">
        <form action="/login.php" method="POST">
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Ej: joinnerovalle">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*********">
                <p class="help-block"><?php echo $this->Html->link('¿Olvidó su contraseña?', array('controller' => 'public', 'action' => 'rememberPassword')); ?></p>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Entrar</button>
            <?php
                echo $this->Html->link(
                    'Registrarme',
                    array('controller' => 'public', 'action' => 'register'),
                    array('class' => 'btn btn-link pull-right', 'style' => 'margin-right: 10px;'));
            ?>
        </form>
    </div>
</div>