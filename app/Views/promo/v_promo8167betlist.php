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
                <button onclick="b_deldata();" type="button" class="btn btn-sm btn-danger">删除未处理的 / Delete Unprocessed</button>
                <button onclick="b_upgrade();" type="button" class="btn btn-sm btn-warning">升级 / Upgrade</button>
                <button onclick="b_add_csv();" type="button" class="btn btn-sm btn-primary">添加/Add (CSV)</button>
            </div>
        </div>
    </div>

    <div id="upload_form" style="display: none;">
        <h2 id="upload_label">添加新数据 / Add New Data (CSV)</h2>
        <form class="row" id="upform" name="upform">
            <div class="mb-3">
                <label class="form-label" for="csv_file">上传CSV / Upload CSV</label>
                <input type="file" class="form-control" id="csv_file" name="csv_file">
                <div id="csv_filetext" class="form-text">上传CSV文件 / Upload CSV file.</div>
            </div>
      
            <h6>用户指南 / Userguide</h6>
            <ul class="list-unstyled">
                <!-- <li>上传最多10,000行的CSV文件。如果你的CSV文件超过10,000行，请将数据分成多个文件以防止崩溃。 / Upload CSV file with maximum of 10,000 rows. If your CSV has more than 10,000 rows, divide the data to multiple files to prevent crashing.</li> -->
                <li>csv的第一行将永远被忽略。 / The first row of the csv will always be ignored.</li>
            </ul>
        </form>

        <div class="mb-3 col-12 text-end">
            <button onclick="b_cancel_csv()" class="btn btn-secondary">取消/Cancel</button>
            <button onclick="spinner(); b_submit_csv();" id="csv_submit_btn" class="btn btn-primary">提交/Submit</button>
        </div>
    </div>

    <div class="overflow-auto">
        <table class="bg-light  table-sm table-striped w-100 compact" id="promo8167_datatable">
            <thead>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>存款</th>
                    <th>存款日期 / Deposit Date</th>
                    <th>状态 / Status</th>
                    <th>创建日期 / Date Created</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>存款</th>
                    <th>下注日期 / Bet date</th>
                    <th>状态 / Status</th>
                    <th>创建日期 / Date Created</th>
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
