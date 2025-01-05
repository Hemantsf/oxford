@include('partials.header')

<div class="container mx-auto my-10">
    <h2 class="text-2xl font-semibold text-center mb-8 p-3">Edit Course</h2>
    
    <form class="space-y-6 mt-6 p-3" id="create-course-form">
        
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
                <input type="number" id="price" name="price" class="mt-2 block w-full p-3 border border-gray-300 rounded-md" placeholder="Course Price" min="0">
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
        <button type="submit" class="bg-white text-blue-600 border-2 border-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white hover:border-blue-700 transition duration-300">Update Course</button>

    </form>
</div>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        // Assuming the course ID is in the URL (e.g., /edit_course/1)
        const courseId = window.location.pathname.split('/').pop(); // Extracting the course ID from the URL
        fetchCategories();
        fetchInstructors();
        fetchCourseData(courseId);

        const form = document.getElementById("create-course-form");

        // Attach submit event listener
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission

            if (validateForm()) {
                submitForm(courseId);  // Pass course ID for update
            }
        });
    });

    // Fetch Course Data and Populate the Form
    function fetchCourseData(courseId) {
        axios.get(`/api/courses/${courseId}`)
            .then(response => {
                if (response.data.status === 'success') {
                    const course = response.data.data;

                    // Populate the fields with the course data
                    document.getElementById("title").value = course.title;
                    document.getElementById("description").value = course.description;
                    document.getElementById("price").value = course.price;
                    document.getElementById("instructor").value = course.instructor_id;
                    document.getElementById("category").value = course.category_id;
                    document.getElementById("difficulty").value = course.difficulty;
                    document.getElementById("format").value = course.format;
                    document.getElementById("duration").value = course.duration;
                    document.getElementById("certification_available").value = course.certification_available ? "1" : "0";
                    document.getElementById("popularity").value = course.popularity;
                    document.getElementById("rating").value = course.rating;
                } else {
                    console.error("Error fetching course data:", response.data.msg);
                }
            })
            .catch(error => {
                console.error("Error fetching course data:", error);
            });
    }

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

    // Submit Form Data
    function submitForm(courseId) {
        const formData = {
            title: document.getElementById("title").value,
            description: document.getElementById("description").value,
            price: document.getElementById("price").value,
            instructor_id: document.getElementById("instructor").value,
            category_id: document.getElementById("category").value,
            difficulty: document.getElementById("difficulty").value,
            format: document.getElementById("format").value,
            duration: document.getElementById("duration").value,
            certification_available: document.getElementById("certification_available").value === "true",
            popularity: document.getElementById("popularity").value,
            rating: document.getElementById("rating").value,
        };

        axios.put(`/api/courses/${courseId}`, formData)
            .then(response => {
                if (response.data.status === 'success') {
                    // alert("Course updated successfully!");
                    window.location.href = "/";  // Redirect to courses list page
                } else {
                    alert("Error updating course: " + response.data.msg);
                }
            })
            .catch(error => {
                console.error("Error updating course:", error);
            });
    }

    // Validate form fields before submitting
    function validateForm() {
        const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;
        const price = document.getElementById("price").value;
        const instructor = document.getElementById("instructor").value;
        const category = document.getElementById("category").value;

        if (!title || !description || !price || !instructor || !category) {
            alert("Please fill out all required fields.");
            return false;
        }
        return true;
    }
</script>

@include('partials.footer')
