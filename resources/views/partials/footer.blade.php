<footer class="bg-gray-600 text-white py-8 mt-4">
    <div class="max-w-screen-xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Logo Section -->
            <div class="flex justify-center md:justify-start">
                <img src="{{ asset('assets/logo-v3.png') }}" alt="Logo" class="h-12">
            </div>

            <!-- Subscription Form Section -->
            <div class="text-center md:text-right">
                <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-4">Subscribe to Our Newsletter</h3>
                <p class="text-sm md:text-base mb-4">Stay updated with our latest news and offers!</p>
                <form class="flex flex-col md:flex-row justify-center md:justify-end items-center space-y-2 md:space-y-0 md:space-x-2">
                    @csrf
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        class="px-4 py-2 w-full md:w-auto rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        required
                    >
                    <button 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 w-full md:w-auto">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</footer>
