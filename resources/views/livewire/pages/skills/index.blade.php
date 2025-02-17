<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        {{-- TODO: Add table here and a form to create a new skill --}}
        @if(session()->has('success'))
            <div class="bg-green-500 text-white p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-3 gap-8">
            {{-- Left Side: Skills Table (2/3 Width) --}}
            <div class="col-span-2">
                <table class="w-full border-collapse border border-gray-200 mb-6">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2 text-left">Name</th>
                            <th class="border p-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                            <tr class="border">
                                <td class="border p-2">{{ $skill->name }}</td>
                                <td class="border p-2">
                                    <button wire:click="editSkill({{ $skill->id }})"
                                        class="text-blue-500 hover:underline">
                                        Edit
                                    </button>
                                    |
                                    <button wire:click="deleteSkill({{ $skill->id }})" class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Right Side: Add Skill Form (1/3 Width) --}}
            <div class="bg-white shadow-lg p-6 rounded-lg border border-gray-200">
                <h2 class="text-xl font-bold mb-4">{{ $editId ? 'Edit Skill' : 'Add New skill' }}</h2>

                <input type="text" wire:model="name" placeholder="Skill name"
                    class="border p-2 w-full rounded mb-2">

                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                @if($editId)
                    <button wire:click="updateSkill"
                        class="bg-green-500 text-white p-2 w-full rounded hover:bg-green-600 transition">
                        Update
                    </button>
                    <button wire:click="resetForm"
                        class="bg-gray-400 text-white p-2 w-full rounded mt-2 hover:bg-gray-500 transition">
                        Cancel
                    </button>
                @else
                    <button wire:click="addSkill"
                        class="bg-blue-500 text-white p-2 w-full rounded hover:bg-blue-600 transition">
                        Save
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
