$(document).ready(function() {
  checkboxx();

  // Xóa sv
  $("#xoasv").click(function(){
    Swal.fire({
      title: 'Bạn có chắc muốn xóa?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Có, Xóa!'
    }).then((result) => {
      if (result.isConfirmed) {
        var arr_id = [];
      
        $("#example tbody :checkbox:checked").each(function(i){
          arr_id[i] = $(this).val();
        })
        if(arr_id.length == 0){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Cần chọn ít nhất 1 sinh viên!',
          })        
        }else{
          for(var i = 0;i<arr_id.length;i++){
            var tbody1 = `<tr>
                <td class="text-center">
                  <div class="checkbox">
                    <input name="check[]" value="${arr_id[i]}-${arr_id[i]}-${arr_id[i]}" type="checkbox" id="tr-checkbox${arr_id[i]}">
                    <label for="tr-checkbox${arr_id[i]}"></label>
                  </div>
                </td>
                <td>${arr_id[i]}</td>
            </tr>`;
            // tbodycu=$('#example tbody').html();
            $('#example1 tbody').html(tbody1+$('#example1 tbody').html());
            var tr =$('#tr1-checkbox'+arr_id[i]).parent().parent().parent();
            $(tr).css({"cssText":"background:red !important"});
            $(tr).fadeOut("slow");
            $(tr).remove();
    
          }
          // tralai();
          checkboxx();
          Swal.fire(
            'Đã xóa!',
            'Bạn đã xóa thành công.',
            'success'
          )
        }
      }
    })
  });

  // thêm sv
  $("#themsv").click(function(){
    Swal.fire({
      title: 'Bạn có chắc muốn thêm?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Có, Thêm!'
    }).then((result) => {
      if (result.isConfirmed) {
        var arr_id = [];
      
        $("#example1 tbody :checkbox:checked").each(function(i){
          arr_id[i] = $(this).val();
        })
        if(arr_id.length == 0){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Cần chọn ít nhất 1 sinh viên!',
          })      
        }else{
          for(var i = arr_id.length-1;i>=0;i--){
            arr = arr_id[i].split('-');
            var tbody = `<tr>
                <td class="text-center">
                  <div class="checkbox">
                    <input name="checksv[]" value="${arr[2]}" type="checkbox" id="tr1-checkbox${arr[2]}">
                    <label for="tr1-checkbox${arr[2]}"></label>
                  </div>
                </td>
                <td>${arr[0]}</td>
                <td>${arr[1]}</td>
                <td class="text-center"><span class="badge badge-warning">Chờ xác nhận</span></td>
            </tr>`;
            // tbodycu=$('#example tbody').html();
            $('#example tbody').html(tbody+$('#example tbody').html());
            var tr =$('#tr-checkbox'+arr[2]).parent().parent().parent();
            $(tr).css({"cssText":"background:red !important"});
            $(tr).fadeOut("slow");
            $(tr).remove();          
          }
          checkboxx();
          Swal.fire(
            'Đã thêm!',
            'Bạn đã thêm thành công.',
            'success'
          )
        }
      }
    })
  });

  $('#masvhoten').on('keyup', function(event) {
    event.preventDefault();
    /* Act on the event */
    var tukhoa = $(this).val().toLowerCase();
    $('#table-body1 tr').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
    });

  });

  $('#masvhoten2').on('keyup', function(event) {
    event.preventDefault();
    /* Act on the event */
    var tukhoa = $(this).val().toLowerCase();
    $('#table-body2 tr').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
    });

  });

function checkboxx() {
  // table1
  var $selectAll = $('#selectAll'); // hộp kiểm chính bên trong bảng
  var $table = $('#example1'); // table selector 
  var $tdCheckbox = $table.find('tbody input:checkbox'); // hộp checbox bên trong thân bảng
  var tdCheckboxChecked = 0; // hộp checbox đã kiểm tra

  // Chọn hoặc bỏ chọn tất cả 
  $selectAll.on('click', function () {
    $tdCheckbox.prop('checked', this.checked);
  });

  // Chuyển trạng thái hộp kiểm chính thành được chọn khi tất cả các hộp kiểm bên trong thẻ tbody được chọn
  $tdCheckbox.on('change', function(e){
    tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; // Nhận số lượng hộp kiểm đã được chọn
    // Nếu tất cả các hộp kiểm được chọn, thì hãy đặt thuộc tính của hộp kiểm chính thành "true", nếu không thì đặt thành "false"
    $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
  });

  //table2
  var $selectAll1 = $('#selectAll1'); // main checkbox inside table thead
  var $table1 = $('#example'); // table selector 
  var $tdCheckbox1 = $table1.find('tbody input:checkbox'); // checboxes inside table body
  var tdCheckboxChecked1 = 0; // checked checboxes

  // Select or deselect all checkboxes depending on main checkbox change
  $selectAll1.on('click', function () {
    $tdCheckbox1.prop('checked', this.checked);
  });

  // Toggle main checkbox state to checked when all checkboxes inside tbody tag is checked
  $tdCheckbox1.on('change', function(e){
    tdCheckboxChecked1 = $table1.find('tbody input:checkbox:checked').length; // Get count of checkboxes that is checked
    // if all checkboxes are checked, then set property of main checkbox to "true", else set to "false"
    $selectAll1.prop('checked', (tdCheckboxChecked1 === $tdCheckbox1.length));
  });
}

$('input[type=radio][name=phamvi]').change(function() {
  var phamvi = this.value;
  history.pushState(null, null, link_url + "themchuongtrinh");
    
    // Khai báo tham số
    var checkbox = $('#example tbody input:checkbox');
    var result = new Array();
    if(checkbox.length==0){
      result='';
    }
    // Lặp qua từng checkbox để lấy giá trị
    for (var i = 0; i < checkbox.length; i++){
      result[i] = checkbox[i].value;
    }
    // lay dieu kien filter
    var filter = {
      phamvi       : phamvi,
      lop        : $("#lop").val(),
      masvdtg     : result
    };
    var data = {
        action: "search",
        filter: filter,
    }

    $.ajax({
        url: window.location.pathname,
        type: "post",
        data: data,
        beforeSend: loading(),
    }).done(function(data){
      data = JSON.parse(data);
      renderTable(data);
    }).always(function(e){
        $("#overlay").hide();
    });
});

$('#lop').change(function() {
  var phamvi = this.value;
  history.pushState(null, null, link_url + "themchuongtrinh");
    
    // Khai báo tham số
    var checkbox = $('#example tbody input:checkbox');
    var result = new Array();
    if(checkbox.length==0){
      result='';
    }
    // Lặp qua từng checkbox để lấy giá trị
    for (var i = 0; i < checkbox.length; i++){
      result[i] = checkbox[i].value;
    }
    // lay dieu kien filter
    var filter = {
      phamvi       : phamvi,
      lop        : $("#lop").val(),
      masvdtg     : result
    };
    var data = {
        action: "search",
        filter: filter,
    }

    $.ajax({
        url: window.location.pathname,
        type: "post",
        data: data,
        beforeSend: loading(),
    }).done(function(data){
      data = JSON.parse(data);
      renderTable(data);
    }).always(function(e){
        $("#overlay").hide();
    });
});

function renderTable(data){
  var html = "";
  if(typeof data.dssv !== "undefined"){
      data.dssv.forEach((v)=>{
          html += `<tr>
                    <td class="text-center">
                      <div class="checkbox">
                          <input  name="check[]" value="${v.sTenTK}-${v.sHoTen}-${v.PK_sMaTK}" type="checkbox" id="tr-checkbox${v.PK_sMaTK}">
                          <label for="tr-checkbox${v.PK_sMaTK}"></label>
                      </div>
                    </td>
                    <td>
                    ${v.sTenTK} - ${v.sHoTen}
                    </td>
                  </tr>`;
      });
  }
  $("#table-body1").html(html);
  checkboxx();
}

});

function validateForm1() {
  $('#example tbody input:checkbox').attr('checked',true);
}