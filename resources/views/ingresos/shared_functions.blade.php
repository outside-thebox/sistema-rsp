<script>

    function obtenerCombo(name,selected,url)
    {
        selected = selected || "";
        url = url + "?orderBy[descripcion]=asc";
//        $("select[name="+name+"_id]").empty();
//        $("select[name="+name+"_id]").append("<option value=''>Seleccione</option>");
        $("select[name="+name+"_id]").append("<option value='0'>Seleccione</option>");
        $("select[name="+name+"_id]").trigger('change');
        $.getJSON(url,function(data){
            $.each(data, function(k,v){
                $.each(v, function(l,d){
                    if(d.id == selected)
                    {
                        $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\" selected >"+ d.descripcion+"</option>");
                        $("select[name="+name+"_id]").trigger('change');
                    }
                    else
                        $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\">"+ d.descripcion+"</option>");
                });
            });
        });
    }

    function obtenerComboMultiple(name,selected,url)
    {
        selected = selected || "";
        url = url + "?orderBy[descripcion]=asc";
//        $("select[name="+name+"_id]").empty();
//        $("select[name="+name+"_id]").append("<option value=''>Seleccione</option>");
        $("select[name="+name+"_id]").append("<option value='0'>Seleccione</option>");
//        $("select[name="+name+"_id]").trigger('change');
        $.getJSON(url,function(data){
            $.each(data, function(k,v){
                $.each(v, function(l,d){

                    var array = selected.split(',');
                    var ban = false;
                    $.each(array, function( index, value ) {
//                        console.log(d.id + ": " + d.descripcion);
//                        console.log( index + ": " + value );
                        if(d.id == value)
                            ban = true;
                    });

                    if(ban)
                    {
                        $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\" selected >"+ d.descripcion+"</option>");
                        $("select[name="+name+"_id]").trigger('change');
                    }
                    else
                        $("select[name="+name+"_id]").append("<option value=\""+ d.id+"\">"+ d.descripcion+"</option>");
                });
            });
        });

//        $("select[name="+name+"_id]").val(["Causa judicial 1"]);

    }


</script>