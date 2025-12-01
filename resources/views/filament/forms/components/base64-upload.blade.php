<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{
        state: $wire.$entangle('{{ $getStatePath() }}'),
        isDragging: false,
        handleFile(event) {
            const file = event.target.files ? event.target.files[0] : null;
            if (!file) return;
            
            // Check file size (e.g., max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size too large. Max 2MB.');
                if(event.target.value) event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                this.state = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeFile() {
            this.state = null;
            if (this.$refs.fileInput) {
                this.$refs.fileInput.value = '';
            }
        }
    }">
        <!-- Preview State -->
        <template x-if="state">
            <div class="relative block w-full overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                <img :src="state" class="h-full w-full object-cover max-h-64" />
                
                <div class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 hover:opacity-100 transition-opacity">
                    <button 
                        type="button" 
                        @click="removeFile()" 
                        class="rounded-full bg-white/10 p-2 text-white hover:bg-white/20 focus:outline-none"
                        title="Remove image"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </template>

        <!-- Upload State (Dropzone) -->
        <template x-if="!state">
            <div 
                x-on:dragover.prevent="isDragging = true"
                x-on:dragleave.prevent="isDragging = false"
                x-on:drop.prevent="isDragging = false; handleFile({target: {files: $event.dataTransfer.files}})"
                :class="{ 'border-primary-500 ring-2 ring-primary-500 ring-opacity-50 bg-primary-50 dark:bg-primary-900/10': isDragging, 'border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800': !isDragging }"
                class="relative flex justify-center rounded-lg border border-dashed px-6 py-10 transition-all duration-300"
            >
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600 dark:text-gray-400 justify-center">
                        <label class="relative cursor-pointer rounded-md font-semibold text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500">
                            <span>Upload a file</span>
                            <input 
                                x-ref="fileInput" 
                                type="file" 
                                class="sr-only" 
                                accept="image/*" 
                                @change="handleFile"
                            >
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600 dark:text-gray-400">PNG, JPG up to 2MB</p>
                </div>
            </div>
        </template>
    </div>
</x-dynamic-component>