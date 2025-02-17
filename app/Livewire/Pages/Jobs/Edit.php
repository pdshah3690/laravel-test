<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobManager;
use App\Models\Skill;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    use WithFileUploads;

    public $jobId, $title, $description, $experience, $salary, $location, $extra_info;
    public $company_name, $company_logo, $new_logo;
    public $selectedSkills = [];
    public $skills;

    public function mount($id)
    {
        $job = JobManager::findOrFail($id);
        $this->jobId = $job->id;
        $this->title = $job->title;
        $this->description = $job->description;
        $this->experience = $job->experience;
        $this->salary = $job->salary;
        $this->location = $job->location;
        $this->extra_info = $job->extra_info;
        $this->company_name = $job->company_name;
        $this->company_logo = $job->logo;
        $this->selectedSkills = json_decode($job->skills, true) ?? [];
        $this->skills = Skill::all();
    }

    public function update()
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

        $job         = JobManager::findOrFail($this->jobId);
        $logoPath    = "";
        $destination = public_path('storage\\'.$job->logo);

        if ($this->new_logo != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $logoPath = $this->new_logo->store('posts', 'public');
        } else {
            $logoPath = $job->logo;
        }

        $job->update([
            'title'  => $this->title,
            'description' => $this->description,
            'experience'  => $this->experience,
            'salary'   => $this->salary,
            'location' => $this->location,
            'extra_info'   => $this->extra_info,
            'company_name' => $this->company_name,
            'logo'   => $logoPath,
            'skills' => json_encode($this->selectedSkills),
        ]);

        session()->flash('message', 'Job Updated Successfully!');
        return redirect()->route('admin.jobs.index');
    }

    public function render()
    {
        return view('livewire.pages.jobs.edit');
    }

    public function resetField()
    {
        $this->title = "";
        $this->description = "";
        $this->experience = "";
        $this->salary = "";
        $this->location = "";
        $this->extra_info = "";
        $this->company_name = "";
        $this->company_logo = "";
        $this->new_logo = "";
        $this->selectedSkills = [];
    }
}
