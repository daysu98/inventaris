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
                            Nama Lengkap <span class="text-meta-1">*</span>
                        </label>
                        <input type="text" name="name" value="{{ @$user->name }}" placeholder="Masukkan nama lengkap..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email <span class="text-meta-1">*</span>
                        </label>
                        <input type="email" name="email" value="{{ @$user->email }}" placeholder="Masukkan alamat email..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    @if (auth()->user()->id == 1 && @$user->id != auth()->user()->id)
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Peran <span class="text-meta-1">*</span>
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select name="role_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                                    <option value="" class="text-body" disabled {{ @$user->role_id ? '' : 'selected' }}>
                                        Pilih Peran Akses
                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" class="text-body" {{ @$user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Password {!! @$user->id == null ? '<span class="text-meta-1">*</span>' : '' !!}
                        </label>
                        <input type="password" name="password" placeholder="Masukkan password baru..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Konfirmasi Password {!! @$user->id == null ? '<span class="text-meta-1">*</span>' : '' !!}
                        </label>
                        <input type="password" name="confirm_password" placeholder="Masukkan konfirmasi password baru..."
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                            @error('confirm_password')
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
