@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- User List -->
        <div class="card">
            <div class="card-header">User List</div>
            <div class="card-body">
                <!-- Display list of users here -->
                <ul>
                    @foreach($users as $user)
                        <li>
                            <strong>Name:</strong> {{ $user->name }} <br>
                            <strong>Email:</strong> {{ $user->email }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Post List -->
        <div class="card mt-4">
            <div class="card-header">Post List</div>
            <div class="card-body">
                <!-- Display list of posts here -->
                <ul>
                    @foreach($posts as $post)
                        <li>
                            <strong>Title:</strong> {{ $post->title }} <br>
                            <strong>Body:</strong> {{ $post->body }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Album List -->
        <div class="card mt-4">
            <div class="card-header">Album List</div>
            <div class="card-body">
                <!-- Display list of albums here -->
                <ul>
                    @foreach($albums as $album)
                        <li>
                            <strong>Title:</strong> {{ $album->title }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Post Detail -->
        <div class="card mt-4">
            <div class="card-header">Post Detail</div>
            <div class="card-body">
                <!-- Display post detail and comments here -->
                <!-- Placeholder for post detail -->
            </div>
        </div>

        <!-- Photo List -->
        <div class="card mt-4">
            <div class="card-header">Photo List</div>
            <div class="card-body">
                <!-- Display list of photos here -->
                <!-- Placeholder for photo list -->
            </div>
        </div>

        <!-- Photo Detail -->
        <div class="card mt-4">
            <div class="card-header">Photo Detail</div>
            <div class="card-body">
                <!-- Display photo detail here -->
                <!-- Placeholder for photo detail -->
            </div>
        </div>

        <!-- Add, Edit, Delete Post Form -->
        <div class="card mt-4">
            <div class="card-header">Add, Edit, Delete Post</div>
            <div class="card-body">
                <!-- Display form for adding, editing, and deleting posts here -->
                <!-- Placeholder for post form -->
            </div>
        </div>

        <!-- Add, Edit, Delete Comment Form -->
        <div class="card mt-4">
            <div class="card-header">Add, Edit, Delete Comment</div>
            <div class="card-body">
                <!-- Display form for adding, editing, and deleting comments here -->
                <!-- Placeholder for comment form -->
            </div>
        </div>
    </div>
@endsection
