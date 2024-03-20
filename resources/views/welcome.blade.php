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
            let url = buildURL(githubAccount, perPage);
            sendRequest(url);
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                var nextButton = event.target.closest('#nextButton');
                var prevButton = event.target.closest('#prevButton');
                
                if (nextButton || prevButton) {
                    const dataContainer = document.getElementById('dataContainer');
                    const githubAccount = dataContainer.getAttribute('data-github-account');
                    const perPage = dataContainer.getAttribute('data-per-page');
                    const currentPage = parseInt(dataContainer.getAttribute('data-page'));
                    let targetPage = currentPage;
                    
                    if (nextButton) {
                        targetPage += 1; // Increment for next page
                    } else if (prevButton) {
                        targetPage -= 1; // Decrement for previous page
                    }

                    let url = buildURL(githubAccount, perPage, targetPage);
                    sendRequest(url);
                }
            });
        });
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

