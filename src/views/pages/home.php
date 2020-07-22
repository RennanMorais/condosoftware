<html>
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, Users-scalable=no' name='viewport'>
    <title>Condo System</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/all.min.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/template.css">
</head>
<body>
    
    <div class="topbar">
        <div class="topbar-int">
            <a href="<?=$base;?>"><div class="logo"><img src="assets/images/logo_condo.png" width="150"></div></a>
            <div class="menu-mobile-btn"><span class="fa fa-bars fa-lg"></span></div>
            <div class="topbar-menu">
                <nav class="menu">
                    <ul>
                        <li id="btn-inicio">Início</li>
                        <li id="btn-quemsomos">Quem somos</li>
                        <li id="btn-sistema">O sistema</li>
                        <li id="btn-contato">Contato</li>
                        <li><a href="<?=$base;?>/app" class="btn btn-info">Acesso ao sistema</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <ul class="menu-mobile">
            <li id="btn-inicio-m">Início</li>
            <li id="btn-quemsomos-m">Quem somos</li>
            <li id="btn-sistema-m">O sistema</li>
            <li id="btn-contato-m">Contato</li>
            <li><a href="<?=$base;?>/login" class="btn btn-info">Acesso ao sistema</a></li>
        </ul>
    </div>

    <section class="section-banner">
        <div class="bg-video">
            <video autoplay loop muted src="<?=$base;?>/media/banner-condo.mp4"></video>
        </div>
    
        <div class="conteiner-bg">
            <h1>Conheça o CondoSystem</h1>

            <p>Simplicado, agil e super facil de usar!</p>

            <div class="center"><a href="#" id="btn-banner" class="classname">Saiba Mais!</a> <!--Botão saiba mais--></div>

            
        </div>
    </section>

    <section class="section-0">
        
        <div class="section-0-content">
            <h1>Quem somos nós?</h1>
            <p>A Condosoftware tem o objetivo de levar a tecnologia aos condomínios de porte pequeno, com uma plataforma que realize a integração de serviços pontuais como, pagamentos, gerenciamento de incidentes e de inadimplentes. A empresa entende que seu grande diferencial é olhar para administradores com a necessidade de implantação de um sistema de gerenciamento para uma administração predial mais conclusiva e clara a todos.</p>
        </div>

        <div class="section-0-img">
            <img src="<?=$base;?>/assets/images/empresa.jpg" width="100%" height="100%">
        </div>
        
    </section>
    
    <section class="section-1">
        <div class="section-1-img">
            <img src="<?=$base;?>/assets/images/responsivo.jpg" width="100%">
        </div>

        <div class="section-1-content">
            <h1>Sistema responsivo, acesse de qualquer dispositivo!</h1>
            <p>Nosso sistema foi desenhado para que voce não tenha complicações na hora de solicitar ou resolver seus problemas no seu apartamento ou no prédio comercial. Ele é rápido, visual limpo e muito fácil de usar!</p>
            <p>Acesse pelo computador, celular e pelo seu tablet. Ele é responsivo e funciona perfeitamente em qualquer dispositivo.</p>
            <a href="<?=$base;?>/login" class="btn btn-info" style="margin-left:50px;margin-top:10px">Acesso ao sistema</a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-info-int">
            <div class="footer-info-1">
                <h4>E-mail</h4>
                <p>contato@condosoftware.com</p>
                <p>suporte@condosoftware.com</p>
                <img src="<?=$base;?>/assets/images/logo_condo.png" width="200">
            </div>
    
            <div class="footer-info-2">
                <h4>Telefone</h4>
                <p>(11) 5678-1234</p>
                <p>(11) 98765-4321</p>
            </div>
    
            <div class="footer-info-2">
                <h4>Endereço</h4>
                <p>Av. Paulista, 1578 - Bela Vista - São Paulo/SP</p>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/all.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>                      
</body>
</html>