<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login/Register Slider</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  @include('../partials.head')
  <style>
    

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      background-attachment: fixed;
    }

    .container {
 
      width: 750px;
      height: 500px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
      position: relative;
      transition: all 0.5s ease;
    }

    .container:hover {
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .form-container {
      display: flex;
      width: 200%;
      height: 100%;
      transition: transform 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-box {
      width: 50%;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

   

    .input-group {
      position: relative;
      margin: 15px 0;
    }

    input {
      width: 100%;
      margin: 2px 0;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      font-size: 16px;
      transition: all 0.3s ease;
      background: rgba(255,255,255,0.9);
    }

    input:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
      outline: none;
    }

    label {
      position: absolute;
      left: 20px;
      top: 15px;
      color: #999;
      font-size: 16px;
      transition: all 0.3s ease;
      pointer-events: none;
      background: rgba(255,255,255,0.9);
      padding: 0 5px;
    }

    input:focus + label,
    input:not(:placeholder-shown) + label {
      top: -10px;
      font-size: 12px;
      color: #667eea;
      background: white;
    }

    button {
      padding: 15px;
      background: linear-gradient(to right, #667eea, #764ba2);
      color: #fff;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
      font-weight: 500;
      margin-top: 10px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    button:active {
      transform: translateY(0);
    }

    .toggle-buttons {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
      z-index: 2;
      background: rgba(255,255,255,0.9);
      padding: 8px;
      border-radius: 50px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .toggle-buttons button {
      width: 100px;
      background: transparent;
      color: #666;
      font-weight: 600;
      border: none;
      box-shadow: none;
      padding: 10px;
      margin: 0;
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .toggle-buttons button:hover {
      transform: none;
      box-shadow: none;
      background: rgba(102, 126, 234, 0.1);
    }

    .toggle-buttons button.active {
      background: linear-gradient(to right, #667eea, #764ba2);
      color: #fff;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .social-login {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }

    .social-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f5f5f5;
      color: #333;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .social-icon:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .forgot-password {
      text-align: right;
      margin-top: 10px;
    }

    .forgot-password a {
      color: #666;
      text-decoration: none;
      font-size: 14px;
      transition: color 0.3s ease;
    }

    .forgot-password a:hover {
      color: #667eea;
    }

    .form-footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }

    .form-footer a {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
    }

    @media (max-width: 768px) {
      .container {
        width: 90%;
        height: auto;
        min-height: 500px;
      }
      
      .form-box {
        padding: 30px;
      }
      
      .toggle-buttons {
        right: 10px;
        top: 10px;
      }
      
      .toggle-buttons button {
        width: 80px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<div>
    <div class="toggle-buttons">
    <button id="loginBtn" class="active">Login</button>
    <button id="registerBtn">Register</button>
  </div>
</div>
<div class="container">
  <div class="form-container" id="formContainer">
    <!-- Login Form -->
    <div class="form-box">
      <form id="loginForm" action="{{ route('dashboard.login') }}" method="POST" >
         @csrf
        <div class="input-group">
          <input type="email" id="loginEmail" name="email" placeholder=" " required />
          <label for="loginEmail">Email</label>
        </div>
        <div class="input-group">
          <input type="password" id="loginPassword" name="password" placeholder=" " required />
          <label for="loginPassword">Password</label>
        </div>
        <div class="forgot-password">
          <a href="#">Forgot password?</a>
        </div>
        <button type="submit">Login</button>
        
        <div class="social-login">
          <div class="social-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#4285F4"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
          <div class="social-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#1877F2"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
          </div>
          <div class="social-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#1DA1F2"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
          </div>
        </div>
        
        <div class="form-footer">
          Don't have an account? <a href="#" id="switchToRegister">Sign up</a>
        </div>
      </form>
    </div>

    <!-- Register Form -->
    <div class="form-box">
      <form id="registerForm" action="/dashboard/register" method="POST">
         @csrf
        <div class="input-group">
          <input type="text" id="registerUsername" name="name" placeholder=" " required />
          <label for="registerUsername">Username</label>
        </div>
        <div class="input-group">
          <input type="email" id="registerEmail" name="email" placeholder=" " required />
          <label for="registerEmail">Email</label>
        </div>
        <div class="input-group">
          <input type="password" id="registerPassword" name="password" placeholder=" " required />
          <label for="registerPassword">Password</label>
        </div>
        <div class="input-group">
          <input type="password" id="registerConfirmPassword" name="password_confirmation" placeholder=" " required />
          <label for="registerConfirmPassword">Confirm Password</label>
        </div>
        <button type="submit">Register</button>
        
        <div class="form-footer">
          Already have an account? <a href="#" id="switchToLogin">login in</a>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const formContainer = document.getElementById('formContainer');
  const loginBtn = document.getElementById('loginBtn');
  const registerBtn = document.getElementById('registerBtn');
  const switchToRegister = document.getElementById('switchToRegister');
  const switchToLogin = document.getElementById('switchToLogin');

  // Toggle between forms
  function showLogin() {
    formContainer.style.transform = 'translateX(0)';
    loginBtn.classList.add('active');
    registerBtn.classList.remove('active');
  }

  function showRegister() {
    formContainer.style.transform = 'translateX(-50%)';
    registerBtn.classList.add('active');
    loginBtn.classList.remove('active');
  }

  // Button clicks
  loginBtn.addEventListener('click', showLogin);
  registerBtn.addEventListener('click', showRegister);
  
  // Link clicks
  switchToRegister.addEventListener('click', (e) => {
    e.preventDefault();
    showRegister();
  });
  
  switchToLogin.addEventListener('click', (e) => {
    e.preventDefault();
    showLogin();
  });
  // Add floating label functionality
  document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', function() {
      this.parentNode.querySelector('label').classList.add('active');
    });
    
    input.addEventListener('blur', function() {
      if (!this.value) {
        this.parentNode.querySelector('label').classList.remove('active');
      }
    });
    
    // Initialize labels for prefilled values
    if (input.value) {
      input.parentNode.querySelector('label').classList.add('active');
    }
  });
</script>

</body>
</html>