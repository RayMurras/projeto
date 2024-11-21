<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Criando cursos padrão na DB
        foreach (Course::COURSES as $courseName => $qtPlaces) {
            Course::create([
                'name' => $courseName, // Nome do curso
                'quantity_places' => $qtPlaces, // Quantidade de lugares
            ]);
        }
    }
}
