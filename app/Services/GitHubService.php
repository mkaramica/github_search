namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected $baseUrl = 'https://api.github.com';

    public function userExists($username)
    {
        $response = Http::get("$this->baseUrl/users/$username");

        return $response->successful();
    }
}
