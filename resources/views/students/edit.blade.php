<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Student</h2>
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="student_number" value="{{ $student->student_number }}" placeholder="Student Number" class="w-full border rounded p-2 mb-3">
                <input type="text" name="first_name" value="{{ $student->first_name }}" placeholder="First Name" class="w-full border rounded p-2 mb-3">
                <input type="text" name="last_name" value="{{ $student->last_name }}" placeholder="Last Name" class="w-full border rounded p-2 mb-3">
                <input type="text" name="course" value="{{ $student->course }}" placeholder="Course" class="w-full border rounded p-2 mb-3">
                <input type="number" name="year_level" value="{{ $student->year_level }}" placeholder="Year Level" class="w-full border rounded p-2 mb-3">
                <input type="email" name="email" value="{{ $student->email }}" placeholder="Email" class="w-full border rounded p-2 mb-3">
                <input type="file" name="profile_photo" class="w-full border rounded p-2 mb-3">
                @if($student->profile_photo)
                    <img src="{{ asset('storage/' . $student->profile_photo) }}" alt="Current photo" class="w-20 h-20 rounded-full object-cover mb-3">
                @endif
                <button class="bg-blue-600 text-white px-5 py-2 rounded">Update Student</button>
            </form>
        </div>
    </div>
</x-app-layout>
