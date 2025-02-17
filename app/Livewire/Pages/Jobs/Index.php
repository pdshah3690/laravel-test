<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        $this->jobs = [
            [
                "id" => 1,
                "title" => "Sr. Full Stack Developer",
                "description" => "You will be responsible for designing, developing, and maintaining robust and scalable web applications from end to end. You must have a deep understanding of both frontend and backend development, thrives in a collaborative environment, and is passionate about delivering high-quality software solutions",
                "company_name" => "DWebPixel",
                "company_logo" => asset('logo-3.svg'),
                "experience" => "4-5 Yrs",
                "salary" => "$ 4.5-8 Lacs PA",
                "location" => "Remote",
                "skills" => [
                    "Laravel",
                    "React",
                    "Vue",
                    "MySQL",
                ],
                "extra" => [
                    "Remote",
                    "Full-Time",
                ]
            ],
            [
                "id" => 2,
                "title" => "Sr. Frontend Developer",
                "description" => "You will leverage your expertise in modern frontend technologies and best practices to create exceptional user experiences.",
                "company_name" => "DWebPixel",
                "company_logo" => asset('logo-2.svg'),
                "experience" => "3-4 Yrs",
                "salary" => "$ 2.5-4 Lacs PA",
                "location" => "Remote",
                "skills" => [
                    "React",
                    "Vue",
                ],
                "extra" => [
                    "Remote",
                    "Full-Time",
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
