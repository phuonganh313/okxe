$(document).ready(function(){

    var columns = [
        { "data": "id" , "class" : "width5percent" },
        { "data": "id_user" , "class" : "width5percent" },
        { "data": "id_county" , "class" : "width5percent" },
        { "data": "title" , "class" : "width5percent" },
        { "data": "price" , "class" : "width5percent" },
        { "data": "id_brand" , "class" : "width5percent" },
        { "data": "id_model" , "class" : "width5percent" },
        { "data": "year" , "class" : "width5percent" },
        { "data": "name" , "class" : "width5percent" },
        { "data": "phone" , "class" : "width5percent" },
        { "data": "link" , "class" : "width5percent" },
        { "data": "created_at" , "class" : "width5percent" },
        { "data": "imported" , "class" : "width5percent" },
        { "data": "active" , "class" : "width5percent" },
        { "data": "checkbox","class" : "width2percent icon-center"},
    ]

    renderList('#itemTable',orderColumns(columns),baseUrl+'/user/item/list',orderFalse([12,13]));

    $("#itemTable").on("click",".delete",function(){
        if (!confirm('Are you sure to do this ? ')){
            return false;
        }else{
            $.ajax({
                url: baseUrl+"/delete",
                type: 'DELETE',
                data: { 'id': $(this).parent().siblings(":first").text() },
                success: function( msg ) {
                    msg.status ? ( $('#itemTable').DataTable().ajax.reload(null, false) ) : alert(msg.msg);
                },
                error: function(){
                  alert(error_msg);
                },
            });
        }
    });
});
