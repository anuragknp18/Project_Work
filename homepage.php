<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$uName = isset($_SESSION['uName']) ? htmlspecialchars($_SESSION['uName']) : "Guest";
echo "<h1>Welcome, $uName!</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books-Spot</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mogra&display=swap');
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Header Section -->
    <header style="display:flex;flex-wrap:wrap;justify-content:space-between;align-content:center;color:#333">
        <img src="Books-spot2.jpg" length="70px" width="70px" alt="Book-Spot Logo" class="logo">
        <div style="height: 60px;width:280;color:aqua;background-color:#444" class="site-name">Books-Spot</div>
        <div style="height: 60px;width:600" class="auth-buttons">
            <a href="index.php">
                <button>Sign-Up</button>
            </a>
            <a href="index1.php">
                <button>Login</button>
            </a>
            <a href="Logout.php">
                <button>Logout</button>
            </a>
            <a href="personalspace.php">
                <button>Personal ReadSpace</button>
            </a>
        </div>
    </header>

    <!-- Navbar Section -->
    <nav class="navbar">
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <span style="gap:5px;">
                <br>
                <li>
                    <a href="#books-categories">
                        <label for="category">Books-Categories</label>
                    </a>
                </li>
                <br>
                <select id="category" name="category" onchange="populate(this.id, 'genres')">
                    <option value="" disabled selected>Select a Category for Books</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                    <option>Drama</option>
                    <option>Poetry</option>
                    <option>Comics/Graphics-Novels</option>
                    <option>Historical Romance</option>
                    <option>Science and Tech</option>
                    <option>Academics and Educational</option>
                    <option>True crime</option>
                    <option>Kids</option>
                    <option>Science-Fiction-Fantasy</option>
                    <option>Psychological-Thriller</option>
                    <option>Special Interest</option>
                    <option>Religion and Spirituality</option>
                    <option>Business and Economics</option>
                    <option>Miscellaneous/Others</option>
                </select>
            </span>
            <span style="gap:2px;color:white;font-size:20px;font-weight:550">
                <label for="genres">Genres</label><br><br>
                <select id="genres" name="genres" onchange="redirectToLink(this)">
                    <option value="" disabled selected">Select Any Category First</option>
                </select>
            </span>

            <script>
                function populate(s1, s2) {
                    var s1 = document.getElementById(s1);
                    var s2 = document.getElementById(s2);
                    s2.innerHTML = ""; // Clear previous options

                    let optionArray = [];
                    if (s1.value === "Fiction") {
                        optionArray = [
                            "--------|Select a Genre",
                            "fiction-adventure.html|Adventure",
                            "fiction-fantasy.html|Fantasy",
                            "fiction-science.html|Science Fiction",
                            "fiction-mystery.html|Mystery",
                            "fiction-thriller.html|Thriller",
                            "fiction-romance.html|Romance",
                            "fiction-historical.html|Historical Fiction",
                            "fiction-horror.html|Horror",
                            "fiction-magical.html|Magical Realism",
                            "fiction-satire.html|Satire",
                            "fiction-coa.html|Coming of Age",
                            "fiction-urban.html|Urban Fiction",
                            "fiction-gnovel.html|Graphic Novels/Comics"
                        ];
                    } else if (s1.value === "Non-Fiction") {
                        optionArray = [
                            "--------|Select a Genre",
                            "nonfiction-bio.html|Biography",
                            "nonfiction-memoir.html|Memoir",
                            "nonfiction-selfhelp.html|Self-Help",
                            "nonfiction-history.html|History",
                            "nonfiction-science.html|Science",
                            "nonfiction-travel.html|Travel",
                            "nonfiction-truecrime.html|True Crime",
                            "nonfiction-philosophy.html|Philosophy",
                            "nonfiction-business.html|Business",
                            "nonfiction-education.html|Education",
                            "nonfiction-health.html|Health",
                            "nonfiction-psychology.html|Psychology"
                        ];
                    }

                    // Add default option if no category is selected
                    if (optionArray.length === 0) {
                        const defaultOption = document.createElement("option");
                        defaultOption.value = "";
                        defaultOption.disabled = true;
                        defaultOption.selected = true;
                        defaultOption.innerHTML = "Select Any Category First";
                        s2.options.add(defaultOption);
                    }

                    // Populate dropdown with genres
                    for (let i = 0; i < optionArray.length; i++) {
                        const pair = optionArray[i].split("|");
                        const newOption = document.createElement("option");
                        newOption.value = pair[0];
                        newOption.innerHTML = pair[1];
                        s2.options.add(newOption);
                    }
                }

                function redirectToLink(selectElement) {
                    const selectedValue = selectElement.value;
                    if (selectedValue) {
                        window.location.href = selectedValue; // Redirect to the selected link
                    }
                }
            </script>
            <li><a href="#services">Services</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact-Us</a></li>
        </ul>
    </nav>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search for books, authors, or genres...">
        <button>Search</button>
    </div>

    <div style="width:100%;height:50px;">
        <h1
            style="font-family: Iceland; font-size: 30px; color:crimson;text-align: center;background-color: aliceblue; border-radius: 10px; padding: 10px;">
            All Available Genres Related to Selected Category Books</h1>
    </div>

    <div class="text">
        <p><b>Select a Category for Books</b></p>
    </div>

    <div class="categories-container">
        <div class="category-box" data-category="Fiction">
            <h3>Fiction</h3>
        </div>
        <div class="category-box" data-category="Non-Fiction">
            <h3>Non-Fiction</h3>
        </div>
        <div class="category-box" data-category="Drama">
            <h3>Drama</h3>
        </div>
        <div class="category-box" data-category="Poetry">
            <h3>Poetry</h3>
        </div>
        <div class="category-box" data-category="Comics/Graphics-Novels">
            <h3>Comics/Graphics-Novels</h3>
        </div>
        <div class="category-box" data-category="Historical Romance">
            <h3>Historical Romance</h3>
        </div>
        <div class="category-box" data-category="Science and Tech">
            <h3>Science and Tech</h3>
        </div>
        <div class="category-box" data-category="Academics and Educational">
            <h3>Academics and Educational</h3>
        </div>
        <div class="category-box" data-category="True crime">
            <h3>True crime</h3>
        </div>
        <div class="category-box" data-category="Kids">
            <h3>Kids</h3>
        </div>
        <div class="category-box" data-category="Science-Fiction-Fantasy">
            <h3>Science-Fiction-Fantasy</h3>
        </div>
        <div class="category-box" data-category="Psychological-Thriller">
            <h3>Psychological-Thriller</h3>
        </div>
        <div class="category-box" data-category="Special Interest">
            <h3>Special Interest</h3>
        </div>
        <div class="category-box" data-category="Religion and Spirituality">
            <h3>Religion and Spirituality</h3>
        </div>
        <div class="category-box" data-category="Business and Economics">
            <h3>Business and Economics</h3>
        </div>
        <div class="category-box" data-category="Miscellaneous/Others">
            <h3>Miscellaneous/Others</h3>
        </div>
    </div>

    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:50px;height:1500px" class="content-container">
        <!-- The content will be populated dynamically based on selected category -->
        <div>
                <div class="img">
                    <img src="books/b14rom.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">Wuthering Heights<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Emily Brontë</span>
                        </p>
                        <a href="books/Wuthering_Heights_Emily_Bronte.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>

            <div>
                <div class="img">
                    <img src="books/b15rom.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">Persuasion<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Jane Austen</span>
                        </p>
                        <a href="books/3. Persuasion Author Jane Austen.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>

            <div>
                    <div class="img">
                        <img src="books/b18mr.jfif">
                        <span style="display:flex;flex-direction: column; gap:50px;">
                            <p style="font-weight: 650; font-size: large;">The Hobbit<br>
                                <span style="color:rgb(71, 16, 143);font-weight: 600;">by J.R.R. Tolkien</span>
                            </p>
                            <a href="books/the_hobbit_tolkien.pdf" style="text-decoration: none;">
                                <button>Read the book</button>
                            </a>
                        </span>
                    </div>
                </div>
                
                <div>
                    <div class="img">
                        <img src="books/b20mr.jfif">
                        <span style="display:flex;flex-direction: column; gap:50px;">
                            <p style="font-weight: 650; font-size: large;">Stardust<br>
                                <span style="color:rgb(71, 16, 143);font-weight: 600;">by Neil Gaiman</span>
                            </p>
                            <a href="books/Stardust_Neil_Gaiman.pdf" style="text-decoration: none;">
                                <button>Read the book</button>
                            </a>
                        </span>
                    </div>
                </div>

                <div>
                    <div class="img">
                        <img src="books/b19mr.jfif">
                        <span style="display:flex;flex-direction: column; gap:50px;">
                            <p style="font-weight: 650; font-size: large;">A Journey to Ceter of Earth<br>
                                <span style="color:rgb(71, 16, 143);font-weight: 600;">by Neil Gaiman</span>
                            </p>
                            <a href="books/4-Journey-to-the-Centre-of-the-Earth-author-Jules-Verne.pdf" style="text-decoration: none;">
                                <button>Read the book</button>
                            </a>
                        </span>
                    </div>
                </div>

            <div>
                <div class="img">
                    <img src="books/tm.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">The Time Machine<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by H. G. Wells</span>
                        </p>
                        <a href="books/1. The Time Machine Author H. G. Wells (1).pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>
            
            <div>
                <div class="img">
                    <img src="books/b12sf.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">Twenty Thousand Leagues<br> Under the Seas<br><br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Jules Verne</span>
                        </p>
                        <a href="books/2. Twenty Thousand Leagues Under the Seas Author Jules Verne.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>
            
            <div>
                <div class="img">
                    <img src="books/b13sf.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">From the Earth to the Moon<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Jules Verne</span>
                        </p>
                        <a href="books/13. From the Earth to the Moon Author Jules Verne.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>

            <div>
                <div class="img">
                    <img src="books/b1hrr.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">Carmilla<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Sheridan Le Fanu</span>
                        </p>
                        <a href="books/crime-and-punishment-fedor-mikhailovitch-distoievski.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>
            
            <div>
                <div class="img">
                    <img src="books/b2hrr.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">Frankenstein<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Mary Shelley</span>
                        </p>
                        <a href="books/10563-frankenstein-mary-shelley.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>
            
            <div>
                <div class="img">
                    <img src="books/b3hrr.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">The Phantom of the Opera<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by Gaston Leroux</span>
                        </p>
                        <a href="books/10569-the-phantom-of-the-opera-gaston-leroux.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>

            <div>
                <div class="img">
                    <img src="books/b4fan.jfif">
                    <span style="display:flex;flex-direction: column; gap:50px;">
                        <p style="font-weight: 650; font-size: large;">The Wonderful Wizard of Oz<br>
                            <span style="color:rgb(71, 16, 143);font-weight: 600;">by L. Frank Baum</span>
                        </p>
                        <a href="books/wizOZ.pdf" style="text-decoration: none;">
                            <button>Read the book</button>
                        </a>
                    </span>
                </div>
            </div>

        </div>

            <footer style="background-color: #333; color: white; padding: 20px;" class="foot">
                <div class="inner-footer"
                    style="display: flex; gap:250px; align-items: flex-start; flex-wrap: wrap; padding:8px; position: relative;">
                    <div class="part1">
                        <h3 style="color: orange;">Quick Links</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li><a href="" style="color: white; text-decoration: none;">Home</a></li>
                            <li><a href="" style="color: white; text-decoration: none;">Books-Categories</a></li>
                            <li><a href="" style="color: white; text-decoration: none;">Services</a></li>
                            <li><a href="" style="color: white; text-decoration: none;">About</a></li>
                            <li><a href="" style="color: white; text-decoration: none;">Privacy Policy</a></li>
                            <li><a href="" style="color: white; text-decoration: none;">Contact-Us</a></li>
                        </ul>
                    </div>
                    <div class="part2">
                        <h3 style="color: orange;">Archives</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li>December 2024</li>
                            <li>November 2024</li>
                            <li>October 2024</li>
                            <li>September 2024</li>
                            <li>August 2024</li>
                            <li>July 2024</li>
                            <li>June 2024</li>
                            <li>May 2024</li>
                            <li>April 2024</li>
                            <li>March 2024</li>
                            <li>Febuary 2024</li>
                            <li>January 2024</li>
                        </ul>
                    </div>
                    <div class="part3">
                        <h3 style="color: orange;">Follow Us</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li>Facebook</li>
                            <li>X handle</li>
                            <li>Github</li>
                            <li>Linkedin</li>
                            <li>Meta</li>
                        </ul>
                    </div>
                    <div class="part3">
                        <h2 style="color:rgb(214, 187, 30)">NewsLetter</h2><br>
                        <p style="color:aliceblue">Stay Connected with Our Newsletter!</p>
                        <p>Subscribe to our newsletter and never miss an update!</p>
                        <p>Get the latest news, exclusive offers, and insights delivered straight to your inbox.</p>
                        <h4>What you will get??</h4>
                        <ul>
                            <li>Updates: Stay informed about our latest products, services, or events.</li>
                            <li>Exclusive Offers: Be the first to know about special promotions and discounts.</li>
                            <li>Insights & Tips: Enjoy curated content, helpful tips, and expert advice tailored just
                                for you.</li>
                            <li>Community News: Join a growing community and share in our journey.</li>
                            <li>Sign up today to stay connected and informed!</li>
                        </ul>
                        <p style="color:aquamarine">Simply enter your email address below and start enjoying all the
                            benefits.</p>
                        <p style="color:aqua">We value your privacy and promise not to spam your inbox. You can
                            unsubscribe anytime.</p>
                    </div>
                </div>

                <div class="email">
                    <i class="fas fa-envelope"></i><input type="email" placeholder="Enter Your Email here...">
                    <input type="button" value="Submit">
                </div>

                <div style="text-align: center; margin-top: 20px;">
                    <h3>All rights Reserved 2024 &copy;</h3>
                </div>
            </footer>
</body>

</html>