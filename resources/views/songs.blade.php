<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spotify</title>

    <!-- Fonts
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

    <!-- Styles -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #121212;
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 196px;
            background-color: #000000;
            padding: 24px;
        }

        .sidebar .logo img {
            width: 130px;
        }

        .sidebar .navigation ul {
            list-style: none;
            margin-top: 20px;
        }

        .sidebar .navigation ul li {
            padding: 10px 0px;
        }

        .sidebar .navigation ul li a {
            color: #b3b3b3;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
        }

        .sidebar .navigation ul li a:hover,
        .sidebar .navigation ul li a:active,
        .sidebar .navigation ul li a:focus {
            color: #ffffff;
        }

        .sidebar .navigation ul li a:hover .fa,
        .sidebar .navigation ul li a:active .fa,
        .sidebar .navigation ul li a:focus .fa {
            color: #b3b3b3;
        }

        .sidebar .navigation ul li .fa {
            font-size: 20px;
            margin-right: 10px;
        }

        .sidebar .navigation ul li a:hover .fa:hover,
        .sidebar .navigation ul li a:hover .fa:active,
        .sidebar .navigation ul li a:hover .fa:focus {
            color: #ffffff;
        }

        .sidebar .policies {
            position: absolute;
            bottom: 100px;
        }

        .sidebar .policies ul {
            list-style: none;
        }

        .sidebar .policies ul li {
            padding-bottom: 5px;
        }

        .sidebar .policies ul li a {
            color: #b3b3b3;
            font-weight: 500;
            text-decoration: none;
            font-size: 10px;
        }

        .sidebar .policies ul li a:hover,
        .sidebar .policies ul li a:active,
        .sidebar .policies ul li a:focus {
            text-decoration: underline;
        }

        .main-container {
            margin-left: 245px;
            margin-bottom: 100px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            background-color: #101010;
            padding: 14px 30px;
        }

        .topbar .prev-next-buttons button {
            color: #7a7a7a;
            cursor: not-allowed;
            width: 34px;
            height: 34px;
            border-radius: 100%;
            font-size: 18px;
            border: 0px;
            background-color: #090909;
            margin-right: 10px;
        }

        .topbar .navbar {
            display: flex;
            align-items: center;
        }

        .topbar .navbar ul {
            list-style: none;
        }

        .topbar .navbar ul li {
            display: inline-block;
            margin: 0px 8px;
            width: 70px;
        }

        .topbar .navbar ul li a {
            color: #b3b3b3;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .topbar .navbar ul li a:hover,
        .topbar .navbar ul li a:active,
        .topbar .navbar ul li a:focus {
            color: #ffffff;
            font-size: 15px;
        }

        .topbar .navbar ul li.divider {
            color: #ffffff;
            font-size: 26px;
            margin: 0px 20px;
            width: auto;
        }

        .topbar .navbar button {
            background-color: #ffffff;
            color: #000000;
            font-size: 16px;
            font-weight: bold;
            padding: 14px 30px;
            border: 0px;
            border-radius: 40px;
            cursor: pointer;
            margin-left: 20px;
        }

        .topbar .navbar button:hover,
        .topbar .navbar button:active,
        .topbar .navbar button:focus {
            background-color: #f2f2f2;
        }

        .spotify-playlists {
            padding: 20px 40px;
        }

        .spotify-playlists h2 {
            color: #ffffff;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .spotify-playlists .list {
            display: flex;
            gap: 20px;
            overflow: hidden;
        }

        .spotify-playlists .list .item {
            min-width: 140px;
            width: 160px;
            padding: 15px;
            background-color: #181818;
            border-radius: 6px;
            cursor: pointer;
            transition: all ease 0.4s;
        }

        .spotify-playlists .list .item:hover {
            background-color: #252525;
        }

        .spotify-playlists .list .item img {
            width: 100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .spotify-playlists .list .item .play {
            position: relative;
        }

        .spotify-playlists .list .item .play .fa {
            position: absolute;
            right: 10px;
            top: -60px;
            padding: 18px;
            background-color: #1db954;
            border-radius: 100%;
            opacity: 0;
            transition: all ease 0.4s;
        }

        .spotify-playlists .list .item:hover .play .fa {
            opacity: 1;
            transform: translateY(-20px);
        }

        .spotify-playlists .list .item h4 {
            color: #ffffff;
            font-size: 14px;
            margin-bottom: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .spotify-playlists .list .item p {
            color: #989898;
            font-size: 12px;
            line-height: 20px;
            font-weight: 600;
        }

        .spotify-playlists hr {
            margin: 70px 0px 0px;
            border-color: #636363;
        }

        .preview {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to right, #ae2896, #509bf5);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
        }

        .preview h6 {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .preview p {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
        }

        .preview button {
            background-color: #ffffff;
            color: #000000;
            font-size: 16px;
            font-weight: bold;
            padding: 14px 30px;
            border: 0px;
            border-radius: 40px;
            cursor: pointer;
        }
    </style>

<body>

    <div class="sidebar">
        <div class="logo">
            <a href="#">
                <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png"
                    alt="Logo" />
            </a>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fa-home"></span>
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="fa fa-search"></span>
                        <span>Search</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="fa fas fa-book"></span>
                        <span>Your Library</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fas fa-plus-square"></span>
                        <span>Create Playlist</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="fa fas fa-heart"></span>
                        <span>Liked Songs</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="policies">
            <ul>
                <li>
                    <a href="#">Cookies</a>
                </li>
                <li>
                    <a href="#">Privacy</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-container">
        <div class="topbar">
            <div class="prev-next-buttons">
                <button type="button" class="fa fas fa-chevron-left"></button>
                <button type="button" class="fa fas fa-chevron-right"></button>
            </div>

            <div class="navbar">
                <ul>
                    <li>
                        <a href="#">Premium</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                    <li>
                        <a href="#">Download</a>
                    </li>
                    <li class="divider">|</li>
                    <li>
                        <a href="#">Sign Up</a>
                    </li>
                </ul>
                <button type="button">Log In</button>
            </div>
        </div>

        <div class="spotify-playlists">
            <h2>Spotify Playlists</h2>

            <div class="list">
                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Today's Top Hits</h4>
                    <p>Rema & Selena Gomez are on top of the...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>RapCaviar</h4>
                    <p>New Music from Lil Baby, Juice WRLD an...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>All out 2010s</h4>
                    <p>The biggest spmgs pf tje 2010s. Cover:...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Rock Classics</h4>
                    <p>Rock Legends & epic songs that continue t...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Chill Hits</h4>
                    <p>Kick back to the best new and recent chill...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Viva Latino</h4>
                    <p>Today's top Latin hits elevando nuestra...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Mega Hit Mix</h4>
                    <p>A mega mix of 75 favorites from the last...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>All out 80s</h4>
                    <p>The biggest songs of the 1090s.</p>
                </div>
            </div>
        </div>

        <div class="spotify-playlists">
            <h2>Focus</h2>
            <div class="list">
                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Peaceful Piano</h4>
                    <p>Relax and indulge with beautiful piano pieces</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Deep Focus</h4>
                    <p>Keep calm and focus with ambient and pos...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Instrumental Study</h4>
                    <p>Focus with soft study music in the...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>chill lofi study beats</h4>
                    <p>The perfect study beats, twenty four...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Coding Mode</h4>
                    <p>Dedicated to all the programmers out there.</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Focus Flow</h4>
                    <p>Uptempo instrumental hip hop beats.</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Calm Before The Storm</h4>
                    <p>Calm before the storm music.</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Beats to think to</h4>
                    <p>Focus with deep techno and tech house.</p>
                </div>
            </div>
        </div>

        <div class="spotify-playlists">
            <h2>Mood</h2>
            <div class="list">
                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Mood Booster</h4>
                    <p>Get happy with today's dose of feel-good...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Feelin' Good</h4>
                    <p>Feel good with this positively timeless...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Dark & Stormy</h4>
                    <p>Beautifully dark, dramatic tracks.</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Feel Good Piano</h4>
                    <p>Happy vibes for an upbeat morning.</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Feelin' Myself</h4>
                    <p>The hip-hop playlist that's a whole mood...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Chill Tracks</h4>
                    <p>Softer kinda dance</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>Feel-Good Indie Rock</h4>
                    <p>The best indie rock vibes - classic and...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>idk.</h4>
                    <p>idk.</p>
                </div>
            </div>

            <hr>
        </div>

        <div class="preview">
            <div class="text">
                <h6>Preview of Spotify</h6>
                <p>Sign up to get unlimited songs and podcasts with occasional ads. No credit card needed.</p>
            </div>
            <div class="button">
                <button type="button">Sign up free</button>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
</body>

</html>