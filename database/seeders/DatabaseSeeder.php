<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo lớp học
        $class1 = Classroom::create(['class_name' => 'CNTT1']);
        $class2 = Classroom::create(['class_name' => 'CNTT2']);
        $class3 = Classroom::create(['class_name' => 'KTPM1']);
        
        // Tạo sinh viên
        $student1 = Student::create(['student_name' => 'Nguyễn Văn A', 'class_id' => $class1->id]);
        $student2 = Student::create(['student_name' => 'Trần Thị B', 'class_id' => $class1->id]);
        $student3 = Student::create(['student_name' => 'Lê Văn C', 'class_id' => $class2->id]);
        $student4 = Student::create(['student_name' => 'Phạm Thị D', 'class_id' => $class2->id]);
        $student5 = Student::create(['student_name' => 'Hoàng Văn E', 'class_id' => $class3->id]);
        
        // Tạo môn học
        $subject1 = Subject::create(['subject_name' => 'Lập trình Web']);
        $subject2 = Subject::create(['subject_name' => 'Cơ sở dữ liệu']);
        $subject3 = Subject::create(['subject_name' => 'Lập trình Mobile']);
        
        // Đăng ký môn học
        $student1->subjects()->attach($subject1->id, ['registered_at' => now()]);
        $student1->subjects()->attach($subject2->id, ['registered_at' => now()]);
        $student2->subjects()->attach($subject1->id, ['registered_at' => now()]);
        $student3->subjects()->attach($subject2->id, ['registered_at' => now()]);
        $student3->subjects()->attach($subject3->id, ['registered_at' => now()]);
        $student4->subjects()->attach($subject1->id, ['registered_at' => now()]);
        $student5->subjects()->attach($subject3->id, ['registered_at' => now()]);
    }
}