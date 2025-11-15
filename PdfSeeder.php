<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\PdfFile;
use Illuminate\Database\Seeder;

class PdfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SE101 - Programming Algorithms
        $se101 = Subject::where('code', 'SE101')->first();
        if ($se101) {
            $pdfs = [
                ['title' => 'lecture 1', 'url' => 'https://drive.google.com/file/d/1GaKlsN_MyG965GnsOzTawjQZMr_tcLrH/preview', 'date' => '2025-03-01', 'size' => '6.5 MB', 'type' => 'Lecture'],
                ['title' => 'lecture 2', 'url' => 'https://drive.google.com/file/d/1MH6nhTgibaQNYX8DY0iNReTkEvj_yqQV/preview', 'date' => '2025-03-08', 'size' => '468 KB', 'type' => 'Lecture'],
                ['title' => 'lecture 3', 'url' => 'https://drive.google.com/file/d/16o3Ns0BgVUbazwEcUoxlllArTeBftPhS/preview', 'date' => '2025-03-08', 'size' => '1.6 MB', 'type' => 'Lecture'],
                ['title' => 'lecture 4-5', 'url' => 'https://drive.google.com/file/d/1hfSLpxgQIwubC68XSDrB_K8_muZ_QU01/preview', 'date' => '2025-03-08', 'size' => '1.1 MB', 'type' => 'Lecture'],
                ['title' => 'lecture 6', 'url' => 'https://drive.google.com/file/d/1_oc0PGhpqMcYA_SJzWp2PDuSXc4vZaB9/preview', 'date' => '2025-03-08', 'size' => '999 KB', 'type' => 'Lecture'],
                ['title' => 'lecture 7', 'url' => 'https://drive.google.com/file/d/1iOjhfi8uzxhiUO_JrdGiRWN-dBa-X5-K/preview', 'date' => '2025-03-15', 'size' => '624 KB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se101->id], $pdf));
            }
        }

        // SE102 - Math I
        $se102 = Subject::where('code', 'SE102')->first();
        if ($se102) {
            $pdfs = [
                ['title' => 'L1 Preliminaries', 'url' => 'https://docs.google.com/presentation/d/1393lUu1ZZSiMa9wt_oDc_ATMPvnuAVAr/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-02', 'size' => '114 KB', 'type' => 'Lecture'],
                ['title' => 'L2 Strait lines', 'url' => 'https://docs.google.com/presentation/d/1ZXXP7zQ2fgob4bmGJEftdq4ktUw8tV--/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '628 KB', 'type' => 'Lecture'],
                ['title' => 'L3 Graph of a function', 'url' => 'https://docs.google.com/presentation/d/1oC2UhnPOcVCsF-xW5XwzBWakbIeetIub/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '1.1 MB', 'type' => 'Lecture'],
                ['title' => 'L4 Limit', 'url' => 'https://docs.google.com/presentation/d/15PYZIbZ0tonqDzq-GqhZwBaAi0fLq2Mi/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '2.2 MB', 'type' => 'Lecture'],
                ['title' => 'L5 Inverse Functions', 'url' => 'https://docs.google.com/presentation/d/1RrlNoSXscS-yCqBl3nMm3Zllx71EONU4/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '221 KB', 'type' => 'Lecture'],
                ['title' => 'L6-Derivative-1', 'url' => 'https://docs.google.com/presentation/d/1TSNoBJBtlxl5dS0DUAVf9CF9_2RykOrv/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '1.4 MB', 'type' => 'Lecture'],
                ['title' => 'L7-Derivative-2', 'url' => 'https://docs.google.com/presentation/d/1hmFeublJqv1CgmUZv5ZptD8YBQD9flAC/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '1 MB', 'type' => 'Lecture'],
                ['title' => 'L8- Derivative of Exponential functions-4', 'url' => 'https://docs.google.com/presentation/d/1UHCHabQffVE8aZwfJoYvl7U0vBLl4dhs/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '1 MB', 'type' => 'Lecture'],
                ['title' => 'L9-Derivative-3', 'url' => 'https://docs.google.com/presentation/d/1i5tZX3Qfk-5gB3SNv1nX9u0tE_0PNgz1/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '414 KB', 'type' => 'Lecture'],
                ['title' => 'L10-Derivative Applications', 'url' => 'https://docs.google.com/presentation/d/1QTBxEKwy0QTqgGdFGea2JEslcPXp9_u1/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-09', 'size' => '984 KB', 'type' => 'Lecture'],
                ['title' => 'L11-Curve Sketching', 'url' => 'https://docs.google.com/presentation/d/1QHcsnk25Aw9GUqLeU0uolYsjTM5S6q7R/edit?usp=drive_link&ouid=112127806128099397836&rtpof=true&sd=true', 'date' => '2025-03-16', 'size' => '696 KB', 'type' => 'Lecture'],
                ['title' => 'Mathematics I', 'url' => 'https://drive.google.com/file/d/1ANtolSuLEnprKAvJIaac_g6d1u2_KtTY/preview', 'date' => '2025-03-09', 'size' => '268 KB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se102->id], $pdf));
            }
        }

        // SE103 - Logic Design
        $se103 = Subject::where('code', 'SE103')->first();
        if ($se103) {
            $pdfs = [
                ['title' => '1_Logic Fundamental', 'url' => 'https://drive.google.com/file/d/1LUqCEWp9W0j54GVUlTcpoqA1daaesmEl/preview', 'date' => '2025-03-03', 'size' => '2.3 MB', 'type' => 'Lecture'],
                ['title' => '2_LogicGates', 'url' => 'https://drive.google.com/file/d/1UE1vyjnIfJK7xw_KaOC2UWcKHwxr-kzp/preview', 'date' => '2025-03-10', 'size' => '555 KB', 'type' => 'Lecture'],
                ['title' => '3_Boolean Algebra', 'url' => 'https://drive.google.com/file/d/1R_hF7P_FUx6ASiPnzV3YmheP4aSvsXiO/preview', 'date' => '2025-03-17', 'size' => '3.5 MB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se103->id], $pdf));
            }
        }

        // SE104 - Kurdology
        $se104 = Subject::where('code', 'SE104')->first();
        if ($se104) {
            PdfFile::create([
                'subject_id' => $se104->id,
                'title' => 'کوردناسی ٢٠٢٤_٢٠٢٥',
                'url' => 'https://drive.google.com/file/d/13-Jy8cPNS7jcxxJJKObVnrylE1JNPost/preview',
                'date' => '2025-03-04',
                'size' => '2 MB',
                'type' => 'Lecture',
            ]);
        }

        // SE105 - IT Skills
        $se105 = Subject::where('code', 'SE105')->first();
        if ($se105) {
            $pdfs = [
                ['title' => 'Computer Basics', 'url' => '#', 'date' => '2025-03-05', 'size' => '1.9MB', 'type' => 'Lecture'],
                ['title' => 'Office Tools', 'url' => '#', 'date' => '2025-03-12', 'size' => '2.0MB', 'type' => 'Lecture'],
                ['title' => 'Practical Exercise', 'url' => '#', 'date' => '2025-03-19', 'size' => '1.7MB', 'type' => 'Lab'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se105->id], $pdf));
            }
        }

        // SE106 - English
        $se106 = Subject::where('code', 'SE106')->first();
        if ($se106) {
            PdfFile::create([
                'subject_id' => $se106->id,
                'title' => 'General English (camera scanned)',
                'url' => 'https://drive.google.com/file/d/14E7l_UzbFMx5TurQqLgaWiAjW4u8u-oU/preview',
                'date' => '2025-03-06',
                'size' => '60.9 MB',
                'type' => 'Lecture',
            ]);
        }

        // SE301 - OOP
        $se301 = Subject::where('code', 'SE301')->first();
        if ($se301) {
            $pdfs = [
                ['title' => 'Lec 1', 'url' => 'https://drive.google.com/file/d/1ldXthcbd2ZoeGzQfKcyZbHoKVs_ulwry/preview', 'date' => '2025-03-01', 'size' => '596 KB', 'type' => 'Lecture'],
                ['title' => 'Lec 2', 'url' => 'https://drive.google.com/file/d/17O_JeIOG73WjfYf1I5UH9_oISOerzJ68/preview', 'date' => '2025-03-08', 'size' => '752 KB', 'type' => 'Lecture'],
                ['title' => 'Lec 3', 'url' => 'https://drive.google.com/file/d/1oHy03nEseZUTk-wIYJUj56HnrBpp-Uga/preview', 'date' => '2025-03-08', 'size' => '1.1 MB', 'type' => 'Lecture'],
                ['title' => 'Lec 4', 'url' => 'https://drive.google.com/file/d/1dfIfWxHQWfODnFwoNhAIR1AEs8V4s6Vo/preview', 'date' => '2025-03-15', 'size' => '1.7 MB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se301->id], $pdf));
            }
        }

        // SE302 - Math III
        $se302 = Subject::where('code', 'SE302')->first();
        if ($se302) {
            $pdfs = [
                ['title' => 'Week 1', 'url' => 'https://drive.google.com/file/d/17rSQlMmg8_AK4viRgzM_XeM2bjqDEDYg/preview', 'date' => '2025-03-02', 'size' => '205 KB', 'type' => 'Lecture'],
                ['title' => 'Week 2', 'url' => 'https://drive.google.com/file/d/1gRgaWNAlwe8C9eG-_bcVAzfDJMa9pd8E/preview', 'date' => '2025-03-09', 'size' => '1.1 MB', 'type' => 'Lecture'],
                ['title' => 'Week 3', 'url' => 'https://drive.google.com/file/d/1Qy-Bm-77NzHPquqqTXA_ldxr41X4aixO/preview', 'date' => '2025-03-16', 'size' => '2.4 MB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se302->id], $pdf));
            }
        }

        // SE303 - Software Engineering Principle
        $se303 = Subject::where('code', 'SE303')->first();
        if ($se303) {
            $pdfs = [
                ['title' => 'Introduction', 'url' => 'https://drive.google.com/file/d/1ied8hr4XLiHyeDcyWIadHOtE46pefr8F/preview', 'date' => '2025-03-03', 'size' => '237 KB', 'type' => 'Lecture'],
                ['title' => 'Lecture 1', 'url' => 'https://drive.google.com/file/d/1W5MxPMhtw6C_hyVDDPPZV4A3vK2kf3ng/preview', 'date' => '2025-03-10', 'size' => '601 KB', 'type' => 'Lecture'],
                ['title' => 'Lecture 2', 'url' => 'https://drive.google.com/file/d/1WSSxQHUbR2X582TvuKdSvBsLl04E_98z/preview', 'date' => '2025-03-10', 'size' => '863 KB', 'type' => 'Lecture'],
                ['title' => 'Lecture 3', 'url' => 'https://drive.google.com/file/d/1DUfgl3kBZsv9gFJR7xzDcqs98AAnndGq/preview', 'date' => '2025-03-10', 'size' => '536 KB', 'type' => 'Lecture'],
                ['title' => 'Story Examples', 'url' => 'https://drive.google.com/file/d/1ccCnsBAzdOazR6fOa-gJI8Q1aIZ8_RYy/preview', 'date' => '2025-03-17', 'size' => '45 KB', 'type' => 'Examples'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se303->id], $pdf));
            }
        }

        // SE305 - Combinatorics and Graph Theory
        $se305 = Subject::where('code', 'SE305')->first();
        if ($se305) {
            $pdfs = [
                ['title' => 'Concept of graph theory', 'url' => 'https://drive.google.com/file/d/1Auu6yRO-WnuxDa_3Ar_dvXhbTmF8fM3o/preview', 'date' => '2025-03-05', 'size' => '895 KB', 'type' => 'Lecture'],
                ['title' => 'Graph Representation', 'url' => 'https://drive.google.com/file/d/1UY1gEv6-5pKZ9oRoBT0JD8VrcaUPHi3R/preview', 'date' => '2025-03-12', 'size' => '309 KB', 'type' => 'Lecture'],
                ['title' => 'Plannar Graph', 'url' => 'https://drive.google.com/file/d/13121O6OTFudOTlmUYeNCrdbiltWPuk0Y/preview', 'date' => '2025-03-19', 'size' => '886 KB', 'type' => 'Assignment'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se305->id], $pdf));
            }
        }

        // SE306 - Data Structure
        $se306 = Subject::where('code', 'SE306')->first();
        if ($se306) {
            $pdfs = [
                ['title' => 'L1', 'url' => 'https://drive.google.com/file/d/1fTAf5Hp6x_mwHqXgsDblb0VTrOrDhQ30/preview', 'date' => '2025-03-06', 'size' => '640 KB', 'type' => 'Lecture'],
                ['title' => 'L2', 'url' => 'https://drive.google.com/file/d/1QPu2sRZwZbJHHd1rQgre--6aeCZzcPEs/preview', 'date' => '2025-03-13', 'size' => '556 KB', 'type' => 'Lecture'],
                ['title' => 'L3', 'url' => 'https://drive.google.com/file/d/1ADl7Kt92MRrg1-L6jbOtZExajZVUdkYQ/preview', 'date' => '2025-03-13', 'size' => '519 KB', 'type' => 'Lecture'],
                ['title' => 'L4', 'url' => 'https://drive.google.com/file/d/1uw64-K98692wjI91bSoT2HjNq0IjQPJt/preview', 'date' => '2025-03-13', 'size' => '574 KB', 'type' => 'Lecture'],
                ['title' => 'L5', 'url' => 'https://drive.google.com/file/d/13_UtCQO40-b-07JPVyJEuqjP2Hr-s1Ml/preview', 'date' => '2025-03-20', 'size' => '548 KB', 'type' => 'Lecture'],
                ['title' => 'Data_Structures_and_Algorithm_M_Kanar_2025_2026', 'url' => 'https://drive.google.com/file/d/1XXRidDBX6QXcaj-VKc8E-AchF2df8-Xz/preview', 'date' => '2025-03-13', 'size' => '388 KB', 'type' => 'Course_Book'],
                ['title' => 'Data_Structures_and_Algorithm_M_Kanar_Course_2025_2026', 'url' => 'https://drive.google.com/file/d/1kiWFztbwn-hRCyGWe3feNxyggivJEE5O/preview', 'date' => '2025-03-13', 'size' => '336 KB', 'type' => 'Course_Description'],
                ['title' => '2025 Data Structures and Algorithms (2nd Stage Fall Course)', 'url' => 'https://drive.google.com/file/d/1-Qf2YR2mNrpEPxP1BuC6uCJQLIJDMQ6R/preview', 'date' => '2025-03-13', 'size' => '244 KB', 'type' => 'Question Bank'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se306->id], $pdf));
            }
        }

        // SE307 - Database
        $se307 = Subject::where('code', 'SE307')->first();
        if ($se307) {
            $pdfs = [
                ['title' => 'Course requirement', 'url' => 'https://drive.google.com/file/d/1JtpSpmODa7NaDTI0ZyL0twrlm_mmoC3T/preview', 'date' => '2025-03-07', 'size' => '98 KB', 'type' => 'Lecture'],
                ['title' => 'Introdution', 'url' => 'https://drive.google.com/file/d/1MBAvceiE7O3i0EHc2XHP1aEGCfX3pn18/preview', 'date' => '2025-03-14', 'size' => '107 KB', 'type' => 'Lecture'],
                ['title' => 'DB System concepts and Architecture', 'url' => 'https://drive.google.com/file/d/1ivQBjdKacvPXqt16jiPDdsKRP3j2iVtL/preview', 'date' => '2025-03-14', 'size' => '947 KB', 'type' => 'Lecture'],
                ['title' => 'L3', 'url' => 'https://drive.google.com/file/d/1yvYl43VgSb5zh4NrEL44wJqy-xYxi8AI/preview', 'date' => '2025-03-14', 'size' => '635 KB', 'type' => 'Lecture'],
                ['title' => 'L4', 'url' => 'https://drive.google.com/file/d/1n5EgAEhGPF-8X5oqhP4F9CqUxDitEFQc/preview', 'date' => '2025-03-14', 'size' => '1.3 MB', 'type' => 'Lecture'],
                ['title' => 'Xamp', 'url' => 'https://drive.google.com/file/d/15FCT6IeynCjJgLEqsHo21GxzltqkJkN5/preview', 'date' => '2025-03-21', 'size' => '1.3 MB', 'type' => 'Lecture'],
            ];
            foreach ($pdfs as $pdf) {
                PdfFile::create(array_merge(['subject_id' => $se307->id], $pdf));
            }
        }
    }
}
