function sua(key,  mact) {
    //  
    let btnEdit = document.getElementsByClassName('btnEdit')[key];
    let tr = btnEdit.parentElement.parentElement;
    let tds = tr.children;
    // 1 + ind*2 

    let tenct = tds[1].textContent.trim();
    let mota = tds[2].textContent.trim();
    let thoigianbd = tds[3].textContent.trim();
    let thoigiankt = tds[4].textContent.trim();

    from = thoigianbd.split("/");
    tgbdmoi = from[2]+'-'+from[1]+'-'+from[0];
    from = thoigiankt.split("/");
    tgktmoi = from[2]+'-'+from[1]+'-'+from[0];
    
    document.querySelector("input[name='mact']").value = mact;
    document.querySelector("input[name='tenct']").value = tenct;
    document.querySelector("input[name='mota']").value = mota;
    document.querySelector("input[name='thoigianbd']").value = tgbdmoi;
    document.querySelector("input[name='thoigiankt']").value = tgktmoi;

    document.getElementById("themct").style.display = 'none';
    document.getElementById("suact").style.display = 'inline-block';
}
