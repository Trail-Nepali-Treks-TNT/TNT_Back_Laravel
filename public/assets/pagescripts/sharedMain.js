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
