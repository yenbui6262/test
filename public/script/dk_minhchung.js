function sua(key,  mact, mamc) {
    //  
    let btnEdit = document.getElementsByClassName('btnEdit')[key];
    let tr = btnEdit.parentElement.parentElement;
    let tds = tr.children;
    // 1 + ind*2 

    // let tenct = tds[1].textContent.trim();
    let duongdan = tds[2].textContent.trim();

    document.querySelector("input[name='mact']").value = mact;
    document.querySelector("input[name='mamc']").value = mamc;
    document.querySelector("input[name='duongdan']").value = duongdan;

    document.getElementById("themct").style.display = 'none';
    document.getElementById("suact").style.display = 'inline-block';
}
