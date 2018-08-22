$.fn.captureDevice = function(idFile, arg){

    var $element = $(this);
    var object = {
        stream: null,
        file: null,
        type: 0,
        url: arg,
        id: idFile,
        hasCaptureMedia: function(){
            return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
        },
        getContainer: function(){
            return $element.find("#video-container").get(0);
        },
        objVideo: function(arg =  this.camera){
            let video = this.getContainer();
            let c = {
                video: {
                     width: {min: 1280},
                     height: {min: 720}
                }
            }
            if(arg != false) c.video.deviceId = arg;
            navigator.mediaDevices
                .getUserMedia(c)
                .then((stream) =>{
                    window.stream = stream;
                    video.srcObject = stream;
                }).catch(function(error) {
                    $element.find(".modal-body").html('<div class="alert alert-danger" role="alert">'+error+'</div><div class="alert alert-light" role="alert">Verifique su hardware o los permisos del navegado y recargue la web</div>');
                });
        },
        setFile: function(arg){
            let file = new File([arg], 'cam.jpg', {type: 'image/jpg'});
            window.objectCapture.file = file;
        },
        createCanvas: function(){
            let canvas = document.createElement("canvas");
            let video = window.objectCapture.getContainer();
            canvas.setAttribute("width", video.videoWidth);
            canvas.setAttribute("height", video.videoHeight);
            canvas.getContext("2d").drawImage(video, 0 , 0);
            $element.find("#img-preview").show();
            $element.find("#img-preview").get(0).src = canvas.toDataURL('image/jpg');
            canvas.toBlob(function(blob){
                window.objectCapture.setFile(blob);
            }, "image/jpeg", 0.75);
        },
        btnCapture: function(){
            $element.find("#btn-capture").click(function(){
                let status =  JSON.parse($(this).attr("shot"));
                if(!status) {
                    $(this).text("Capturar");
                    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia){
                        window.objectCapture.objVideo();
                    }else{
                        alert("No existe dispositivo");
                    }
                }
                else {
                    window.objectCapture.createCanvas();
                    window.objectCapture.stop();
                    $(this).text("Iniciar");
                }
                $(this).attr("shot", !status);

            });
        },
        insertAjax: function(){
            let form = new FormData();
            let arg = this.url[this.type];
            let id = this.id[this.type];
            form.append("id_file", id);
            form.append('file[]', this.file, "cam.jpg");

            $.ajax({
                url: arg,
                data: form,
                contentType: false,
                processData: false,
                cache: false,
                method: "post",
            }).catch(err=>{
                console.log(err);
            });
        },
        btnSave: function(){
            let element = $element;
            $element.find("#btn-save").click(function(){
                window.objectCapture.insertAjax();
                element.modal("hide");
                window.objectCapture.stop();
                //location.reload(true);
            });
        },
        btnCancel: function(){
            $element.find("#btn-cancel, #btn-close").click(function(){
                $element.find("#btn-capture").text("Iniciar");
                $element.find("#btn-capture").attr("shot", false);
                window.objectCapture.stop();
            });
        },
        devices: navigator.mediaDevices.enumerateDevices(),
        selectCamera: function(list = []){
            let r = "";

            this.devices.then(function(devices){
                let d= false;
                let msg = ["Foto de Perfil", "Foto de Documento"];
                let i = 0;
                devices.map(function(value) {
                    if (value.kind == "videoinput") {
                        r += '<li class="nav-item"><a class="nav-link" typeU="'+i+'" id-camera="'+value.deviceId+'" href="#">'+msg[i]+'</a></li>';
                        i++;
                        if(!d) {
                            window.objectCapture.camera = value.deviceId;
                            d = true;
                        }
                        $("#listCamera").html(r);
                        $('[id-camera="'+window.objectCapture.camera+'"]').addClass('active');
                        $("[id-camera]").click(function(e){
                            let id = $(this).attr("id-camera");
                            let type = $(this).attr("typeU");
                            window.objectCapture.type = parseInt(type);
                            window.objectCapture.camera = id;
                            $("[id-camera]").removeClass('active');
                            $("[id-camera='"+id+"']").addClass('active');
                            window.objectCapture.stop();
                            $element.find("#btn-capture").attr("shot", false);
                            $element.find("#btn-capture").text("Iniciar");
                        });
                    }
                })
            })
        },
        stop: function(){
            window.stream.getTracks().forEach(element => {
                element.stop();
            });
        },
        start: function(){
            this.btnCapture();
            this.btnCancel();
            this.btnSave();
            this.selectCamera();

            window.objectCapture = this;
        }
    }
    let id = $(this).attr('id');
    $(this)
        .addClass('modal')
        .addClass('fade')
        .attr('tabindex', "-1")
        .attr("role", "dialog")
        .attr("aria-labelledby", id+"Label")
        .attr("aria-hidden", "true");

    $(this).html('<!-- Modal --><div class="modal-dialog modal-lg" role="document">    <div class="modal-content">        <div class="modal-header pt-4 pb-2">                              <ul class="nav nav-tabs card-header-tabs" id="listCamera">                    <li class="nav-item">                      <a class="nav-link active" href="#">Active</a>                    </li>                  </ul><button type="button" class="close" data-dismiss="modal"                aria-label="Close"> <span aria-hidden="true">&times;</span>            </button> </div>        <div class="modal-body" style="background-color:  #f8fafc;">            <div class="row">                <div class="col-8 col-sm-9 col-lg-10">                    <div class="embed-responsive embed-responsive-16by9 bg-dark img-thumbnail">                         <video id="video-container" style="width: 100%; height: 100%" autoplay></video>                    </div>                </div>                <div class="col-4 col-sm-3 col-lg-2">                    <div class="btn-group-vertical m-auto" role="group">                         <button shot="false" id="btn-capture" type="button" class="btn btn-primary">Iniciar</button>                         <button type="button" id="btn-save" class="btn btn-success">Guardar</button>                        <button type="button" id="btn-cancel" class="btn btn-danger" data-dismiss="modal">Cancelar</button>                    </div>                    <img class="img-thumbnail" style="position: absolute; bottom: 0; left: 0; width:80%; display:none" id="img-preview" src="" alt="">                </div>            </div>        </div>        <div class="modal-footer" style="border-top: thin solid #e9ecef">            <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        </div>    </div></div>');
    setTimeout(object.start(), 400);

    $(this).modal("hide");

}