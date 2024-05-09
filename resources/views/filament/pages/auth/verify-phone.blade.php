<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Phone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Verify Your Phone</h1>
        <p id="timer" class="text-center">1:00</p>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
        <form action="{{ route('verify-phone.submit') }}" method="POST" class="mx-auto">
            @csrf
            <div class="form-group">
                <label for="verification_code">Verification Code:</label>
                <input type="text" id="verification_code" name="verification_code" class="form-control" required>
                <input type="hidden" id="phone" name="phone" value="{{$phone}}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Verify Phone</button>
        </form>
        <div class="text-center mt-3">
            <button onclick="resendCode()" class="btn btn-link">Didn't receive the code? Click here to resend</button>
        </div>
    </div>

    <script>

function setCookie(name, value, expSec) {
    var d = new Date();
    d.setTime(d.getTime() + (expSec * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}


function getCookie(name) {
    var name = name + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        setCookie('timer', timer - 1, timer - 1); // Atualizar cookie a cada segundo

        if (--timer < 0) {
            clearInterval(interval);
            display.textContent = "Expired";
            document.cookie = "timer=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    }, 1000);
}

window.onload = function () {
    var display = document.querySelector('#timer');
    var remainingTime = getCookie('timer');
    if (remainingTime && parseInt(remainingTime) > 0) {
        startTimer(parseInt(remainingTime), display);
    } else {
        // Assegure-se de que o cookie seja limpo se não houver tempo restante válido
        document.cookie = "timer=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        startTimer(60, display); // Recomeçar com 60 segundos apenas se não houver cookie válido
    }
};
        function resendCode() {
            var phone = document.getElementById('phone').value;
            var url = "{{ route('verify-phone.resend') }}";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone: phone })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                // Resetando o temporizador
                setCookie('timer', '', -1); // Limpar o cookie
                var display = document.querySelector('#timer');
                startTimer(60, display); // Reiniciar o temporizador
            })
            .catch(error => console.error('Error:', error));
        }

</script>
</body>
</html>
