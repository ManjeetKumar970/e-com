{{-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="vendors/images/deskapp-logo.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div>  --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .pre-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .pre-loader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .pre-loader-box {
            text-align: center;
            position: relative;
        }

        .loader-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        .logo-container {
            width: 100%;
            height: 100%;
            background: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .logo-container::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f7dc6f);
            border-radius: 22px;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }

        .t-logo {
            position: relative;
            width: 70px;
            height: 70px;
        }

        .t-top {
            width: 60px;
            height: 12px;
            background: #ff6b35;
            border-radius: 10px;
            position: absolute;
            top: 8px;
            left: 5px;
            animation: pulse 2s ease-in-out infinite;
        }

        .t-body {
            width: 12px;
            height: 50px;
            background: #0056a3;
            border-radius: 0 0 10px 10px;
            position: absolute;
            top: 20px;
            left: 29px;
        }

        .loader-progress {
            width: 250px;
            height: 6px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            overflow: hidden;
            margin: 20px auto;
            backdrop-filter: blur(10px);
        }

        .bar {
            height: 100%;
            background: linear-gradient(90deg, #fff, #f7dc6f);
            border-radius: 10px;
            width: 0%;
            animation: loading 2.5s ease-in-out infinite;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        .percent {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin: 15px 0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .loading-text {
            color: white;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 2px;
            margin-top: 10px;
            opacity: 0.9;
            animation: fade 1.5s ease-in-out infinite;
        }

        .dots {
            display: inline-block;
            width: 20px;
            text-align: left;
        }

        @keyframes loading {
            0% {
                width: 0%;
            }
            50% {
                width: 100%;
            }
            100% {
                width: 100%;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scaleX(1);
            }
            50% {
                transform: scaleX(1.05);
            }
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fade {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Demo content after loading */
        .content {
            display: none;
            padding: 50px;
            text-align: center;
        }

        .content.show {
            display: block;
        }

        .content h1 {
            color: #333;
            font-size: 48px;
            margin-bottom: 20px;
        }

        .content p {
            color: #666;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="pre-loader" id="preloader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <div class="logo-container">
                    <div class="t-logo">
                        <div class="t-top"></div>
                        <div class="t-body"></div>
                    </div>
                </div>
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">
                Loading<span class="dots" id="dots"></span>
            </div>
        </div>
    </div>
    <script>
        let progress = 0;
        const percentElement = document.getElementById('percent1');
        const barElement = document.getElementById('bar1');
        const preloader = document.getElementById('preloader');
        const content = document.getElementById('content');
        const dotsElement = document.getElementById('dots');
        
        // Animated dots
        let dotCount = 0;
        setInterval(() => {
            dotCount = (dotCount + 1) % 4;
            dotsElement.textContent = '.'.repeat(dotCount);
        }, 500);

        // Progress loading
        const loadingInterval = setInterval(() => {
            if (progress < 100) {
                progress += Math.random() * 15;
                if (progress > 100) progress = 100;
                
                percentElement.textContent = Math.floor(progress) + '%';
                barElement.style.width = progress + '%';
            } else {
                clearInterval(loadingInterval);
                
                // Fade out preloader
                setTimeout(() => {
                    preloader.classList.add('fade-out');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                        content.classList.add('show');
                    }, 500);
                }, 300);
            }
        }, 100);
    </script>
</body>
</html>