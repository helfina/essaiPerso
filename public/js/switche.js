window.onload = ()  => {
    let switches = document.querySelectorAll(".custom-control-input")

    for(let switche of switches ){
        switche.addEventListener("click", activer)
    }
}

function activer(){
 let xmlhttp = new XMLHttpRequest;
    xmlhttp.open('GET', '/admin/activeAvis/'+this.dataset.id)
    xmlhttp.send()
}