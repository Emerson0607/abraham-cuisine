<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Reservations</h1>

        <!-- Filter Section -->
        <div class="mb-4">
            <label for="filter" class="block text-sm font-medium text-gray-700">Filter by Full Name:</label>
            <input type="text" id="filter" oninput="filterTable()"
                class="mt-1 px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="overflow-x-auto">
            <table id="reservationsTable" class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left" onclick="sortTable(0)">Full Name</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(1)">Contact</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(2)">Email</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(3)">Address</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(4)">Table</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(5)">Schedule</th>
                        <th class="py-3 px-6 text-left" onclick="sortTable(6)">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($reservations as $reservation)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $reservation->fullname }}</td>
                            <td class="py-3 px-6 text-left">{{ $reservation->contact }}</td>
                            <td class="py-3 px-6 text-left">{{ $reservation->email }}</td>
                            <td class="py-3 px-6 text-left">{{ $reservation->address }}</td>
                            <td class="py-3 px-6 text-left">{{ $reservation->table }}</td>
                            <td class="py-3 px-6 text-left">{{ $reservation->schedule }}</td>
                            <td class="py-3 px-6 text-left">
                                <span
                                    class="px-3 py-1 rounded-full text-sm {{ $reservation->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('reservations.show', $reservation->id) }}"
                                    class="inline-block bg-blue-500 text-black px-4 py-1 rounded-md hover:bg-blue-600 transition duration-200">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function sortTable(columnIndex) {
            const table = document.getElementById("reservationsTable");
            const rows = Array.from(table.rows).slice(1); // Get all rows except the header

            const isAscending = table.getAttribute("data-sort-order") === "asc";
            rows.sort((rowA, rowB) => {
                const cellA = rowA.cells[columnIndex].textContent.trim();
                const cellB = rowB.cells[columnIndex].textContent.trim();

                if (isAscending) {
                    return cellA > cellB ? 1 : -1;
                } else {
                    return cellA < cellB ? 1 : -1;
                }
            });

            rows.forEach(row => table.appendChild(row));
            table.setAttribute("data-sort-order", isAscending ? "desc" : "asc");
        }

        function filterTable() {
            const filterValue = document.getElementById("filter").value.toLowerCase();
            const rows = document.querySelectorAll("#reservationsTable tbody tr");

            rows.forEach(row => {
                const fullNameCell = row.cells[0].textContent.toLowerCase();
                if (fullNameCell.includes(filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
</x-app-layout>
