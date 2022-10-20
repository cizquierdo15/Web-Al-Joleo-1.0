//variables
  var tablero =  [];
  //arr que guarda las mesas
  var mesasCreadas = [];
  var contMesitas = 0;
  let lastMesaPinchada;

//rellenar tablero
for (let i = 0; i < 5; i++) {
   tablero.push([0,0,0,0,0,]);
}

//fun crea mesa pequeña
let mesaPara4 =()=>{
   let mesa = new Map();
   
   let ocupada = false;
   let fechaActual = new Date();
   let fila = "";
   let colu = "";
   let posi = addFilayCol();
 
   mesa.set("num",contMesitas++);
   mesa.set("tipo","pequeña");
   mesa.set("comensales",4);
   mesa.set("fecha",fechaActual);
   mesa.set("posicion", [posi[0],posi[1]]);
   console.log(mesa.get("posicion"));
   mesa.set("ocupada",ocupada);

   return mesa;
}

//asigna las filas y cols en funcion del cont
let addFilayCol = ()=>{
  if (contMesitas == 0){
    fila = 0; colu = 0; 
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }
  //el resto de ifs son lo mismo
  if (contMesitas == 1){
    fila = 0; colu = 2;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }
       
  if (contMesitas == 2){
    fila = 0; colu = 4; 
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }

  if (contMesitas == 3){
    fila = 2; colu = 0;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }

  if (contMesitas == 4){
    fila = 2; colu = 2;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }

  if (contMesitas == 5){
    fila = 2; colu = 4;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }
     
  if (contMesitas == 6){
    fila = 4; colu = 0;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }

  if (contMesitas == 7){
    fila = 4; colu = 2;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }

  if (contMesitas == 8){
    fila = 4; colu = 4;  
    tablero[fila][colu] = 1; console.log(fila + " " + colu);
  }
  return [fila,colu];
       
}

//añadir 9 mesas
function crearMesas () {
   for(let i = 0; i < 9; i++){
      let mesita = mesaPara4();
      mesasCreadas.push(mesita);
   }
}


//al hacer click sobre una celda, comprueba si hay mesa o no
function disparo(e){
  //cambia de color la anterior para ayudar al usu
  if (lastMesaPinchada != undefined) {
    lastMesaPinchada.style.border="4px solid orange";
  }

	let idCelda=this.id;
	console.log(idCelda);

	let fila=idCelda.substring(3,4);
	let col=idCelda.substring(5);

		if(tablero[fila][col] == 1 ){
      lastMesaPinchada = this;
			// this.style.backgroundColor="green";
      this.style.border="4px solid green";
      this.classList.add("reservando");

      mesasCreadas.forEach(function(e) {
        //condicion para saber cual ha sido
        if (fila == e.get("posicion")[0] && col == e.get("posicion")[1]) {
          let pos = e.get("num");
          console.log("mesa "+pos);
          //rellenar div respuesta
          let d_respuesta = document.querySelector('.respuesta');
          d_respuesta.innerHTML = pos;
          d_respuesta.value = pos;
        }
      });
			
		}else{
			alert("No hay mesa ahi");		
		}   
}

//agregar evento a las celdas
let todasCeldas=document.getElementsByTagName("td");
let arrayTodasCeldas=Array.from(todasCeldas);

//añadir el evento a las celdas
arrayTodasCeldas.forEach(function(e){ e.addEventListener("click",disparo); })

//llamar a crear las mesas
crearMesas();