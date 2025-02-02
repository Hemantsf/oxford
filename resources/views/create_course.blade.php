@include('partials.header')

<div class="container mx-auto my-10">
    <h2 class="text-2xl font-semibold text-center mb-8 p-3">Create a New Course</h2>
    
    <form class="space-y-6 mt-6 p-3" id="create-course-form">
        @csrf
        <!-- Course Title and Description -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label for="title" class="block text-lg font-medium text-gray-700">Course Title</label>
                <input type="text" id="title" name="title" class="mt-2 block w-full p-3 border border-gray-300 rounded-md" placeholder="Course Title">
            </div>
            <div class="flex flex-col">
                <label for="description" class="block text-lg font-medium text-gray-700">Course Description</label>
                <textarea id="description" name="description" class="mt-2 block w-full p-3 border border-gray-300 rounded-md" rows="4" placeholder="Describe the course"></textarea>
            </div>
        </div>

        <!-- Course Price, Instructor, and Category -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col">
                <label for="price" class="block text-lg font-medium text-gray-700">Price($)</label>
                <input type="text" id="price" name="price" class="mt-2 block w-full p-3 border border-gray-300 rounded-md" placeholder="Course Price">
            </div>
            <div class="flex flex-col">
                <label for="instructor" class="block text-lg font-medium text-gray-700">Instructor</label>
                <select id="instructor" name="instructor_id" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Instructor</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
                <select id="category" name="category_id" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Category</option>
                </select>
            </div>
        </div>

        <!-- Difficulty Level, Format, and Duration -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col">
                <label for="difficulty" class="block text-lg font-medium text-gray-700">Difficulty Level</label>
                <select id="difficulty" name="difficulty" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Difficulty level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="format" class="block text-lg font-medium text-gray-700">Format</label>
                <select id="format" name="format" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Format</option>
                    <option value="Video">Video</option>
                    <option value="Text-based">Text-based</option>
                    <option value="Interactive/Live">Interactive/Live</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="duration" class="block text-lg font-medium text-gray-700">Duration</label>
                <select id="duration" name="duration" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Duration</option>
                    <option value="< 2 hours">< 2 hours</option>
                    <option value="2–5 hours">2–5 hours</option>
                    <option value="5–10 hours">5–10 hours</option>
                    <option value="> 10 hours">> 10 hours</option>
                </select>
            </div>
        </div>

        <!-- Certification, Popularity, and Rating -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col">
                <label for="certification_available" class="block text-lg font-medium text-gray-700">Certification</label>
                <select id="certification_available" name="certification_available" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Certification Available</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="popularity" class="block text-lg font-medium text-gray-700">Popularity</label>
                <select id="popularity" name="popularity" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Popularity</option>
                    <option value="Trending">Trending</option>
                    <option value="Most Enrolled">Most Enrolled</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="rating" class="block text-lg font-medium text-gray-700">Rating</label>
                <select id="rating" name="rating" class="mt-2 block w-full p-3 border border-gray-300 rounded-md">
                    <option value="">Select Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-8">
            <button type="submit" class="bg-white text-blue-600 border-2 border-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white hover:border-blue-700 transition duration-300">Create Course</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchCategories();
        fetchInstructors();

        const form = document.getElementById("create-course-form");
        
        // Attach submit event listener
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission
            
            if (validateForm()) {
                submitForm();
            }
        });
    });

    // Fetch Categories
    function fetchCategories() {
        axios.get('/api/categories')
            .then(response => {
                if (response.data.status === 'success') {
                    const categories = response.data.data;
                    const categoryInput = document.getElementById('category');
                    categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categoryInput.appendChild(option);
                    });
                } else {
                    console.error("Error: " + response.data.msg);
                }
            })
            .catch(error => {
                console.error("Error fetching categories:", error);
            });
    }

    // Fetch Instructors
    function fetchInstructors() {
        axios.get('/api/instructors')
            .then(response => {
                const instructors = response.data;
                const instructorSelect = document.getElementById('instructor');
                instructors.forEach(instructor => {
                    const option = document.createElement('option');
                    option.value = instructor.id;
                    option.textContent = instructor.name;
                    instructorSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching instructors:', error));
    }

    function validateForm() {
    let isValid = true;
    const title = document.getElementById("title").value.trim();
    const description = document.getElementById("description").value.trim();
    const price = document.getElementById("price").value.trim();
    const instructor = document.getElementById("instructor").value;
    const category = document.getElementById("category").value;
    const difficulty = document.getElementById("difficulty").value;
    const format = document.getElementById("format").value;
    const duration = document.getElementById("duration").value;
    const certificationAvailable = document.getElementById("certification_available").value;
    const popularity = document.getElementById("popularity").value;
    const rating = document.getElementById("rating").value;

    // Clear previous error messages
    const errors = document.querySelectorAll(".error-message");
    errors.forEach(error => error.remove());

    // Helper function to display error
    function showError(inputId, message) {
        const input = document.getElementById(inputId);
        const errorDiv = document.createElement("div");
        errorDiv.className = "text-red-500 text-sm mt-1 error-message";
        errorDiv.textContent = message;
        input.parentElement.appendChild(errorDiv);
    }

    // Check required fields
    if (!title) {
        showError("title", "Title is required.");
        isValid = false;
    }
    if (title.length > 100) {
        showError("title", "Title cannot exceed 100 characters.");
        isValid = false;
    }

    if (!description) {
        showError("description", "Description is required.");
        isValid = false;
    }
    if (description.length > 255) {
        showError("description", "Description cannot exceed 255 characters.");
        isValid = false;
    }

    // Price validation - Ensure it's a positive number, either integer or float
    const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;  // Matches integers or numbers with up to 2 decimal places
    if (!price || !priceRegex.test(price) || parseFloat(price) <= 0) {
        showError("price", "Price should be a positive number with up to two decimal places.");
        isValid = false;
    }

    if (!instructor) {
        showError("instructor", "Instructor is required.");
        isValid = false;
    }

    if (!category) {
        showError("category", "Category is required.");
        isValid = false;
    }

    if (!difficulty) {
        showError("difficulty", "Difficulty level is required.");
        isValid = false;
    }

    if (!format) {
        showError("format", "Format is required.");
        isValid = false;
    }

    if (!duration) {
        showError("duration", "Duration is required.");
        isValid = false;
    }

    if (certificationAvailable === "") {
        showError("certification_available", "Certification availability is required.");
        isValid = false;
    }

    if (!popularity) {
        showError("popularity", "Popularity is required.");
        isValid = false;
    }

    if (!rating) {
        showError("rating", "Rating is required.");
        isValid = false;
    }

    return isValid;
}


function submitForm() {
    const formData = new FormData(document.getElementById("create-course-form"));

    axios.post("/api/courses", formData)
        .then(response => {
            if (response.data.status === 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: 'Course created successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "/"; // Redirect to home page after success
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: `Error creating course: ${response.data.msg}`,
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                });
            }
        })
        .catch(error => {
            console.error("Error creating course:", error);
            Swal.fire({
                title: 'Error!',
                text: 'An unexpected error occurred. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
}

</script>
