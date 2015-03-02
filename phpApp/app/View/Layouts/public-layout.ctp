<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title><?php echo $this->fetch('title'); ?> | JoinChat</title>
        <link rel='stylesheet' type='text/css' href='/css/bootstrap.theme.min.css'>
        <link rel='stylesheet' type='text/css' href='/css/styles-public.css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
            <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
        <![endif]-->
        <?php echo $this->fetch('css'); ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="centering col-xs-4">
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
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $authMsg; ?>
                    </div>
                    <?php
                        endif;
                        echo $this->fetch('content');
                    ?>
                </div>
            </div>
        </div>
        <script type='text/javascript' src='/js/jquery-1.11.2.min.js'></script>
        <script type='text/javascript' src='/js/bootstrap.min.js'></script>
        <?php echo $this->fetch('scripts'); ?>
    </body>
</html>