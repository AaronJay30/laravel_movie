@include('partials.__header', ['title' => $movie->title . ' | Rotten Popcorn'])

<x-navbar/>

<style>
    body {
            width: 100vw;
            overflow-x: hidden;
            background-image: url("/img/bg-image.jpg");
            background-size: cover;
            font-family: 'Gabarito', sans-serif;
        }
</style>

<div class="container relative flex flex-col mx-auto mt-24 rounded-lg overflow-auto border-4 border-white">
    <div class="w-full h-auto">
        <div class="relative h-[500px] overflow-hidden">
            <img src="{{asset('img/posters/'.$movie->poster)}}" class="absolute w-full -translate-x-1/2 -translate-y-1/3 top-1/2 left-1/2" alt="...">
        </div>
        <div class="relative p-10 w-full flex flex-col border-t-4 border-white mt-4 border-dotted">
            <div class="flex-row flex flex-wrap justify-between items-center gap-y-10 border-b-2 pb-8">
                <div class="flex flex-col justify-center">
                    <h1 class="text-5xl font-bold uppercase text-white">{{$movie->title}}</h1>
                    <div class="text-gray-400 text-lg">
                        <span>{{$movie->year}} - {{$movie->genre}}</span>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-center gap-x-8 flex-wrap">
                    <div class="flex flex-col gap-y-2 items-center justify-center">
                        <h1 class="text-xl font-bold uppercase text-gray-400">POPCORN RATING</h1>
                        <div class="flex flex-row items-center justify-center gap-4">
                            <img src="{{asset('img/popcorn.png')}}" class="w-10"> </img>
                            <span class="text-white text-3xl">{{$movie->average_rating}}%</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-2 items-center justify-center">
                        <h1 class="text-xl font-bold uppercase text-gray-400">REVIEW COUNT</h1>
                        <div class="flex flex-row items-center justify-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 32 32">
                                <path fill="#fff" d="m16 8l1.912 3.703l4.088.594L19 15l1 4l-4-2.25L12 19l1-4l-3-2.703l4.2-.594L16 8z" />
                                <path fill="#fff" d="M17.736 30L16 29l4-7h6a1.997 1.997 0 0 0 2-2V8a1.997 1.997 0 0 0-2-2H6a1.997 1.997 0 0 0-2 2v12a1.997 1.997 0 0 0 2 2h9v2H6a4 4 0 0 1-4-4V8a3.999 3.999 0 0 1 4-4h20a3.999 3.999 0 0 1 4 4v12a4 4 0 0 1-4 4h-4.835Z" />
                            </svg>
                            <span class="text-white text-3xl">{{$movie->total_review_count}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-4 w-full ">

                <!-- Synopsis -->
                <div class="synopsis flex flex-col gap-y-4 border-b-2 pb-8">
                    <h1 class="text-2xl font-semibold text-white">Synopsis</h1>
                    <p class="text-justify text-gray-400 font-medium text-lg" style="text-indent: 50px;">{{$movie->synopsis}}</p>
                </div>

                <!-- Person -->
                <div class="flex flex-col border-b-2 pb-8">
                    <div class="director flex flex-row gap-x-4 items-center mt-4">
                        <h1 class="font-bold text-2xl text-white">Director: </h1>
                        <span class="text-gray-300 text-lg">{{$movie->director}}</span>
                    </div>
                    <div class="director flex flex-row gap-x-4 items-center mt-4">
                        <h1 class="font-bold text-2xl text-white">Cast: </h1>
                        <span class="text-gray-300 text-lg">{{$movie->cast}}</span>
                    </div>

                </div>

                <!-- Leave a comment -->
                @auth
                    @if(!$review->contains('userID', Auth::user()->userID))
                        <div class="flex flex-col mt-4 gap-y-4 border-b-2 pb-8" id="con1">
                            <h1 class="text-2xl font-bold text-white">Leave a review</h1>

                            <form id="reviewForm">
                                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-transparent ">
                                    <div class="px-4 py-2  rounded-t-lg bg-gray-300">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" name="review" rows="4" class="w-full px-0 text-sm text-gray-900 bg-gray-300/20 border-0 focus:ring-0 placeholder-gray-600" placeholder="Write a comment..." required></textarea>
                                    </div>
                                    <input type="hidden" name="movieID" value="{{$movie->movieID}}">
                                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                        <div class="flex flex-row gap-4">
                                            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-900 hover:bg-red-800">
                                                Post review
                                            </button>
                                            <img class="w-10 h-10 p-1 rounded-full bg-white" src="{{asset('img/profile/'. Auth::user()->profile_picture)}}" alt="Bordered avatar">
                                        </div>
                                        <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                                            <div class="rating">
                                                <label>
                                                    <input type="radio" name="stars" required value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" required value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" required value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" required value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" required value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                    <div class="w-full text-center text-xl mt-10 text-white" id="con2">Thank you for providing your review of the movie. Your feedback is greatly appreciated! 😊 </div>
                    @endif
                @else
                    <div class="w-full text-center text-xl mt-8 text-white">To leave a comment, you are required to <a href="{{route('users.index')}}" class="text-red-400 hover:underline">login</a> to your account. </div>
                @endauth

                <div class="w-full mt-4 ">
                    <h1 class="text-2xl font-bold text-white">Ratings</h1>
                
                    @for ($rating = 5; $rating >= 1; $rating--)
                        <div class="flex items-center mt-4 w-full">
                            <a href="#" class="text-lg font-medium text-white hover:underline">{{ $rating }} star</a>
                            <div class="flex-1 h-5 mx-4 bg-gray-500 rounded">
                                @if ($totalReviewCount > 0)
                                    <div class="h-5 bg-yellow-300 rounded" style="width: {{ ($ratingsCount[$rating] / $totalReviewCount) * 100 }}%;"></div>
                                @else
                                    <div class="h-5 bg-yellow-300 rounded" style="width: 0;"></div>
                                @endif
                            </div>
                            <span class="text-lg font-medium text-white">
                                @if ($totalReviewCount > 0)
                                    {{ number_format(($ratingsCount[$rating] / $totalReviewCount) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </span>
                        </div>
                    @endfor
                </div>
                

                <div class="mt-10 gap-y-4 max-h-[800px] overflow-y-auto divide-y">
                    <h1 class="text-2xl font-bold text-white col-span-2 mb-4">Reviews</h1>
                    <div class="grid grid-cols-2 gap-x-8" id="reviewSection">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
            </article>`
        });

        $('#reviewSection').html(div);
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

    $("#reviewForm").on("submit", function(e) {
        e.preventDefault();
        var datas = $(this).serializeArray();
        var datas_array = {};
        $.map(datas, function(data, cnt) {
            datas_array[data['name']] = data['value'];
        });

        const goodSubjects = [
            "Good plot twist, Unpredictable!",
            "Outstanding cinematography and editing",
            "MOVIE OF THE YEAR!",
            "BEST ACTOOOR!",
            "The director is witty",
            "Amazing soundtrack and vfx!",
            "Best movie ever!",
            "Family Moviiiee!!",
            "Great Character Development",
            "Best in Humooor!"
        ];

        const badSubjects = [
            "Terrible ending!",
            "The female lead is a whore!!",
            "So fucking bad! like bad bad!",
            "OVERRATEEED!",
            "NO BRAINER MOVIE!",
            "Cheesy Dialogue",
            "TRASHHH!!",
            "MEEOW MEEOW!",
            "Actors are bad!",
            "WEEEEEE! WEEEEEE!"
        ];

        const stars = datas_array['stars'];
        const reviewSubject = stars > 3 ? getRandomItem(goodSubjects) : getRandomItem(badSubjects);

        datas_array['review_subject'] = reviewSubject;
        datas_array['userID'] = {{Auth::user()->userID}};

        // console.log(datas_array);

        $.ajax({
            url: "/review/ajax",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                "addReview": true,
                "datas": datas_array
            },
            success: function(result) {
                // console.log(result);
                loadReview();
                $("#reviewForm")[0].reset();
                $('#con1').hide();
                $('#con2').show();

            },
            error: function(error) {
                console.log(error);
                alert("Oops, something went wrong");
            }
        })

        // location.reload();
        // console.log(datas)
    })


    function getRandomItem(array) {
        const randomIndex = Math.floor(Math.random() * array.length);
        return array[randomIndex];
    }
   
</script>


@include('partials.__footer')