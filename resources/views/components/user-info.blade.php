<h3>Username: {{ $githubAccount }}</h3>
<img src="{{ $userAvatarUrl }}" alt="Avatar" style="width: 200px; height: auto;">
<h4>Number of Followers: {{ $nFollowers }}</h4>
<br>
@if (!empty($followersAvatars))
    <div class="follower-images">
        <h3>Followers (#{{ $indx_from  }} to #{{ $indx_to }})</h3>
        @foreach ($followersAvatars as $avatarUrl)
            <img src="{{ $avatarUrl }}" alt="Follower Avatar" style="width: 100px; height: auto;">
        @endforeach
    </div>
@else
    <p>No followers found.</p>
@endif

