/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function buscar(){
    var txt = document.getElementById("buscador").value;
    var parametros = {
       "texto": txt  
    };
    $.ajax({
       data:parametros,
       url:"../servidor/Cbuscador.php",
       type:"POST",
        success: function (response) {
            $("#resultado").html(response);
        }
    });
}
