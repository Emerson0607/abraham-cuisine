<x-guest-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Create a Reservation</h2>

        <!-- Display success message -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-500 text-white rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Reservation Form -->
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf <!-- CSRF token for security -->

            <div class="space-y-4">
                <!-- Full Name -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name:</label>
                    <input type="text" id="fullname" name="fullname"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('fullname') }}" required>
                    @error('fullname')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact -->
                <div>
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact:</label>
                    <input type="text" id="contact" name="contact"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('contact') }}" required>
                    @error('contact')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('address') }}" required>
                    @error('address')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Table -->
                {{-- <div>
                    <label for="table" class="block text-sm font-medium text-gray-700">Table:</label>
                    <input type="text" id="table" name="table"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('table') }}" required>
                    @error('table')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div>
                    <label for="table" class="block text-sm font-medium text-gray-700">Table:</label>
                    <select id="table" name="table"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="">Select a table</option>
                        @foreach ($table as $tables)
                            <option value="{{ $tables->table_name }}"
                                {{ old('table') == $tables->table_name ? 'selected' : '' }}>
                                {{ $tables->table_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('table')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Schedule -->
                <div>
                    <label for="schedule" class="block text-sm font-medium text-gray-700">Schedule:</label>
                    <input type="datetime-local" id="schedule" name="schedule"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('schedule') }}" required>
                    @error('schedule')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed
                        </option>
                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full mt-4 px-6 py-3 bg-indigo-600 text-black rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Create Reservation
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-guest-layout>
