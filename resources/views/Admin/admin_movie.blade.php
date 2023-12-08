@include('partials.__header', ['title' => 'Admin | Rotten Popcorn'])

<x-admin_navbar/>

<style>
    body {
            width: 100vw;
            overflow-x: hidden;
            background-image: url("/img/bg-image.jpg");
            background-size: cover;
            font-family: 'Gabarito', sans-serif;
        }
</style>

<!-- CONTAINER -->
<div class="container relative p-10 mx-auto mt-24 rounded-lg overflow-auto border-4 border-white">

    <div class="flex flex-row items-center justify-center">
        <h3 class="text-3xl font-bold text-white">Edit Movie Info</h3>
    </div>

    <div class="grid grid-cols-2 gap-2 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 w-full z-1 border-b-4 border-white py-8">

        <!-- Movie Poster -->
        <div class="flex flex-col items-center justify-center">

            <div class="items-center justify-center my-2 py-2">
                <img id="profileImage" src="{{ asset('img/posters/'. $movie['poster']) }}" alt="Movie Poster" class="w-60 h-90 mb-4">


                <label for="profile" class="flex flex-col gap-y-4 justify-center items-center w-full">
                    <h1 class="px-4 text-center py-2.5 rounded-xl bg-blue-700 cursor-pointer text-white hover:bg-blue-900 duration-200 w-full">Change Poster</h1>
                </label>

                <input type="file" id="profile" name="file" class="hidden" form="updateMovieForm">
            </div>
        </div>

        <!-- Movie Information -->
        <div class="flex items-center justify-center w-full">
            <form class="w-full" id="updateMovieForm" action='admin_movie.php' id="updateMovieForm" method="POST" enctype="multipart/form-data">
                <div class="flex flex-row items-center justify-center">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="title" class="block mb-2 text-sm font-medium text-white">Movie Title</label>
                        <input type="text" value="{{ $movie['title'] }}" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="director" class="block mb-2 text-sm font-medium text-white">Movie Director</label>
                        <input type="text" value="{{ $movie['director'] }}" name="director" id="director" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                    <input type="hidden" name="movieID" value="{{ $movie['movieID'] }}">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="cast" class="block mb-2 text-sm font-medium text-white">Movie Cast</label>
                        <input type="text" value="{{ $movie['cast'] }}" name="cast" id="cast" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="year" class="block mb-2 text-sm font-medium text-white">Movie Year</label>
                        <input type="text" value="{{ $movie['year'] }}" name="year" id="year" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="genre" class="block mb-2 text-sm font-medium text-white">Movie Genre</label>
                        <input type="text" value="{{ $movie['genre'] }}" name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="synopsis" class="block mb-2 text-sm font-medium text-white">Synopsis</label>
                    <textarea id="synopsis" name="synopsis" rows="4" class="block p-2.5 w-full text-sm text-white bg-transparent rounded-lg border border-white focus:ring-blue-500 focus:border-blue-500 placeholder-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write a brief summary of the movie here...">{{ $movie['synopsis'] }}</textarea>
                </div>

                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

            </form>
        </div>
    </div>


    <div class="mt-10 gap-y-4 max-h-[800px] overflow-y-auto">
        <h1 class="text-3xl font-bold text-white col-span-2 mb-4 text-center">Reviews</h1>
        <div class="grid grid-cols-2 gap-x-8" id="reviewSection">

        </div>
    </div>

</div>

<script>
    document.getElementById("profile").onchange = function() {
        document.getElementById('profileImage').src = URL.createObjectURL(this.files[0]);
    };

    $(document).ready(function() {
        loadReview();
    });

    function showReview(result){
        var datas = result;
        var div = ``;

        datas.forEach(function(data) {
            const inputDate = new Date(data['user']['created_at']);
            const reviewDate = new Date(data['user']['review_date']);
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            };
            const formattedDate = new Intl.DateTimeFormat('en-US', options).format(inputDate);
            const reviewFormattedDate = new Intl.DateTimeFormat('en-US', options).format(inputDate);


            // Dynamically generate star icons based on the 'rating' value
            const rating = data['rating'];
            let stars = '';
            for (let i = 0; i < 5; i++) {
                if (i < rating) {
                    stars += `<svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>`;
                } else {
                    stars += `<svg class="w-4 h-4 text-gray-300 dark:text-gray-500 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>`;
                }
            }


            div += `<article class="py-4 border-b">
                        <div class="flex items-center mb-4 space-x-4">` ;

                            
            div += `<img class="w-10 h-10 rounded-full" src="{{asset('img/profile/${data.user.profile_picture}')}}" alt="">`;



            div +=  `<div class="space-y-1 font-medium text-white">
                        <p>` + data['user']['username'] + `<time datetime="2014-08-16 19:00" class="block text-sm text-gray-400">Joined on ` + formattedDate + `</time></p>
                    </div>
                </div>
                <div class="flex items-center mb-1">
                    ` + stars + `
                    <h3 class="ml-2 text-sm font-semibold text-white">` + data['review_subject'] + `</h3>
                </div>
                <footer class="mb-5 text-sm text-gray-400">
                    <p>Reviewed on <time datetime="2017-03-03 19:00">` + reviewFormattedDate + `</time></p>
                </footer>
                <p class="mb-2 text-gray-400 text-justify">` + data['review_text'] + `</p>

                <button onclick="sweetAlertHide(` + data['reviewID'] + `)" class='bg-red-500 hover:bg-red-700 duration-200 text-white px-4 py-1 rounded-xl'> Hide </button>

            </article>`
        });

        $('#reviewSection').html(div);
    }

    function sweetAlertHide(id) {

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
            confirmButtonText: "Yes, hide it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Hidden!",
                    text: "Your file has been hidden.",
                    icon: "success"
                });
                hideReview(id);
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

    function hideReview(reviewID) {
        $.ajax({
            url: '/review/ajax',
            method: 'POST',
            data: {
                'hideReview': true,
                'reviewID': reviewID,
            },
            success: function(result) {
                loadReviews();
            },
            error: function(error) {
                console.log(error)
            }
        });
    }


    function loadReview(){
        $.ajax({
            url: "/review/ajax",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'showReview': true,
                'movieID': {{$movieID}},
            },
            success: function(result) {
                showReview(result['review']);
                // console.log(result['review']);
            },
            error: function(error) {
                alert("Oops something went wrong!");
            }
        })
    }
    
</script>

@include('partials.__footer')