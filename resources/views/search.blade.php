<html>
  <head>
    <title>Spotify</title>
  </head>
  <body>
    <h1>Spotify API Intergration</h1>
    
    @if(isset($error))
    <p>Invalid Client. Please check and edit the client id and secret key in controller Search.php</p>
    <a type="btn btn-mini" href="/">Back</a>
    </br>
    <section>
      <span style="color:red;font-weight:bold;">NOTE:</span> 
      <ul>
        <li>To use the Web API, start by creating a Spotify user account (Premium or Free).</li>
        <li> To do that, simply sign up at www.spotify.com.</li>
        <li>When you have a user account, go to the Dashboard page at the Spotify Developer website and, if necessary, log in.</li> 
        <li>Accept the latest Developer Terms of Service to complete your account set up.</li>
        <li>Login to Spotify Developer Dahboard - <a target="_blank" href="https://developer.spotify.com/">https://developer.spotify.com/</a>.</li>
        <li>Create <a target="_blank" href="https://developer.spotify.com/documentation/general/guides/authorization/app-settings/">an app</a></li>
        <li>Click on the app created to get the client id and secret key.</li>
        <li>Use this id and key in Search.php Controller to get the Access Token.</li>
      </ul>
    </section>
    @else
      Your search Term is - {{$searchquery}}
      <h2>Search Results:</h2>
      
      <h3>ARTISTS:</h3>
      @php
      $artistsList = $searchResult['artists']['items'];
      @endphp
      
      <table border=1>
        <thead>
          <tr>
            <th>#</th><th>Album</th>
          </tr>
        </thead>
        <tbody>
        @if(count($artistsList) > 0)
            @for($i=0;$i<(count($artistsList));$i++)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>
                    @if(count($artistsList[$i]['images']) > 0)
                    <img style="height:{{$artistsList[$i]['images'][2]['height']}},width:{{$artistsList[$i]['images'][2]['width']}}" src="{{$artistsList[$i]['images'][2]['url']}}" alt="album image" />
                    @else
                    <p>NO PREVIEW IMAGE AVAILABLE</p>
                    @endif
                    <p><a href="/detail/artists/{{ $artistsList[$i]['id'] }}" >{{ $artistsList[$i]['name'] }}</a></p>
                  </td>
                </tr>
            @endfor
          @else
          <tr>
            <td colspan="2">No Artists to List</td>
          </tr>
          @endif
        </tbody>
      </table>
      <div>
      <!-- @if(isset($searchResult['artists']['total']))
        <p>Total {{$searchResult['artists']['total']}} results</p>
      @endif
      @if(isset($searchResult['artists']['next']))
        <a onclick="shownext('{{$searchResult['artists']['next']}}');">Next</a>
      @endif
      @if(isset($searchResult['artists']['previous']))
        <a href="">Previous</a>
      @endif -->
      </div>
      <h3>ALBUMS</h3>
      @php
      $albumsList = $searchResult['albums']['items'];
      @endphp
      <table border=1>
        <thead>
          <tr>
            <th>#</th><th>Album</th>
          </tr>
        </thead>
        <tbody>
          @if(count($albumsList) > 0)
            @for($i=0;$i<(count($albumsList));$i++)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>
                    @if(count($albumsList[$i]['images']) > 0)
                    <img style="height:{{$albumsList[$i]['images'][2]['height']}},width:{{$albumsList[$i]['images'][2]['width']}}" src="{{$albumsList[$i]['images'][2]['url']}}" alt="album image" />
                    @else
                    <p>NO PREVIEW IMAGE AVAILABLE</p>
                    @endif
                    <p><a href="/detail/albums/{{ $albumsList[$i]['id'] }}" >{{ $albumsList[$i]['name'] }}</a></p>
                  </td>
                </tr>
            @endfor
          @else
          <tr>
            <td colspan="2">No Album to List</td>
          </tr>
          @endif
        </tbody>
      </table>
      <h3>TRACKS</h3>
      @php
      $tracksList = $searchResult['tracks']['items'];
      @endphp
      <table border=1>
        <thead>
          <tr>
            <th>#</th><th>Track</th>
          </tr>
        </thead>
        <tbody>
        @if(count($tracksList) > 0)
            @for($i=0;$i<(count($tracksList));$i++)
                <tr>
                  <td>{{$i+1}}</td>
                  <td>
                  @if(count($tracksList[$i]['album']['images']) > 0)
                    <img style="height:{{$tracksList[$i]['album']['images'][2]['height']}},width:{{$tracksList[$i]['album']['images'][2]['width']}}" src="{{$tracksList[$i]['album']['images'][2]['url']}}" alt="album image" />
                    @else
                    <p>NO PREVIEW IMAGE AVAILABLE</p>
                    @endif
                    <p><a href="/detail/tracks/{{ $tracksList[$i]['id'] }}" >{{ $tracksList[$i]['album']['name'] }}</a></p>
                  </td>
                </tr>
            @endfor
            @else
            <tr>
              <td colspan="2">No Tracks to List</td>
            </tr>
            @endif
        </tbody>
      </table>
    @endif
      <script>
        functon shownext(nexturl){
          alert(nexturl);
        }
      </script>
  </body>
</html>

