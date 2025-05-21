<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/supplime2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        rel="stylesheet"
    />
    <script
        src="https://kit.fontawesome.com/YOUR_FONT_AWESOME_KIT.js"
        crossorigin="anonymous"
    ></script>

    <title>Supplime</title>
</head>
<body>

{{$slot}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/supplime.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('welcome'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome',
                        text: '{{ session('welcome') }}',
                        showConfirmButton: true,
                        confirmButtonText: 'Thank You',
                        showCloseButton: true,
                        timer: 5000,
                        timerProgressBar: true,
                        position: 'center',
                    });
                </script>
            @endif
                
</body>
</html>
