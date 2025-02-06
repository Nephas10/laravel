<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--this is a border displaying how things -->
    @auth
    <!--logout-->
    <p>you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>logout</button>
    </form>
    <div>
        <!--main content creation of a post-->
    <div style="border: 3px solid black">
        <h2>create a Post</h2>
        <form action="/create-post" method ="POST">
            @csrf
            <input type="text" name="title">
            <textarea name="body" placeholder="content"></textarea>
            <button>create</button>
        </form>
    </div>
    <!--below displays the posts made-->
    <div style="border: 3px solid black">
        <h2>posts</h2>
        @foreach ($posts as $post)
           <div style="background-color: grey; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
           </div> 
        @endforeach
        
        </div>

<!--this is a border displaying how things -->

    @else

    <div style="border: 3px solid black">
        <h2>login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password">
            <button>login</button>
        </form>
    </div>
    


    <div style="border: 3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="example@gmail.com">
            <input name="password" type="password">
            <button>register</button>
        </form>
    </div>

    @endauth
    
</html>