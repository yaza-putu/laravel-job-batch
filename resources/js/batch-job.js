document.getElementById("form-upload").addEventListener("submit", function (e){
    e.preventDefault();

    let formData = new FormData(this);
    let btn = "#btn-submit";
    let url = this.getAttribute("action")
    document.querySelector('.status').style['display'] = "block"
    ajaxPost(url, formData, btn)
        .done(function (res){
            document.querySelector('.status').innerHTML = "Prosess dilakukan via background, anda dapat menutup dan membuka kembali nanti jendela ini"

            document.querySelector('.progress').style['display'] = "block"
        })
})
