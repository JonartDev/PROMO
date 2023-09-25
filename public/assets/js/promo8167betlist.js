$(function() {
    $('.datepicker').datepicker();
    //Datatable
    $("#promo8167_datatable").DataTable({
        order: [[4, 'asc']],
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }, 
            {
                extend:'csv',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }, 
            {
                extend:'excel',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }, 
            {
                extend:'pdf',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }, 
            {
                extend:'print',
                exportOptions:{
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }, 
            'pageLength'
        ],
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: '/promo8167betlist/datatable',
            type: 'POST'
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'bet' },
            { data: 'bet_date' },
            { data: 'status' },
            { data: 'created_at' }
        ]
    });

});
//for toast (notifications)
var toasttarget = document.getElementById('liveToast');
var toast1 = new bootstrap.Toast(toasttarget , []);

function b_add_csv()
{
    $('#csv_file').val("");
    $("#upload_form").show();
    $("#crud_form").hide();
}

function b_down_csv()
{
    $("#upload_form").hide();
    $("#crud_form").show();
}

function b_cancel_csv()
{
    $('#csv_file').val("");
    $("#upload_form").hide();
    $("#crud_form").hide();
}

function b_submit_csv() {
    
    var form = $('#upform')[0];
    var data = new FormData(form);

    $('#csv_submit_btn').prop('disabled', true);  
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "/promo8167betlist/save_data_csv",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            if(data.status == 2 || data.status == 3)
            {
                $.alert({
                    title: 'Opss',
                    icon: 'bi-exclamation-circle',
                    type: 'blue',
                    content: data.result,
                });

            } else if(data.status == 0)
            {
                $.alert({
                    title: 'Error',
                    icon: 'bi-exclamation-circle',
                    type: 'red',
                    content: data.validation,
                });
            } else {

              
                $.alert({
                    title: 'Batch Upload (CSV) Complete.',
                    content: data.result,
                    icon: 'bi-info-circle',
                    type: 'blue',
                    animation: 'scale',
                    closeAnimation: 'scale',
                    buttons: {
                        okay: {
                            text: 'Okay',
                            btnClass: 'btn-primary'
                        }
                    }
                });
                $('#promo8167_datatable').DataTable().ajax.reload();
            }
            $('#csv_submit_btn').prop('disabled', false);
            spinner();
        },
        error: function (e) {
            $.alert({
                title: 'Error',
                icon: 'bi-exclamation-circle',
                type: 'red',
                content: '发生了一个意外的错误。请联系您的服务器管理员。 / An unexpected error has occured. Please contact your server administrator.',
            });
            $('#csv_submit_btn').prop('disabled', false);
            spinner();
        }
        
    });    
}

function spinner() {
    if ($("#spineradmin").hasClass("d-none")) {
        $("#spineradmin").removeClass("d-none");
    } else {
        $("#spineradmin").addClass("d-none");
    }
}

function b_deldata(){
    $.confirm({
        title: '删除未处理的数据 / Delete Unprocessed Data ',
        icon: 'bi-exclamation-circle',
        content: '确认从数据库删除状态为0的未处理数据吗 / You are about to delete Unprocessed Data [status = 0] from the database',
        autoClose: 'cancelAction|10000',
        type: 'red',
        escapeKey: 'cancelAction',
        buttons: {
            confirm: {
                btnClass: 'btn-red',
                text: '删除/ Delete Data',
                action: function(){
                    $.get("/promo8167betlist/delete_unprocessed",
                    function(data, status){
                        $('#promo8167_datatable').DataTable().ajax.reload();
                        $("#toast_msg").html(data.toast);
                        toast1.show();
                    });
                }
            },
            cancelAction: {
                text: '取消/ Cancel'
            }
        }
    });
}

function b_upgrade()
{
    $.confirm({
        title: '处理数据 / Process Data',
        icon: 'bi-exclamation-circle',
        content: '确认将要更新用户信息和活动3的数据 / You are about to update userinfo and promo8167 data',
        autoClose: 'cancelAction|10000',
        type: 'orange',
        escapeKey: 'cancelAction',
        buttons: {
            confirm: {
                btnClass: 'btn-red',
                text: '处理数据/ Process Data',
                action: function(){
                    spinner();
                    $.get("/promo8167betlist/process_data",
                    function(data, status){
                        $('#promo8167_datatable').DataTable().ajax.reload();
                        $("#toast_msg").html(data.toast);
                        toast1.show();
                        spinner();
                    });
                }
            },
            cancelAction: {
                text: '取消 / Cancel'
            }
        }
    });
}


