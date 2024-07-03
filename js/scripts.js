document.getElementById('searchButton').addEventListener('click', function() {
    const query = document.getElementById('searchQuery').value;
    fetch(`php/search.php?query=${query}`)
      .then(response => response.json())
      .then(data => {
        const results = document.getElementById('searchResults');
        results.innerHTML = '';
        data.data.forEach(track => {
          const trackElement = document.createElement('div');
          trackElement.textContent = `${track.title} by ${track.artist.name}`;
          const addButton = document.createElement('button');
          addButton.textContent = 'Add to Playlist';
          addButton.addEventListener('click', () => addToPlaylist(track));
          trackElement.appendChild(addButton);
          results.appendChild(trackElement);
        });
      });
  });
  
  document.getElementById('myPlaylistButton').addEventListener('click', function() {
    fetch('php/get_playlist.php')
      .then(response => response.json())
      .then(data => {
        const playlistContainer = document.getElementById('playlistContainer');
        playlistContainer.innerHTML = '';
        data.forEach(track => {
          const trackElement = document.createElement('div');
          trackElement.textContent = `${track.track_name} by ${track.artist_name}`;
          const audioElement = document.createElement('audio');
          audioElement.controls = true;
          audioElement.src = track.preview_url; // Assuming you store the preview URL
          const deleteButton = document.createElement('button');
          deleteButton.textContent = 'Delete';
          deleteButton.addEventListener('click', () => deleteTrack(track.id));
          trackElement.appendChild(audioElement);
          trackElement.appendChild(deleteButton);
          playlistContainer.appendChild(trackElement);
        });
      });
  });
  
  function addToPlaylist(track) {
    fetch('php/playlist.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(track),
    })
    .then(response => response.text())
    .then(message => {
      alert(message);
    });
  }
  
  function deleteTrack(trackId) {
    fetch('php/delete_track.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ id: trackId }),
    })
    .then(response => response.text())
    .then(message => {
      alert(message);
      document.getElementById('myPlaylistButton').click(); // Refresh playlist
    });
  }
  