<?php 
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('simple_html_dom.php');

    $n_guia = 12;
    //$n_guia = $_GET['nroGuia']; //Numero de la guia q deberia venir por POST ej:2001698095
    $url = "http://saferbo.com/verguiasnv2.redireccionador.php?strdocumentos=1&consult=Consultar";
    $html = file_get_html($url);

    foreach ($html as $value) {
        echo $value;
    }

    foreach($html->find('table.[id=form01:pgDetail]') as $element) {
        //echo $element;
        //RECORRO EL HTML Y SU CONTENIDO Y LO ALMACENO EN ARREGLOS
        foreach ($element->find('table.[id=form01:j_id1394398698_531cde6d]') as $value) {
            //echo $value;
            foreach($value->find('span') as $article) {
                //var_dump($article->nodes[0]->_);
                foreach ($article->nodes[0]->_ as $text) {
                    $arreglo [] = str_replace(":","", $text);
                }
            }
        }
        
        foreach ($element->find('table.[id=form01:j_id1394398698_531cd9d7]') as $value) {
           //echo $value;
            foreach($value->find('span') as $article) {
                //var_dump($article->nodes[0]->_);
                foreach ($article->nodes[0]->_ as $text) {
                    $arreglo1 [] = str_replace(":","", $text);
                }
            }
        }

        foreach ($element->find('table.[id=form01:j_id1394398698_531cd882]') as $value) {
           //echo $value;
            foreach($value->find('span') as $article) {
                //var_dump($article->nodes[0]->_);
                foreach ($article->nodes[0]->_ as $text) {
                    $arreglo2 [] = str_replace(":","", $text);
                }
            }
        }  

        foreach ($element->find('table.[id=form01:pgDetailNational2]') as $value) {
           //echo $value;
            foreach($value->find('span') as $article) {
                //var_dump($article->nodes[0]->_);
                foreach ($article->nodes[0]->_ as $text) {
                    $arreglo3 [] = str_replace(" ","", $text);
                }
            }
        }  

        foreach ($element->find('tbody.[id=form01:tableEx4_data]') as $value) {
            //echo $value;
            foreach($value->find('span') as $article) {
                foreach ($article->nodes[0]->_ as $text) {
                    $arreglo4 [] = $text;
                }
            }
        }    
    }
    
?>