<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Dillan J. Wilding, Peter Jeon, Thomas Wong" />
        <meta name="description" content="<?php //echo CHtml::encode($this->pageDescription); ?>" />
        <meta name="keywords" content="<?php //echo CHtml::encode($this->pageKeywords); ?>" />

        <link rel="shortcut icon" type="icon" sizes="16x16 32x32" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon32px.png" /> <!-- rel="icon" sizes="any" -->
        
        <?php /*<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="screen, projection" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->*/ ?>
        
        <!-- Bootstrap Core CSS -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        
        <!-- Custom Theme CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/grayscale.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-book.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <header class="navbar navbar-fixed-top" style="background-color:#222222;">
            <nav class="navbar-inner" role="navigation">
                <div class="container"><?php /* container-full-width page-container"> */ ?>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">
                        <span class="light">Partner Up</span>
                    </a>
                    
                    <ul class="nav pull-right">
                        <?php if(Yii::app()->user->isGuest) { ?>
                        <li>
                            <a data-signup-modal href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/create/">Sign Up</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/logout/">Log Out</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav pull-right">
                        <li>
                            <a data-signup-modal href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/game/browse/">Play</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div style="margin-top: 100px;">
        </div>
        <?php echo $content; ?>
        
        <div class="clear"></div>

        <footer>
        </footer>

        <!-- Core JavaScript Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Google Maps API Key - You will need to use your own API key to use the map feature -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/grayscale.js"></script>
    </body>
</html>