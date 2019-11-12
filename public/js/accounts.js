$(document).ready(function(){

    var columns = [
        { "data": "id" , "class" : "width5percent" },
        { "data": "name" , "class" : "width5percent" },
        { "data": "email" , "class" : "width5percent" },
        { "data": "phone" , "class" : "width5percent" },
        { "data": "facebook_name" , "class" : "width5percent" },
        { "data": "facebook_url" , "class" : "width5percent" },
        { "data": "threshold" , "class" : "width5percent" },
        { "data": "bank_name" , "class" : "width5percent" },
        { "data": "bank_branch" , "class" : "width5percent" },
        { "data": "beneficiary_account" , "class" : "width5percent" },
        { "data": "beneficiary_name" , "class" : "width5percent" },
        { "data": "price" , "class" : "width5percent" },
        { "data": "created_at" , "class" : "width5percent" },
    ]

    renderList('#itemTable',orderColumns(columns),baseUrl+'/admin/getaccountlist',orderFalse([]));

    var dataTable = $('#itemTable').DataTable();

    $("#itemTable").on("click",".action", function(){
        if (!confirm('Are you sure to do this ?')){
            return false;
        }else{
            var stt = ( $(this).hasClass('ban') ) ? 'Banned' : 'Active';
            $.ajax({
                url: baseUrl+"/accounts/action",
                type: 'PATCH',
                data: { 'id': $(this).parent().siblings(":first").text(), 'status': stt },
                success: function( msg ) {
                    msg.status ? ( dataTable.ajax.reload(null, false) ) : alert(msg.msg);
                }
            });
        }
    });

    $('.search-regis-date').datepicker({
        format:'DD/MM/YYYY'
    });
    $('.search-visit-date').datepicker({
        format:'DD/MM/YYYY'
    });

});
