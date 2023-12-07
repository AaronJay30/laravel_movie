@include('partials.__header', ['title' => 'About Us | Rotten Popcorn'])

<style>
    .card {
        width: 400px;
        height: 350px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 10px;
        background-color: #fffffe;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease;
    }

    .card::before {
        content: "";
        width: 400px;
        height: 150px;
        position: absolute;
        top: 0;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom: 3px solid #fefefe;
        background: linear-gradient(40deg, rgba(255, 193, 0) 0%, rgba(255, 154, 0) 25%, rgba(255, 116, 0) 50%, rgba(255, 77, 0) 75%, rgba(255, 0, 0) 100%);

        transition: all 0.3s ease;
    }

    .card * {
        z-index: 1;
    }

    .image {
        width: 120px;
        height: 120px;
        background-color: #aa0000;
        border-radius: 50%;
        border: 4px solid #fefefe;
        margin-top: 30px;
        transition: all 0.5s ease;
    }

    .card-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        transition: all 0.5s ease;
    }

    .card-info span {
        font-weight: 600;
        font-size: 24px;
        color: #161A42;
        margin-top: 15px;
        line-height: 5px;
    }

    .card-info p {
        color: rgba(0, 0, 0, 0.5);
    }

    .button {
        text-decoration: none;
        background-color: #990000;
        color: white;
        padding: 5px 20px;
        border-radius: 5px;
        border: 1px solid white;
        transition: all 0.5s ease;
    }

    .card:hover {
        width: 350px;
        border-radius: 250px;
    }

    .card:hover::before {
        width: 350px;
        height: 350px;
        border-radius: 50%;
        border-bottom: none;
        transform: scale(0.95);
    }

    .card:hover .card-info {
        transform: translate(0%, -15%);
    }

    .button:hover {
        background-color: #cc0000;
        transform: scale(1.1);
    }
</style>

<x-navbar/>

<div class="container relative flex flex-col mx-auto mt-24 rounded-lg overflow-auto border-4 border-white w-full py-10">
    <h1 class="w-full text-center uppercase font-bold text-5xl text-white mb-6">ABOUT US</h1>

    <div class="flex flex-row flex-wrap justify-evenly items-center w-full border-y-2 py-8 gap-y-8">
        <div class="card group">
            <div class="image">
                <img src="{{asset('img/Arjay.png')}}" alt="" srcset="" class="rounded-full">
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
                <img src="{{asset('img/jayne(2).png')}}" alt="" class="rounded-full mt-4">
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
                <img src="{{asset('img/aaron.png')}}" alt="" class="rounded-full">
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