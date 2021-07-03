<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{$url}Home">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng ký đơn hành chính</li>
    </ol>
</nav>
<form class="container" method="post">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <label for="Ma">Đăng ký :</label><br>
        <select name="hanhchinh[Ma]" id="Ma" class="form-control ">
            <option value="0" readonly hidden>--Chọn đơn hành chính--</option>
            {foreach $params['hanhchinh'] as $k => $val}
            <option value="{$val.PK_sMaHanhChinh}">{$val.sTenHanhChinh}</option>
            {/foreach}
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit" name="hanhchinh[type]"value="submit" id="them" >Đăng ký</button>
      </div>
    </div>
  </div>
</div>
    <div class="card my-3">
        <div class="card-header text-center text-white bg-darkblue">
            <h4 class="m-0">ĐĂNG KÝ HÀNH CHÍNH</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+ Đăng ký thêm</button>
        
            <h3 class="mt-3" style="color: #337ab7;">Danh sách các đơn đã đăng ký</h3>
            <div class="row">
                <div class="form-group col-xl-4">
                    <label for="tenhc">Tên hành chính:</label>
                    <input type="text" id="tenhc" name="tenhc" class="form-control"  value="{if !empty($tenhc)}{$tenhc}{/if}" placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-xl-6">
                    <label for="mota">Mô tả:</label>
                    <input type="text" id="mota" class="form-control" name="mota"  value="{if !empty($mota)}{$mota}{/if}" placeholder="Nhập nội dung">
                </div>
                <div class="form-group col-xl-2 text-center" style="margin-top:30px">
                    <button type="submit" class="btn btn-secondary" name="hanhchinh[type]" value="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm</button>
                        
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="text-center">
                        <th width="10px">STT</th>
                        <th width="20%">Tên chương trình</th>
                        <th >Mô tả</th>
                        <th width="120px">Trạng thái</th>
                        <th width="120px">Tác vụ</th>
                    </thead>
                    <tbody>
                    {foreach $params['dondk'] as $k => $val}
                    <tr>
                        <td class="text-center">{$k+1}</td>
                        <td>{$val.sTenHanhChinh}</td>
                        <td>{$val.tMota}</td>
                        <td class="text-center">{$val.iTrangThai}</td>
                        <td class="text-center">
                            <button name="hanhchinh[type]" value="delete"  class="btn btn-danger" type="submit" title="Hủy đơn"onclick="return confirm('Bạn có muốn hủy đăng ký đơn hành chính này không này không?');"><i class="fas fa-trash"></i></button>
                            <input type="hidden" name="madon" value="{$val.PK_sMaDangKy}">
                        </td>
                    </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>