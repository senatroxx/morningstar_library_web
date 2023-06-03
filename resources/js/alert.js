document.addEventListener("DOMContentLoaded", function () {
    // Get the alert element
    const alertElement = document.querySelector("[alert]");
    const autoAlert = document.querySelector("[autoalert]");

    if (alertElement) {
        // Get the close button element
        const closeButton = document.querySelector("[alert-close]");

        // Add click event listener to the close button
        closeButton.addEventListener("click", function () {
            alertElement.textContent = "";

            // Apply necessary CSS properties for smooth transition
            alertElement.style.transitionProperty =
                "opacity, height, margin-top, margin-bottom, padding-top, padding-bottom";
            alertElement.style.transitionDuration = "500ms"; // Adjust the duration (in milliseconds) to match your transition duration
            alertElement.style.height = "0";
            alertElement.style.opacity = "0";
            alertElement.style.marginTop = "0";
            alertElement.style.marginBottom = "0";
            alertElement.style.paddingTop = "0";
            alertElement.style.paddingBottom = "0";

            // Remove the alert element from the DOM after the transition duration
            setTimeout(function () {
                alertElement.remove();
            }, 500); // Adjust the duration (in milliseconds) to match your transition duration
        });
    }

    if (autoAlert) {
        var alertDuration = parseInt(autoAlert.getAttribute("alert-duration"));

        setTimeout(function () {
            autoAlert.textContent = "";

            // Apply necessary CSS properties for smooth transition
            autoAlert.style.transitionProperty =
                "opacity, height, margin-top, margin-bottom, padding-top, padding-bottom";
            autoAlert.style.transitionDuration = "500ms"; // Adjust the duration (in milliseconds) to match your transition duration
            autoAlert.style.height = "0";
            autoAlert.style.opacity = "0";
            autoAlert.style.marginTop = "0";
            autoAlert.style.marginBottom = "0";
            autoAlert.style.paddingTop = "0";
            autoAlert.style.paddingBottom = "0";

            setTimeout(function () {
                autoAlert.remove();
            }, 500);
        }, alertDuration);
    }
});
