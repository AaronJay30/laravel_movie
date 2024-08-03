@include('partials.__header', ['title' => 'All Movies | Rotten Popcorn'])

<x-navbar/>


<div class="container relative flex flex-col mx-auto mt-24 mb-20 rounded-lg overflow-auto border-4 border-white w-full py-10 px-8">
    <div class="flex flex-row justify-between border-b-2 border-dashed pb-4">
        <div class="flex flex-row">
            <select value="" id="genreSelect" name="genre" class="bg-red-900/100 text-white px-4 border-b-2 border-white focus:ring-red-400">
                <option value="" selected>Select a genre</option>
                @foreach ($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
                @endforeach
                
            </select>
        </div>
        <div class="flex flex-row w-1/3">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="movieSearch" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500" autocomplete="off" placeholder="Search movie title">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-4 max-[1500px]:grid-cols-3 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 pt-4 gap-y-4" id="second-layer">

    </div>
</div>

<script>

$(document).ready(function() {
        loadMovies();
    });

    function showMovies(result) {
        var datas = result;

        var div = ``;
        datas.forEach(function(data) {
            div += `   
                    <div class="w-full overflow-auto rounded-xl mx-auto">
                        <div class="group relative flex w-full max-w-[30rem] flex-col rounded-xl bg-white group-hover:bg-gray-300 bg-clip-border text-gray-700 shadow-lg cursor-pointer min-h-[14rem]">
                            <div class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                                <img src="img/posters/` + data['poster'] + `" alt="ui/ux review check" class="group-hover:scale-110 duration-300 max-h-[400px] mx-auto" />
                                <div class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
                                
                            </div>
                            <div class="px-6 pt-6 pb-4 flex flex-col">
                                <div class="flex items-center justify-between mb-3 group-hover:text-red-600 duration-300 border-b-[1px] pb-2">
                                    <a href="{{ route('movie.show', ['movie' => ':movieID']) }}">
                                        <h5 class="block font-sans text-lg antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                                        ` + data['title'] + ` - ` + data['year'] + `
                                        </h5>
                                    </a>
                                    <p class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FFFF00" stroke="#00000077" aria-hidden="true" class="-mt-0.5 h-5 w-5 text-yellow-700">
                                            ><g fill="none"><path fill="#F9C23C" d="M19.93 5.03c0-.81-.57-1.48-1.32-1.65a.415.415 0 0 1-.29-.24c-.23-.67-.86-1.14-1.6-1.14a1.7 1.7 0 0 0-1.6 1.13c-.04.13-.15.21-.28.24c-.76.17-1.32.85-1.32 1.66c0 .81.57 1.48 1.32 1.65c.13.03.24.12.29.24c.23.66.86 1.13 1.6 1.13a1.7 1.7 0 0 0 1.6-1.13c.04-.13.16-.22.29-.24c.74-.17 1.31-.85 1.31-1.65Z"/><path fill="#FCD53F" d="M19.062 5.252A1.77 1.77 0 0 1 20.2 4.84c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73s-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18a1.77 1.77 0 0 1-1.5-.828a1.68 1.68 0 0 1-.96.298c-.74 0-1.37-.47-1.6-1.13a.415.415 0 0 0-.29-.24a1.685 1.685 0 0 1-.27-.085a1.811 1.811 0 0 1-.94.545c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.381.381 0 0 0-.3-.26a1.77 1.77 0 0 1-1.38-1.73c0-.85.59-1.55 1.38-1.73c.14-.03.26-.12.3-.26c.25-.69.9-1.18 1.68-1.18c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.138.03.27.077.392.137c.22-.213.494-.367.798-.437c.13-.02.25-.11.29-.24a1.7 1.7 0 0 1 2.932-.488Z"/><path fill="#FFF478" d="M19.53 8.42c.654 0 1.23.354 1.535.884a1.77 1.77 0 0 1 1.445-.744c.77 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.8.18 1.39.88 1.39 1.73c0 .84-.59 1.55-1.39 1.73c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.655 0-1.23-.354-1.535-.884a1.77 1.77 0 0 1-1.445.744a1.767 1.767 0 0 1-1.639-1.097c-.2.106-.424.175-.661.197c-.76.07-1.44-.34-1.75-.97a1.77 1.77 0 0 1-2.827.468c-.1.043-.204.078-.313.102c-.14.03-.25.13-.3.26c-.24.69-.9 1.18-1.67 1.18c-.77 0-1.43-.49-1.67-1.18a.396.396 0 0 0-.3-.26a1.771 1.771 0 0 1 0-3.46c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18c.78 0 1.43.49 1.67 1.18c.05.14.16.23.3.26c.334.075.632.241.865.47c.044-.018.09-.035.135-.05c.19-.06.34-.21.41-.4c.23-.72.89-1.23 1.68-1.23a1.774 1.774 0 0 1 1.691 1.233c.137-.073.284-.128.439-.163c.14-.03.25-.13.3-.26c.24-.69.9-1.18 1.67-1.18Z"/><path fill="#F8312F" d="M13.74 14.13a2.452 2.452 0 0 1 2.45-2.55c1.39 0 2.5 1.16 2.45 2.55l3.75-.54c.09-1.05.96-1.86 2.02-1.86c1.24 0 2.19 1.11 1.99 2.34l-2.33 14.75c-.11.69-.71 1.2-1.41 1.2h-1.57l-1.407-4.216l-1.663 4.206h-3.66l-1.286-3.304l-1.744 3.314H9.76c-.7 0-1.3-.51-1.41-1.2L6.02 14.07c-.19-1.23.76-2.34 2-2.34c1.06 0 1.94.81 2.01 1.86l3.71.54Z"/><path fill="#F4F4F4" d="M11.28 30.02L9.99 13.74c-.09-1.09.77-2.01 1.85-2.01c1 0 1.82.79 1.86 1.79l.66 16.5h-3.08Zm6.74 0l.65-16.5a1.863 1.863 0 1 1 3.72.22L21.1 30.02h-3.08Z"/></g><
                                        </svg>
                                        ` + data['average_rating'] + `%
                                    </p>
                                </div>
                            <span class="text-gray-400"> ` + data['director'] + ` | ` + data['cast'] + ` </span>

                            </div>
                            
                            <div class="px-6 pb-6">`;
                div += ` <button onclick="showMovie( `+ data['movieID'] + `)" class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:scale-110 duration-300" type="button" data-ripple-light="true">
                                    More Info!
                                </button>
                            </div>
                        </div>
                    </div>`;
        });

        $('#second-layer').html(div);
    }

    function loadMovies() {
        $.ajax({
            url: "/movies/genre",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'showMovie': true,
            },
            success: function(result) {
                showMovies(result['movie']);
            },
            error: function(error) {
                alert("Oops something went wrong!");
            }
        })
    }

    $('#movieSearch').on('keyup input', function() {
        var searchInput = $('#movieSearch').val();
        var genreSelect = $('#genreSelect').val();

        $.ajax({
            url: "/movies/genre",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'filterMovie': true,
                'genreSelect': genreSelect,
                'searchInput': searchInput,
            },
            success: function(result) {
                showMovies(result['movies']);
            },
            error: function(error) {
                alert("Oops something went wrong!");
            }
        })
    });

    $('#genreSelect').on('change', function() {
        var searchInput = $('#movieSearch').val();
        var genreSelect = $('#genreSelect').val();

        $.ajax({
            url: "/movies/genre",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'filterMovie': true,
                'genreSelect': genreSelect,
                'searchInput': searchInput,
            },
            success: function(result) {
                showMovies(result['movies']);
            },
            error: function(error) {
                alert("Oops something went wrong!");
            }
        })
    })

    function showMovie(id) {
        window.location.href = "{{ route('movie.show', ':id') }}".replace(':id', id);
    }
</script>


@include('partials.__footer')