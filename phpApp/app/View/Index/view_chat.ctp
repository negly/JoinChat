<?php
    $userAlias = 'Joi';
    $title = 'Chat con ' . $userAlias;
    $this->assign('title', $title);
?>
<?php $this->start('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        sizeContent();
        $chatBody = $('#chat .panel-body');
        $chatBody.scrollTop($chatBody[0].scrollHeight);
    });

    $(window).resize(sizeContent);

    function sizeContent() {
        var contentPadding = 20;

        $chat = $("#chat");
        var chatHeight = $(window).height() - 2 * contentPadding - 20;
        $chat.css('height', chatHeight);
        $('.panel-body', $chat).css('maxHeight', chatHeight - $(".panel-heading", $chat).height() - $(".panel-footer", $chat).height() - 46);
    }
</script>
<?php
    echo $this->Html->script('webrtc-adapter.js');
    echo $this->Html->script('main.js');
    $this->end();

    $this->start('style');
?>
<style type="text/css">
    #videochat {
        border-bottom: 4px solid #e7e7e7;
        margin-bottom: 10px;
        background-color: #eee;
        margin-top: -15px;
        padding-top: 5px;
    }
</style>
<?php
    $this->end();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div id="chat" class="panel panel-primary" style="position: relative;">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $userAlias; ?><span class="label label-info pull-right">Último mensaje 2015/01/28 01:05pm</span></h3>
                </div>
                <div class="panel-body" style="overflow-y: auto;">
                    <div id="videochat" class="row">
                        <div class="col-md-6 text-center">
                            <video id="local" autoplay muted controls>
                                Tu cámara...
                            </video>
                        </div>
                        <div class="col-md-6 text-center">
                            <video id="remote" autoplay controls>
                                Cámara de <?php echo $userAlias; ?>
                            </video>
                        </div>
                    </div>
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
                <div class="panel-footer text-right" style="position: absolute; bottom: 0; width: 100%;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-11">
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="col-xs-1">
                                <button class="btn btn-success">Enviar</button>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>