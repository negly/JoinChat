<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title><?php echo $this->fetch('title'); ?> | JoinChat</title>
        <link rel='stylesheet' type='text/css' href='/css/bootstrap.theme.min.css'>
        <link rel='stylesheet' type='text/css' href='/css/styles-private.css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
            <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
        <![endif]-->
        <?php echo $this->fetch('css'); ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <?php 
                    $links = array(
                        'index' => array('class' => '', 'html' => ''),
                        'newchat' => array('class' => '', 'html' => ''),
                        'chats' => array('class' => '', 'html' => ''),
                        'settings' => array('class' => '', 'html' => ''),
                    );
                    
                    $links[$activeOption]['class'] = 'active';

                    $links['index']['html'] = $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'icon glyphicon glyphicon-home btn btn-primary')) . $this->Html->tag('span', 'Inicio'),
                        '/index',
                        array('escape' => false, 'class' => $links['index']['class'])
                    );
                    $links['newchat']['html'] = $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'icon glyphicon glyphicon-plus btn btn-primary')) . $this->Html->tag('span', 'Nueva conversación'),
                        '#',
                        array('escape' => false, 'class' => $links['newchat']['class'])
                    );
                    $links['chats']['html'] = $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'icon glyphicon glyphicon-comment btn btn-primary')) . $this->Html->tag('span', 'Mis conversaciones'),
                        '/index/chats',
                        array('escape' => false, 'class' => $links['chats']['class'])
                    );
                    $links['settings']['html'] = $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'icon glyphicon glyphicon-wrench btn btn-primary')) . $this->Html->tag('span', 'Configuración'),
                        '#',
                        array('escape' => false, 'class' => $links['settings']['class'])
                    );

                    echo <<<NAV
                        <ul class='sidebar-nav'>
                            <li class='sidebar-brand'>
                                <span class='brand-title'>
                                    JoinChat
                                </span>
                                <span class='helper-brand'>JC</span>
                                <a href="#" class="btn btn-default" id="menu-toggle"><span class="icon glyphicon glyphicon-menu-hamburger"></span></a>
                            </li>
                            <li>
                                {$links['index']['html']}
                            </li>
                            <li>
                                {$links['newchat']['html']}
                            </li>
                            <li>
                                {$links['chats']['html']}
                            </li>
                            <li>
                                {$links['settings']['html']}
                            </li>
                            <li>
                                {$this->Html->link(
                                    $this->Html->tag('span', '', array('class' => 'icon glyphicon glyphicon-off btn btn-primary')) . $this->Html->tag('span', 'Cerrar sesión'),
                                    array('controller' => 'Index', 'action' => 'logout'),
                                    array('escape' => false)
                                )}
                            </li>
                        </ul>
NAV;
                ?>
            </div>

            <div id="page-content-wrapper">
                <?php 
                    $flashMsg = $this->Session->flash();
                    $authMsg = $this->Session->flash('auth');

                    if ($flashMsg) :
                ?>
                <div class="alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $flashMsg; ?>
                </div>
                <?php 
                    endif;

                    if ($authMsg) :
                ?>
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $authMsg; ?>
                </div>
                <?php
                    endif;
                    echo $this->fetch('content');
                ?>
            </div>
        </div>

        <script type='text/javascript' src='/js/jquery-1.11.2.min.js'></script>
        <script type='text/javascript' src='/js/bootstrap.min.js'></script>
        <script type='text/javascript'>
            $('#menu-toggle').click(function(e) {
                e.preventDefault();
                $('#wrapper').toggleClass('toggled');
            });
        </script>
        <?php echo $this->fetch('scripts'); ?>
    </body>
</html>