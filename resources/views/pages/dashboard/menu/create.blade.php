<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Buat Menu Baru') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data"
                            class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="name" :value="__('Nama Menu')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="price" :value="__('Harga Satuan')" />
                                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full"
                                    required autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="stock" :value="__('Jumlah')" />
                                <x-text-input id="stock" name="stock" type="text" class="mt-1 block w-full"
                                    required autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full"
                                    required autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                            <div>
                                <select name="category_id" id="category"
                                    class="select select-bordered w-full max-w-xs bg-white">
                                    <option value="">Pilih Category</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Minuman</option>
                                </select>
                            </div>

                            <div class="flex justify-end items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        const name = document.getElementById('name')
        const slug = document.getElementById('slug')

        name.addEventListener('keyup', async (e) => {
            console.log(e.target.value)
            try {
                const response = await fetch(`/dashboard/menu/create/checkSlug?name=${name.value}`);
                if (!response.ok) {
                    throw new Error(`HTTP error ${response.status}`);
                }
                const data = await response.json();
                console.log(data);
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
</x-app-layout>
