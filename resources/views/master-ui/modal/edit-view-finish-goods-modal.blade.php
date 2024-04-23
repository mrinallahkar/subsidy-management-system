@foreach ($finishGoodsUpdate as $finishGoodsUpdate)
<input type="hidden" id="id_hidden" name="id" value="{{$finishGoodsUpdate->Pkid}}" />
<table class="table table-striped">
    <tbody>
        <tr>
            <td><label for="name1">Goods Name <span class="text-danger">*</span></label></td>
            <td><label for="name2">Description <span class="text-danger"></span></label></td>
        </tr>
        <tr>
            <td><input type="text" name="Goods_Name" id="Goods_Name" value="{{$finishGoodsUpdate->Goods_Name}}" class="form-control"></td>
            <td><textarea type="text" name="Description" id="Description" class="form-control">{{$finishGoodsUpdate->Description}}</textarea></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <button type="button" class="btn btn-primary btn-fw" id="createBtn" onclick="SaveGoods('{{ url('add_finish_goods') }}', this,'goodsSearchResult');">
                    <i class="mdi mdi-content-save"></i>Update</button>
                <button type="button" class="btn btn-success btn-fw" id="approvalBtn" onclick="CmnApproval('{{$finishGoodsUpdate->Pkid}}','{{ url('goods-master-approval') }}', this,'goodsSearchResult');">
                    <i class="mdi mdi-account-check"></i>Submit for Approval</button>
                <button type="reset" class="btn btn-light btn-fw" id="btnReset">
                    <i class="mdi mdi-refresh"></i>Reset</button>
            </td>
        </tr>
    </tbody>
</table>
@endforeach