var EditServiceRegion = function () {
    var me = this;
    me.serviceRegionId = null;

    getfaqForm = function (id) {
        var actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs/form`;
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
        me.serviceRegionId = $("#serviceRegionId").val();
        handleFaqFormSubmit();
    };
};
