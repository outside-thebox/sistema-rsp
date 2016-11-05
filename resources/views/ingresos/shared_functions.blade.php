<script>

    function obtenerCombo(name,selected,url)
    {
        selected = selected || "";
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


</script>