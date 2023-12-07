@include('partials.__header', ['title' => 'Rotten Popcorn'])



<style>
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
</style>

<x-navbar/>


<div class="container relative p-10 flex flex-col mx-auto mt-24 mb-10 rounded-lg overflow-auto border-4 border-white">
    <div class="first-layer grid grid-cols-4 gap-4 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 w-full z-1 border-b-4 border-white pb-8 border-dotted">
        <div class="col-span-2  max-[600px]:col-span-1">
            <div id="animation-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <h1 class="text-white font-bold text-xl uppercase">Featured Movies</h1>
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($featuredMovies as $featuredMovie)
                        <a href="{{route('movie.show', $featuredMovie['movieID'])}}">
                            <div class=" duration-200 ease-linear group cursor-pointer" data-carousel-item data-carousel-item='active'>
                                <img src="{{asset('img/posters/'.$featuredMovie['poster']) }}" class="absolute block w-full group-hover:scale-75 duration-300 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                <div class="absolute bg-[#ff1621bb] shadow-lg px-10 py-4 -bottom-[40%] max-[600px]:-bottom-[70%] group-hover:bottom-0 duration-300 w-full flex flex-col gap-y-4">
                                    <div class="flex flex-row max-[600px]:flex-col border-b-2 border-b-white justify-between items-center">
                                        <h1 class="text-white font-bold text-3xl max-[600px]:text-lg pb-2 uppercase opacity-100">{{$featuredMovie['title']}}</h1>
                                        <div class="pb-2 text-lg text-white font-semibold uppercase flex flex-row items-center gap-3">
                                            <img src="img/popcorn.png" class="w-7"> </img>
                                            <span class="">{{$featuredMovie['average_rating']}}% Rotten Popcorn</span>
                                        </div>
                                    </div>
                                    <div class="tags max-[600px]:hidden flex flex-row w-full gap-4 items-center">
                                        <span class="bg-white text-red-900 font-semibold text-md px-2 py-1 rounded-lg hover:bg-red-900 hover:text-white duration-300 cursor-pointer">
                                            {{$featuredMovie['genre']}}
                                        </span>
                                    </div>
                                    <div class="flex flex-row flex-wrap w-full gap-x-8 justify-between max-[600px]:hidden">
                                        <div class="text-md text-white flex flex-row gap-2">
                                            <h1 class="font-semibold uppercase">Director:</h1>
                                            <span>{{$featuredMovie['director']}}</span>
                                        </div>
                                        <div class="text-md text-white flex flex-row gap-2">
                                            <h1 class="font-semibold uppercase">Cast:</h1>
                                            <span>{{$featuredMovie['cast']}}</span>
                                        </div>
                                    </div>
                                    <div class="w-full text-md text-white flex flex-col">
                                        <h1 class="font-semibold uppercase">Synopsis:</h1>
                                        <p>{{$featuredMovie['synopsis']}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        

        </div>

        <div class="col-span-1 relative w-full max-[1200px]:h-[400px]" id="topMovie">
            <a href="movie_info.php?id=` + data['movieID'] + `" class="w-full">
                <h1 class="text-white font-bold text-xl uppercase">Top 1 Rotten Popcorn</h1>
                <div class="card">
                    <div class="content">
                        <div class="back">
                            <div class="back-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" viewBox="0 0 32 32">
                                    <g fill="none">
                                        <path fill="#F9C23C" d="M19.93 5.03c0-.81-.57-1.48-1.32-1.65a.415.415 0 0 1-.29-.24c-.23-.67-.86-1.14-1.6-1.14a1.7 1.7 0 0 0-1.6 1.13c-.04.13-.15.21-.28.24c-.76.17-1.32.85-1.32 1.66c0 .81.57 1.48 1.32 1.65c.13.03.24.12.29.24c.23.66.86 1.13 1.6 1.13a1.7 1.7 0 0 0 1.6-1.13c.04-.13.16-.22.29-.24c.74-.17 1.31-.85 1.31-1.65Z" />
                                        <path fill="#FCD53F" d="M19.062 5.252A1.77 1.77 0 0 1 20.2 4.84c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73s-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18a1.77 1.77 0 0 1-1.5-.828a1.68 1.68 0 0 1-.96.298c-.74 0-1.37-.47-1.6-1.13a.415.415 0 0 0-.29-.24a1.685 1.685 0 0 1-.27-.085a1.811 1.811 0 0 1-.94.545c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.381.381 0 0 0-.3-.26a1.77 1.77 0 0 1-1.38-1.73c0-.85.59-1.55 1.38-1.73c.14-.03.26-.12.3-.26c.25-.69.9-1.18 1.68-1.18c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.138.03.27.077.392.137c.22-.213.494-.367.798-.437c.13-.02.25-.11.29-.24a1.7 1.7 0 0 1 2.932-.488Z" />
                                        <path fill="#FFF478" d="M19.53 8.42c.654 0 1.23.354 1.535.884a1.77 1.77 0 0 1 1.445-.744c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73c0 .84-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.655 0-1.23-.354-1.535-.884a1.77 1.77 0 0 1-1.445.744a1.767 1.767 0 0 1-1.639-1.097c-.2.106-.424.175-.661.197c-.76.07-1.44-.34-1.75-.97a1.77 1.77 0 0 1-2.827.468c-.1.043-.204.078-.313.102c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.396.396 0 0 0-.3-.26a1.771 1.771 0 0 1 0-3.46c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18c.78 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.334.075.632.241.865.47c.044-.018.09-.035.135-.05c.19-.06.34-.21.41-.4c.23-.72.89-1.23 1.68-1.23a1.774 1.774 0 0 1 1.691 1.233c.137-.073.284-.128.439-.163c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18Z" />
                                        <path fill="#F8312F" d="M13.74 14.13a2.452 2.452 0 0 1 2.45-2.55c1.39 0 2.5 1.16 2.45 2.55l3.75-.54c.09-1.05.96-1.86 2.02-1.86c1.24 0 2.19 1.11 1.99 2.34l-2.33 14.75c-.11.69-.71 1.2-1.41 1.2h-1.57l-1.407-4.216l-1.663 4.206h-3.66l-1.286-3.304l-1.744 3.314H9.76c-.7 0-1.3-.51-1.41-1.2L6.02 14.07c-.19-1.23.76-2.34 2-2.34c1.06 0 1.94.81 2.01 1.86l3.71.54Z" />
                                        <path fill="#F4F4F4" d="M11.28 30.02L9.99 13.74c-.09-1.09.77-2.01 1.85-2.01c1 0 1.82.79 1.86 1.79l.66 16.5h-3.08Zm6.74 0l.65-16.5a1.863 1.863 0 1 1 3.72.22L21.1 30.02h-3.08Z" />
                                    </g>
                                </svg>
                                <strong class="text-xl uppercase">Hover me to reveal!</strong>
                            </div>
                        </div>
                        <div class="front">

                            <div class="img">
                                <img src="{{asset('img/posters/'.$topMovie['poster']) }}"">
                            </div>

                            <div class="front-content">
                                <small class="badge">{{$topMovie['genre']}}</small>
                                <div class="description">
                                    <div class="title">
                                        <p class="title">
                                            <strong>{{$topMovie['title']}}</strong>
                                        </p>
                                        <img src="img/popcorn.png" class="w-5">
                                    </div>
                                    <p class="card-footer">
                                        <span class="font-bold uppercase">Director:</span> {{$topMovie['director']}} &nbsp; | &nbsp; {{$topMovie['average_rating']}}% Rotten Popcorn
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-span-1 relative w-full max-[1200px]:h-[400px]" id="specialMovie">
            <a href="movie_info.php?id=` + data['movieID'] + `" class="w-full">
                <h1 class="text-white font-bold text-xl uppercase">Christmas Special</h1>
                <div class="card">
                    <div class="content">
                        <div class="back">
                            <div class="back-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" viewBox="0 0 32 32">
                                    <g fill="none">
                                        <path fill="#F9C23C" d="M19.93 5.03c0-.81-.57-1.48-1.32-1.65a.415.415 0 0 1-.29-.24c-.23-.67-.86-1.14-1.6-1.14a1.7 1.7 0 0 0-1.6 1.13c-.04.13-.15.21-.28.24c-.76.17-1.32.85-1.32 1.66c0 .81.57 1.48 1.32 1.65c.13.03.24.12.29.24c.23.66.86 1.13 1.6 1.13a1.7 1.7 0 0 0 1.6-1.13c.04-.13.16-.22.29-.24c.74-.17 1.31-.85 1.31-1.65Z" />
                                        <path fill="#FCD53F" d="M19.062 5.252A1.77 1.77 0 0 1 20.2 4.84c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73s-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18a1.77 1.77 0 0 1-1.5-.828a1.68 1.68 0 0 1-.96.298c-.74 0-1.37-.47-1.6-1.13a.415.415 0 0 0-.29-.24a1.685 1.685 0 0 1-.27-.085a1.811 1.811 0 0 1-.94.545c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.381.381 0 0 0-.3-.26a1.77 1.77 0 0 1-1.38-1.73c0-.85.59-1.55 1.38-1.73c.14-.03.26-.12.3-.26c.25-.69.9-1.18 1.68-1.18c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.138.03.27.077.392.137c.22-.213.494-.367.798-.437c.13-.02.25-.11.29-.24a1.7 1.7 0 0 1 2.932-.488Z" />
                                        <path fill="#FFF478" d="M19.53 8.42c.654 0 1.23.354 1.535.884a1.77 1.77 0 0 1 1.445-.744c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73c0 .84-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.655 0-1.23-.354-1.535-.884a1.77 1.77 0 0 1-1.445.744a1.767 1.767 0 0 1-1.639-1.097c-.2.106-.424.175-.661.197c-.76.07-1.44-.34-1.75-.97a1.77 1.77 0 0 1-2.827.468c-.1.043-.204.078-.313.102c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.396.396 0 0 0-.3-.26a1.771 1.771 0 0 1 0-3.46c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18c.78 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.334.075.632.241.865.47c.044-.018.09-.035.135-.05c.19-.06.34-.21.41-.4c.23-.72.89-1.23 1.68-1.23a1.774 1.774 0 0 1 1.691 1.233c.137-.073.284-.128.439-.163c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18Z" />
                                        <path fill="#F8312F" d="M13.74 14.13a2.452 2.452 0 0 1 2.45-2.55c1.39 0 2.5 1.16 2.45 2.55l3.75-.54c.09-1.05.96-1.86 2.02-1.86c1.24 0 2.19 1.11 1.99 2.34l-2.33 14.75c-.11.69-.71 1.2-1.41 1.2h-1.57l-1.407-4.216l-1.663 4.206h-3.66l-1.286-3.304l-1.744 3.314H9.76c-.7 0-1.3-.51-1.41-1.2L6.02 14.07c-.19-1.23.76-2.34 2-2.34c1.06 0 1.94.81 2.01 1.86l3.71.54Z" />
                                        <path fill="#F4F4F4" d="M11.28 30.02L9.99 13.74c-.09-1.09.77-2.01 1.85-2.01c1 0 1.82.79 1.86 1.79l.66 16.5h-3.08Zm6.74 0l.65-16.5a1.863 1.863 0 1 1 3.72.22L21.1 30.02h-3.08Z" />
                                    </g>
                                </svg>
                                <strong class="text-xl uppercase">Hover me to reveal!</strong>
                            </div>
                        </div>
                        <div class="front">

                            <div class="img">
                                <img src="{{asset('img/posters/'.$specialMovie['poster']) }}"">
                            </div>

                            <div class="front-content">
                                <small class="badge">{{$specialMovie['genre']}}</small>
                                <div class="description">
                                    <div class="title">
                                        <p class="title">
                                            <strong>{{$specialMovie['title']}}</strong>
                                        </p>
                                        <img src="img/popcorn.png" class="w-5">
                                    </div>
                                    <p class="card-footer">
                                        <span class="font-bold uppercase">Director:</span> {{$specialMovie['director']}} &nbsp; | &nbsp; {{$specialMovie['average_rating']}}% Rotten Popcorn
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="second-layer mt-4">
        <h1 class="col-span-4 uppercase text-4xl text-white font-bold text-center py-4">RECOMMENDED MOVIES</h1>
        <div class="grid grid-cols-4 gap-4 max-[1500px]:grid-cols-3 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 " id="second-layer">
            @foreach($movies as $movie)
                <div class="w-full overflow-auto rounded-xl mx-auto">
                    <div class="group relative flex w-full max-w-[30rem] flex-col rounded-xl bg-white group-hover:bg-gray-300 bg-clip-border text-gray-700 shadow-lg cursor-pointer">
                        <div class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                            <img src="{{asset('img/posters/'. $movie['poster'])}}" alt="ui/ux review check" class="group-hover:scale-110 duration-300 max-h-[400px] mx-auto" />
                            <div class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
                            <button id="heartBtn" class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-dark="true">
                                <span id="emptyHeart" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="white" d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3Z" />
                                    </svg>
                                </span>
                                <span id="fillHeart" class="hidden absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="red" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53L12 21.35Z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3 group-hover:text-red-600 duration-300 border-b-[1px] pb-2 border-red-500">
                                <a href="movie_info.php?id=` + data['movieID'] + `">
                                    <h5 class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                                    {{$movie['title']}}
                                    </h5>
                                </a>
                                <p class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FFFF00" stroke="#00000077" aria-hidden="true" class="-mt-0.5 h-5 w-5 text-yellow-700">
                                        ><g fill="none"><path fill="#F9C23C" d="M19.93 5.03c0-.81-.57-1.48-1.32-1.65a.415.415 0 0 1-.29-.24c-.23-.67-.86-1.14-1.6-1.14a1.7 1.7 0 0 0-1.6 1.13c-.04.13-.15.21-.28.24c-.76.17-1.32.85-1.32 1.66c0 .81.57 1.48 1.32 1.65c.13.03.24.12.29.24c.23.66.86 1.13 1.6 1.13a1.7 1.7 0 0 0 1.6-1.13c.04-.13.16-.22.29-.24c.74-.17 1.31-.85 1.31-1.65Z"/><path fill="#FCD53F" d="M19.062 5.252A1.77 1.77 0 0 1 20.2 4.84c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73s-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18a1.77 1.77 0 0 1-1.5-.828a1.68 1.68 0 0 1-.96.298c-.74 0-1.37-.47-1.6-1.13a.415.415 0 0 0-.29-.24a1.685 1.685 0 0 1-.27-.085a1.811 1.811 0 0 1-.94.545c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.381.381 0 0 0-.3-.26a1.77 1.77 0 0 1-1.38-1.73c0-.85.59-1.55 1.38-1.73c.14-.03.26-.12.3-.26c.25-.69.9-1.18 1.68-1.18c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.138.03.27.077.392.137c.22-.213.494-.367.798-.437c.13-.02.25-.11.29-.24a1.7 1.7 0 0 1 2.932-.488Z"/><path fill="#FFF478" d="M19.53 8.42c.654 0 1.23.354 1.535.884a1.77 1.77 0 0 1 1.445-.744c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73c0 .84-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.655 0-1.23-.354-1.535-.884a1.77 1.77 0 0 1-1.445.744a1.767 1.767 0 0 1-1.639-1.097c-.2.106-.424.175-.661.197c-.76.07-1.44-.34-1.75-.97a1.77 1.77 0 0 1-2.827.468c-.1.043-.204.078-.313.102c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.396.396 0 0 0-.3-.26a1.771 1.771 0 0 1 0-3.46c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18c.78 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.334.075.632.241.865.47c.044-.018.09-.035.135-.05c.19-.06.34-.21.41-.4c.23-.72.89-1.23 1.68-1.23a1.774 1.774 0 0 1 1.691 1.233c.137-.073.284-.128.439-.163c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18Z"/><path fill="#F8312F" d="M13.74 14.13a2.452 2.452 0 0 1 2.45-2.55c1.39 0 2.5 1.16 2.45 2.55l3.75-.54c.09-1.05.96-1.86 2.02-1.86c1.24 0 2.19 1.11 1.99 2.34l-2.33 14.75c-.11.69-.71 1.2-1.41 1.2h-1.57l-1.407-4.216l-1.663 4.206h-3.66l-1.286-3.304l-1.744 3.314H9.76c-.7 0-1.3-.51-1.41-1.2L6.02 14.07c-.19-1.23.76-2.34 2-2.34c1.06 0 1.94.81 2.01 1.86l3.71.54Z"/><path fill="#F4F4F4" d="M11.28 30.02L9.99 13.74c-.09-1.09.77-2.01 1.85-2.01c1 0 1.82.79 1.86 1.79l.66 16.5h-3.08Zm6.74 0l.65-16.5a1.863 1.863 0 1 1 3.72.22L21.1 30.02h-3.08Z"/></g><
                                    </svg>
                                    {{$movie['average_rating']}}%
                                </p>
                            </div>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700 h-[100px] overflow-auto">
                               {{$movie['synopsis']}}
                            </p>
                        </div>
                        <div class="p-6 pt-3">
                            <a href="movie_info.php?id=` + data['movieID'] + `">
                                <button class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:scale-110 duration-300" type="button" data-ripple-light="true">
                                    More Info!
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('partials.__footer')