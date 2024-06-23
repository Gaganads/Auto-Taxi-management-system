$(document).ready(function() {
    // Define the content for different contact options
    var contactOptions = {
        'General Inquiry': 'You can contact us via email at info@example.com or by phone at +1 234 567 890.',
        'Technical Support': 'For technical support, please email support@example.com or call our technical support team at +1 123 456 789.',
        'Customer Service': 'For assistance with bookings or other inquiries, please email customer.service@example.com or call our customer service hotline at +1 987 654 321.'
    };

    // Add a dropdown menu dynamically
    var dropdownMenu = $('<select id="contactDropdown"></select>');
    $.each(contactOptions, function(key, value) {
        dropdownMenu.append('<option value="' + key + '">' + key + '</option>');
    });

    // Append the dropdown menu to the navbar
    $('#contactLink').after(dropdownMenu);

    // Change the displayed information when an option is selected
    dropdownMenu.on('change', function() {
        var selectedOption = $(this).val();
        alert(contactOptions[selectedOption]); // You can replace this with displaying the information in a different way
    });
});
