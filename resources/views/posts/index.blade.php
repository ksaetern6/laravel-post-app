@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            @guest
                <p>Please log in to create posts</p>
            @endguest
            @auth
            <form action="{{ route('posts') }}" method="post" class="mb-6">
                @csrf
                
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                    placeholder="Post Something!"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    
                </div>
            </form>
            @endauth
            <div>
                @if ( $posts->count() )
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <div>
                                <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                                <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mb-2">{{ $post->body }}</p>

                            @can ('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                            @endcan
                        </div>    
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>There are no posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection