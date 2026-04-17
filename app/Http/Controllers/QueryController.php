<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    // Câu 1: Lấy danh sách sinh viên thuộc lớp "CNTT1"
    public function cau1()
    {
        $students = Student::whereHas('classroom', function($query) {
            $query->where('class_name', 'CNTT1');
        })->get();
        
        return response()->json([
            'cau' => 1,
            'title' => 'Sinh viên lớp CNTT1',
            'data' => $students
        ]);
    }
    
    // Câu 2: Lấy tất cả môn học mà sinh viên có id = 1 đã đăng ký
    public function cau2()
    {
        $student = Student::find(1);
        
        $subjects = $student->subjects;
        
        return response()->json([
            'cau' => 2,
            'title' => 'Môn học của sinh viên ID = 1',
            'student' => $student->student_name,
            'data' => $subjects
        ]);
    }
    
    // Câu 3: Đếm số sinh viên theo từng lớp
    public function cau3()
    {
        $classrooms = Classroom::withCount('students')->get();
        
        return response()->json([
            'cau' => 3,
            'title' => 'Số sinh viên theo từng lớp',
            'data' => $classrooms
        ]);
    }
    
    // Câu 4: Lấy danh sách sinh viên kèm số lượng môn đăng ký
    public function cau4()
    {
        $students = Student::withCount('subjects')->get();
        
        return response()->json([
            'cau' => 4,
            'title' => 'Sinh viên và số môn đã đăng ký',
            'data' => $students
        ]);
    }
}