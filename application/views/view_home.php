<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home Page</title>

    <style>
           body, html {
                 margin:0;
                 padding:  0;
            }
           body {
                 background-color:#EEE;
            }

           h1,h2,h3, h4, p, a, li, ul {
                 font-family: arial, sans-serif;
                 color: black;
                 text-decoration: none;
           }

           #nav {
                 margin:50px auto 0 auto;
                 width: 1000px;
                 background-color:  #888;
                 height: 15px;
                 padding: 20px;
           }

           #nav a:hover {
                 color: green;
           }

           #nav ul {
                 list-style: none;
                 float: left;
                 margin: 0 50px;
           }

           #nav ul li{
                 display:inline;
           }

           #content {
                 min-height: 100%;
                 width: 1000px;
                 margin: 0 auto;
                 padding: 20px;
           }

           #footer {
                 width: 400px;
                 height: 15px;
                 margin: 0 auto;
                 padding: 20px;
           }

           #footer p {
                color: #777;
           }
    </style>

</head>
<body>

<div id="container">

        <div id="nav">
              <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Contact</a></li>
              </ul>
        </div>

        <div id="content">
              <h1>Home Page</h1>
              <p>Welcome to my awesome site</p>
              <p>Lorem ipsum dolor sit amet, consequat vulputate dapibus sed ullamcorper aenean. Sit nam ut, blandit platea nunc in, facilisis tortor justo elit vulputate mollis consequat, donec varius et eget vero tempor, nisl morbi eu proin risus nullam. Nam augue at dignissim tincidunt lectus, velit vestibulum phasellus proin cum porttitor, blandit elit neque, montes vestibulum. Enim vitae, ipsum elit aenean at, tincidunt cras magna per dignissim. Turpis velit pulvinar. Quam felis pulvinar vulputate, vitae cubilia est wisi ligula. Ante enim sem neque nam, porta id curabitur eleifend sed, maecenas nunc in mauris pede, neque leo vestibulum.</p>
        </div>

        <div id="footer">
            <p>Copyright (c) 2015 ci.com. All rights reserved.</p>
        </div>

 </div>

</body>
</html>