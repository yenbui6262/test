function sua(key,  mact) {
    //  
    if ($('#checkerr').length !== 0) {
        $('#checkerr').css('display','none');
      }

    let btnEdit = document.getElementsByClassName('btnEdit')[key];
    let tr = btnEdit.parentElement.parentElement;
    let tds = tr.children;
    // 1 + ind*2 

    let tenct = tds[1].textContent.trim();
    let mota = tds[2].textContent.trim();
    
    document.querySelector("input[name='mahc']").value = mact;
    document.querySelector("input[name='tenhc']").value = tenct;
    document.querySelector("input[name='mota']").value = mota;

    document.getElementById("themhc").style.display = 'none';
    document.getElementById("suahc").style.display = 'inline-block';
}
$(document).ready(function() {
    if ($('#checkerr').length !== 0) {
        checkerr = $('#checkerr').html();
        console.log(123);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: checkerr,
        })
      }
});