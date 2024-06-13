<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
        * {
            font-family: 'Poppins', sans-serif;
        }

        .text-muda {
            color: #B0B0B0;
        }

        .text-tua{
            color: #686868;
        }

        .bg-muda {
            background-color: #B0B0B0;
        }

        .bg-tua{
            background-color: #686868;
        }

        .custom-hover:hover {
            color: #A6AFB0;
        }
        .custom-hover2:hover {
            color: #686868;
        }

        .hover-button:hover {
            background-color: #686868;
            border-radius: 1.5rem;
        }
        .hover-button-login:hover {
            background-color: #686868;
            border-radius: 0.5rem;
        }

        .bulet {
            border-radius: 1.5rem;
        }
        .border-tua{
            border: #686868;
        }

        .gambar-h{
            height: 45vh;
        }

        .gambar-w{
            width: 90vw;
        }
        .border-muda{
            border: #B0B0B0;
        }
        .trix-editor {
            min-height: 200px;
        }
        .jeje {
            color: #FB2576;
        }
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .border-show{
            border: 2px solid #686868;
        }
    </style>
    <title><?= $title ?? ''; ?></title>
</head>

<body class="bg-black">
    <?= $body ?? ''; ?>
</body>

</html>