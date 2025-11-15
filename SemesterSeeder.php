<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Software Engineering - 7 semesters
        $seDept = Department::where('code', 'se')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $seDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Civil Engineering - 7 semesters
        $ceDept = Department::where('code', 'ce')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $ceDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Architecture - 10 semesters
        $archDept = Department::where('code', 'arch')->first();
        for ($i = 1; $i <= 10; $i++) {
            Semester::create([
                'department_id' => $archDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Electrical Engineering - 7 semesters
        $eeDept = Department::where('code', 'ee')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $eeDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Mechanical Engineering - 7 semesters
        $meDept = Department::where('code', 'me')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $meDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Dam & Water Resources Engineering - 7 semesters
        $dwreDept = Department::where('code', 'dwre')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $dwreDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Mechanic and Mechatronics Engineering - 8 semesters
        $mmeDept = Department::where('code', 'mme')->first();
        for ($i = 1; $i <= 8; $i++) {
            Semester::create([
                'department_id' => $mmeDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Aviation Engineering - 8 semesters
        $aeDept = Department::where('code', 'ae')->first();
        for ($i = 1; $i <= 8; $i++) {
            Semester::create([
                'department_id' => $aeDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }

        // Surveying Engineering - 7 semesters
        $sreDept = Department::where('code', 'sre')->first();
        for ($i = 1; $i <= 7; $i++) {
            Semester::create([
                'department_id' => $sreDept->id,
                'number' => $i,
                'description' => "Semester $i"
            ]);
        }
    }
}
