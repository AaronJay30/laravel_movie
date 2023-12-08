
<style>
    @import url('https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800;900&display=swap');

    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        body {
            width: 100vw;
            overflow-x: hidden;
            background-image: url("public/img/bg-image.jpg");
            background-size: cover;
            font-family: 'Gabarito', sans-serif;
        }

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 12px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #FF5733;
        border-width: 100%;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        width: 100vw;
        overflow-x: hidden;
        background-image: url('img/bg-image.jpg');
        background-size: cover;
        font-family: 'Gabarito', sans-serif;
    }

    nav {
        background: rgba(140, 21, 21, 0.7);
        backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
        -webkit-backdrop-filter: blur(20px) saturate(160%) contrast(45%) brightness(140%);
    }

    nav .logo-container img {
        transition: 200ms ease-in-out;
    }

    nav .logo-container img:hover {
        transform: scale(1.2);
    }

    nav ul li {
        transition: 200ms ease-in-out;
    }

    nav ul li:hover {
        transform: scale(1.1);
    }

    .container {
        background: rgba(180, 33, 33, 0.72);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(8.2px);
        -webkit-backdrop-filter: blur(8.2px);
    }

    .buttons__burger {
        --size: 2.5rem;
        --clr: #fff;
        width: var(--size);
        height: calc(0.7 * var(--size));
        cursor: pointer;
        position: absolute;
    }

    .buttons__burger #burger {
        display: none;
        width: 100%;
        height: 100%;
    }

    .buttons__burger span {
        display: block;
        position: absolute;
        width: 100%;
        border-radius: 0.5rem;
        border: 3px solid var(--clr);
        background-color: var(--clr);
        transition: 0.15s ease-in-out;
    }

    .buttons__burger span:nth-of-type(1) {
        top: 0;
        right: 0;
        transform-origin: right center;
    }

    .buttons__burger span:nth-of-type(2) {
        top: 50%;
        transform: translateY(-50%);
    }

    .buttons__burger span:nth-of-type(3) {
        top: 100%;
        right: 0;
        transform-origin: right center;
        transform: translateY(-100%);
    }

    .buttons__burger #burger:checked~span:nth-of-type(1) {
        transform: translateY(-30%) rotate(40deg);
        width: 50%;
        top: 50%;
    }

    .buttons__burger #burger:checked~span:nth-of-type(3) {
        transform: translateY(-70%) rotate(-40deg);
        width: 50%;
        top: 50%;
    }

    #sidebar {
        background: rgba(180, 33, 33, 1);
    }
</style>

<!-- BURGER MENU -->
<div class="absolute left-[-3000px] z-10 h-full w-full duration-500 ease-in-out flex flex-col items-center" id='sidebar'>
    <div class="w-full flex justify-end border-b-4 border-b-white px-10 pt-4 ">
        <img src="{{asset('img/RottenPopCorn(Text).png')}}" alt="Rotten Popcorn" class="h-20 hover:scale-110 duration-300">
    </div>

    <div class="flex flex-col justify-between w-full h-full">
        <ul class="flex flex-col justify-center items-center text-white mt-10 w-full">
            <li class="text-3xl uppercase duration-300 font-bold hover:text-red-500 hover:bg-white py-10 w-full text-center">
                <a href="{{route('users.contact')}}" class="flex flex-row w-full justify-center items-center gap-4">
                    <i class="bx bxs-cog"></i>
                    <h1>Settings</h1>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- BURGER BUTTON -->
<label class="buttons__burger max-[600px]:block hidden absolute z-20 top-[30px] left-8 duration-500" for="burger">
    <input type="checkbox" id="burger">
    <span></span>
    <span></span>
    <span></span>
</label>

<!-- NAVBAR -->
<nav class="w-full py-1 px-8 flex flex-row items-center justify-between max-[600px]:justify-end relative">

    <a href="{{route('movie.index')}}" class="logo-container">
        <img src="{{asset('img/RottenPopCorn(Text).png')}}" alt="Rotten Popcorn" class="h-20 max-[600px]:hidden">
        <img src="{{asset('img/RottenPopCorn(Logo).png')}}" alt="Rotten Popcorn" class="h-20 max-[600px]:block hidden">
    </a>

    <div class="flex flex-row gap-8 items-center relative z-10">


        <ul class="max-[600px]:hidden flex flex-row gap-8 items-center text-white">
            <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="left-start" class="max-[600px]:hidden w-10 h-10 rounded-full cursor-pointer" src="{{asset('img/profile/default.png')}}">
        </ul>

        <!-- Dropdown menu -->
        <div id="userDropdown" class="relative hidden bg-white divide-y divide-red-300 rounded-lg shadow w-44">
            <div class="px-4 py-3 text-sm text-red-900 ">
                <div class="font-bold">Jayne Vernice</div>
                <div class="font-medium truncate">Jayne Vernice</div>
            </div>

            <div class="py-1">
                <a href="setting.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white duration-300">Settings</a>
            </div>
            <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white duration-300" onclick="logout()">Sign out</a>

            </div>
        </div>
    </div>

</nav>

<!-- SCRIPT -->
<script>
    $('#burger').on('click', () => {
        $('#sidebar').toggleClass('left-[0px] ');
        $('.buttons__burger').toggleClass('top-[40px] ');
    })

    window.addEventListener('blur', () => {
        document.title = "I miss you comeback 💔 - RottenPopcorn";
    })

    window.addEventListener('focus', () => {
        document.title = "Rotten Popcorn";
    })
</script>