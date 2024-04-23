{!! Html::script('js/common_script.js') !!}
<div style="width: 60%; text-align:left" class="modal-dialog modal-lg">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><i class="mdi mdi mdi-plus"></i>Add Finish Goods</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <div class="result"></div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" id="goodsForm">
                                    <div id="returnModel">
                                        <input type="hidden" id="id_hidden" name="id" />
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><label for="name1">Finish Goods Name <span class="text-danger">*</span></label></td>
                                                    <td><label for="name2">Description <span class="text-danger"></span></label></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="Goods_Name" id="Goods_Name" class="form-control"></td>
                                                    <td><textarea name="Description" id="Description" class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="center">
                                                        <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveGoods('{{ url('add_finish_goods') }}', this,'goodsSearchResult');">
                                                            <i class="mdi mdi-content-save"></i>Save</button>
                                                        <button type="button" disabled class="btn btn-success btn-fw" id="bntSubmitApproval">
                                                            <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                                                        <!-- <button type="submit" class="btn btn-dark btn-fw" id="btnEdit">
                                                        <i class="mdi mdi-grease-pencil"></i>Edit</button> -->
                                                        <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                                                            <i class="mdi mdi-refresh"></i>Reset</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-fw" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>