<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Edit Job Posting</h1>
        </div>

        @if(session()->has('message'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-2 gap-6 bg-white p-6 shadow rounded">
            <!-- Left Side: Job Details -->
            <div>
                <h3 class="text-xl font-bold mb-2">Job Details</h3>

                <label class="block font-semibold">Title</label>
                <input type="text" wire:model="title" class="border p-2 w-full mb-2">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Description</label>
                <textarea wire:model="description" class="border p-2 w-full mb-2"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Experience</label>
                <input type="text" wire:model="experience" class="border p-2 w-full mb-2">
                @error('experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Salary</label>
                <input type="text" wire:model="salary" class="border p-2 w-full mb-2">
                @error('salary') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Location</label>
                <input type="text" wire:model="location" class="border p-2 w-full mb-2">
                @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Right Side: Company Details -->
            <div>
                <h3 class="text-xl font-bold mb-2">Company Details</h3>

                <label class="block font-semibold">Company Name</label>
                <input type="text" wire:model="company_name" class="border p-2 w-full mb-2">
                @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label class="block font-semibold">Company Logo</label>
                @if ($new_logo)
                    <img src="{{$new_logo->temporaryUrl()}}" class="h-16 w-auto mb-2" alt="" style="width: 100px;height:100px;">
                @elseif($company_logo != '')
                    <img src="{{ asset('storage') }}/{{$company_logo}}" class="h-16 w-auto mb-2" alt="" style="width: 100px;height:100px;">
                @endif
                <input type="file" wire:model='new_logo' class="custom-file-input" id="customFile">

                <h3 class="text-xl font-bold mb-2">Skills</h3>
                <label class="block font-semibold">Select Skills</label>
                <select multiple wire:model="selectedSkills" class="border p-2 w-full mb-2">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('selectedSkills') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button wire:click="update" class="bg-blue-500 text-white p-2 w-full rounded">Update</button>
            </div>
        </div>
    </div>
</div>
