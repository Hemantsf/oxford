@include('partials.header')
<div class="max-w-screen-xl mx-auto">
        <h1 class="text-3xl font-semibold mb-4 text-center text-blue-600 mt-3">Discover Courses</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <aside class="col-span-1 lg:col-span-1 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-blue-500">Filters</h2>
                <button id="reset-filters" class="mb-3 w-full bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg hover:bg-gray-400 transition duration-300">
                    Reset Filters
                </button>
                <form id="filter-form" class="space-y-6">
                    <div class="flex flex-col">
                        <label for="category" class="block text-lg font-semibold">Category</label>
                        <select id="category" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Categories</option>
                            <!-- Categories will be dynamically loaded here -->
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="price" class="block text-lg font-semibold">Price Range</label>
                        <select id="price" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Prices</option>
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                            <option value="10-100">$10 - $100</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
    <label for="difficulty" class="block text-lg font-semibold">Difficulty</label>
    <div id="difficulty" class="mt-2">
        <div class="flex items-center">
            <input type="checkbox" id="difficulty-beginner" value="beginner" class="p-2" />
            <label for="difficulty-beginner" class="ml-2">Beginner</label>
        </div>
        <div class="flex items-center">
            <input type="checkbox" id="difficulty-intermediate" value="intermediate" class="p-2" />
            <label for="difficulty-intermediate" class="ml-2">Intermediate</label>
        </div>
        <div class="flex items-center">
            <input type="checkbox" id="difficulty-advanced" value="advanced" class="p-2" />
            <label for="difficulty-advanced" class="ml-2">Advanced</label>
        </div>
    </div>
</div>


                    <div class="flex flex-col">
                        <label for="duration" class="block text-lg font-semibold">Duration</label>
                        <select id="duration" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Durations</option>
                            <option value="< 2 hours">< 2 hours</option>
                            <option value="2–5 hours">2–5 hours</option>
                            <option value="5–10 hours">5–10 hours</option>
                            <option value="> 10 hours">> 10 hours</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="format" class="block text-lg font-semibold">Format</label>
                        <select id="format" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Formats</option>
                            <option value="Video">Video</option>
                            <option value="Text-based">Text-based</option>
                            <option value="Interactive/Live">Interactive/Live</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                    <label for="rating" class="block text-lg font-semibold">Rating</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" id="rating-5+" name="rating" value="" class="form-radio" checked>
                            <span class="ml-2">All</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" id="rating-4+" name="rating" value="4+" class="form-radio">
                            <span class="ml-2">4+ Stars</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" id="rating-3+" name="rating" value="3+" class="form-radio">
                            <span class="ml-2">3+ Stars</span>
                        </label>
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" id="rating-2" name="rating" value="2" class="form-radio">
                            <span class="ml-2">2 Stars and below</span>
                        </label>
                    </div>
                </div>


                    <div class="flex flex-col">
                        <label for="popularity" class="block text-lg font-semibold">Popularity</label>
                        <select id="popularity" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Popularity</option>
                            <option value="Most Enrolled">Most Enrolled</option>
                            <option value="Trending">Trending</option>
                            <option value="Recently Viewed">Recently Viewed</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="release_date" class="block text-lg font-semibold">Release Date</label>
                        <select id="release_date" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Dates</option>
                            <option value="30_days">Last 30 days</option>
                            <option value="6_months">Last 6 months</option>
                            <option value="1_year">Last 1 year</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="certification" class="block text-lg font-semibold">Certification</label>
                        <select id="certification" class="mt-2 p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">All Certifications</option>
                            <option value="1">Certification Available</option>
                            <option value="0">No Certification</option>
                        </select>
                    </div>
                </form>
            </aside>

            <!-- Courses List -->
            <section class="col-span-1 lg:col-span-3">
            <div class="flex justify-between items-center mb-6">
    <!-- <h2 class="text-3xl font-bold text-gray-800">Available Courses</h2> -->
    <button 
        id="resetFilterButton"
        class="bg-red-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-red-700 transition duration-300 hidden"
        onclick="resetFilters()">
        Reset Filters
    </button>
</div>

  
    <div class="flex justify-end p-3">
    <a href="{{ url('/create_course') }}">
        <button class="bg-white text-gray-600 border-2 border-gray-600 font-semibold py-2 px-4 rounded-lg hover:bg-gray-600 hover:text-white hover:border-gray-700 transition duration-300">
            Create Course
        </button>
    </a>
</div>
    <div id="courses-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Courses will be dynamically inserted here -->
    </div>
</section>
        </div>
    </div>
    @include('partials.footer')
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const coursesList = document.getElementById('courses-list');
            
            // Update filterFields to check for element existence
            const filterFields = [
                'category',
                'price',
                'difficulty', // This will now handle multiple selected checkboxes
                'duration',
                'format',
                'rating',
                'popularity',
                'release_date',
                'certification'
            ]
            .map(id => document.getElementById(id))
            .filter(element => element !== null);  // Filter out null elements

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

            // Fetch Courses with Filters
            function fetchCourses(filters = {}) {
                const baseUrl = '/api/courses';
                const url = Object.keys(filters).length > 0 
                    ? `${baseUrl}?${new URLSearchParams(filters).toString()}` 
                    : baseUrl;

                axios.get(url)
                    .then(response => {
                        if (response.data.status === 'success') {
                            const courses = response.data.data;
                            displayCourses(courses);
                        } else {
                            console.warn("Unexpected response format:", response.data);
                            alert("Something went wrong while fetching courses.");
                        }
                    })
                    .catch(error => {
                        if (error.response && error.response.data) {
                            const apiError = error.response.data;
                            console.error("API Error:", apiError);
                            alert(apiError.msg || "An unexpected error occurred.");
                        } else {
                            console.error("Network Error:", error);
                            alert("Unable to connect to the server. Please try again later.");
                        }
                    });
            }

            // Display Courses
            function displayCourses(courses) {
                coursesList.innerHTML = '';
                if (courses.length === 0) {
                    coursesList.innerHTML = '<p>No courses found.</p>';
                } else {
                    courses.forEach(course => {
                        const courseElement = document.createElement('div');
                        courseElement.classList.add(
                            'p-3',
                            'bg-white',
                            'rounded-lg',
                            'shadow-lg',
                            'transition',
                            'hover:shadow-xl',
                            'hover:scale-105',
                            'transform',
                            'duration-300',
                            'flex',
                            'flex-col',
                            'space-y-6'
                        );

                        courseElement.innerHTML = `
                            <h6 class="text-2xl font-bold text-blue-600">${course.title}</h6>
                            <p class="text-sm text-gray-600 italic mb-1">${course.description}</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <p><strong class="font-semibold italic">Instructor:</strong> ${course.instructor.name}</p>
                                <p><strong class="font-semibold italic">Category:</strong> ${course.category.name}</p>
                                <p><strong class="font-semibold italic">Price:</strong> <span class="text-green-600 font-bold">$${course.price}</span></p>
                                <p><strong class="font-semibold italic">Difficulty:</strong> ${course.difficulty}</p>
                                <p><strong class="font-semibold italic">Duration:</strong> ${course.duration}</p>
                                <p><strong class="font-semibold italic">Format:</strong> ${course.format}</p>
                                <p><strong class="font-semibold italic">Ratings:</strong> ${generateStars(course.rating)}</p>
                                <p><strong class="font-semibold italic">Popularity:</strong> ${course.popularity}</p>
                                <p><strong class="font-semibold italic">Release Date:</strong> ${course.release_date}</p>
                                <p>
                                    <strong class="font-semibold italic">Certification:</strong>
                                    ${course.certification_available 
                                        ? '<span class="text-green-600 font-bold">Available</span>' 
                                        : '<span class="text-red-600 font-bold">Not Available</span>'}
                                </p>
                            </div>
                            <div class="mt-4">
                                <button 
                                    class="bg-white text-blue-600 border-2 border-blue-600 font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 hover:text-white hover:border-blue-700 transition duration-300"
                                    onclick="editCourse(${course.id})">
                                    Edit Course
                                </button>
                                <button 
                                    class="bg-white text-red-600 border-2 border-red-600 font-semibold py-2 px-4 rounded-lg hover:bg-red-600 hover:text-white hover:border-red-700 transition duration-300"
                                    onclick="deleteCourse(${course.id})">
                                    Delete Course
                                </button>
                            </div>
                        `;

                        coursesList.appendChild(courseElement);
                    });
                }
            }
            


            // Debounce function to limit API calls
            function debounce(func, delay) {
                let timeout;
                return function (...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), delay);
                };
            }

            // Collect filters and fetch courses
            function handleFilterChange() {
                const filters = filterFields.reduce((acc, field) => {
                    if (field.id === 'difficulty') {
                        const selectedDifficulties = Array.from(document.querySelectorAll('#difficulty input[type="checkbox"]:checked'))
                            .map(checkbox => checkbox.value);
                        if (selectedDifficulties.length > 0) {
                            acc.difficulty = selectedDifficulties;
                        }
                    } else if (field.value) {
                        acc[field.id] = field.value;
                    }
                    return acc;
                }, {});

                const selectedRating = document.querySelector('input[name="rating"]:checked');
                if (selectedRating) {
                    filters['rating'] = selectedRating.value;
                }
                fetchCourses(filters);
            }

            // Attach event listeners to filter fields
            filterFields.forEach(field => {
                if (field.id === 'difficulty') {
                    const checkboxes = document.querySelectorAll('#difficulty input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', debounce(handleFilterChange, 300));
                    });
                } else {
                    field.addEventListener('change', debounce(handleFilterChange, 300)); 
                }
            });

                // Attach event listeners to rating radio buttons
            const ratingRadios = document.querySelectorAll('input[name="rating"]');
            ratingRadios.forEach(radio => {
                radio.addEventListener('change', debounce(handleFilterChange, 300));
            });
            // Reset Filters Function
            function resetFilters() {
                filterFields.forEach(field => {
                    if (field.id === 'difficulty') {
                        const checkboxes = document.querySelectorAll('#difficulty input[type="checkbox"]');
                        checkboxes.forEach(checkbox => checkbox.checked = false);
                    } else {
                        field.value = '';
                    }
                });
                fetchCourses();
            }

            // Attach event listener to the reset button
            document.getElementById('reset-filters').addEventListener('click', resetFilters);

            // Initial Load
            fetchCategories();
            fetchCourses();
        });

        function editCourse(courseId) {
        window.location.href = `/edit_course/${courseId}`;
                // Redirect to course edit page
        }

        function deleteCourse(courseId) {
            console.log("Deleting course:", courseId);

            // Confirm deletion
            if (confirm("Are you sure you want to delete this course?")) {
                // Sending a DELETE request to the API
                fetch(`/api/courses/${courseId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        // Add any authorization headers if required
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // console.log("Course deleted successfully!");
                        // Optionally, you can update the UI to remove the deleted course from the list
                        // e.g., remove the course from the DOM or re-fetch the list of courses
                        // alert("Course deleted successfully.");
                        location.reload(); // Reload the page to reflect changes (or handle UI updates as needed)
                    } else {
                        console.error("Failed to delete course:", response.statusText);
                        alert("Failed to delete course.");
                    }
                })
                .catch(error => {
                    console.error("Error deleting course:", error);
                    alert("An error occurred while deleting the course.");
                });
            }
        }

        function generateStars(rating) {
        let stars = '';
        for (let i = 0; i < 5; i++) {
            stars += i < rating ? '★' : '☆'; // Fill stars based on rating
        }
        return stars;
        }
    </script>
</body>

</html>
