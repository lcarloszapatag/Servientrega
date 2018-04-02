<?php 
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('simple_html_dom.php');

    //$n_guia = 2001698095;
    $n_guia = $_GET['nroGuia']; //Numero de la guia q deberia venir por POST ej:2001698095
    $url = "https://www.servientrega.com/RastreoContado/RastreoContado2.faces?idGuia=$n_guia&idPais=1";
    $html = file_get_html($url);

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
    //var_dump($arreglo4);
    //CREO LOS ARRAYS ASOCIATIVOS
    /*
        $array = [
            "$arreglo[0]" => "$arreglo[1]",
            "$arreglo[2]" => "$arreglo[3]",
            "$arreglo[4]" => "$arreglo[5]",
            "$arreglo[6]" => "$arreglo[7]"
        ];

        $array1 = [
            "$arreglo1[4]" => "$arreglo1[5]",
            "$arreglo1[6]" => "$arreglo1[7]",
            "$arreglo1[8]" => "$arreglo1[9]",
            "$arreglo1[10]" => "$arreglo1[11]",
            "$arreglo1[12]" => "$arreglo1[13] $arreglo1[15]"
        ];

        $array2 = [
            "$arreglo2[0]" => "$arreglo2[1]",
            "$arreglo2[2]" => "$arreglo2[3]",
            "$arreglo2[4]" => "$arreglo2[5]",
            "$arreglo2[6]" => "$arreglo2[7]",
            "$arreglo2[8]" => "$arreglo2[9]",
            "$arreglo2[10]" => "$arreglo2[11]"
        ];

        $array3 = ["$arreglo3[0]" => [ "$arreglo3[6]" => ["$arreglo4[0]",
                                                          "$arreglo4[3]",
                                                          "$arreglo4[6]",
                                                          "$arreglo4[9]",
                                                          "$arreglo4[12]",
                                                          "$arreglo4[15]",
                                                          "$arreglo4[18]",
                                                          "$arreglo4[21]",
                                                          "$arreglo4[24]",
                                                          "$arreglo4[27]",
                                                          "$arreglo4[30]",
                                                          "$arreglo4[33]",
                                                          "$arreglo4[36]",
                                                          "$arreglo4[39]",
                                                          "$arreglo4[42]"
                                                         ], 
                                       "$arreglo3[12]" => ["$arreglo4[1]",
                                                           "$arreglo4[4]",
                                                           "$arreglo4[7]",
                                                           "$arreglo4[10]",
                                                           "$arreglo4[13]",
                                                           "$arreglo4[16]",
                                                           "$arreglo4[19]",
                                                           "$arreglo4[22]",
                                                           "$arreglo4[25]",
                                                           "$arreglo4[28]",
                                                           "$arreglo4[31]",
                                                           "$arreglo4[34]",
                                                           "$arreglo4[37]",
                                                           "$arreglo4[40]",
                                                           "$arreglo4[43]"
                                                          ], 
                                       "$arreglo3[18]" => ["$arreglo4[2]",
                                                           "$arreglo4[5]",
                                                           "$arreglo4[8]",
                                                           "$arreglo4[11]",
                                                           "$arreglo4[14]",
                                                           "$arreglo4[17]",
                                                           "$arreglo4[20]",
                                                           "$arreglo4[23]",
                                                           "$arreglo4[26]",
                                                           "$arreglo4[29]",
                                                           "$arreglo4[32]",
                                                           "$arreglo4[35]",
                                                           "$arreglo4[38]",
                                                           "$arreglo4[41]",
                                                           "$arreglo4[44]"
                                                          ] 
                                     ] 
                  ];
    */

    //ASOCIO TODOS LOS ARRAYS A UNO SOLO 
    //$array_complete = [$array, $array1, $array2, $array3];

    $fecha_entrega = explode(" ", $arreglo2[3]);
    $hora_entrega = explode(" ", $arreglo2[7]);
    $fecha2 = explode(" ", $arreglo4[2]);
    $fecha5 = explode(" ", $arreglo4[5]);
    $fecha8 = explode(" ", $arreglo4[8]);
    $fecha11 = explode(" ", $arreglo4[11]);
    $fecha14 = explode(" ", $arreglo4[14]);
    $fecha17 = explode(" ", $arreglo4[17]);
    $fecha20 = explode(" ", $arreglo4[20]);
    $fecha23 = explode(" ", $arreglo4[23]);
    $fecha26 = explode(" ", $arreglo4[26]);
    $fecha29 = explode(" ", $arreglo4[29]);
    $fecha32 = explode(" ", $arreglo4[32]);
    $fecha35 = explode(" ", $arreglo4[35]);
    $fecha38 = explode(" ", $arreglo4[38]);
    $fecha41 = explode(" ", $arreglo4[41]);
    $fecha44 = explode(" ", $arreglo4[44]);

    $array_complete = [
                        "codigo_remision" => "$arreglo[1]",
                        "descripcion_estado" => "$arreglo[3]",
                        "nombre_destino" => "$arreglo1[7]",
                        "fecha_entrega" => "$fecha_entrega[0]",
                        "hora_entrega" => "$hora_entrega[1]",
                        "detalle_estados" => [
                                                [   
                                                    "codigo_estado" => "",  
                                                    "descripcion" => "$arreglo4[0]", 
                                                    "fecha" => "$fecha2[0]",
                                                    "hora" => "$fecha2[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[3]", 
                                                    "fecha" => "$fecha5[0]",
                                                    "hora" => "$fecha5[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[6]", 
                                                    "fecha" => "$fecha8[0]",
                                                    "hora" => "$fecha8[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[9]", 
                                                    "fecha" => "$fecha11[0]",
                                                    "hora" => "$fecha11[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[12]", 
                                                    "fecha" => "$fecha14[0]",
                                                    "hora" => "$fecha14[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[15]", 
                                                    "fecha" => "$fecha17[0]",
                                                    "hora" => "$fecha17[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[18]", 
                                                    "fecha" => "$fecha20[0]",
                                                    "hora" => "$fecha20[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[21]", 
                                                    "fecha" => "$fecha23[0]",
                                                    "hora" => "$fecha23[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[24]", 
                                                    "fecha" => "$fecha26[0]",
                                                    "hora" => "$fecha26[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[27]", 
                                                    "fecha" => "$fecha29[0]",
                                                    "hora" => "$fecha29[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[30]", 
                                                    "fecha" => "$fecha32[0]",
                                                    "hora" => "$fecha32[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[33]", 
                                                    "fecha" => "$fecha35[0]",
                                                    "hora" => "$fecha35[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[36]", 
                                                    "fecha" => "$fecha38[0]",
                                                    "hora" => "$fecha38[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[39]", 
                                                    "fecha" => "$fecha41[0]",
                                                    "hora" => "$fecha41[1]"
                                                ],
                                                [
                                                    "codigo_estado" => "", 
                                                    "descripcion" => "$arreglo4[42]", 
                                                    "fecha" => "$fecha44[0]",
                                                    "hora" => "$fecha44[1]"
                                                ]
                                            ]
                        /*
                            ["$arreglo3[6]" => [
                                                                    "$arreglo4[0]",
                                                                    "$arreglo4[3]",
                                                                    "$arreglo4[6]",
                                                                    "$arreglo4[9]",
                                                                    "$arreglo4[12]",
                                                                    "$arreglo4[15]",
                                                                    "$arreglo4[18]",
                                                                    "$arreglo4[21]",
                                                                    "$arreglo4[24]",
                                                                    "$arreglo4[27]",
                                                                    "$arreglo4[30]",
                                                                    "$arreglo4[33]",
                                                                    "$arreglo4[36]",
                                                                    "$arreglo4[39]",
                                                                    "$arreglo4[42]"
                                                                 ], 
                               "$arreglo3[12]" => [  
                                                    "$arreglo4[1]",
                                                    "$arreglo4[4]",
                                                    "$arreglo4[7]",
                                                    "$arreglo4[10]",
                                                    "$arreglo4[13]",
                                                    "$arreglo4[16]",
                                                    "$arreglo4[19]",
                                                    "$arreglo4[22]",
                                                    "$arreglo4[25]",
                                                    "$arreglo4[28]",
                                                    "$arreglo4[31]",
                                                    "$arreglo4[34]",
                                                    "$arreglo4[37]",
                                                    "$arreglo4[40]",
                                                    "$arreglo4[43]"
                                                  ], 
                               "$arreglo3[18]" => [  
                                                    "$arreglo4[2]",
                                                    "$arreglo4[5]",
                                                    "$arreglo4[8]",
                                                    "$arreglo4[11]",
                                                    "$arreglo4[14]",
                                                    "$arreglo4[17]",
                                                    "$arreglo4[20]",
                                                    "$arreglo4[23]",
                                                    "$arreglo4[26]",
                                                    "$arreglo4[29]",
                                                    "$arreglo4[32]",
                                                    "$arreglo4[35]",
                                                    "$arreglo4[38]",
                                                    "$arreglo4[41]",
                                                    "$arreglo4[44]"
                                                  ] 
                              ] 
                        */
                    ];
    
    $i = 0;
    while ($i <= 14) {
        if ($array_complete['detalle_estados'][$i]['descripcion'] == '') {
            unset($array_complete['detalle_estados'][$i]);
        }else{
            // echo 'Tiene Datos no lo borro';
            // echo '<br>';
        }

        $i++;  
    }

    var_dump($array_complete);

    //CONVIERTO ARRAY A JSON
    echo $json_servientrega_guia = json_encode($array_complete);
?>