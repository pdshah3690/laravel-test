<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'experience', 'salary', 'location',
        'extra_info', 'company_name', 'logo', 'skills'
    ];

    protected $casts = [
        'skills' => 'array', // Cast skills to an array
    ];

    public function getSkillNamesAttribute()
    {
        // Ensure `skills` is an array and fetch skill names
        $skillIds = is_array($this->skills) ? $this->skills : json_decode($this->skills, true) ?? [];

        return Skill::whereIn('id', $skillIds)->pluck('name')->toArray();
    }
}
