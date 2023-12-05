@include('partials.__header', ['title' => 'Register | Rotten Popcorn'])

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        width: 100vw;
        overflow-x: hidden;
        background-image: url("{{asset('img/bg-image.jpg')}}"); 
        background-size: cover;
        font-family: 'Gabarito', sans-serif;
    }
</style>

<div class="flex flex-col min-h-screen items-center justify-center">
    <div class="w-1/2 bg-[#000000aa] py-10 px-20 rounded-lg shadow">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="w-full text-3xl font-bold text-white border-b-2 pb-4">
                Create and account
            </h1>
            <form class="space-y-2" action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="flex flex-col">
                    <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                    <input autocomplete="off" value="{{old('username')}}" type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Username" >
                    @error('username')
                        <span class="text-red-800 text-sm mt-2"> 
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="birthday" class="block mb-2 text-sm font-medium text-white">Birthday</label>
                    <input autocomplete="off" value="{{old('birthday')}}" type="date" name="birthday" id="birthday" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" >
                    @error('birthday')
                        <span class="text-red-800 text-sm mt-2"> 
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                    <input autocomplete="off" value="{{old('email')}}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Email" >
                    @error('email')
                        <span class="text-red-800 text-sm mt-2"> 
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                    <input autocomplete="off" type="password" name="password" id="password" placeholder="Enter Password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    @error('password')
                        <span class="text-red-800 text-sm mt-2"> 
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation " class="block mb-2 text-sm font-medium text-white">Confirm password</label>
                    <input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    @error('password_confirmation')
                        <span class="text-red-800 text-sm mt-2"> 
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="flex items-start">
                </div>
                <button type="submit" class="w-full text-white bg-red-900 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Already have an account? <a href="{{route('users.index')}}" class="font-medium text-red-600 hover:underline dark:text-primary-500">Login here</a>
                </p>
            </form>
        </div>
    </div>
</div>


@include('partials.__footer')