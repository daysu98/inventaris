@extends('layouts.main')

@section('title', $pageTitle)

@section('content')
    <!-- Form Data -->
    <div class="flex flex-col gap-9">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <form action="{{ $formAction }}" method="POST">
                @csrf
                @method($formMethod)
                <div class="p-6.5">
                    <span class="text-meta-1 block mb-4.5 text-sm" style="font-style: italic;">(*) menandakan bahwa data wajib diisi/dipilih</span>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Nama Supplier <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="name" value="{{ @$supplier->name }}" placeholder="Masukkan nama lengkap..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            No Telepon <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="phone" value="{{ @$supplier->phone }}" placeholder="Masukkan alamat no telepon..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Alamat <span class="text-meta-1">*</span>
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <textarea rows="6" name="address"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ @$supplier->address }}</textarea>
                        </div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Data -->
@endsection
