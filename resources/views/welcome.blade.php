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
            margin: 10;
            padding: 10;
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
            <label for="results_per_page">Results Per Page:</label>
            <input type="number" id="results_per_page" name="results_per_page" value="10" min="1">
            </br></br>
            <label for="github_account">GitHub Account:</label>
            <input type="text" id="github_account" name="github_account" placeholder="Enter GitHub Account">
            <input type="submit" value="Search" id="searchButton">
        </form>
        <p id="result"></p> <!-- Placeholder for displaying result -->
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevents the default form submission behavior

            var githubAccount = document.getElementById('github_account').value;
            var resultsPerPageInput = document.getElementById('results_per_page');
            var resultsPerPage = resultsPerPageInput ? resultsPerPageInput.value : 10;

            // Check if githubAccount is not empty
            if (githubAccount.trim() === '') {
                return; // Do nothing if the githubAccount is empty
            }
            var url = '?github_account=' + encodeURIComponent(githubAccount) + '&results_per_page=' + resultsPerPage;
            
            // Sending AJAX request to the backend
            var httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', url, true);

            httpRequest.onload = function() {
                if (httpRequest.status >= 200 && httpRequest.status < 300) {
                    // Request was successful
                    var response = httpRequest.responseText; // Assuming response is HTML code
                    document.getElementById('result').innerHTML = response; // Update the DOM with the response

                } else {
                    // Request failed
                    alert('HTTP request failed with status ' + httpRequest.status);
                }
            };

            httpRequest.onerror = function() {
                // An error occurred during the request
                alert('HTTP request failed');
            };

            httpRequest.send();
        });
    </script>
</body>
</html>

