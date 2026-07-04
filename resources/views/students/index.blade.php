<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-5 gap-4">
                    <div>
                        <h1 class="text-3xl font-bold">Student Portal</h1>
                        <p class="text-sm text-gray-600">Search, upload photos, and manage student records.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                        <form method="GET" action="{{ route('students.index') }}" class="flex w-full gap-2">
                            <input type="text"
                                   name="search"
                                   value="{{ $search ?? '' }}"
                                   placeholder="Search by name, course, email, or student number"
                                   class="w-full border rounded p-2">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Search</button>
                        </form>
                        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-center">Add Student</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 p-3 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="p-3 text-left">Student No.</th>
                                <th class="p-3 text-left">Name</th>
                                <th class="p-3 text-left">Course</th>
                                <th class="p-3 text-left">Year</th>
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">{{ $student->student_number }}</td>
                                    <td class="p-3 flex items-center gap-3">
                                        @if($student->profile_photo)
                                            <img src="{{ asset('storage/' . $student->profile_photo) }}" alt="{{ $student->first_name }}" class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-sm font-semibold">
                                                {{ strtoupper(substr($student->first_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <span>{{ $student->first_name }} {{ $student->last_name }}</span>
                                    </td>
                                    <td class="p-3">{{ $student->course }}</td>
                                    <td class="p-3">{{ $student->year_level }}</td>
                                    <td class="p-3">{{ $student->email }}</td>
                                    <td class="p-3 flex flex-wrap gap-2">
                                        <a href="{{ route('students.edit', $student) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-gray-500">
                                        No students found. Add a student to enable search and pagination.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
