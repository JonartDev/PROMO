$(function() {
    $('#claim_date, #win_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
      });
      
      // Set default value to empty string
      $('#claim_date, #win_date').val('');
    
    //Datatable
    $("#dailysummary_datatable").DataTable({
        order: [[0, 'asc']],
        dom: 'Bfrtip',
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, 100, 250],
            [10, 25, 50, 100, 250],
        ],
        searching: false,
        destroy: true,
        processing: true,
        serverSide: false,
        paging: true,
        ajax: {
            url: '/dailysummary/datatable',
            type: 'POST',
            data:{
                promotype:$('#promotype').val(),
                username:$('#username').val(),
                status: $('#status').val(),
                claim_date:$('#claim_date').val(),
                win_date:$('#win_date').val(),
            }
           
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'prize' },
            { data: 'p_type' },
            { data: 'paid_date'},
            {
                data: '已付',
                render: function(data, type, row) {
                    if (data == 1) {
                        return '已付';
                    } else {
                        return '未付';
                    }
                }
            },
            {
                render: function (data, type, row) {
                    if(row.paid_date)return '<span>已付</span>';
                    return '<button onclick="b_payout('+row.id+', `'+row.p_type1+'`)" class="btn btn-warning btn-sm me-2 my-1 btn_pay" type="button">支付/Payout</button>';
                },
                orderable: false
            },
        ]
    });
    
});
//for toast (notifications)
var toasttarget = document.getElementById('liveToast');
var toast1 = new bootstrap.Toast(toasttarget , []);

function b_payout(id, type)
{
    spinner()
    $.ajax({
        type: "POST",
        url: "/dailysummary/payout",
        data: {
            id: id,
            type: type
        },
        success: function(response) {
           if(response.status>0)$("#dailysummary_datatable").DataTable().ajax.reload();
           spinner()

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        }
    });
}

function b_filter()
{
    $("#dailysummary_datatable").DataTable({
        order: [[0, 'asc']],
        dom: 'Bfrtip',
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, 100, 250],
            [10, 25, 50, 100, 250],
        ],
        searching: false,
        
        processing: true,
        serverSide: false,
        paging: true,
        destroy: true,
        ajax: {
            url: '/dailysummary/datatable',
            type: 'POST',
            data:{
                promotype:$('#promotype').val(),
                username:$('#username').val(),
                status: $('#status').val(),
                claim_date:$('#claim_date').val(),
                win_date:$('#win_date').val(),
            }
           
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'prize' },
            { data: 'p_type' },
            { data: 'paid_date'},
            {
                data: 'paid',
                render: function(data, type, row) {
                    if (data == 1) {
                        return '已付';
                    } else {
                        return '未付';
                    }
                }
            },
            {
                render: function (data, type, row) {
                    if(row.paid_date)return '<span>already paid</span>';
                    return '<button onclick="b_payout('+row.id+', `'+row.p_type1+'`)" class="btn btn-warning btn-sm me-2 my-1 btn_pay" type="button">支付/Payout</button>';
                },
                orderable: false
            },
        ]
    });
}

function spinner() {
    if ($("#spineradmin").hasClass("d-none")) {
        $("#spineradmin").removeClass("d-none");
    } else {
        $("#spineradmin").addClass("d-none");
    }
}