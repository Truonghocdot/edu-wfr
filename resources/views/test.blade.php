<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lost & Found Navbar</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
      }

      .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #f9f9f9;
        padding: 10px 24px;
        border-bottom: 1px solid #ddd;
      }

      .nav-left {
        display: flex;
        align-items: center;
        gap: 20px;
      }

      .nav-left img {
        width: 40px;
        height: 40px;
        object-fit: contain;
      }

      .nav-links a {
        text-decoration: none;
        color: #555;
        font-weight: 500;
      }

      .nav-links a.active {
        color: #00b300; /* green like in the screenshot */
        font-weight: bold;
      }

      .nav-links a:hover {
        color: #00b300;
      }

      .nav-right {
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .nav-user {
        display: flex;
        align-items: center;
        gap: 6px;
      }

      .nav-user img {
        width: 18px;
        height: 18px;
      }

      .nav-user .user-name {
        font-weight: bold;
        color: #000;
      }

      .logout-btn {
        background-color: #666;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
      }

      .logout-btn:hover {
        background-color: #555;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-left">
        <img src="https://via.placeholder.com/40x40?text=Logo" alt="Logo" />
        <div class="nav-links">
          <a href="#">Home</a>
          <a href="#" class="active">Lost Items</a>
          <a href="#">Found Items</a>
          <a href="#">Report Item</a>
          <a href="#">Messages</a>
        </div>
      </div>

      <div class="nav-right">
        <div class="nav-user">
          <img
            src="https://via.placeholder.com/20x20?text=👤"
            alt="User Icon"
          />
          <span class="user-name">JiaBoy</span>
        </div>
        <button class="logout-btn">
          <span>Log Out</span>
        </button>
      </div>
    </nav>
  </body>
</html>
