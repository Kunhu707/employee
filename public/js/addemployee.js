$(document).ready(function () {
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
    
});
