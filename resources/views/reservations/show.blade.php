<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h1 class="text-2xl font-bold mb-4">Edit Reservation for {{ $reservation->fullname }}</h1>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-semibold">Full Name</label>
                        <input type="text" name="fullname" value="{{ old('fullname', $reservation->fullname) }}"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div>
                        <label class="block font-semibold">Contact</label>
                        <input type="text" name="contact" value="{{ old('contact', $reservation->contact) }}"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div>
                        <label class="block font-semibold">Email</label>
                        <input type="email" name="email" value="{{ old('email', $reservation->email) }}"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div>
                        <label class="block font-semibold">Address</label>
                        <input type="text" name="address" value="{{ old('address', $reservation->address) }}"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>

                    <select name="table" class="w-full px-4 py-2 border rounded-md">
                        @foreach ($tables as $table)
                            <option value="{{ $table->table_name }}"
                                {{ old('table', $reservation->table) == $table->table_name ? 'selected' : '' }}>
                                {{ $table->table_name }}
                            </option>
                        @endforeach
                    </select>



                    <input type="datetime-local" id="schedule" name="schedule"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('schedule', $reservation->schedule ? $reservation->schedule->format('Y-m-d\TH:i') : '') }}"
                        required>


                    <div class="col-span-2">
                        <label class="block font-semibold">Status</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-md">
                            <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>
                                Confirmed</option>
                            <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="document.getElementById('delete-form').submit();"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-200">
                        Delete
                    </button>
                    <button type="submit"
                        class="bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                        Update Reservation
                    </button>
                </div>
            </form>


            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')

            </form>
        </div>
    </div>
</x-app-layout>
