<footer class="bg-gray-600 text-white py-8 mt-4">
    <div class="max-w-screen-xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
            <!-- Logo Section -->
            <div class="flex justify-center md:justify-start">
                <img src="{{ asset('assets/logo-v3.png') }}" alt="Logo" class="h-12">
            </div>

            <!-- Subscription Form Section -->
            <div class="text-center md:text-right">
                <h3 class="text-xl font-semibold mb-4">Subscribe to Our Newsletter</h3>
                <p class="text-sm mb-4">Stay updated with our latest news and offers!</p>
                <form class="flex justify-center md:justify-end items-center space-x-2">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" class="px-4 py-2 rounded-lg text-gray-700" required>
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</footer>
