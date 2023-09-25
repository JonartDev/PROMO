$(function() {
    $('.datepicker').datepicker();
    //Datatable
    $("#promo8167_datatable").DataTable({
        order: [[2, 'desc']],
        dom: 'Bfrtip',
        pageLength: 50,
        lengthMenu: [
            [10, 25, 50, 100, 250],
            [10, 25, 50, 100, 250],
        ],
        buttons: [
            {
                extend:'copy',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }, 
            {
                extend:'csv',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }, 
            {
                extend:'excel',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }, 
            {
                extend:'pdf',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }, 
            {
                extend:'print',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }, 
            'pageLength'
        ],
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: '/promo8167userinfo/datatable',
            type: 'POST'
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'total_bet' },
            { data: 'vip_level' },
            { data: 'created_at' },
            { data: 'updated_at' }
        ]
    });

});
//for toast (notifications)
var toasttarget = document.getElementById('liveToast');
var toast1 = new bootstrap.Toast(toasttarget , []);


function b_submit()
{
    $("#toast_msg").html('Download Started.');
    toast1.show();
    window.open( "/promo8167userinfo/download_csv" );
}
