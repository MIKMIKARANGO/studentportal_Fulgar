<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl">Students</h2>
                    <p class="text-4xl">{{ \App\Models\Student::count() }}</p>
                        <a href="{{ route('students.index') }}" class="inline-block mt-4 bg-white text-blue-600 px-4 py-2 rounded">
                            Manage Students
                        </a>
                </div>
                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl">Welcome</h2>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="bg-purple-500 text-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl">Portal Status</h2>
                    <p>Online</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
