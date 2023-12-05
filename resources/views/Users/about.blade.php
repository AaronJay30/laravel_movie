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

<div class="container relative flex flex-col mx-auto mt-24 rounded-lg overflow-auto border-4 border-white w-full py-10">
    <h1 class="w-full text-center uppercase font-bold text-5xl text-white mb-6">ABOUT US</h1>

    <div class="flex flex-row flex-wrap justify-evenly items-center w-full border-y-2 py-8 gap-y-8">
        <div class="card group">
            <div class="image">
                <img src="img/Arjay.png" alt="" srcset="" class="rounded-full">
            </div>
            <div class="card-info">
                <span class="group-hover:text-white duration-100">Arjay Hagid</span>
                <p class="group-hover:text-white duration-100">Support Specialist</p>
            </div>
            <a class="button group-hover:text-white" href="#">Folow</a>

            <div class="flex flex-row flex-wrap z-10 gap-4">
                <i class='bx bxl-facebook text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-discord-alt text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-github text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
            </div>

        </div>
        <div class="card group">
            <div class="image">
                <img src="img/jayne(2).png" alt="" class="rounded-full mt-4">
            </div>
            <div class="card-info">
                <span class="group-hover:text-white duration-100">Jayne Vernice Ramos</span>
                <p class="group-hover:text-white duration-100">Support Specialist</p>
            </div>
            <a class="button group-hover:text-white" href="#">Folow</a>

            <div class="flex flex-row flex-wrap z-10 gap-4">
                <i class='bx bxl-facebook text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-discord-alt text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-github text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
            </div>

        </div>
        <div class="card group">
            <div class="image">
                <img src="img/aaron.png" alt="" class="rounded-full">
            </div>
            <div class="card-info">
                <span class="group-hover:text-white duration-100">Aaron Jay Gabato</span>
                <p class="group-hover:text-white duration-100">Support Specialist</p>
            </div>
            <a class="button group-hover:text-white" href="#">Folow</a>

            <div class="flex flex-row flex-wrap z-10 gap-4">
                <i class='bx bxl-facebook text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-discord-alt text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
                <i class='bx bxl-github text-3xl group-hover:text-white duration-100 hover:scale-110 cursor-pointer'></i>
            </div>

        </div>
    </div>

    <div class="flex flex-col gap-y-4 w-full px-20 py-10">
        <p class="text-xl text-white w-full text-justify">Welcome to RottenPopcorn, your go-to destination for the latest and most comprehensive movie reviews. At RottenPopcorn, we are passionate about all things cinema, and our dedicated team of film enthusiasts is committed to providing insightful and honest reviews that guide you through the diverse world of movies. Whether you're a casual moviegoer or a dedicated cinephile, our user-friendly website offers a curated selection of reviews spanning various genres, from blockbuster hits to indie gems. Navigate our site to discover expert critiques, ratings, and recommendations that will help you make informed decisions about your next movie night. Join our vibrant community, engage in discussions, and stay up-to-date with the latest film releases. RottenPopcorn is your trusted companion in exploring the magic of the silver screen.</p>
    </div>
</div>


@include('partials.__footer')