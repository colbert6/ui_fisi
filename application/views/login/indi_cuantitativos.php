<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unidad de Investigación UNSM-T</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-login.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/uniform.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/matrix-media.css" />
        <link href="<?php echo base_url();?>librerias/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/css/jquery.gritter.css" />
        <script src="<?php echo base_url();?>librerias/js/jquery.min.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/portada/master.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>librerias/portada/normalize.css" />
        
        <?php
            $username = array('name' => 'username', 'placeholder' => 'Ingrese Usuario');
            $password = array('name' => 'password', 'placeholder' => 'introduce tu password');
            $submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-success');
        ?>
    </head>

    <body>
        <div class="content">
            <header id="main-header" class="cf">
                <nav id="main-nav" class="cf">
                    
                    <div class="menu-main-menu-container">
                        <ul id="menu-main-menu" class="menu">
                            <li id="menu-item-1648" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1648"><a href="<?php echo base_url();?>">Inicio</a></li>
                            <li id="menu-item-3521" class="featured menu-item menu-item-type-custom menu-item-object-custom menu-item-3521"><a data-target="#Login" data-toggle="modal">Ingresar</a></li>
                        </ul>
                    </div>     
                </nav>
            </header>

            <div class="container-fluid"><hr>
                <div>
                    <h2><center>Indicadores Cuantitativos</center></h2>
                </div>
                <div class="row-fluid">
                    


                </div>
            </div>  

            <!-- Para Logearse-->
            <div class="modal fade" id="Login" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><center><b> Login Usuario </b></center></h4>                       
                        </div>
                        <center>
                            <div class="row-fliud"><br>
                                <div class="span5">
                                    
                                        <?=form_open('login/new_user')?>    

                                        <form method="POST" class="form-vertical" id="loginadmin">
                                            <div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>librerias/img/logo/ui_unsm.png" alt="Logo" /></h3></div>

                                            <div style="width: 100%;height: 1px; background-color: #D8D8D8;"></div>

                                            <?php 
                                                if($this->session->flashdata('usuario_incorrecto'))
                                                {
                                                    echo '<p>'.$this->session->flashdata('usuario_incorrecto') . '</p>';
                                                }
                                            ?><br>
        
                                            <div class="control-group">
                                                <div class="controls">
                                                    <label class="span1 control-label">Usuario: </label>
                                                    <div class="span3">
                                                        <?=form_input($username)?><p><?=form_error('username')?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <label class="span1 control-label">  Clave: </label>
                                                    <div class="span3">
                                                        <?=form_password($password)?><p><?=form_error('password')?></p>
                                                        <?=form_hidden('token',$token)?>
                                                    </div>
                                                </div>
                                            </div><br><br><br>

                                            <div class="form-actions">
                                                <center>
                                                    <?=form_submit($submit)?>
                                                </center>
                                            </div>
                                        <?=form_close()?>
                                    
                                </div>

                                <div id="AlertaLogin" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>Alert modal</h3>
                                    </div>

                                    <div class="modal-body">
                                        <center> <span aria-hidden='true'></span> <b> El Usuario no Existe </b> </center>
                                    </div>

                                    <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirmar</a></div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>librerias/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>librerias/js/matrix.login.js"></script>
    

        <script type="text/javascript">

            Highcharts.chart('container', {
                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },

                title: {
                    text: 'Speedometer'
                },

                pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                        backgroundColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
                },

                // the value axis
                yAxis: {
                    min: 0,
                    max: 100,

                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',

                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                        step: 2,
                        rotation: 'auto'
                    },
                    title: {
                        text: '%'
                    },
                    plotBands: [{
                        from: 0,
                        to: 33,
                        color: '#DF5353' // green
                    }, {
                        from: 33,
                        to: 66,
                        color: '#DDDF0D' // yellow
                    }, {
                        from: 66,
                        to: 100,
                        color: '#55BF3B' // red
                    }]
                },

                series: [{
                    name: 'Speed',
                    data: [80],
                    tooltip: {
                        valueSuffix: ' Proyectos'
                    }
                }]

            },
            // Add some life
            function (chart) {
                if (!chart.renderer.forExport) {
                    setInterval(function () {
                        var point = chart.series[0].points[0],
                            newVal,
                            inc = Math.round((Math.random() - 0.5) * 20);

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);

                    }, 3000);
                }
            });
        </script>

        <style type="text/css">
            #main-header {
                margin-top: 0;
                position: fixed;
            }
            body {
                background: #ffffff;
                height: 500px;
            }
            .widget-box {
                background: none repeat scroll 0 0 #ffffff;
            }

            select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
                height: 40px;

            }
        </style>
        
    </body>
</html>
