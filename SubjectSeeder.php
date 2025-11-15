<?php

namespace Database\Seeders;

use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SOFTWARE ENGINEERING - SEMESTER 1
        $seSem1 = Semester::whereHas('department', function ($q) {
            $q->where('code', 'se');
        })->where('number', 1)->first();

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE101',
            'name' => 'Programming Algorithms',
            'instructor' => 'Dr. Hawraz',
            'schedule' => 'Mon 09:00-11:00',
        ]);

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE102',
            'name' => 'Math I',
            'instructor' => 'M. Nawroz',
            'schedule' => 'Tue 10:00-12:00',
        ]);

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE103',
            'name' => 'Logic Design',
            'instructor' => 'M. Muhammed',
            'schedule' => 'Wed 13:00-15:00',
        ]);

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE104',
            'name' => 'Kurdology',
            'instructor' => 'Dr. Nechirwan',
            'schedule' => 'Thu 09:00-11:00',
        ]);

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE105',
            'name' => 'IT Skills',
            'instructor' => 'Mrs. Sanar',
            'schedule' => 'Mon 13:00-15:00',
        ]);

        Subject::create([
            'semester_id' => $seSem1->id,
            'code' => 'SE106',
            'name' => 'English',
            'instructor' => 'M. Hawnaz',
            'schedule' => 'Tue 14:00-16:00',
        ]);

        // SOFTWARE ENGINEERING - SEMESTER 3
        $seSem3 = Semester::whereHas('department', function ($q) {
            $q->where('code', 'se');
        })->where('number', 3)->first();

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE301',
            'name' => 'Introduction to Object-Oriented Programming',
            'instructor' => 'Dr. Bnar',
            'schedule' => "Group A: Sun 09:00-10:00, Thu 01:00-02:00\nGroup B: Sun 10:00-11:00, Thu 12:00-01:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE302',
            'name' => 'Math III',
            'instructor' => 'Dr. Mahdi',
            'schedule' => "Group A: Sun 10:00-12:00, Mon 10:00-12:00\nGroup B: Sun 09:00-10:00, Mon 09:00-10:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE303',
            'name' => 'Software Engineering Principle',
            'instructor' => 'Mrs. Sanar',
            'schedule' => "Group A: Mon 09:00-10:00, Wed 09:00-10:00\nGroup B: Mon 10:00-11:00, Mon 12:00-01:00, Wed 10:00-11:00, Wed 11:00-12:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE304',
            'name' => 'Operating System',
            'instructor' => 'M. Muhammed',
            'schedule' => "Group A: Mon 01:00-02:00, Tue 10:00-11:00, Wed 02:00-03:00\nGroup B: Tue 09:00-10:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE305',
            'name' => 'Combinatorics and Graph Theory',
            'instructor' => 'Dr. Salar',
            'schedule' => "Group A: Sun 12:00-01:00, Thu 12:00-01:00\nGroup B: Sun 11:00-12:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE306',
            'name' => 'Data Structure',
            'instructor' => 'Dr. Kanar',
            'schedule' => "Group A: Tue 11:00-12:00, Wed 10:00-11:00, Wed 12:00-01:00\nGroup B: Tue 10:00-11:00, Tue 12:00-01:00, Wed 09:00-10:00",
        ]);

        Subject::create([
            'semester_id' => $seSem3->id,
            'code' => 'SE307',
            'name' => 'Database',
            'instructor' => 'Dr. Hannan',
            'schedule' => "Group A: Tue 12:00-01:00\nGroup B: Tue 11:00-12:00, Thu 09:00-10:00",
        ]);

        // SOFTWARE ENGINEERING - SEMESTER 5
        $seSem5 = Semester::whereHas('department', function ($q) {
            $q->where('code', 'se');
        })->where('number', 5)->first();

        $sem5Subjects = [
            ['code' => 'SE501', 'name' => 'Software Verification & Validation', 'instructor' => 'M. Agrin', 'schedule' => 'Mon 09:00-11:00'],
            ['code' => 'SE502', 'name' => 'Engineering Analysis', 'instructor' => 'Dr.', 'schedule' => 'Tue 10:00-12:00'],
            ['code' => 'SE503', 'name' => 'Web Design', 'instructor' => 'Dr.', 'schedule' => 'Wed 13:00-15:00'],
            ['code' => 'SE504', 'name' => 'Mobile Application', 'instructor' => 'Dr.', 'schedule' => 'Thu 09:00-11:00'],
            ['code' => 'SE505', 'name' => 'Computer Graphics', 'instructor' => 'Dr.', 'schedule' => 'Mon 13:00-15:00'],
            ['code' => 'SE506', 'name' => 'Network Principles', 'instructor' => 'Dr.', 'schedule' => 'Tue 14:00-16:00'],
            ['code' => 'SE507', 'name' => 'Advanced Computer Programming', 'instructor' => 'Dr. Hawraz', 'schedule' => 'Wed 09:00-11:00'],
        ];

        foreach ($sem5Subjects as $subject) {
            Subject::create([
                'semester_id' => $seSem5->id,
                'code' => $subject['code'],
                'name' => $subject['name'],
                'instructor' => $subject['instructor'],
                'schedule' => $subject['schedule'],
            ]);
        }

        // SOFTWARE ENGINEERING - SEMESTER 7
        $seSem7 = Semester::whereHas('department', function ($q) {
            $q->where('code', 'se');
        })->where('number', 7)->first();

        $sem7Subjects = [
            ['code' => 'SE701', 'name' => 'Programming in Python', 'instructor' => 'Dr.', 'schedule' => 'Mon 09:00-11:00'],
            ['code' => 'SE702', 'name' => 'Network Switching & Routing II', 'instructor' => 'Dr.', 'schedule' => 'Tue 10:00-12:00'],
            ['code' => 'SE703', 'name' => 'Web Applications', 'instructor' => 'Dr.', 'schedule' => 'Wed 13:00-15:00'],
            ['code' => 'SE704', 'name' => 'Artificial Intelligence', 'instructor' => 'Dr.', 'schedule' => 'Thu 09:00-11:00'],
            ['code' => 'SE705', 'name' => 'Embedded Software Systems', 'instructor' => 'Dr.', 'schedule' => 'Mon 13:00-15:00'],
            ['code' => 'SE706', 'name' => 'Introduction to Machine Learning', 'instructor' => 'Dr.', 'schedule' => 'Tue 14:00-16:00'],
        ];

        foreach ($sem7Subjects as $subject) {
            Subject::create([
                'semester_id' => $seSem7->id,
                'code' => $subject['code'],
                'name' => $subject['name'],
                'instructor' => $subject['instructor'],
                'schedule' => $subject['schedule'],
            ]);
        }

        // OTHER DEPARTMENTS - Create basic subjects for all other departments
        $this->createOtherDepartmentSubjects();
    }

    private function createOtherDepartmentSubjects()
    {
        $departments = ['ce', 'arch', 'ee', 'me', 'dwre', 'mme', 'ae', 'sre'];
        $deptSubjects = [
            'ce' => ['Structural Analysis', 7],
            'arch' => ['Architectural Design', 10],
            'ee' => ['Circuit Analysis', 7],
            'me' => ['Thermodynamics', 7],
            'dwre' => ['Hydraulics', 7],
            'mme' => ['Mechatronic Systems', 8],
            'ae' => ['Aerodynamics', 8],
            'sre' => ['Geodetic Surveying', 7],
        ];

        foreach ($departments as $deptCode) {
            $info = $deptSubjects[$deptCode];
            $subjectName = $info[0];
            $semesterCount = $info[1];

            for ($i = 1; $i <= $semesterCount; $i++) {
                $semester = Semester::whereHas('department', function ($q) use ($deptCode) {
                    $q->where('code', $deptCode);
                })->where('number', $i)->first();

                if ($semester) {
                    Subject::create([
                        'semester_id' => $semester->id,
                        'code' => strtoupper($deptCode) . (100 + $i),
                        'name' => $subjectName,
                        'instructor' => 'Dr.',
                        'schedule' => 'Mon 10:00-12:00',
                    ]);
                }
            }
        }
    }
}
