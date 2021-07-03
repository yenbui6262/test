function sua(k, mact, link) {
    //  
    document.getElementById("chuongtrinh").value = mact;
    document.getElementById("linkdrive").value = link;

    document.getElementById("them").style.display = 'none';
    document.getElementById("sua").style.display = 'inline-block';
}

function getInfo() {
    $(".btnEdit").on('click', function() {
        alert($(this).val());
    });
}