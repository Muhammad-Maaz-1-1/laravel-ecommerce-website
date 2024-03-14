@include('visitors.layouts.header');

    <style>
.registerSection .container{padding: 100px 0;
max-width: 622px;}

        .tab {
            display: flex;
        }

        .tab button {
            flex: 1;
            padding: 15px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            outline: none;
            background-color: #ddd;
        }

        .tab button:hover {
            background-color: #bbb;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .content {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>

<section class="main-section registerSection">

<div class="container">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'login')" id="defaultOpen">Login</button>
        <button class="tablinks" onclick="openTab(event, 'signup')">Sign Up</button>
    </div>

    <div class="content">
        <div id="login" class="tabcontent">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login_submit') }}">
                @csrf
               
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </div>

        <div id="signup" class="tabcontent" style="display:none">
            <h2>Sign Up</h2>
            <form method="POST" action="{{ route('signup_submit') }}">
                @csrf
                <div class="form-group">
                    <label for="newUsername">Username:</label>
                    <input type="text" id="newUsername" name="name" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="newPassword">Password:</label>
                    <input type="password" id="newPassword" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</section>

@include('visitors.layouts.footer');
