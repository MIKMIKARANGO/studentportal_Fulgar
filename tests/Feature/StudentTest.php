<?php

use App\Models\Student;
use App\Models\User;

it('allows an authenticated user to create a student', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/students', [
            'student_number' => '2024001',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'course' => 'Computer Science',
            'year_level' => 2,
            'email' => 'jane@example.com',
        ])
        ->assertRedirect('/students');

    $this->assertDatabaseHas('students', [
        'student_number' => '2024001',
        'email' => 'jane@example.com',
    ]);
});

it('filters students by a search term', function () {
    $user = User::factory()->create();

    Student::create([
        'student_number' => '2024001',
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'course' => 'Computer Science',
        'year_level' => 2,
        'email' => 'jane@example.com',
    ]);

    Student::create([
        'student_number' => '2024002',
        'first_name' => 'John',
        'last_name' => 'Smith',
        'course' => 'Business Administration',
        'year_level' => 3,
        'email' => 'john@example.com',
    ]);

    $this->actingAs($user)
        ->get('/students?search=computer')
        ->assertOk()
        ->assertSee('Jane Doe')
        ->assertDontSee('John Smith');
});
