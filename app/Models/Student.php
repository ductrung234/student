<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Student extends Model
{
    protected $fillable = ['student_name', 'class_id', 'status'];
    
    // Local Scope: lấy sinh viên active
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    // Global Scope: tự động sắp xếp theo tên
    protected static function booted()
    {
        static::addGlobalScope('orderByName', function (Builder $builder) {
            $builder->orderBy('student_name', 'asc');
        });
    }
    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id', 'id');
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject', 'student_id', 'subject_id')
                    ->withPivot(['score', 'registered_at'])
                    ->withTimestamps();
    }
}