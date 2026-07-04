<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-2xl font-bold mb-4">Add Student</h2>
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="student_number" placeholder="Student Number" class="w-full border rounded p-2 mb-3">
                <input type="text" name="first_name" placeholder="First Name" class="w-full border rounded p-2 mb-3">
                <input type="text" name="last_name" placeholder="Last Name" class="w-full border rounded p-2 mb-3">
                <input type="text" name="course" placeholder="Course" class="w-full border rounded p-2 mb-3">
                <input type="number" name="year_level" placeholder="Year Level" class="w-full border rounded p-2 mb-3">
                <input type="email" name="email" placeholder="Email" class="w-full border rounded p-2 mb-3">
                <input type="file" name="profile_photo" class="w-full border rounded p-2 mb-3">
                <button class="bg-blue-600 text-white px-5 py-2 rounded">Save Student</button>
            </form>
        </div>
    </div>
</x-app-layout>
