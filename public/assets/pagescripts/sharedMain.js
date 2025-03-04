var MAX_UPLOAD_FILES = 5;
var MAX_IMAGE_SIZE = 10;
var MAX_PARALLEL_FILES = 5;
showPreLoader = function () {
    $(".preloader").fadeIn()
}

hidePreLoader = function () {
    $(".preloader").fadeOut()
}

ajaxCall = function (options) {
    var ajax = function (options) {
        options.beforeSend = function () {
            showPreLoader();
        }
        this.req = $.ajax(options);

        this.req.done(function (result) {
            hidePreLoader();
        })
        this.req.fail(function (XMLHttpRequest, textStatus, errorThrown) {
            hidePreLoader();
            if (XMLHttpRequest.status == 401) {
                alert('Your session has been expired!');
            }
        });
        this.success = success
        this.error = error
        return this
    }

    var success = function (callback) {
        this.req.done(function (result) {
            if (callback)
                callback(result)
        });
        this.error = error
        return this;
    }
    var error = function (callback) {
        this.req.fail(function (XMLHttpRequest, textStatus, errorThrown) {
            if (callback)
                callback(XMLHttpRequest, textStatus, errorThrown)
        });
        this.success = success
        return this
    }
    return new ajax(options);
}

var loadDropzoneWithCropper = function (containerId, paramName, PostUrl) {
    Dropzone.autoDiscover = false;
    $("#" + containerId).dropzone({
        paramName: paramName, // The name that will be used to transfer the file
        url: PostUrl,
        maxFilesize: MAX_IMAGE_SIZE, // MB
        maxFiles: MAX_UPLOAD_FILES,
        parallelUploads: MAX_PARALLEL_FILES,
        dictDefaultMessage: 'Drop files here to upload. ' + MAX_PARALLEL_FILES + ' files max for each upload.' + ' PNG or JPG no bigger than 800px wide and tall.',
        autoProcessQueue: false,
        autoDiscover: true,
        addRemoveLinks: true,
        init: function () {
            Dropzone.forElement("#" + containerId);
        },
    });
}