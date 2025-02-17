<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{
    public $skills;
    public $name;
    public $editId = null;

    public function mount()
    {
        //$this->skills = Skill::all();
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = Skill::all();
    }

    public function addSkill()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Skill::create(['name' => $this->name]);

        // $this->name = '';
        // $this->skills = Skill::all(); // Refresh the list
        // session()->flash('success', 'Skill added successfully.');

        $this->resetForm();
        session()->flash('success', 'Skill added successfully.');
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->editId = $skill->id;
        $this->name = $skill->name;
    }

    public function updateSkill()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = Skill::findOrFail($this->editId);
        $skill->update(['name' => $this->name]);

        $this->resetForm();
        session()->flash('success', 'Skill updated successfully.');
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        $this->skills = Skill::all(); // Refresh the list
        session()->flash('success', 'Skill deleted successfully.');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->editId = null;
        $this->loadSkills();
    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
