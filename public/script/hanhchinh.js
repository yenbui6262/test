function sua(key,  mact) {
    //  
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
