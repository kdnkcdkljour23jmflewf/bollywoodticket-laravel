<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
  @extends('web.hallbook.style')
  <form action="" method="post">
      <div class="movie-container" style="display:none">
        <h2>HomeBoxOffice</h2>
        <label>Select a Movie:</label>
        <select id="movie">
          <option value="Select a movie">Select a Movie</option>
          <option value="15">Wonder Women 1984</option>
          <option value="10">Avenger: Endgame</option>
          <option value="12">Joker</option>
          <option value="8">Toy Story 4</option>
        </select>
      </div>

      <ul class="showcase">
        <li>
          <div class="seat"></div>
          <small>Available</small>
        </li>
        <li>
          <div class="seat selected"></div>
          <small>Selected</small>
        </li>
        <li>
          <div class="seat"></div>
          <small>Occupied</small>
        </li>
      </ul>

      <div class="container">
        <div class="screen"></div>

        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
        <div class="row">
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
          <div class="seat"></div>
        </div>
      </div>

      <p class="text">
        You have selected <span id="count">0</span> movies for price of $<span
          id="total"
          >0</span
        >
      </p>
    <input type="hidden" name="seatselect" id="seatselect">
    <input type="submit" value="BookTicket" class="btn btn-primary">
    @csrf
  </form>
  @extends('web.hallbook.script')
</body>
</html>