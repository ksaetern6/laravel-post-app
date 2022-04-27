<!DOCTYPE html>
<html>

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laravel Auth</title>
    </head>

    <body class="bg-gray-100">
        <nav class="p-6 bg-white flex justify-between">
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Posts</a>
                </li>
            </ul>
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('update') }}" class="p-3">Update</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                            @csrf
                            <button class="submit">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>
        <div class="container mx-auto mt-6 px-6">
            @yield('content')
        </div>
    </body>

</html>