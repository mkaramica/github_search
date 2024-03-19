<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GitHub Search</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: left;
            align-items: left;
            height: 100vh;
        }
        .container {
            text-align: left;
        }
        h1 {
            color: #333;
        }
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search for a GitHub Account</h1>
        <form id="searchForm" action="" method="GET"> 
            <label for="github_account">GitHub Account:</label>
            <input type="text" id="github_account" name="github_account" placeholder="Enter GitHub Account">
            <input type="submit" value="Search" id="searchButton">
        </form>
        @if(isset($githubAccount))
            <p>Received GitHub Account: {{ $githubAccount }}</p>
        @endif
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevents the default form submission behavior

            var githubAccount = document.getElementById('github_account').value;
            
            var url = '/?github_account=' + encodeURIComponent(githubAccount);

            // Sending HTTP request to the backend
            var httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', url, true);
            
            httpRequest.onreadystatechange = function() {
                if (httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200) {
                    alert("Request sent to the backend: " + url); // Alert the request sent to the backend
                }
            };
            httpRequest.send();
        });
    </script>
</body>
</html>

