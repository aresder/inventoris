<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-[#ffffff] relative">
    <div
        class="relative before:bg-gradient-to-t before:from-[#f8f5ed] before:to-transparent before:absolute before:w-full before:-z-50 before:h-[750px] background" />

    <x-nav-bar />

    <main class="z-10 pb-52">
        <div class="pt-16 pb-10">
            <div class="container mx-auto px-8">
                <div class="flex flex-col gap-y-6 justify-center items-center px-8 text-balance text-center">
                    <h1 class="md:w-[900px] text-3xl md:text-5xl font-bold tracking-tight leading-tight">Streamline
                        Your
                        Stock with
                        <span class="text-[#ff2222]">Next Level</span> Inventory Management
                    </h1>
                    <p class="md:w-[700px] md:text-base text-sm ">Optimalkan pengelolaan stok Anda dengan
                        solusi
                        manajemen
                        inventaris
                        canggih yang
                        mempermudah
                        tracking, efisiensi, dan kontrol bisnis secara real-time.</p>
                    <img src="images/hero-image.png" alt="Hero Image" width="500">
                </div>
            </div>
        </div>

        <div
            class="relative s before:bg-gradient-to-b before:from-[#f8f5ed] before:absolute before:w-full before:h before:-z-50 before:h-[750px]">
            <div id="features" class="container mx-auto px-8 py-44">
                <div class="flex flex-col justify-center items-center gap-y-20">
                    <div>
                        <h1 class="text-center text-3xl font-semibold">Features</h1>
                    </div>
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1  gap-10">
                        @foreach ($data as $row)
                            <div
                                class="relative overflow-hidden border border-slate-500 rounded-lg p-10 w-[300px] space-y-5 bg-transparent hover:bg-red-500 hover:border-red-500 hover:text-white transition-colors duration-300">
                                <h3 class="text-xl font-semibold">{{ $row['title'] }}</h3>
                                <p class="text-sm text-balance">{{ $row['desc'] }}</p>
                                <img src="{{ $row['img'] }}" alt="image"
                                    class="absolute w-[100px] right-0 bottom-0 opacity-50">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="absolute bottom-0 w-full">
        <div class="bg-slate-900 p-10 text-white z-10">
            <div class="container mx-auto grid grid-cols-2 gap-x-10">
                <div class="space-y-4">
                    <h3 class="text-3xl font-bold">Inventaris</h3>
                    <p class="text-xs text-balance">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Incidunt
                        impedit ipsam
                        dolorum iusto
                        animi
                        fugit quia odit dolores soluta laboriosam, fuga quidem quas voluptates, sequi quam eum.
                        Dolorem,
                        beatae
                        ullam?</p>
                </div>
                <div class="flex">
                    <div class="flex flex-col items-start justify-center w-3/4 mx-auto gap-y-4">
                        <h1 class="text-xl font-bold">Site Links</h1>
                        <a href="#" class="text-sm hover:underline underline-offset-4">Home</a>
                        <a href="#/features" class="text-sm hover:underline underline-offset-4">Features</a>
                    </div>
                    <div class="flex flex-col items-start justify-center w-3/4 mx-auto gap-y-4">
                        <h1 class="text-xl font-bold">Contact Us</h1>
                        <a href="#" class="text-sm hover:underline underline-offset-4">Whatsapp</a>
                        <a href="#" class="text-sm hover:underline underline-offset-4">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="fixed bottom-0 right-0 m-10 z-10">
        <button id="top-arrow"
            class="text-white border border-slate-500 bg-slate-800 px-4 py-2 rounded-lg text-center translate-y-2/4 transition-all duration-300">&UpArrow;</button>
    </div>

    <script>
        const top_arrow = document.getElementById("top-arrow")
        top_arrow.classList.add("opacity-0", "pointer-events-none")

        document.addEventListener("scroll", (ev) => {
            const scrollY = window.scrollY
            const home = document.getElementById("home")
            const feat = document.getElementById("feat")

            if (scrollY <= 650) {
                home.classList.add("text-red-500")
                feat.classList.remove("text-red-500")
                top_arrow.classList.add("opacity-0", "pointer-events-none")
                top_arrow.classList.remove("opacity-100")
            } else if (scrollY >= 650) {
                top_arrow.classList.remove("opacity-0", "pointer-events-none")
                top_arrow.classList.remove("opacity-100")
                home.classList.remove("text-red-500")
                feat.classList.add("text-red-500")
            }
        })

        top_arrow.addEventListener("click", () => {
            window.scrollTo({
                top: 0
            });
        });
    </script>
</body>

</html>
