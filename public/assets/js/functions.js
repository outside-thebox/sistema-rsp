function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo!='')) {
        return true;
    } else {
        return false;
    }
}

function existeFecha2 (fecha) {
    var fechaf = fecha.split("/");
    var d = fechaf[0];
    var m = fechaf[1];
    var y = fechaf[2];
    return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
}

function validDate(fecha,descripcion)
{
    // fecha = $('input:text[name=fecha_inscripcion]').val();
    // descripcion = "fecha de inscripción";
    if(fecha.length>0)
    {
        if(validarFecha(fecha,descripcion))
        {
            var mensaje = validarFecha(fecha,descripcion);
            darMensaje(mensaje);
            return true;
        }
    }
    return false;
}

function validarFecha(fecha,label)
{
    if(validarFormatoFecha(fecha)){
        if(existeFecha2(fecha)){
            return false;
        }else{
            return "La fecha del campo " + label + " no existe";
        }
    }else{
        return "El formato de la fecha del campo " + label + " es incorrecto";
    }
}