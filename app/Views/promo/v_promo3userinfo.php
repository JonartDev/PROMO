<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $pagetitle; ?> <a href="javascript: reloadPage();"><i class="bi-arrow-clockwise"></i></a></h1>
        <div id="spineradmin" class="spin w-100 h-100 position-absolute d-none">
            <div class="teleadmin-spinner spinner-border " role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button onclick="b_submit();" type="button" class="btn btn-sm btn-primary">下载 / Download</button>
            </div>
        </div>
    </div>

    <div class="overflow-auto">
        <table class="bg-light  table-sm table-striped w-100 compact" id="promo3_datatable">
            <thead>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>总存款</th>
                    <th>VIP等级 / VIP Level</th>
                    <th>创建日期 / Date Created</th>
                    <th>更新日期 / Date Updated</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>总存款</th>
                    <th>VIP等级 / VIP Level</th>
                    <th>创建日期 / Date Created</th>
                    <th>更新日期 / Date Updated</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi-info-circle"></i> <strong class="me-auto">Notifications</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id='toast_msg'>
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
</main>