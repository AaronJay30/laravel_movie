@include('partials.__header', ['title' => 'Admin | Rotten Popcorn'])

<x-admin_navbar/>

<style>
    #modal {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
    }
</style>

<!-- CONTENT MANAGEMENT SECTION -->
<div class="container relative p-10 mx-auto mt-24 rounded-lg overflow-auto border-4 border-white">
    <div class="flex justify-center items-center w-full z-1 border-b-4 border-white pb-8 border-dotted">

        <!-- List of Movies -->
        <div>
            <h1 class="text-white font-bold text-6xl uppercase">
                Available Movies
                <button onclick="modal.showModal(modal)"><i class='bx bx-plus-circle bx-tada text-white'></i></button>
            </h1>

            <!-- Main modal -->
            <dialog id="modal" class="p-5 backdrop:bg-black backdrop:opacity-80 rounded-2xl w-3/5  max-[1000px]:w-4/5  max-[600px]:w-full">
                <div class="relative w-full p-10 grid grid-cols-3 max-[1000px]:grid-cols-1 items-center gap-x-8 max-h-full">
                    <div class="flex flex-col items-center justify-center w-full col-span-1">
                        <img id="profileImage" class="w-full mx-auto rounded-2xl mb-4" src="img/RottenPopCorn(Logo).png" alt="Extra large avatar">

                        <label for="profile" class="flex flex-col gap-y-4 justify-center items-center w-full">
                            <h1 class="px-4 text-center py-2.5 rounded-xl bg-blue-700 cursor-pointer text-white hover:bg-blue-900 duration-200 w-full">Change Photo</h1>
                        </label>
                        <input type="file" id="profile" name="file" class="hidden" form="addMovieForm">
                        @error('file')
                            <span class="text-red-800 text-sm mt-2"> 
                                {{$message}}
                            </span>
                        @enderror

                        <hr class="mt-4">
                    </div>

                    <!-- Movie Details -->
                    <form class="col-span-2" id="addMovieForm" action='{{ route('movie.store') }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Movie Title</label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Movie Title">
                                @error('title')
                                    <span class="text-red-800 text-sm mt-2"> 
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="director" class="block mb-2 text-sm font-medium text-gray-900">Movie Director</label>
                                <input type="text" id="director" name="director" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Movie Director">
                                @error('director')
                                    <span class="text-red-800 text-sm mt-2"> 
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="Cast" class="block mb-2 text-sm font-medium text-gray-900">Movie Cast</label>
                                <input type="text" name="cast" id="Cast" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Movie Cast">
                                @error('cast')
                                    <span class="text-red-800 text-sm mt-2"> 
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Movie Year Release</label>
                                <input type="number" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Movie Release">
                                @error('year')
                                    <span class="text-red-800 text-sm mt-2"> 
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="genre" class="block mb-2 text-sm font-medium text-gray-900">Movie Genre</label>
                                <input type="text" id="genre" name="genre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Movie Genre">
                                @error('genre')
                                    <span class="text-red-800 text-sm mt-2"> 
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900">Movie Synopsis</label>
                                <div>
                                    <textarea id="synopsis" name="synopsis" rows="4" class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 focus:ring-blue-500 focus:border-blue-500 resize-none" placeholder="Write a brief summary of the movie here..."></textarea>
                                    @error('synopsis')
                                        <span class="text-red-800 text-sm mt-2"> 
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                        <button onclick="modal.close(modal)" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                    </form>
                </div>
            </dialog>
        </div>

    </div>

    <div class="flex flex-row justify-evenly flex-wrap w-full z-1 border-b-4 border-white py-2 border-dotted max-[640px]:grid grid-cols-1 gap-4">
        <!-- Search Bar -->
        <div class="flex justify-center items-center w-[30rem]">
            <div class="flex items-center flex-1">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class='bx bx-film'></i>
                    </div>
                    <input type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="What movie are you looking for?">
                </div>
            </div>
        </div>
    </div>

    <!-- Movie Cards -->
    <div id="movieCard" class="grid grid-cols-6 gap-4 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 w-full z-1 py-8">
        <!-- Each Movie Card Gets Displayed Inside This Div -->
    </div>

</div>

<script>
    const modal = document.getElementById('modal');
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.close();
        }
    });

    $(document).ready(function() {
        loadMovies();
    });

    function loadMovies() {
        $.ajax({
            url: '/admin/movie/ajax',
            method: 'POST',
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

    function showMovies(result) {
        var div = ``;
                result.forEach(function(data) {
                    div += `
                    <div class="w-full max-w-sm bg-[#F0EAD6] border border-gray-200 rounded-lg shadow group">
                        <div class="relative w-full">
                            <img class="p-3 rounded-t-lg relative z-0 group-hover:blur-sm duration-100" src="./img/posters/` + data['poster'] + ` " alt="Movie Poster" />
                            <div class="absolute w-full py-5 flex flex-row gap-y-2 items-center justify-evenly duration-300 bottom-1 opacity-0 group-hover:bottom-[35%] group-hover:opacity-100">
                                <button onclick="window.location.href='admin_movie.php?movieID=` + data['movieID'] + `'" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base p-2.5 text-center inline-flex items-center"><i class='bx bx-edit bx-sm'></i></button>
                                <button onclick="sweetAlertDelete(` + data['movieID'] + `)" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base p-2.5 text-center inline-flex items-center"><i class='bx bx-trash bx-sm'></i></button>
                            </div>
                        </div>
                        <div class="px-2 pb-4">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900 text-center"> ` + data['title'] + ` (` + data['year'] + `) </h5>
                        </div>
                    </div>`;
                });

                $('#movieCard').html(div);
    }

    function deleteMovie(movieID) {
        $.ajax({
            url: '/admin/movie/ajax',
            method: 'POST',
            data: {
                'deleteMovie': true,
                'movieID': movieID,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result) {
                loadMovies();
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

    $('#simple-search').on("keyup", function(){
        var searchMovies = $(this).val().trim();
        // alert(searchMovies);
        $.ajax({
            url: '/admin/movie/ajax',
            method: "POST",
            data: {
                "searchMovies": true,
                "query": searchMovies
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (result) {
                showMovies(result['movie']);
            },
            error: function (error) {
                alert("Oops something went wrong!");
            }
        });
    });

    document.getElementById("profile").onchange = function() {
        document.getElementById('profileImage').src = URL.createObjectURL(this.files[0]);
    };
    
    function sweetAlertDelete(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "py-2.5 px-4 bg-blue-500 text-white mx-1 rounded-lg",
                cancelButton: "py-2.5 px-4 bg-red-500 text-white mx-1 rounded-lg"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                deleteMovie(id);
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
    }
</script>

@include('partials.__footer')