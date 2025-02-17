<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        {{-- TODO: Add form here --}}
        <div class="grid grid-cols-2 gap-6 bg-white p-6 shadow rounded">
            <!-- Left Side: Job Details -->
            <div>
                <h3 class="text-xl font-bold mb-2">Job Details</h3>
                <label class="block font-semibold">Title</label>
                <input type="text" wire:model="title" placeholder="Job Title" class="border p-2 w-full mb-2">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Description</label>
                <textarea wire:model="description" placeholder="Job Description" class="border p-2 w-full mb-2"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Experience</label>
                <input type="text" wire:model="experience" placeholder="Experience (e.g. 1-3 Years)" class="border p-2 w-full mb-2">
                @error('experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Salary</label>
                <input type="text" wire:model="salary" placeholder="Salary (e.g. 2.75-5 Lacs PA)" class="border p-2 w-full mb-2">
                @error('salary') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Location</label>
                <input type="text" wire:model="location" placeholder="Location (e.g. Remote / Pune)" class="border p-2 w-full mb-2">
                @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Extra Info</label>
                <input type="text" wire:model="extra_info" placeholder="Extra Info (e.g. Full Time, Part Time)" class="border p-2 w-full mb-2">
            </div>

            <!-- Right Side: Company Details -->
            <div>
                <h3 class="text-xl font-bold mb-2">Company Details</h3>
                <label class="block font-semibold">Name</label>
                <input type="text" wire:model="company_name" placeholder="Company Name" class="border p-2 w-full mb-2">
                @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Logo</label>
                <input type="file" wire:model="company_logo" class="border p-2 w-full mb-2">
                <h3 class="text-xl font-bold mb-2">Skills</h3>
                <label class="block font-semibold">Name</label>
                <select multiple wire:model="selectedSkills" class="border p-2 w-full mb-2">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('selectedSkills') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button wire:click="store" class="bg-blue-500 text-white p-2 w-full rounded">Save</button>
            </div>
        </div>
    </div>
</div>
