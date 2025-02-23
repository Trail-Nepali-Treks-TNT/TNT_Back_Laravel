var MAX_UPLOAD_FILES = 5;
var MAX_IMAGE_SIZE = 10;
var MAX_PARALLEL_FILES = 5;
openModal = function (id) {
    $("#" + id).modal({ show: true, backdrop: 'static' })
        .on('hidden.bs.modal', function (e) {
            $("#" + id).remove();
        });
    $("#" + id).modal('show');
    $.validator.unobtrusive.parse($("#" + id));
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
                showErrorMessage("Your session has been expired!");
                location.reload();
            } else {
                showErrorMessage("Error occoured!");
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

showPreLoader = function () {
    $('.preloader').show();
}

hidePreLoader = function () {
    $('.preloader').hide();
}

removeExistingValidationError = function () {
    $('.field-validation-error').empty();
    $('.input-validation-error').removeClass('input-validation-error');
}

showFluentValidationMessage = function (validationErrors) {
    $.each(validationErrors, function (e, property, message) {
        var field = $("#" + property.propertyName);
        field.attr("data-val-required", property.message);

        var container = $('span[data-valmsg-for="' + property.propertyName + '"]');
        container.addClass('field-validation-error');
        container.removeClass('field-validation-valid');
        container.append('<span>' + property.message + '</span>');

        // Highlight the input field with errors
        $('#' + property.propertyName).addClass('input-validation-error');
    });
}

function revalidateForm(form) {
    $.validator.unobtrusive.parse(form);
}

function updateValidationMessages(validationErrors, formName) {
    var validator = $(formName).validate()

    validationErrors.forEach(function (error) {
        validator.settings.messages[error.propertyName] = error.message;

        var input = $('[name="' + error.propertyName + '"]');
        var errorElement = input.siblings('span[data-valmsg-for="' + error.propertyName + '"]');
        if (errorElement.length > 0) {
            errorElement.text(error.message);
            errorElement.show();
        }
        // Mark the field as invalid
        input.addClass('input-validation-error');
    });
    revalidateForm(formName);
}

initHtmlEditor = function (selector, invalidEle) {
    tinymce.remove(selector);
    tinymce.init({
        selector: selector,
        invalid_elements: invalidEle,
        height: 300,
        browser_spellcheck: true,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        setup: function (editor) {
            editor.on('focus', function () {
                $(document).trigger('focusin');
            });
            editor.on('change', function () {
                tinymce.triggerSave();
                editor.save();
                $('form').validate().element(editor.getElement());
            });
            editor.on('input', function () {
                tinymce.triggerSave();
                $('form').validate().element(editor.getElement());
            });
        }
    });
}

var loadDropzone = function (dropzoneElementId) {
    const dropzoneConfig = {
        url: "/",
        autoProcessQueue: false,
        uploadMultiple: false,
        addRemoveLinks: true,
        maxFilesize: MAX_IMAGE_SIZE, // MB
        maxFiles: MAX_UPLOAD_FILES,
        parallelUploads: MAX_PARALLEL_FILES,
        dictDefaultMessage: 'Drop files here to upload. ' + MAX_PARALLEL_FILES + ' files max for each upload.',
        init: function () {
            const dropzoneInstance = this;
            const storedFiles = [];
            // Event: File added
            this.on("addedfile", (file) => {
                storedFiles.push(file);
            });

            this.on("removedfile", (file) => {
                const index = storedFiles.indexOf(file);
                if (index > -1) {
                    storedFiles.splice(index, 1);
                }
            });

            dropzoneInstance.getStoredFiles = () => [...storedFiles];
        },
    };

    const finalOptions = { ...dropzoneConfig };

    const dropzone = new Dropzone(dropzoneElementId, finalOptions);

    return dropzone;
}

var showSuccessMessage = function (message, callback) {
    Swal.fire({
        title: "Success",
        text: message,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
    }).then((result) => {

        if (result.isConfirmed && callback) {
            callback();
        }
    });
}

var showWarningMessage = function (message, callback) {
    Swal.fire({
        title: "Warning!",
        text: message,
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
    }).then((result) => {

        if (result.isConfirmed && callback) {
            callback();
        }
    });
}

var showErrorMessage = function (message, callback) {
    Swal.fire({
        title: "Error",
        text: message,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK"
    }).then((result) => {

        if (result.isConfirmed && callback) {
            callback();
        }
    });
}