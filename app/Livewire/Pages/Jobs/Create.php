<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobManager;
use App\Models\Skill;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $experience, $salary, $location, $extra_info;
    public $company_name, $company_logo;
    public $selectedSkills = [];
    public $skills;

    public function mount()
    {
        $this->skills = Skill::all();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'company_name' => 'required|string',
            'selectedSkills' => 'required|array',
        ], [
            'selectedSkills.required' => 'The skills field is required.',
        ]);

        $logoPath = $this->company_logo ? $this->company_logo->store('logos', 'public') : null;

        JobManager::create([
            'title' => $this->title,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'extra_info' => $this->extra_info,
            'company_name' => $this->company_name,
            'logo' => $logoPath,
            'skills' => json_encode($this->selectedSkills),
        ]);

        session()->flash('message', 'Job Created Successfully!');
        $this->resetFields();
        return redirect()->route('admin.jobs.index');
    }

    public function resetFields()
    {
        $this->title = $this->description = $this->experience = $this->salary = '';
        $this->location = $this->extra_info = $this->company_name = $this->company_logo = '';
        $this->selectedSkills = [];
    }

    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}
