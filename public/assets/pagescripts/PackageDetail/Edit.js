var EditPackageDetail = function () {
    var me = this;
    me.packageDetailId = null;

    submitDetailHandler = function () {
        $("#packageDetailEditForm").on("submit", function (e) {
            debugger
            e.preventDefault();
            var form = $("#packageDetailEditForm")[0];
            var url = form.action + '/'+me.packageDetailId
            ajaxCall({
                url: url,
                type: "PUT",
                data: $(form).serialize(),
                dataType: "json",
                success: function (html) {
                    debugger;
                },
                error: function (xhr) {
                    debugger;
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        // Clear previous error messages
                        $("#question-error").text("");
                        $("#answer-error").text("");

                        // Show error messages
                        if (errors.question) {
                            $("#question-error").text(errors.question[0]);
                        }
                        if (errors.answer) {
                            $("#answer-error").text(errors.answer[0]);
                        }
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    getfaqForm = function (id) {
        var actionUrl = `/ServiceRegion/${me.packageDetailId}/faqs/form`;
        if (id) actionUrl = actionUrl + `/${id}`;
        ajaxCall({
            url: actionUrl,
            type: "GET",
            success: function (html) {
                $("#faq-form-container").html(html);
                handleFaqFormSubmit();
            },
        });
    };

    handleFaqFormSubmit = function () {
        $("#submitfaqForm").on("click", function (e) {
            debugger;
            e.preventDefault();
            var id = $("#faqAddUpdateForm #id").val();
            var actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs`;
            var requestType = "POST";
            if (id !== "0") {
                actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs/${id}`;
                requestType = "PUT"; // Use PUT for updating
            }
            var form = $("#faqAddUpdateForm")[0];
            var data = $(form).serialize();
            ajaxCall({
                url: actionUrl,
                type: requestType,
                data: data,
                dataType: "json",
                success: function (html) {
                    debugger;
                    getfaqForm();
                },
                error: function (xhr) {
                    debugger;
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        // Clear previous error messages
                        $("#question-error").text("");
                        $("#answer-error").text("");

                        // Show error messages
                        if (errors.question) {
                            $("#question-error").text(errors.question[0]);
                        }
                        if (errors.answer) {
                            $("#answer-error").text(errors.answer[0]);
                        }
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
            });
        });
    };

    this.init = function () {
        me.packageDetailId = $("#packageDetailId").val();
        $('#package_accommodation').select2({
            placeholder: "Select Accommodations",
        });
        submitDetailHandler();
        handleFaqFormSubmit();
    };
};
