<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-[#f8fafc]">
        <div class="flex justify-center items-center h-screen">
            <div class="w-[500px] h-[700px] bg-[#2563eb] rounded-3xl border border-white">
                <div class="flex justify-start items-start mt-10 ml-10">
                    <h1 class="text-white text-3xl font-semibold">Daftar Event</h1>
                </div>
                <div class="flex justify-start items-start mt-3 ml-10">
                    <h1 class="text-white text-xl font-semibold">Silahkan Lengkapi Data Diri Anda </h1>
                </div>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div class="flex justify-start items-start ml-10 mt-10">
                        <div class="flex flex-col">
                            <label for="name" class="text-white text-xl ml-5 font-semibold">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-[400px] h-[50px] border border-white mt-2 px-4 bg-white text-black outline-none focus:outline-none rounded-3xl"
                                placeholder="Nama Anda">
                        </div>
                    </div>
                    <div class="flex justify-start items-start ml-10 mt-5">
                        <div class="flex flex-col">
                            <label for="email" class="text-white text-xl ml-5 font-semibold">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-[400px] h-[50px] border border-white mt-2 px-4 bg-white text-black outline-none focus:outline-none rounded-3xl"
                                placeholder="Email Anda">
                        </div>
                    </div>
                    <div class="flex justify-start items-start ml-10 mt-5">
                        <div class="flex flex-col">
                            <label for="phone" class="text-white text-xl ml-5 font-semibold">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class="w-[400px] h-[50px] border border-white mt-2 px-4 bg-white text-black outline-none focus:outline-none rounded-3xl"
                                placeholder="Phone Anda">
                        </div>
                    </div>
                    <div class="flex justify-end items-end mt-20 mr-10">
                        <button type="submit"
                            class="w-[100px] h-[30px] border border-white mt-2 px-4 bg-white text-black outline-none focus:outline-none rounded-3xl">Daftar</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
</body>

</html>