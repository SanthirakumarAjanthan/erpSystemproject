// Ensure DOM is fully loaded before running scripts
document.addEventListener("DOMContentLoaded", function () {

    // Form Validation Example for Customer Form
    document.getElementById("customerForm").addEventListener("submit", function (event) {
        let valid = true;

        // Example validation for first name and contact number
        const firstName = document.getElementById("first_name").value.trim();
        const contactNumber = document.getElementById("contact_number").value.trim();

        if (firstName === "") {
            alert("First name is required.");
            valid = false;
        }

        if (!/^\d{10}$/.test(contactNumber)) {
            alert("Contact number must be a valid 10-digit number.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Example: Dynamically Load Item Subcategories Based on Item Category
    document.getElementById("item_category").addEventListener("change", function () {
        const categoryId = this.value;
        const subCategorySelect = document.getElementById("item_sub_category");

        // Clear existing options
        subCategorySelect.innerHTML = "";

        // Mock AJAX call to fetch subcategories based on category selection
        // In a real scenario, replace this with an actual AJAX call to your backend
        const subCategories = {
            1: ["Subcategory 1-1", "Subcategory 1-2", "Subcategory 1-3"],
            2: ["Subcategory 2-1", "Subcategory 2-2"],
            3: ["Subcategory 3-1", "Subcategory 3-2", "Subcategory 3-3"]
        };

        if (subCategories[categoryId]) {
            subCategories[categoryId].forEach(function (subCategory) {
                const option = document.createElement("option");
                option.value = subCategory;
                option.text = subCategory;
                subCategorySelect.appendChild(option);
            });
        }
    });

    // Function to clear form data
    document.getElementById("resetForm").addEventListener("click", function () {
        document.querySelectorAll("input, select").forEach(function (element) {
            element.value = "";
        });
    });

    // Search functionality for reports
    document.getElementById("searchForm").addEventListener("submit", function (event) {
        const startDate = document.getElementById("start_date").value;
        const endDate = document.getElementById("end_date").value;

        if (new Date(startDate) > new Date(endDate)) {
            alert("Start date cannot be later than end date.");
            event.preventDefault();
        }
    });

    // Example: Highlight selected row in a table
    document.querySelectorAll(".table tr").forEach(function (row) {
        row.addEventListener("click", function () {
            document.querySelectorAll(".table tr").forEach(function (r) {
                r.classList.remove("table-active");
            });
            row.classList.add("table-active");
        });
    });

});

// Example AJAX function for adding items (this is a placeholder, adjust based on your backend)
function addItem(itemData) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/add_item", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            alert("Item added successfully!");
            // Optionally, you could clear the form or redirect to another page
        }
    };

    xhr.send(JSON.stringify(itemData));
}

// Function to handle adding a new item (Example function to trigger AJAX)
document.getElementById("addItemForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    const itemData = {
        itemCode: document.getElementById("item_code").value,
        itemName: document.getElementById("item_name").value,
        itemCategory: document.getElementById("item_category").value,
        itemSubCategory: document.getElementById("item_sub_category").value,
        quantity: document.getElementById("quantity").value,
        unitPrice: document.getElementById("unit_price").value
    };

    addItem(itemData); // Call the addItem function to submit via AJAX
});
