@include('partials.__header', ['title' => 'Admin | Rotten Popcorn'])

<x-admin_navbar/>

<!-- CONTAINER -->
<div class="container relative p-10 mx-auto mt-24 rounded-lg overflow-auto border-4 border-white">

    <div class="flex flex-row items-center justify-center">
        <h3 class="text-3xl font-bold text-white">Edit Movie Info</h3>
    </div>

    <div class="grid grid-cols-2 gap-2 max-[1200px]:grid-cols-2 max-[600px]:grid-cols-1 w-full z-1 border-b-4 border-white py-8">

        <!-- Movie Poster -->
        <div class="flex flex-col items-center justify-center">

            <div class="items-center justify-center my-2 py-2">
                <img id="profileImage" src="./img/posters/<?php echo $movie[0]['poster'] ?>" alt="Movie Poster" class="w-60 h-90 mb-4">


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
                        <input type="text" value="<?php echo $movie[0]['title'] ?>" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="director" class="block mb-2 text-sm font-medium text-white">Movie Director</label>
                        <input type="text" value="<?php echo $movie[0]['director'] ?>" name="director" id="director" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                    <input type="hidden" name="movieID" value="<?php echo $movieID ?>">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="cast" class="block mb-2 text-sm font-medium text-white">Movie Cast</label>
                        <input type="text" value="<?php echo $movie[0]['cast'] ?>" name="cast" id="cast" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="year" class="block mb-2 text-sm font-medium text-white">Movie Year</label>
                        <input type="text" value="<?php echo $movie[0]['year'] ?>" name="year" id="year" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="genre" class="block mb-2 text-sm font-medium text-white">Movie Genre</label>
                        <input type="text" value="<?php echo $movie[0]['genre'] ?>" name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="synopsis" class="block mb-2 text-sm font-medium text-white">Synopsis</label>
                    <textarea id="synopsis" name="synopsis" rows="4" class="block p-2.5 w-full text-sm text-white bg-transparent rounded-lg border border-white focus:ring-blue-500 focus:border-blue-500 placeholder-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write a brief summary of the movie here..."><?php echo $movie[0]['synopsis'] ?></textarea>
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

@include('partials.__footer')