<!-- 7000 -->

<!DOCTYPE html>
<html>
  <head>
    <title>Button Design</title>
    <style>
      body {
        background-color: #F7F7F7;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        max-width: 50%;
      }
      .btn {
        background-color: #2ECC71;
        border: none;
        color: white;
        padding: 15px 20px;
        margin: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      }
      .btn:hover {
        background-color: #27AE60;
        transform: translateY(-3px);
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.25);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="buttons">
        <a class="btn" href="http://localhost:7001/">People per company</a>
        <a class="btn" href="http://localhost:7002/">Average per branch</a>
        <a class="btn" href="http://localhost:7003/">Average per company</a>
        <a class="btn" href="http://localhost:7004/">Highest per company</a>
        <a class="btn" href="http://localhost:7005/">Highest per branch</a>
      </div>
    </div>
  </body>
</html>
