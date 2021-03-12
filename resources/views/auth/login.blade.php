@extends('layouts/app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if(session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action=" {{ route('login') }}" method="post">
                @csrf
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
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Se connecter !</button>
                </div>
            </form>
        </div>
    </div>
@endsection
