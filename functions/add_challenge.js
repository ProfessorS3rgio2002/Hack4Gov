$(document).ready(function () {
    $("#add-challenge-btn").click(function () {
        $("#challenge-overlay").show();
    });

    $("#close-overlay").click(function () {
        $("#challenge-overlay").hide();
    });

    $("#challenge-form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Validate form
        if (!this.checkValidity()) {
            $(this).addClass("was-validated");
            return;
        }

        // Collect form data
        var formData = {
            title: $("#challenge-title").val(),
            description: $("#challenge-description").val(),
            category: $("#challenge-category").val(),
            difficulty: $("#challenge-difficulty").val(),
            points: $("#challenge-points").val(),
            flag: $("#challenge-flag").val(),
            hint: $("#challenge-hint").val(),
            file: $("#challenge-file").val()
        };

        // Send the data via AJAX
        $.ajax({
            url: "functions/add_challenge.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    // Show the success message
                    $("#success-message").fadeIn().delay(2000).fadeOut();

                    // Reset form fields
                    $("#challenge-form")[0].reset();
                    $("#challenge-form").removeClass("was-validated");

                    // Hide overlay
                    $("#challenge-overlay").hide();

                    // Reload the page after 1 second
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function () {
                alert("Error submitting form.");
            }
        });
    });
});
