<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GitHub Search</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Search for a GitHub Account</h1>
        <form id="searchForm" action="" method="GET"> 
            <label for="per_page">Results Per Page:</label>
            <input type="number" id="per_page" name="per_page" value="10" min="1">
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
            var perPageInput = document.getElementById('per_page');
            var perPage = perPageInput ? perPageInput.value : 10;

            // Check if githubAccount is not empty
            if (githubAccount.trim() === '') {
                return; // Do nothing if the githubAccount is empty
            }
            var url = '?github_account=' + encodeURIComponent(githubAccount) + '&per_page=' + perPage;
            console.log(url);
            
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
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                var nextButton = event.target.closest('#nextButton');
                if (nextButton) {
                    const dataContainer = document.getElementById('dataContainer');
                    const githubAccount = dataContainer.getAttribute('data-github-account');
                    const perPage = dataContainer.getAttribute('data-per-page');
                    let currentPage = dataContainer.getAttribute('data-page');
                    currentPage++;
                    
                    //var url = "?github_account=taylorotwell&per_page=10&page=2";
                    var url = '?github_account=' + encodeURIComponent(githubAccount) + '&per_page=' + perPage + '&page=' + currentPage;
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
                }
            });
        });
    </script>
</body>
</html>

