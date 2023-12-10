@include('partials.__header', ['title' => 'Contact Us | Rotten Popcorn'])

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

    .sendBtn {
        padding: 0.8em 1.8em;
        border: 2px solid #ff1100;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        background-color: transparent;
        text-align: center;
        text-transform: uppercase;
        font-size: 16px;
        transition: .3s;
        z-index: 1;
        font-family: inherit;
        color: #ff1100;
    }

    .sendBtn::before {
        content: '';
        width: 0;
        height: 300%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
        background: #cc0000;
        transition: .5s ease;
        display: block;
        z-index: -1;
    }

    .sendBtn:hover::before {
        width: 105%;
    }

    .sendBtn:hover {
        color: white;
    }
</style>

<x-navbar/>

<div class="container relative flex flex-col mx-auto mt-24 rounded-lg overflow-auto border-4 border-white w-full py-10">
    <h1 class="w-full text-center uppercase font-bold text-5xl text-white">CONTACT US</h1>

    <p class="text-lg w-full text-center text-white pb-6">Feel free to contact us any time. We will get back to you as soon as we can!</p>

    <div class="grid grid-cols-2 max-[1000px]:grid-cols-1 px-20 max-[1000px]:px-4 gap-4 border-t-2 border-white pt-4">
        <div class="px-10 flex flex-col">
            <form>
                <div class="form-control w-full">
                    <input type="email" class="focus:ring-0" required="">
                    <label>
                        <span style="transition-delay:0ms">E</span><span style="transition-delay:50ms">m</span><span style="transition-delay:100ms">a</span><span style="transition-delay:150ms">i</span><span style="transition-delay:200ms">l</span>
                    </label>
                </div>
                <div class="form-control w-full">
                    <input type="text" class="focus:ring-0" required="">
                    <label>
                        <span style="transition-delay:0ms">F</span><span style="transition-delay:50ms">u</span><span style="transition-delay:100ms">l</span><span style="transition-delay:150ms">l</span><span style="transition-delay:200ms">n</span><span style="transition-delay:250ms">a</span><span style="transition-delay:300ms">m</span><span style="transition-delay:350ms">e</span>
                    </label>
                </div>
                <div class="w-full">
                    <label for="message" class="block mb-2 font-medium text-white text-xl">Your message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-white bg-red-900/100 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 text-xl" placeholder="Write your thoughts here..."></textarea>

                </div>

                <div class="w-full pt-4 flex justify-end">
                    <button class="sendBtn"> Send message </button>
                </div>
            </form>
        </div>
        <div class="px-10 flex flex-col py-16 gap-10 my-auto">
            <div class="w-full flex flex-row items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                    <path fill="#fff" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z" />
                </svg>
                <h1 class="text-white text-xl font-medium">CLSU, Science City of Munoz Nueva Ecija</h1>
            </div>
            <div class="w-full flex flex-row items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                    <path fill="#fff" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z" />
                </svg>
                <h1 class="text-white text-xl font-medium">rotten_popcorn@gmail.com</h1>
            </div>
            <div class="w-full flex flex-row items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                    <path fill="white" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02l-2.2 2.2z" />
                </svg>
                <h1 class="text-white text-xl font-medium">+63 - 9123456789</h1>
            </div>
        </div>
    </div>
</div>