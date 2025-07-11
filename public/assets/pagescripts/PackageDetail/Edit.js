var EditPackageDetail = function () {
    var me = this;
    me.packageDetailId = null;

    submitDetailHandler = function () {
        $("#packageDetailEditForm").on("submit", function (e) {
            debugger;
            e.preventDefault();
            var form = $("#packageDetailEditForm")[0];
            var url = form.action + "/" + me.packageDetailId;
            ajaxCall({
                url: url,
                type: "PUT",
                data: $(form).serialize(),
                dataType: "json",
                success: function (response) {
                    alert("Saved successfully.");
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $(".error-message").text("");
                        $.each(errors, function (field, messages) {
                            $("#" + field + "-error").text(messages[0]); // Assuming error elements follow the `id` pattern: field-error
                        });
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    getItineraryList = function () {
        var actionUrl = `/PackageDetail/${me.packageDetailId}/itinerary`;
        ajaxCall({
            url: actionUrl,
            type: "GET",
            success: function (html) {
                $("#itinerarySection").html(html);
                initHtmlEditor('#itinerarySection #description');
                handleItineraryFormSubmit();
            },
        });
    };

    getItineraryForm = function (id) {
        var actionUrl = `/PackageDetail/${me.packageDetailId}/itinerary/form`;
        if (id) actionUrl = actionUrl + `/${id}`;
        ajaxCall({
            url: actionUrl,
            type: "GET",
            success: function (html) {
                $("#itinerary_form_container").html(html);
                handleItineraryFormSubmit();
            },
        });
    };

    handleItineraryFormSubmit = function () {
        $("#submitItineraryForm").on("click", function (e) {
            e.preventDefault();
            var id = $("#itineraryAddUpdateForm #id").val();
            var actionUrl = `/PackageDetail/${me.packageDetailId}/itinerary`;
            var requestType = "POST";
            if (id !== "0") {
                actionUrl = `/PackageDetail/${me.packageDetailId}/itinerary/${id}`;
                requestType = "PUT";
            }
            var form = $("#itineraryAddUpdateForm")[0];
            var data = $(form).serialize();
            ajaxCall({
                url: actionUrl,
                type: requestType,
                data: data,
                dataType: "json",
                success: function (html) {
                    getItineraryList();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $(".error-message").text("");
                        $.each(errors, function (field, messages) {
                            $("#" + field + "-error").text(messages[0]);
                        });
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    initItinerarySection = function () {
        $("#pills-itinerary-tab").on("click", function (e) {
            e.preventDefault();
            debugger;
            if ($("#itinerarySection").children().length == 0)
                getItineraryList();
        });
    };

    bindImageSubmit = function () {
        $("#packageImageUpoadForm").on("submit", function (e) {
            e.preventDefault();
            var form = $("#packageImageUpoadForm");
            var csrfToken = $('#packageImageUpoadForm input[name="_token"]').val();
            var checkedIds = [];
            $('#packageImageUpoadForm input[name="DeleteImage"]:checked').each(
                function () {
                    checkedIds.push($(this).val());
                }
            );
            var formData = new FormData(form.get(0));

            var dropZoneContainer = "#packageImageContainer";
            var myDropzone = Dropzone.forElement(dropZoneContainer);
            var queuedFiles = myDropzone.getQueuedFiles();

            if (queuedFiles.length > 0) {
                for (var i = 0; i < queuedFiles.length; i++) {
                    formData.append("files[]", queuedFiles[i]); // Append Dropzone files
                }
            }
            if (checkedIds.length > 0) {
                for (var d = 0; d < checkedIds.length; d++) {
                    formData.append("DeletedFile[]", checkedIds[d]);
                }
            }

            ajaxCall({
                url: `/PackageDetail/${me.packageDetailId}/uploadImage`,
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": csrfToken // Attach CSRF token in the request headers
                },
                success: function (data) {
                    if (data.success) {
                        populateImageListView();
                        return;
                    }
                    alert(data.message);
                },
            });
        });
    };

    populateImageListView = function () {
        ajaxCall({
            type: "GET",
            url: `/PackageDetail/${me.packageDetailId}/Image`,
            dataType: "html",
            success: function (data) {
                $("#packageImageSection").html(data);
                loadDropzoneWithCropper(
                    "packageImageContainer",
                    "Files",
                    "dummyURL"
                );
                bindImageSubmit();
            },
        });
    };

    initImageSection = function () {
        $("#pills-image-tab").on("click", function (e) {
            e.preventDefault();
            if ($("#imageSection").children().length == 0) {
                populateImageListView();
            }
        });
    };

    handleFaqFormSubmit = function () {
        $("#submitfaqForm").on("click", function (e) {
            e.preventDefault();
            var id = $("#faqAddUpdateForm #id").val();
            var actionUrl = `/PackageDetail/${me.packageDetailId}/faqs`;
            var requestType = "POST";
            if (id !== "0") {
                actionUrl = `/PackageDetail/${me.packageDetailId}/faqs/${id}`;
                requestType = "PUT";  // Use PUT for updating
            }
            var form = $("#faqAddUpdateForm")[0];
            var data = $(form).serialize();
            ajaxCall({
                url: actionUrl,
                type: requestType,
                data: data,
                dataType: "json",
                success: function (html) {
                    populatePackageFAQView();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $(".error-message").text("");
                        $.each(errors, function (field, messages) {
                            $("#" + field + "-error").text(messages[0]); // Assuming error elements follow the `id` pattern: field-error
                        });
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    getPackageFaqForm = function (id) {
        var actionUrl = `/PackageDetail/${me.packageDetailId}/faqs/faqForm`;
        if (id) actionUrl = actionUrl + `/${id}`;
        ajaxCall({
            url: actionUrl,
            type: "GET",
            success: function (html) {
                $("#package_faq_form_container").html(html);
                handleFaqFormSubmit();
            },
        });
    };

    populatePackageFAQView= function(){
        ajaxCall({
            type: "GET",
            url: `/PackageDetail/${me.packageDetailId}/faqs`,
            dataType: "html",
            success: function (data) {
                $("#faqSection").html(data);
                handleFaqFormSubmit();
            },
        });
    }


    initFAQSection = function () {
        $("#pills-package-faq-tab").on("click", function (e) {
            e.preventDefault();
            if ($("#faqSection").children().length == 0) {
                populatePackageFAQView();
            }
        });
    };


    handleInclusionFormSubmit = function () {
        $("#submitInclusionForm").on("click", function (e) {
            e.preventDefault();
            var id = $("#inclusionAddUpdateForm #id").val();
            var actionUrl = `/PackageDetail/${me.packageDetailId}/inclusion`;
            var requestType = "POST";
            if (id !== "0") {
                actionUrl = `/PackageDetail/${me.packageDetailId}/inclusion/${id}`;
                requestType = "PUT";  // Use PUT for updating
            }
            var form = $("#inclusionAddUpdateForm")[0];
            var data = $(form).serialize();
            ajaxCall({
                url: actionUrl,
                type: requestType,
                data: data,
                dataType: "json",
                success: function (html) {
                    populatePackageInclusionView();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $(".error-message").text("");
                        $.each(errors, function (field, messages) {
                            $("#" + field + "-error").text(messages[0]); // Assuming error elements follow the `id` pattern: field-error
                        });
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    populatePackageInclusionView= function(){
        ajaxCall({
            type: "GET",
            url: `/PackageDetail/${me.packageDetailId}/inclusion`,
            dataType: "html",
            success: function (data) {
                $("#inclusionSection").html(data);
                handleInclusionFormSubmit();
            },
        });
    }

    getInclusionForm = function (id) {
        var actionUrl = `/PackageDetail/${me.packageDetailId}/inclusion/inclusionForm`;
        if (id) actionUrl = actionUrl + `/${id}`;
        ajaxCall({
            url: actionUrl,
            type: "GET",
            success: function (html) {
                $("#inclusion_form_container").html(html);
                handleInclusionFormSubmit();
            },
        });
    };

    initInclusionSection = function(){
        $("#pills-inclusion-tab").on("click", function (e) {
            e.preventDefault();
            if ($("#inclusionSection").children().length == 0) {
                populatePackageInclusionView();
            }
        }); 
    }

    this.init = function () {
        me.packageDetailId = $("#packageDetailId").val();
        $("#package_accommodation").select2({
            placeholder: "Select Accommodations",
        });
        submitDetailHandler();
        initItinerarySection();
        initImageSection();
        initFAQSection();
        initInclusionSection();
        initHtmlEditor('#description');
        initHtmlEditor('#short_description');
    };
};
