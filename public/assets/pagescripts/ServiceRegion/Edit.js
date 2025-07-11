var EditServiceRegion = function () {
    var me = this;
    me.serviceRegionId = null;

    getfaqForm = function (id) {
        var actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs/form`;
        if (id) actionUrl = actionUrl + `/${id}`;
        ajaxCall({
            url: actionUrl,
            type: 'GET',
            success: function (html) {
                $('#faq-form-container').html(html);
                handleFaqFormSubmit();
            }
        });
    };

    handleFaqFormSubmit = function () {
        $('#submitfaqForm').on('click', function (e) {
            e.preventDefault();
            var id = $('#faqAddUpdateForm #id').val();
            var actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs`;
            var requestType = 'POST';
            if (id !== '0') {
                actionUrl = `/ServiceRegion/${me.serviceRegionId}/faqs/${id}`;
                requestType = 'PUT'; // Use PUT for updating
            }
            var form = $('#faqAddUpdateForm')[0];
            var data = $(form).serialize();
            ajaxCall({
                url: actionUrl,
                type: requestType,
                data: data,
                dataType: 'json',
                success: function (html) {
                    getfaqForm();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('.error-message').text('');
                        $.each(errors, function (field, messages) {
                            $('#' + field + '-error').text(messages[0]); // Assuming error elements follow the `id` pattern: field-error
                        });
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    };

    this.init = function () {
        me.serviceRegionId = $('#serviceRegionId').val();
        initHtmlEditor('#description');
        initHtmlEditor('#reason');
        handleFaqFormSubmit();
    };
};
