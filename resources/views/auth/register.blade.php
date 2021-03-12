@extends('layouts/app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action=" {{ route('register') }}" method="post">
             @csrf
                <div class="mb-4">
                    <label for="name" class="pl-3 block mb-2 text-sm text-gray-500">Nom</label>
                    <input type="text" name="name" id="name" value=" {{ old('name') }}"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-400 @enderror">
                    @error('name')
                    <p class="text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="pl-3 block mb-2 text-sm text-gray-500">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" value=" {{ old('username') }}"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-400 @enderror">
                    @error('username')
                    <p class="text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="pl-3 block mb-2 text-sm text-gray-500">Email</label>
                    <input type="email" name="email" id="email" value=" {{ old('email') }}"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-400 @enderror">
                    @error('email')
                    <p class="text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="pl-3 block mb-2 text-sm text-gray-500">Mot de passe</label>
                    <input type="password" name="password" id="password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-400 @enderror">
                    @error('password')
                    <p class="text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="pl-3 block mb-2 text-sm text-gray-500">Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-400 @enderror">
                    @error('password')
                    <p class="text-red-700 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-yellow-400 text-white px-4 py-3 rounded font-medium w-full">S'enregistrer !</button>
                </div>
            </form>
        </div>
    </div>
@endsection
