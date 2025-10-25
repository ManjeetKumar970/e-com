<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 1;
            }
        }

        .container {
            text-align: center;
            color: white;
            z-index: 10;
            padding: 20px;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-code {
            font-size: 180px;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: glitch 3s infinite;
            position: relative;
        }

        @keyframes glitch {

            0%,
            90%,
            100% {
                transform: translate(0);
            }

            92% {
                transform: translate(-2px, 2px);
            }

            94% {
                transform: translate(2px, -2px);
            }

            96% {
                transform: translate(-2px, -2px);
            }
        }

        .error-message {
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 600;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .error-description {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-group {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background: white;
            color: #667eea;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
        }

        .astronaut {
            position: absolute;
            width: 150px;
            height: 150px;
            animation: float 6s ease-in-out infinite;
            right: 10%;
            top: 20%;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(5deg);
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 120px;
            }

            .error-message {
                font-size: 24px;
            }

            .error-description {
                font-size: 16px;
            }

            .astronaut {
                width: 100px;
                height: 100px;
                right: 5%;
                top: 10%;
            }
        }
    </style>
</head>

<body>
    <div class="stars" id="stars"></div>

    <div class="astronaut">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="80" r="40" fill="white" opacity="0.9" />
            <circle cx="90" cy="75" r="8" fill="#667eea" />
            <circle cx="110" cy="75" r="8" fill="#667eea" />
            <path d="M 85 90 Q 100 95 115 90" stroke="#667eea" stroke-width="3" fill="none" />
            <ellipse cx="100" cy="140" rx="35" ry="45" fill="white" opacity="0.9" />
            <rect x="70" y="120" width="15" height="50" fill="white" opacity="0.9" rx="5" />
            <rect x="115" y="120" width="15" height="50" fill="white" opacity="0.9" rx="5" />
        </svg>
    </div>

    <div class="container">
        <div class="error-code">404</div>
        <div class="error-message">Page Not Found</div>
        <div class="error-description">
            Oops! Looks like you've ventured into uncharted space. The page you're looking for doesn't exist or has been
            moved.
        </div>
        <div class="btn-group">
            <a href="/" class="btn btn-primary">Go Home</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
        </div>
    </div>

    <script>
        // Generate random stars
        const starsContainer = document.getElementById('stars');
        const starCount = 100;

        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 3 + 's';
            star.style.width = (Math.random() * 2 + 1) + 'px';
            star.style.height = star.style.width;
            starsContainer.appendChild(star);
        }

        // Add parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const astronaut = document.querySelector('.astronaut');
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            astronaut.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    </script>
</body>

</html>
