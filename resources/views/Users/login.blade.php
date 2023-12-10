@include('partials.__header', ['title' => 'Login | Rotten Popcorn'])

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

<div class="flex flex-col min-h-screen justify-center items-center relative">
    <div class="bg-[#000000bb] pt-20 px-20 pb-8 flex flex-col justify-start items-center w-1/3 gap-y-4">
        <!-- <div class="w-full flex flex-row justify-center">
            <img src="img/RottenPopCorn(Text).png" alt="Logo" class="w-[20rem]">
        </div> -->
        <h1 class="text-white w-full text-left font-bold text-5xl border-b-2 pb-4">Sign In</h1>
        <form action="{{route('users.process')}}" method="POST" class="w-full flex flex-col justify-start items-center gap-y-4">
            @csrf
            <div class="flex flex-col justify-start w-full mt-4 gap-y-1">
                <label for="email" class="text-white font-medium text-xl">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" placeholder="sample@gmail.com" class="rounded-lg p-2.5 bg-gray-700 border border-gray-600 placeholder:text-gray-400 text-white focus:ring-red-900">
                @error('email')
                    <span class="text-red-800 text-sm mt-2"> 
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="flex flex-col justify-start w-full gap-y-1">
                <label for="password" class="text-white font-medium text-xl">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" placeholder="************" class="rounded-lg p-2.5 bg-gray-700 border border-gray-600 placeholder:text-gray-400 text-white focus:ring-red-900">
            </div>


            <button class="bg-red-900 hover:bg-red-700 p-2.5 w-full mt-7 rounded-lg text-white text-xl font-medium" type="submit" name="login">Sign in</button>

            <h2 class="text-center text-white text-xl hover:text-red-700 pt-4 hover:underline duration-200"><a href="{{route('users.create')}}">Doesn't have an account?</a></h2>

            <div class="mt-4 flex items-center w-full justify-center">
                <div class="border-t flex-1 mx-4"></div>
                <p class="mx-4 mb-0 text-center font-medium text-white">Or</p>
                <div class="border-t flex-1 mx-4"></div>
            </div>

        </form>
        <div class="flex flex-row w-full justify-evenly mt-4">
            <a href="{{route('facebook.login')}}">
                <div class="flex items-center justify-center bg-gray-800 hover:bg-blue-900 duration-200 ease-in-out rounded-lg">
                    <button class="p-4 border flex gap-2 border-blue-700 rounded-lg text-blue-200 hover:border-blue-500 hover:text-blue-300 hover:shadow transition duration-150">
                        <img class="w-6 h-6" src="https://www.svgrepo.com/show/475647/facebook-color.svg" loading="lazy" alt="google logo">
                        <span>Login with Facebook</span>
                    </button>
                </div>
            </a>

            <a href="{{route('google.login')}}">
                <div class="flex items-center justify-center bg-gray-800 hover:bg-orange-900 duration-200 ease-in-out rounded-lg">
                    <button class="p-4 border flex gap-2 border-orange-700 rounded-lg text-orange-200 hover:border-orange-500 hover:text-orange-300 hover:shadow transition duration-150">
                        <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                        <span>Login with Google</span>
                    </button>
                </div>>
            </a>
        </div>
    </div>
</div>




@include('partials.__footer')