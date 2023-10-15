var fila = true;
function columna(){
    var fotos = document.querySelectorAll(".fotos");
    for (var i = 0; i < fotos.length;i++) {
        if(fila){
        fotos[i].style.display="flex";
        fotos[i].style.flexDirection="column";
        fotos[i].style.flexWrap="nowrap";
        fotos[i].style.justifyContent="flex-start";
        fotos[i].style.alignItems="center";
        fotos[i].style.alignContent="stretch";
        }else{
            fotos[i].style.display="flex";
            fotos[i].style.flexDirection="row"; 
            fotos[i].style.flexWrap="wrap";
            fotos[i].style.justifyContent="space-evenly";
            fotos[i].style.alignItems="stretch";
            fotos[i].style.alignContent="sspace-around";
            }
        }
       fila =!fila; 
    }


