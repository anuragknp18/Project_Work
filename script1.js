// Data structure for categories and their related genres
const categories = {
    Fiction: [
        "Adventure",
        "Fantasy",
        "Science Fiction",
        "Mystery",
        "Thriller",
        "Romance",
        "Historical Fiction",
        "Horror",
        "Magical Realism",
        "Satire",
        "Coming of Age",
        "Urban Fiction",
        "Graphic Novels/Comics"
    ],
    "Non-Fiction": [
        "Biography",
        "Memoir",
        "Self-Help",
        "History",
        "Science",
        "Travel",
        "True Crime",
        "Philosophy",
        "Business",
        "Education",
        "Health",
        "Psychology"
    ],
    Drama: ["Tragedy", "Melodrama", "Comedy", "Romantic Drama"],
    Poetry: ["Sonnet", "Haiku", "Free Verse", "Epic"],
    "Comics/Graphics-Novels": ["Graphic Novels", "Manga", "Comics"],
    "Historical Romance": ["Regency", "Victorian", "Medieval Romance"],
    "Science and Tech": [
        "Artificial Intelligence",
        "Biotechnology",
        "Physics",
        "Space Exploration",
        "Robotics",
        "Engineering",
        "Environmental Science"
    ],
    "Academics and Educational": [
        "Textbooks",
        "Research",
        "Study Guides",
        "Educational Resources"
    ],
    "True crime": [
        "Murder Mystery",
        "Investigation",
        "Cold Cases",
        "Criminal Psychology"
    ],
    Kids: ["Picture Books", "Early Reader", "Chapter Books", "Young Adult"],
    "Science-Fiction-Fantasy": [
        "Space Opera",
        "Dystopian",
        "Cyberpunk",
        "Time Travel",
        "Alien Invasion",
        "Post-Apocalyptic"
    ],
    "Psychological-Thriller": ["Suspense", "Crime", "Mystery", "Psychological"],
    "Special Interest": ["Art", "Cooking", "Gardening", "Technology", "Sports"],
    "Religion and Spirituality": [
        "Spirituality",
        "Faith",
        "Philosophy of Religion",
        "Religious History"
    ],
    "Business and Economics": [
        "Entrepreneurship",
        "Finance",
        "Marketing",
        "Investing",
        "Economics"
    ],
    "Miscellaneous/Others": [
        "Lifestyle",
        "Hobbies",
        "Travel",
        "Humor",
        "Miscellaneous"
    ]
};

// Function to populate genres and content container based on selected category
function populateGenresAndContent() {
    const genreDropdown = document.getElementById("genres");
    const selectedCategory = document.getElementById("category").value;
    const contentContainer = document.querySelector(".content-container");

    // Clear the genre dropdown and content container
    genreDropdown.innerHTML = "";
    contentContainer.innerHTML = "";

    if (selectedCategory && categories[selectedCategory]) {
        // Populate genres for the selected category
        categories[selectedCategory].forEach((genre) => {
            // Add genre to the dropdown
            const option = document.createElement("option");
            option.value = genre;
            option.textContent = genre;
            genreDropdown.appendChild(option);

            // Add genre to the content container
            const contentBox = document.createElement("div");
            contentBox.className = "content";
            contentBox.innerHTML = `<h3>${genre}</h3>`;
            contentContainer.appendChild(contentBox);
        });
    } else {
        // If no category is selected, show a spaced message
        const message = document.createElement("div");
        message.className = "message";
        message.innerHTML = `&nbsp;`.repeat(2000) + `<h3>Please select a category to see genres.</h3>` + `&nbsp;`.repeat(2000);
        contentContainer.appendChild(message);

        const option = document.createElement("option");
        option.value = "";
        option.textContent = "Select a Category First";
        genreDropdown.appendChild(option);
    }
}

// Event listener for category dropdown change
document.getElementById("category").addEventListener("change", populateGenresAndContent);

// Function to handle the click of categories from category-box
function handleCategoryClick(event) {
    const categoryName = event.target.innerText;

    if (categories[categoryName]) {
        document.getElementById("category").value = categoryName;
        populateGenresAndContent();
    }
}

// Event listeners for clicking category boxes
document.querySelectorAll('.category-box').forEach(categoryBox => {
    categoryBox.addEventListener('click', handleCategoryClick);
});

// Function to generate the correct URL and redirect
function handleRedirect(selectedCategory, selectedGenre) {
    if (selectedCategory && selectedGenre) {
        // Create the URL in the format categoryname-genre.html
        const formattedUrl = `${selectedCategory.toLowerCase().replace(/\s+/g, '-')}-${selectedGenre.toLowerCase().replace(/\s+/g, '-')}.html`;
        // Redirect to the corresponding page
        window.location.href = formattedUrl;
    }
}

// Event listener for genre selection from dropdown
document.getElementById("genres").addEventListener("change", (event) => {
    const selectedCategory = document.getElementById("category").value;
    const selectedGenre = event.target.value;

    // Trigger redirect based on the selected category and genre
    handleRedirect(selectedCategory, selectedGenre);
});

// Event listener for genre box clicks
document.querySelectorAll('.content').forEach(contentBox => {
    contentBox.addEventListener('click', (event) => {
        const selectedGenre = event.target.innerText;
        const selectedCategory = document.getElementById("category").value;

        // Trigger redirect based on the selected category and genre
        handleRedirect(selectedCategory, selectedGenre);
    });
});
