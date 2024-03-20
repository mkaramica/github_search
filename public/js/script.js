// Function to send AJAX request
function sendRequest(url) {
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

function buildURL(githubAccount, perPage, page = null) {
    let url = '?github_account=' + encodeURIComponent(githubAccount) + '&per_page=' + perPage;
    if (page !== null) {
        url += '&page=' + page;
    }
    return url;
}
