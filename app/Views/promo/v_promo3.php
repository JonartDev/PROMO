<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <?php echo $pagetitle; ?> <a href="javascript: reloadPage();"><i class="bi-arrow-clockwise"></i></a>
        </h1>
        <div id="spineradmin" class="spin w-100 h-100 position-absolute d-none">
            <div class="teleadmin-spinner spinner-border " role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button onclick="b_down_csv();" type="button" class="btn btn-sm btn-primary">下载 / Download</button>
            </div>
        </div>
    </div>

    <div id="crud_form" style="display: none;">
        <h2 id="crud_label">生成报告 / Generate Report</h2>
        <form class="row">
            <div class="mb-3 col-md-6">
                <label for="status" class="form-label">状态 / Status</label>
                <select id="status" class="form-select">
                    <option value="已派送">已派送 / Sent</option>
                    <option value="">None</option>
                </select>
                <div id="statustext" class="form-text">选择状态 / Select Status.</div>
            </div>

            <div class="mb-3 col-md-6">
                <label for="dtype" class="form-label">生成报告 / Date Type</label>
                <select id="dtype" class="form-select">
                    <option value="claim_date">派送日期 / Date Claimed</option>
                    <option value="created_at">创建日期 / Date Created</option>
                </select>
                <div id="typetext" class="form-text">选择日期类型 / Select Date Type</div>
            </div>

            <div class="mb-3 col-md-6">
                <label for="start_date" class="form-label">开始日期 / Start Date</label>
                <input type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd" id="start_date"
                    readonly>
                <div id="starttext" class="form-text">选择开始日期 / Select start date</div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="end_date" class="form-label">结束日期 / End Date</label>
                <input type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd" id="end_date" readonly>
                <div id="endtext" class="form-text">选择结束日期 / Select end date</div>
            </div>

            <h6>用户指南 / Userguide</h6>
            <ul class="list-unstyled">
                <li>使用筛选来下载CSV报告 / Use filters to download CSV reports.</li>
            </ul>

        </form>

        <div class="mb-3 col-12 text-end">
            <button onclick="b_cancel_csv()" class="btn btn-secondary">取消/Cancel</button>
            <button onclick="b_submit()" class="btn btn-primary">下载 / Download</button>
        </div>
    </div>

    <div class="overflow-auto">
        <table class="bg-light  table-sm table-striped w-100 compact" id="promo3_datatable">
            <thead>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>VIP level</th>
                    <th>奖励 / Prize</th>
                    <th>状态 / Status</th>
                    <th>领取日期 / Date Claimed</th>
                    <th>有效日期 / Effective Date</th>
                    <th>创建日期 / Date Created</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="text-light">
                    <th>ID</th>
                    <th>用户名 / Username</th>
                    <th>VIP level</th>
                    <th>奖励 / Prize</th>
                    <th>状态 / Status</th>
                    <th>领取日期 / Date Claimed</th>
                    <th>有效日期 / Effective Date</th>
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

    <!-- Modal -->
    <div class="modal fade" id="payoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Promo Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row align-items-center">
                        <div class="col-2">
                            <label for="inputPassword6" class="col-form-label">Status</label>
                        </div>
                        <div class="col-10">
                            <select class="form-select" id="payout_status" name="payout_status" aria-label="Default select example">
                                <option disabled>Choose payout status</option>
                                <option value="已派送">Payout Sent</option>
                                <option value="">Not yet Sent</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
