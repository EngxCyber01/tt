<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'code' => 'se',
                'name' => 'Software Engineering',
                'description' => 'Study of software design, development, and engineering principles'
            ],
            [
                'code' => 'ce',
                'name' => 'Civil Engineering',
                'description' => 'Infrastructure, structural analysis, and construction engineering'
            ],
            [
                'code' => 'arch',
                'name' => 'Architecture',
                'description' => 'Architectural design, planning, and sustainable building'
            ],
            [
                'code' => 'ee',
                'name' => 'Electrical Engineering',
                'description' => 'Electrical systems, circuits, and power engineering'
            ],
            [
                'code' => 'me',
                'name' => 'Mechanical Engineering',
                'description' => 'Mechanical systems, thermodynamics, and design'
            ],
            [
                'code' => 'dwre',
                'name' => 'Dam & Water Resources Engineering',
                'description' => 'Hydraulic engineering and water management'
            ],
            [
                'code' => 'mme',
                'name' => 'Mechanic and Mechatronics Engineering',
                'description' => 'Mechanical and electronic systems integration'
            ],
            [
                'code' => 'ae',
                'name' => 'Aviation Engineering',
                'description' => 'Aircraft design, aerodynamics, and aerospace engineering'
            ],
            [
                'code' => 'sre',
                'name' => 'Surveying Engineering',
                'description' => 'Geodetic surveying, mapping, and geospatial technology'
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
