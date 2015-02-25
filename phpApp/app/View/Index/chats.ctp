<?php
    $title = 'Mis conversaciones';
    $this->assign('title', $title);

    $this->start('script');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".chat-preview").click(function(event) {
            location = $(this).attr('href');
        });
    });
</script>
<?php
    $this->end();

    $this->start('style');
?>
<style type="text/css">
    .chat-preview {
        cursor: pointer;
    }
</style>
<?php
    $this->end();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary chat-preview" href="<?php echo $this->Html->url(array('controller' => 'index', 'action' => 'viewChat')); ?>">
                <div class="panel-heading">
                    <h3 class="panel-title">Joinner Ovalle</h3>
                </div>
                <div class="panel-body">
                    <div class="bubble bubble-right">
                        <div class="pointer"></div>
                        Qué más pues Nigga? Cómo vas?
                    </div>
                    <div class="bubble bubble-left">
                        <div class="pointer"></div>
                        Todo bien pa<br>
                        Vos que
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <span class="label label-info">Último mensaje 2015/01/28 01:05pm</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary chat-preview" href="<?php echo $this->Html->url(array('controller' => 'index', 'action' => 'viewChat')); ?>">
                <div class="panel-heading">
                    <h3 class="panel-title">Joinner Ovalle</h3>
                </div>
                <div class="panel-body">
                    <div class="bubble bubble-right">
                        <div class="pointer"></div>
                        Qué más pues Nigga? Cómo vas?
                    </div>
                    <div class="bubble bubble-left">
                        <div class="pointer"></div>
                        Todo bien pa<br>
                        Vos que
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <span class="label label-info">Último mensaje 2015/01/28 01:05pm</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary chat-preview" href="<?php echo $this->Html->url(array('controller' => 'index', 'action' => 'viewChat')); ?>">
                <div class="panel-heading">
                    <h3 class="panel-title">Juan Diego Pérez</h3>
                </div>
                <div class="panel-body">
                    <div class="bubble bubble-left">
                        <div class="pointer"></div>
                        Viste lo nuevo de la documentación?<br>
                        Le trabaje bastante...
                    </div>
                    <div class="bubble bubble-right">
                        <div class="pointer"></div>
                        Ufff Juancho, está brutal!!!
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <span class="label label-info">Último mensaje 2015/01/29 02:43pm</span>
                </div>
            </div>
        </div>
    </div>
</div>