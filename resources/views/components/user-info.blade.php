<h3>Username: {{ $githubAccount }}</h3>
<img src="{{ $userAvatarUrl }}" alt="Avatar" style="width: 200px; height: auto;">
<h4>Number of Followers: {{ $nFollowers }}</h4>
<br>
@if (!empty($followersAvatars))
    <div class="follower-images">
        <h3>Followers (#{{ $indx_from  }} to #{{ $indx_to }})</h3>

        @if ($indx_from > 1)
            <button id="prevButton" style="font-size: 16px; padding: 8px 12px; width: 100px;">Previous</button>
        @endif
        
        @if ($indx_to < $nFollowers)
            <button id="nextButton" style="font-size: 16px; padding: 8px 12px; width: 100px;">Next</button>
        @endif

        </br></br>

        @foreach ($followersAvatars as $avatarUrl)
            <img src="{{ $avatarUrl }}" alt="Follower Avatar" style="width: 100px; height: auto;">
        @endforeach
    </div>
@else
    <p>No followers found.</p>
@endif

