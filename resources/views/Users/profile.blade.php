@include('partials.__header', ['title' => Auth::user()->username . ' | Rotten Popcorn'])

<style>
    .form-control {
        position: relative;
        margin: 20px 0 30px;
    }

    .form-control input {
        background-color: transparent;
        border: 0;
        border-bottom: 2px #fff solid;
        display: block;
        width: 100%;
        padding: 15px 0;
        font-size: 18px;
        color: #fff;
    }

    .form-control input:focus,
    .form-control input:valid {
        outline: 0;
        border-bottom-color: red;
    }

    .form-control label {
        position: absolute;
        top: 15px;
        left: 0;
        pointer-events: none;
    }

    .form-control .birthdate {
        position: absolute;
        top: -20px;
        font-size: 18px;
        min-width: 5px;
        color: #fff;
        left: 0;
        pointer-events: none;
    }

    .form-control label span {
        display: inline-block;
        font-size: 18px;
        min-width: 5px;
        color: #fff;
        transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-control input:focus+label span,
    .form-control input:valid+label span {
        color: lightblue;
        transform: translateY(-30px);
    }
</style>

<x-navbar/>

<div class="container relative flex flex-col mx-auto mt-24 rounded-lg overflow-auto border-4 border-white w-full py-10">
    <h1 class="w-full text-center uppercase font-bold text-5xl text-white border-b-2 border-white pb-4">PROFILE SETTINGS</h1>

    <div class="py-10 w-1/2 mx-auto">
        @if (filter_var(Auth::user()->profile_picture, FILTER_VALIDATE_URL) !== false) {
            <img id="profileImage" class="w-[10rem] mx-auto rounded-2xl mb-4" src="{{Auth::user()->profile_picture}}" alt="Extra large avatar">

        @else
            <img id="profileImage" class="w-1/4 max-[800px]:w-2/4 mx-auto rounded-2xl mb-4" src="{{asset('img/profile/'. Auth::user()->profile_picture)}}" alt="Extra large avatar">
        @endif
        
        <label for="profile" class="flex flex-col gap-y-4 justify-center items-center">
            <h1 class="px-4 text-center py-2.5 rounded-xl bg-blue-700 cursor-pointer text-white hover:bg-blue-900 duration-200 w-1/2">Change Photo</h1>
        </label>
        
        <input type="file" accept=".png, .jpg, .jpeg, .webp" id="profile" name="file" class="hidden" form="updateUserForm">


        <hr class="mt-4">

    </div>

    <form class="grid grid-cols-2 max-[800px]:grid-cols-1 max-[800px]:px-10 px-32 gap-x-4" action='{{route('users.update', Auth::user()->userID)}}' id="updateUserForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="col-span-1">
            <div class="form-control w-full">
                <input type="text" name="username" class="focus:ring-0" value="{{old('username', Auth::user()->username)}}">
                <label>
                    <span style="transition-delay:0ms">U</span><span style="transition-delay:50ms">s</span><span style="transition-delay:100ms">e</span><span style="transition-delay:150ms">r</span><span style="transition-delay:200ms">n</span><span style="transition-delay:250ms">a</span><span style="transition-delay:300ms">m</span><span style="transition-delay:350ms">e</span>
                </label>
                @error('username')
                    <span class="text-red-300 text-md mt-4 w-full "> 
                        {{$message}}
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-span-1">
            <div class="form-control w-full flex flex-col">
                <label for="" class="birthdate">Birthdate</label>
                <input type="date" class="focus:ring-0" name="birthday" value={{old('birthday', Auth::user()->birthday)}}>
                @error('birthday')
                    <span class="text-red-300 text-md mt-4 w-full "> 
                        {{$message}}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-span-2">
            <div class="form-control w-full">
                <input type="text" class="focus:ring-0" name="email" value="{{old('email', Auth::user()->email)}}">
                <label>
                    <span style="transition-delay:0ms">E</span><span style="transition-delay:50ms">m</span><span style="transition-delay:100ms">a</span><span style="transition-delay:150ms">i</span><span style="transition-delay:200ms">l</span>
                </label>
                @error('email')
                    <span class="text-red-300 text-md mt-4 w-full "> 
                        {{$message}}
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-span-2 flex justify-end">
            <button class="bg-red-600 text-white uppercase text-xl font-bold px-4 py-2.5 w-1/2 rounded-2xl" type="submit">Update</button>
        </div>
    </form>

</div>


<script>
    document.getElementById("profile").onchange = function() {
        document.getElementById('profileImage').src = URL.createObjectURL(this.files[0]);
    };
</script>


@include('partials.__footer')