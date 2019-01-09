

$.fn.captureDevice = function(idFile, arg){
    
    var $element = $(this);
    var object = {
        stream: null,
        file: null,
        url: arg,
        id: idFile,
        hasCaptureMedia: function(){
            return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
        },
        getContainer: function(){
            return $element.find("#video-container").get(0);
        },
        objVideo: function(){
            let video = this.getContainer();    
            
            navigator.mediaDevices
                .getUserMedia({
                    video: {
                        width: {min: 640},
                        height: {min: 480}
                    }
                })
                .then((stream) =>{
                    window.stream = stream; 
                    video.srcObject = stream;
                });
        },
        setFile: function(arg){
            let file = new File([arg], 'cam.jpg', {type: 'image/jpg'});
            this.file = file;            
        },
        createCanvas: function(){
            let canvas = document.createElement("canvas");
            let video = this.getContainer();
            let setFile = this.setFile;
            canvas.setAttribute("width", video.videoWidth);
            canvas.setAttribute("height", video.videoHeight);
            canvas.getContext("2d").drawImage(video, 0 , 0);
            $element.find("#img-preview").show();
            $element.find("#img-preview").get(0).src = canvas.toDataURL('image/jpg');
            canvas.toBlob(function(blob){
                setFile(blob);
            }, "image/jpeg", 0.75);
        },
        btnCapture: function(){
            let obj = this;
            $element.find("#btn-capture").click(function(){
                let status =  JSON.parse($(this).attr("shot"));

                if(!status) {
                    $(this).text("Capturar");
                    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia){
                        obj.objVideo();
                    }else{
                        alert("No existe dispositivo");
                    }
                }
                else {
                    obj.createCanvas();
                    obj.stop();
                    $(this).text("Iniciar");
                }
                $(this).attr("shot", !status);

            });
        },
        insertAjax: function(){
            let form = new FormData();
            form.append("id_file", idFile);
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
            let submit = this.insertAjax;
            $element.find("#btn-save").click(function(){
                submit();
            });
        },
        btnCancel: function(){
            let stop = this.stop;
            $element.find("#btn-cancel, #btn-close").click(function(){
                $element.find("#btn-capture").text("Iniciar");
                $element.find("#btn-capture").attr("shot", false);
                stop();
            });
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

    $(this).html('<!-- Modal --><div class="modal-dialog modal-lg" role="document">        <div class="modal-content">            <div class="modal-header">            <h5 class="modal-title" id="captureModalLabel">Capturar Foto</h5>            <button type="button" class="close" data-dismiss="modal" aria-label="Close">                <span aria-hidden="true">&times;</span>            </button>            </div>            <div class="modal-body">                <div class="row">                    <div class="col-8 col-sm-9 col-lg-10">                        <div class="embed-responsive embed-responsive-16by9 bg-dark img-thumbnail">                            <video id="video-container" style="width: 100%; height: 100%" autoplay></video>                        </div>                    </div>                    <div class="col-4 col-sm-3 col-lg-2">                        <div class="btn-group-vertical m-auto" role="group">                            <button shot="false" id="btn-capture" type="button" class="btn btn-primary">Iniciar</button>                            <button type="button" id="btn-save" class="btn btn-success">Guardar</button>                            <button type="button" id="btn-cancel" class="btn btn-danger" data-dismiss="modal">Cancelar</button>                        </div>                        <img class="img-thumbnail" style="position: absolute; bottom: 0; left: 0; width:80%; display:none" id="img-preview" src="" alt="">                    </div>                </div>            </div>            <div class="modal-footer" style="border-top: thin solid #e9ecef">                <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>            </div>        </div>    </div>');
    setTimeout(object.start(), 400);
    
    $(this).modal("hide");
    
}