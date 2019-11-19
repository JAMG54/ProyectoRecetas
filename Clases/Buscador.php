<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Buscador
 *
 * @author cristhian
 */
class Buscador {
    //put your code here
   public function BuscadorR(){
       $html = '<div>'
               . '
        <br><br>
        <input type = "text" name = "buscador" id = "buscador" placeholder = "Buscar Recetas ..." onkeyup="buscar();">
        <div id = "resultado" name = "resultado"></div>
        <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
        <script type = "text/javascript" src="../Js/funBusqueda.js"></script>
        </div>';
               
      return $html;
   } 
    
   
}
