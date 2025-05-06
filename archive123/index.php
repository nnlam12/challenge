<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Kingdom</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url('../backgrounds/fish_kingdom.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Karla', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.php" class="text-white text-3xl font-semibold  hover:text-gray-300">Fish Kingdom</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="#" data-url="home.php" class="menu-item flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-archway mr-3"></i>
                Entrance
            </a>
            <a href="#" data-url="tables.php" class="menu-item flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-utensils mr-3"></i>
                Dinning Hall
            </a>
            <a href="#" data-url="tower.php" class="menu-item flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-vihara mr-3"></i>
                Tower
            </a>
            <a href="#" data-url="bank.php" class="menu-item flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-money-check-alt mr-3"></i>
                Bank
            </a>
            <a href="#" data-url="prison.php" class="menu-item flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-lock mr-3"></i>
                Prison
            </a>
        </nav>

    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        

    <!-- Mobile Header & Nav -->
    

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div id="dynamic-content">
                    <!-- Nội dung sẽ được thay thế tại đây -->
                </div>

                <!-- Content goes here! -->
            </main>

            
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // Bắt sự kiện khi nhấn vào menu
            $('.menu-item').click(function (e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định

                // Lấy URL từ thuộc tính data-url
                let url = $(this).data('url');

                // Gửi AJAX để tải nội dung
                $.ajax({
                    url: url, // Tệp PHP xử lý nội dung
                    method: 'GET',
                    success: function (data) {
                        // Thay thế nội dung trong div
                        $('#dynamic-content').html(data);
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi tải nội dung.');
                    }
                });
            });
        });
    </script>
</body>

</html>