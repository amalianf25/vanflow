<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f5f6fa;
    }

    .container {
      background: #ffffff;
      padding: 40px 35px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 380px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h2 {
      font-size: 22px;
      color: #222;
      margin-bottom: 25px;
      text-align: center;
    }

    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 3px rgba(0,123,255,0.3);
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 15px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.2s ease;
      margin-top: 5px;
    }

    button:hover {
      background-color: #0056b3;
    }

    a {
      text-decoration: none;
      color: #007bff;
      font-size: 13px;
      text-align: center;
      margin-top: 10px;
      display: inline-block;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>@yield('title')</h2>
    @yield('content')
  </div>
</body>
</html>
