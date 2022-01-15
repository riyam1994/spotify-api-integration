<html>
  <head>
    <title>Spotify</title>
  </head>
  <body>
    <h1>Spotify API Integration</h1>
    <h3>Search for Artists, Albums or Tracks</h3>
    
      
      <form method="post" action="/search">
            {{csrf_field()}}
            <span style="color:red;">@error('searchquery'){{$message}}@enderror</span>
            <input id="search-box" name="searchquery" type="text" placeholder="search for artists,albums or tracks" />
            <button type="submit">Search</button>

      </form>
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
  </body>
</html>