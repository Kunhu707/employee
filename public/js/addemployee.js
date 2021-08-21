$("#add-employee").validate({
    rules: {
        name: {
            required: true,
            alpha: true
        },
        email: {
            required: true,
            email: true
        },
        file: {
            extension: "jpeg,png,jpg,gif,svg",
            filesize: 5
        },
        designation_id: {
            required: true,
        }
    },
    messages: {
        // 
    },
    // submitHandler: function(form) {
    //     form.submit();
    // }
});
