<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\JobManager;

class Index extends Component
{
    public $jobs;

    public function mount()
    {
        $this->jobs = JobManager::all();
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }

    public function delete($id)
    {
        JobManager::find($id)->delete();
        $this->jobs = JobManager::all();
        session()->flash('message', 'Job Deleted Successfully!');
    }
}
