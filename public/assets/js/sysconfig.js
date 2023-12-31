$(function() {
    //Datatable
    $("#sys_datatable").DataTable({
        dom: 'Bfrtip',
        pageLength: 50,
	scrollX: true,
        scrollY: 600,
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
            url: '/sysconfig/datatable',
            type: 'POST'
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'sys_desc' },
            {
                data: 'sys_value',
                render: function (data, type, row) {
                    if (data.startsWith('http://') || data.startsWith('https://')) {
                        return '<a href="' + data + '" target="_blank">' + data + '</a>';
                    } else if (data.startsWith('sysconfig_assets/uploads/')) {
                       return '<img src="' + data + '" alt="Image" width="200" height="200" style="object-fit:cover;">';
                    } else {
                        return data;
                    }
                }
            },
            { data: 'created_at' },
            { data: 'updated_at' },
            {
                render: function (data, type, row) {
                    return '<button onclick="b_edit('+row.id+', \''+row.name+'\', `'+row.sys_desc+'`, `'+row.sys_value+'` )" class="btn btn-warning btn-sm me-2 my-1" type="button">编辑/Edit</button> <button onclick="b_delete('+row.id+', \''+row.name+'\')" class="btn btn-danger btn-sm my-1" type="button">删除/Delete</button>';
                },
                orderable: false
            },
        ]
    });

});
//for toast (notifications)
var toasttarget = document.getElementById('liveToast');
var toast1 = new bootstrap.Toast(toasttarget , []);

function b_edit(id, name, sys_desc, sys_value){
    clear_form();
    $("#crud_form").show();
    $("#crud_label").html("Edit Config "+id);
    $("#action_type").val(id);

    $("#name").val(name);
    $("#sys_desc").val(sys_desc);
    //$("#sys_value").val(sys_value);

    $('html, body').animate({
        scrollTop: $("body").offset().top
    }, 500);
}

function b_delete(id, name){
    $.confirm({
        title: 'Delete Data id '+id,
        icon: 'bi-exclamation-circle',
        content: '您将从数据库中删除'+name+'的数据 / You are about to delete '+name+' data from the database',
        autoClose: 'cancelAction|10000',
        type: 'red',
        escapeKey: 'cancelAction',
        buttons: {
            confirm: {
                btnClass: 'btn-red',
                text: 'Delete '+name+' data',
                action: function(){
                    $.post("/sysconfig/delete_data",
                    {
                        id: id,
                        name: name,
                    },
                    function(data, status){
                        if(data.status == 0)
                        {
                            $.alert({
                                title: 'Error',
                                icon: 'bi-exclamation-circle',
                                type: 'red',
                                content: data.message,
                            });
                        } else {
                            $('#sys_datatable').DataTable().ajax.reload();
                            $("#toast_msg").html(data.toast);
                            toast1.show();
			    clear_form();
                            $("#crud_form").hide();
                            // Reload the page after the toast is gone
                               setTimeout(function() {
                               location.reload();
                               }, 500); // Adjust the delay as needed
                        
                        }
                    });
                }
            },
            cancelAction: {
                text: 'Cancel'
            }
        }
    });
}

function b_add(){
    clear_form();
    $("#crud_form").show();
    $("#crud_label").html("Add Config");
    $("#action_type").val("add");
}

function b_cancel()
{
    clear_form();
    $("#crud_form").hide();
}

/*function b_submit()
{
    spinner()
    
    $.post("/sysconfig/save_data",
    {
        name: $('#name').val(),
        sys_desc: $('#sys_desc').val(),
        sys_value: $('#sys_value').val(),
        action_type: $('#action_type').val(),
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
            $('#sys_datatable').DataTable().ajax.reload();
            $("#toast_msg").html(data.toast);
            toast1.show();
            clear_form();
            $("#crud_form").hide();
        }
        spinner()
        //alert("Data: " + data + "\nStatus: " + status);
    });
}*/

function b_submit() {
    spinner();

    const formData = new FormData();

    formData.append('name', $('#name').val());
    formData.append('sys_desc', $('#sys_desc').val());
    formData.append('sys_value', $('#sys_value').val());
    formData.append('action_type', $('#action_type').val());

    // Append uploaded file to FormData
    const fileInput = document.getElementById('photo');
    formData.append('photo', fileInput.files[0]);


    $.ajax({
        url: '/sysconfig/save_data',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            clear_form();

            if (data.status == 0) {
                $.alert({
                    title: 'Error',
                    icon: 'bi-exclamation-circle',
                    type: 'red',
                    content: data.validation,
                });
            } else {
                $('#sys_datatable').DataTable().ajax.reload();
                $("#toast_msg").html(data.toast);
                toast1.show();
                clear_form();
                $("#crud_form").hide();
            }
            spinner();
        },
        error: function (xhr, status, error) {
            // Handle error here
            console.error(error);
        }
    });
}

function clear_form()
{
    $('#name').val('');
    $('#sys_desc').val('');
    $('#sys_value').val('');
    $('#photo').val('');
    $('#action_type').val('');
}
function spinner() {
  if ($(".spin").hasClass("d-none")) {
    $(".spin").removeClass("d-none")
  } else {
    $(".spin").addClass("d-none")
  }
} 

$(document).ready(function () {
    // When the dropdown value changes
    $("#select_method").change(function () {
        // Get the selected value
        const selectedValue = $(this).val();

        // Show/hide the appropriate div based on the selected value
        if (selectedValue === "1") {
            $("#upload_div").show();
            $("#link_div").hide();
        } else if (selectedValue === "2") {
            $("#upload_div").hide();
            $("#link_div").show();
        } else {
            // Hide both divs if no valid option is selected
            $("#upload_div").hide();
            $("#link_div").hide();
        }
    });
});
