<?php 
    require_once('simple_html_dom.php');

    // if (isset($_POST['nroGuia']) AND $_POST['nroGuia'] != '') {
        $n_guia = 2001698095;
        //$n_guia = $_POST['nroGuia']; //Numero de la guia q deberia venir por POST ej:2001698095
        $url = "https://www.servientrega.com/RastreoContado/RastreoContado2.faces?idGuia=$n_guia&idPais=1";
        $html = file_get_html($url);

        foreach($html->find('div.fondoApp') as $element) {
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Trazabilidad del envio</title>
                <link type="text/css" rel="stylesheet" href="RastreoContado/resources/primefaces/primefaces.css" />
                <link type="text/css" rel="stylesheet" href="RastreoContado/theme/theme.css" />
                <link rel="stylesheet" type="text/css" href="RastreoContado/theme/stylesheet.css" title="Style" />
                <script type="text/javascript" src="RastreoContado/resources/primefaces/jquery/jquery.js"></script>
                <script type="text/javascript" src="RastreoContado/resources/primefaces/jquery/jquery-plugins.js"></script>
                <script type="text/javascript" src="RastreoContado/resources/primefaces/primefaces.js"></script>
                <script type="text/javascript" src="RastreoContado/js/customJS.js"></script>
            </head>
            <body>
                <div style="top:50%; left:50%; margin-left:200px; margin-top:50px;">
<?php   
            foreach($element->find('table.[id=form01:pgDetail]') as $formato) {
                foreach($formato->find('a') as $reimpresion) {
?>
                    <a href="<?php echo $reimpresion->attr['href']; ?>" >
                        <img src="RastreoContado/theme/digital.gif" alt="Reimprimir guia" style="margin-left:750px;">
                    </a>
<?php 
                }
            }

            foreach($element->find('table.[id=form01:pgDetailNational]') as $formato) {
                echo $formato;
            }
        }
?>
                </div>
            </body>
            </html>
<?php
    // }else{
        // echo 'Debes agregar el número de la guía';
    // }
?>