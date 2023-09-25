$(function() {
    $('.datepicker').datepicker();
    //Datatable
    $("#promo3_datatable").DataTable({
        order: [[3, 'desc']],
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 
            {
                extend:'csv',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 
            {
                extend:'excel',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 
            {
                extend:'pdf',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 
            {
                extend:'print',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }, 
            'pageLength'
        ],
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: '/promo3/datatable',
            type: 'POST'
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'vip_level' },
            { data: 'prize' },
            { data: 'status' },
            { data: 'claim_date' },
            { data: 'for_date' },
            { data: 'created_at' },
        ]
    });

});
//for toast (notifications)
var toasttarget = document.getElementById('liveToast');
var toast1 = new bootstrap.Toast(toasttarget , []);

function b_down_csv()
{
    $("#crud_form").show();
}

function b_cancel_csv()
{
    $('#csv_file').val("");
    $("#crud_form").hide();
}

function spinner() {
    if ($("#spineradmin").hasClass("d-none")) {
        $("#spineradmin").removeClass("d-none");
    } else {
        $("#spineradmin").addClass("d-none");
    }
}

function b_submit()
{
    $.post("/promo3/download_csv_check",
    {
        status: $('#status').val(), 
        start_date: $('#start_date').val(),
        end_date: $('#end_date').val(),
        dtype: $('#dtype').val(),
    },
    function(data, status){
        if(data.status == 0)
        {
            $.alert({
                title: 'Error',
                icon: 'bi-exclamation-circle',
                type: 'red',
                content: data.validation,
            });
        } else {
            $("#toast_msg").html(data.toast);
            toast1.show();
            window.open( "/promo3/download_csv?status="+$('#status').val()+"&start_date="+$('#start_date').val()+"&end_date="+$('#end_date').val()+"&dtype="+$('#dtype').val() );
        }
    });

}

$('#promo3_datatable').on('click', '.view-details', function() {
    var promoId = $(this).data('id');
    $('#payoutModal').modal('show');
    
    $('#payoutModal').on('click', '.btn-primary', function() {
        var selectedStatus = $('#payout_status').val();
        var alert; // Declare a variable to store the alert object

        $.post("/promo3/payout_status", {
            id: promoId,
            selectedStatus: selectedStatus
        })
        .done(function(response) {
            $("#toast_msg").html('彩金派送状态已更新。');
            toast1.show();
        })
        .fail(function() {
            console.error('Failed to update payout status.');
        })
        .always(function() {
            $('#promo3_datatable').DataTable().ajax.reload();
            $('#payoutModal').modal('hide');
        });
    });
});

