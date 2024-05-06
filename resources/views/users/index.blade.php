<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXA Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Basic styling */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #007bff, #f0f0f0); /* Degradasi warna biru */
        }

        /* Header styling */
        .header {
            display: flex;
            justify-content: center; /* Memposisikan judul di tengah */
            align-items: center;
            padding: 1rem 2rem;
            background-color: #f0f0f0;
            color: #333;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .header time {
            font-size: 0.8rem;
        }

        /* Container styling */
        .container {
            position: relative; /* Set container position to relative */
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Button styling */
        .button-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column; /* Arrange buttons vertically */
        }

        li {
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        li:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>AXA Dashboard</h1>
        </div>

        <h2>List of Users</h2>
        <ul id="user-list" class="list-group"></ul>

        <h2>List of Posts</h2>
        <ul id="post-list" class="list-group"></ul>

        <h2>List of Albums</h2>
        <ul id="album-list" class="list-group"></ul>

        <!-- Tombol untuk menambahkan posting baru -->
        <button class="btn btn-success" onclick="addPost()">Add Post</button>
        <!-- Tombol untuk menampilkan detail data semua user -->
        <button class="btn btn-primary" onclick="showUserDetails()">Tampilkan Detail Data Semua User</button>
    </div>

    <script>
        // Fungsi untuk menambahkan posting baru
        function addPost() {
            const title = prompt('Enter post title:');
            if (title) {
                const post = {
                    id: Date.now(), // Generate unique ID based on current timestamp
                    title: title
                };

                // Retrieve existing posts from localStorage
                let posts = JSON.parse(localStorage.getItem('posts')) || [];
                posts.push(post);

                // Save updated posts to localStorage
                localStorage.setItem('posts', JSON.stringify(posts));

                // Reload posts list
                loadPosts(posts);
            }
        }

        // Fungsi untuk mengedit posting
        function editPost(id) {
            const newTitle = prompt('Enter new title:');
            if (newTitle) {
                // Retrieve existing posts from localStorage
                let posts = JSON.parse(localStorage.getItem('posts')) || [];

                // Find the post to edit
                const postIndex = posts.findIndex(post => post.id === id);
                if (postIndex !== -1) {
                    // Update the title
                    posts[postIndex].title = newTitle;

                    // Save updated posts to localStorage
                    localStorage.setItem('posts', JSON.stringify(posts));

                    // Reload posts list
                    loadPosts(posts);
                }
            }
        }

        // Fungsi untuk menghapus posting
        function deletePost(id) {
            if (confirm('Are you sure you want to delete this post?')) {
                // Retrieve existing posts from localStorage
                let posts = JSON.parse(localStorage.getItem('posts')) || [];

                // Filter out the post to delete
                posts = posts.filter(post => post.id !== id);

                // Save updated posts to localStorage
                localStorage.setItem('posts', JSON.stringify(posts));

                // Reload posts list
                loadPosts(posts);
            }
        }

        // Fungsi untuk memuat daftar posting
        function loadPosts(posts) {
            const postList = document.getElementById('post-list');
            postList.innerHTML = ''; // Clear existing list
            posts.forEach(post => {
                const listItem = document.createElement('li');
                listItem.textContent = post.title;
                listItem.classList.add('list-group-item');

                // Add edit button
                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.classList.add('btn', 'btn-primary', 'btn-sm', 'mr-1');
                editButton.onclick = () => editPost(post.id);
                listItem.appendChild(editButton);

                // Add delete button
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                deleteButton.onclick = () => deletePost(post.id);
                listItem.appendChild(deleteButton);

                postList.appendChild(listItem);
            });
        }

        // Fungsi untuk menampilkan detail data semua user
        function showUserDetails() {
            // Retrieve users from API
            fetch('https://jsonplaceholder.typicode.com/users')
                .then(response => response.json())
                .then(users => {
                    // Display user details
                    alert(JSON.stringify(users, null, 2));
                })
                .catch(error => console.error('Error loading users:', error));
        }

        // Fungsi untuk menampilkan semua user saat tombol "List of Users" diklik
        function showAllUsers() {
            loadUsers();
        }

        // Fungsi untuk kembali ke menu awal saat tombol "Back" diklik
        function backToDashboard() {
            document.getElementById('user-list').innerHTML = '';
            document.getElementById('post-list').innerHTML = '';
            document.getElementById('album-list').innerHTML = '';
        }

        // Fungsi untuk memuat daftar pengguna
        function loadUsers() {
            fetch('https://jsonplaceholder.typicode.com/users')
                .then(response => response.json())
                .then(users => {
                    // Menampilkan daftar pengguna di antarmuka pengguna
                    displayUsers(users);
                })
                .catch(error => console.error('Error loading users:', error));
        }

        // Fungsi untuk menampilkan daftar pengguna di antarmuka pengguna
        function displayUsers(users) {
            const userList = document.getElementById('user-list');
            userList.innerHTML = ''; // Mengosongkan daftar pengguna sebelum menambahkan yang baru
            users.forEach(user => {
                const listItem = document.createElement('li');
                listItem.textContent = user.name;
                listItem.style.cursor = 'pointer'; // Mengubah kursor menjadi tanda klik
                listItem.classList.add('list-group-item');

                // Add user icon
                const userIcon = document.createElement('i');
                userIcon.classList.add('fas', 'fa-user');
                listItem.appendChild(userIcon);

                listItem.addEventListener('click', () => {
                    // Ketika pengguna diklik, panggil fungsi untuk menampilkan daftar posting dan album
                    loadPostsAndAlbums(user.id);
                });
                userList.appendChild(listItem);
            });
        }

        // Fungsi untuk memuat daftar posting dan album dari pengguna tertentu
        function loadPostsAndAlbums(userId) {
            // Memuat daftar posting
            fetch(`https://jsonplaceholder.typicode.com/posts?userId=${userId}`)
                .then(response => response.json())
                .then(posts => {
                    // Menampilkan daftar posting di antarmuka pengguna
                    loadPosts(posts);
                })
                .catch(error => console.error('Error loading posts:', error));

            // Memuat daftar album
            fetch(`https://jsonplaceholder.typicode.com/albums?userId=${userId}`)
                .then(response => response.json())
                .then(albums => {
                    // Menampilkan daftar album di antarmuka pengguna
                    displayAlbums(albums);
                })
                .catch(error => console.error('Error loading albums:', error));
        }

        // Fungsi untuk menampilkan daftar album di antarmuka pengguna
        function displayAlbums(albums) {
            const albumList = document.getElementById('album-list');
            albumList.innerHTML = ''; // Mengosongkan daftar album sebelum menambahkan yang baru
            albums.forEach(album => {
                const listItem = document.createElement('li');
                listItem.textContent = album.title;
                listItem.classList.add('list-group-item');
                albumList.appendChild(listItem);
            });
        }

        // Memanggil fungsi untuk memuat daftar pengguna saat halaman dimuat
        window.onload = function() {
            loadUsers();
            const storedPosts = JSON.parse(localStorage.getItem('posts'));
            if (storedPosts) {
                loadPosts(storedPosts);
            }
        };
    </script>
</body>
</html>
