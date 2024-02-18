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

Echo.channel('channel-job')
    .listen('EvenProgress', function (e){
        console.log('channel job connected')

       if (!document.getElementById("btn-submit").getAttribute("disabled") || document.getElementById("btn-submit").getAttribute("disabled") == "") {
           document.querySelector('.progress').style['display'] = "block"
           document.querySelector('.status').style['display'] = "block"
       }

        let total = e.data.total_job
        let progress = (e.data.done / total) * 100
        let now = Math.round(progress * 100) / 100

        let p = document.querySelector('.progress-bar')
        p.style["width"] = now + '%'
        p.innerHTML = now + '%'
        p.setAttribute('aria-valuenow', now + '%')

        document.querySelector('.status').innerHTML = "Prosess dilakukan via background, anda dapat menutup dan membuka kembali nanti jendela ini <br>" + total +"/"+e.data.done
    })
