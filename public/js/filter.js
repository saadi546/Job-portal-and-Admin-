$(document).ready(function() {
    $('#applyFiltersButton').on('click', function() {
        // Get the form data
        var formData = $('#filterForm').serialize();
 
        // Get the route URL from the hidden input field
        var routeUrl = $('#filterRoute').val();
 
        // Send an Ajax request
        $.ajax({
            type: 'GET',
            url: routeUrl, // Use the route URL here
            data: formData,
            success: function(data) {
                // Update the job listing with the filtered results
                // You can update your job listing here, e.g., replace the current listings with the new ones
                // Example: $('#job-listing').html(data);
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors to the console for debugging
            }
        });
    });
 });
 