<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties List</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container mt-5">
        @include('admin.admin_header')
        <h1 class="mb-4 text-center">Admin Dashboard</h1>
        <div class="flex justify-evenly flex-wrap gap-y-4">
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 users">
                <div><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people-fill w-24"
                        viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">Users</a>
                    <p class="text-sm">{{ $user_count }}</p>
                </div>
            </div>
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 user_posts">
                <div><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-post w-24"
                        viewBox="0 0 16 16">
                        <path
                            d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z" />
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">User Posts</a>
                    <p class="text-sm">{{ $post_count }}</p>
                </div>
            </div>
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 transactions">
                <div><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-receipt-cutoff w-24"
                        viewBox="0 0 16 16">
                        <path
                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        <path
                            d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">transactions</a>
                    <p class="text-sm">{{ $tran_count }}</p>
                </div>
            </div>
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 properties">
                <div><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-door-fill w-24"
                        viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">Properties</a>
                    <p class="text-sm">{{ $property_count }}</p>
                </div>
            </div>
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 townships">
                <div><svg fill="#000000" class="w-24" viewBox="0 0 15 15" id="town" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.651,7.121a.251.251,0,0,0-.314,0L8.092,8.929A.247.247,0,0,0,8,9.122v4.625A.253.253,0,0,0,8.253,14H9.747A.253.253,0,0,0,10,13.747h0V12h1v1.747a.253.253,0,0,0,.253.253h1.494A.253.253,0,0,0,13,13.747h0V9.12a.25.25,0,0,0-.094-.2ZM10,11H9V10h1Zm2,0H11V10h1ZM5.71,1.815a.252.252,0,0,0-.42,0L2.042,5.936A.252.252,0,0,0,2,6.076v7.671A.252.252,0,0,0,2.251,14h2.5A.252.252,0,0,0,5,13.748V12H6v1.748A.252.252,0,0,0,6.252,14H7V8a.5.5,0,0,1,.188-.391L9,6C9,5.95,5.71,1.815,5.71,1.815ZM4,10H3V9H4ZM4,7H3V6H4Zm2,3H5V9H6ZM6,7H5V6H6Z" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">Townships</a>
                    <p class="text-sm">{{ $town_count }}</p>
                </div>
            </div>
            <div
                class="w-[28%] min-h-36 bg-white border-gray-400 border rounded-lg flex items-center justify-center gap-x-8 regions">
                <div><svg class="w-24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22 12V5H10V2H2v10.748c.465.152.754.909 1.582 1.252 1.53.635 2.904-1.013 3.351-1.333.805-.577 1.272 2.283 2.067 2.226 1.807-.128 2.236.182 2.293.77a2.26 2.26 0 0 0 1.803 2.133 2.289 2.289 0 0 1 1.676.98c.384.496 2.562.114 2.873 1.683a2 2 0 0 0 1.684 1.513 4.97 4.97 0 0 0 1.665-.096c.014-.014 0-7.876 0-7.876H19v-2zm-15.648-.146c-.097.069-.23.184-.39.328a3.07 3.07 0 0 1-1.665.962.849.849 0 0 1-.332-.068 1.936 1.936 0 0 1-.652-.535A5.462 5.462 0 0 0 3 12.22V3h6v3h4v3H7v2.614a1.365 1.365 0 0 0-.648.24zM20 15v5.998l-.178.002a2.668 2.668 0 0 1-.31-.011 1.025 1.025 0 0 1-.887-.725c-.334-1.687-1.92-1.99-2.774-2.154a7.544 7.544 0 0 1-.378-.078 3.282 3.282 0 0 0-2.188-1.218 1.23 1.23 0 0 1-.997-1.247c-.166-1.702-1.968-1.702-2.56-1.702a10 10 0 0 0-.479.012c-.103-.168-.23-.427-.316-.601A4.028 4.028 0 0 0 8 11.896V10h7v5zm-2-4v3h-2V9h-2V6h7v5z" />
                        <path fill="none" d="M0 0h24v24H0z" />
                    </svg></div>
                <div class="text-lg font-bold flex justify-center flex-col items-center">
                    <a href="" class=" inline-block no-underline text-black">Regions</a>
                    <p class="text-sm">{{ $region_count }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>