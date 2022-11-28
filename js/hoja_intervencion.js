// CANVAS 1
var btn_guardar_1=document.getElementById("btn_guardar_1");
var canvas_1 = document.getElementById("imagen_1");
var ctx_1 = canvas_1.getContext("2d");
var img_1 = new Image();
img_1.src = "<?php echo $nombre_img_1?>";
ctx_1.drawImage(img_1, 0, 0);
img_1.onload = function(){
    ctx_1.drawImage(img_1, 0, 0);
}

var miCanvas_1 = document.querySelector('#imagen_1');
var lineas_1 = [];
var correccionX_1 = 0;
var correccionY_1 = 0;
var pintarLinea_1 = false;
// Marca el nuevo punto
var nuevaPosicionX_1 = 0;
var nuevaPosicionY_1 = 0;

var posicion_1 = canvas_1.getBoundingClientRect()
correccionX_1 = posicion_1.x;
correccionY_1 = posicion_1.y;

canvas_1.width = 750;
canvas_1.height = 400;



function empezarDibujo_1 () {
    pintarLinea_1 = true;
lineas_1.push([]);
};

function guardarLinea_1() {
    lineas_1[lineas_1.length - 1].push({
        x: nuevaPosicionX_1,
        y: nuevaPosicionY_1
    });
}


 * Funcion dibuja la linea
    */
function dibujarLinea_1 (event) {
    event.preventDefault();
    if (pintarLinea_1) {
        var ctx_1 = miCanvas_1.getContext('2d')
        // Estilos de linea
        ctx_1.lineJoin = ctx_1.lineCap = 'round';
        ctx_1.lineWidth = 2;
        // Color de la linea
        ctx_1.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_1 = event.layerX;
            nuevaPosicionY_1 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_1 = event.changedTouches[0].pageX - correccionX_1;
            nuevaPosicionY_1 = event.changedTouches[0].pageY - correccionY_1;
        }
        // Guarda la linea
        guardarLinea_1();
        // Redibuja todas las lineas guardadas
        ctx_1.beginPath();
        lineas_1.forEach(function (segmento_1) {
            ctx_1.moveTo(segmento_1[0].x, segmento_1[0].y);
            segmento_1.forEach(function (punto_1, index_1) {
                ctx_1.lineTo(punto_1.x, punto_1.y);
            });
        });
        ctx_1.stroke();
    }
}

/**
 * Funcion que deja de dibujar la linea
    */
function pararDibujar_1 () {
    pintarLinea_1 = false;
    guardarLinea_1();
}
// Eventos raton
miCanvas_1.addEventListener('mousedown', empezarDibujo_1, false);
miCanvas_1.addEventListener('mousemove', dibujarLinea_1, false);
miCanvas_1.addEventListener('mouseup', pararDibujar_1, false);

// Eventos pantallas táctiles
miCanvas_1.addEventListener('touchstart', empezarDibujo_1, false);
miCanvas_1.addEventListener('touchmove', dibujarLinea_1, false);


btn_guardar_1.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_1.toDataURL("image/png");
    const fd_1 = new FormData();
    fd_1.append("imagen_1", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_1.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_1,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};


function reset_imagen(i) {
    console.log("i="+i);
    modelo=document.getElementById("modelo").value;
    console.log("modelo="+modelo);
    var canvas = document.getElementById("imagen_"+i);
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "imagenes/imagen_hoja_intervencion_"+modelo+"_f100.jpg";
    ctx.drawImage(img, 0, 0);
    img.onload = function(){
        ctx_1.drawImage(img, 0, 0);
    }
}