<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>@yield('title', 'APP | PlusPetrol')</title>

        <style>

            *
            {
                margin: 0; padding: 0;
            }

            body
            {
                background-color: rgb(194, 194, 194);
            }
        </style>

    </head>

    <body>

        <div class="signature-container">
            <img src="data:image/jpg;base64, {{base64_encode($new_image)}}">
        </div>

    </body>
</html>