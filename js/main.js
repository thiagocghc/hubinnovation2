const q1 = document.getElementById("q1");

function mudarPagina(link){ 
    let largura = window.innerWidth;
    if(largura <= 2040){
        q1.style.transform = "scale(250)";
        // diga sim ao php! 
    }
    else if(largura > 2040 && largura < 3500){
        q1.style.transform = "scale(420)";
    }else{
        q1.style.transform = "scale(650)";
    }
    setTimeout(()=> {
        // pagina de cadastro aqui 
        
        window.location.href = "../participante.php?id_palestra="+link;
	q1.style.transform = "scale(0)";    
    }
      ,900)
}

 
var texto = "";

var i = 0;
var id = null

 function myLoop(numId,textoCompleto) {   
    
 

    var timeout = setTimeout(function() {   
        if(id == null){

            var id = numId

        }if(id == numId){


            texto = texto + textoCompleto[i]

            var titulo = document.getElementById("titulo"+numId);
        
            if(titulo.innerText == textoCompleto){
        
            }else{
        
                titulo.innerText = texto + "|"
                i++;         
                
                if (i < textoCompleto.length) {
                       
                    myLoop(numId,textoCompleto);  
            
                }else{
    
                  titulo.innerText = texto
                  i = 0
                  texto = ""
                  id=null
                  
                }            
        
        
            }

        }
        

     
  },50)

      
    
    
  
}
// myLoop(1,"22 vagas")
