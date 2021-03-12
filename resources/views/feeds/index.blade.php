@extends('layouts/app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="border border-yellow-400 rounded-lg px-8 py-6 mb-10">
                <form action="{{ route('feeds') }}" method="post">
                    @csrf
                    <textarea name="body" id="" class="border-none w-full p-3.5" placeholder="Wassup?"></textarea>
                    <hr class="my-4">
                    <footer class="flex justify-between">
                        <img src="{{ auth()->user()->avatar }}" class="rounded-3xl" alt="">
                    <button type="submit" class="bg-yellow-500 rounded-lg shadow py-2 px-4 text-white">Feed !</button>
                    </footer>
                </form>
            </div>

            @if($feeds->count())
                @foreach($feeds as $feed)
                    <div class="border border-gray-200 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <a href="" class="font-bold  flex items-center mr-2.5">
                                    <img src="{{ $feed->user->avatar }}" class="rounded-3xl mr-2" alt="">
                                    {{ $feed->user->username }}
                                </a>
                                <span class="text-gray-600 text-sm">{{ $feed->created_at->diffForHumans() }}</span>
                            </div>
                            @if($feed->ownedBy(auth()->user()))
                                <div>
                                    <form action="{{ route('feeds/destroy', $feed) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-blue-500"><i class="fas fa-trash-alt text-gray-400"></i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <p class="mb-3">{{ $feed->body }}</p>
                        <div class="flex items-center">
                            @auth
                            @if(!$feed->likedBy(auth()->user()))
                                <form action="{{ route('feeds/likes', $feed->id) }}" method="post" class="mr-3">
                                    @csrf
                                    <button type="submit" class="text-blue-500"><i class="fas fa-thumbs-up"></i></button>
                                </form>
                            @else
                                <form action="{{ route('feeds/likes', $feed->id) }}" method="post" class="mr-3">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-blue-500"><i class="fas fa-thumbs-down text-red-700"></i></button>
                                </form>
                            @endif

                            @endauth
                            <span> {{ $feed->likes->count() }} </span>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">
                    {{ $feeds->links() }}

                </div>
            @else
                <p>Il n'y a aucun post :(</p>
            @endif
        </div>
    </div>
@endsection
