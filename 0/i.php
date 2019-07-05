<?php
$value='';
if (isset($_GET['k'])){
    $value=$_GET['k'];
}
?>
<!DOCTYPE html>
<!--
  ABLoopPlayer.html

  Player for YouTube and local video and audio files with A-B loop,
  slow motion and bookmarking functionality.

  Copyright (C) 2016  Alexander Grahn

  This file is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This file is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<html lang="en"/>
<head>
  <title>AB Loop Player</title>
  <meta charset="utf-8"/>
  <meta name="application-name" content="ABLoopPlayer"/>
  <meta name="description" content="Player for YouTube and local video and audio files with
    A-B repeat, loop bookmarking, YT video search and slow/fast motion."/>
  <meta name="keywords" content="AB loop A-B repeat AB bookmark Youtube search video audio file"/>
  <meta name="author" content="Alexander Grahn"/>

  <!-- jQuery framework -->
  <link href="jquery-ui/jquery-ui.css" rel="stylesheet"/>
  <script src="jquery-ui/external/jquery/jquery.js"></script>
  <script src="jquery-ui/jquery-ui.js"></script>

  <!-- styles used in this document -->
  <link href="css/main.css" rel="stylesheet"/>

  <!-- main code that implements the video player -->
  <script src="js/main.js"></script>
</head>

<body style="margin-left: 1em; margin-right: 1em; min-width: max-content; display: inline-block;">

<h1 style="font-size: 150%; margin-top: 0; margin-bottom: 0.5em;">AB Loop Player</h1>
<div id="introText">
Player for <em>YouTube</em> and <em>local video and audio files</em> in the MP4/WebM/Ogg/MP3/WAV formats with
A-B repeat, loop bookmarking, YT video search and slow/fast motion.
</div>
<div style="margin-top: 0.5em;">Firefox or Chrome/Chromium on Desktop PCs recommended.</div>

<hr class="double" style="margin-bottom: 0px;"/>
<div style="margin-bottom: 3px; padding: 5px; background-color: #ddd;">
  <div style="display: flex;">
  YT ID / search terms:
  <input id="inputYT" list="YTids" autocomplete onfocus="this.select()"
    onkeypress="if(event && event.keyCode == 13) searchYT(this.value)" onchange="searchYT(this.value)"
    style="margin-left: 5px; margin-right: 1px; flex: 1 1 auto;" value="<?=$value?>" disabled/><datalist
        id="YTids"></datalist><!--
    --><span style="float: right;"><!--
      --><button id="searchButtonYT" onclick="searchYT(inputYT.value)"
           style="margin-left: 0px; padding: 0;" disabled><!--
        --><span class="ui-icon ui-icon-play"></span>/<span class="ui-icon ui-icon-search"></span></button>
      <input type="checkbox" onchange="contextHelp(this)" id="help"/>?
    </span>
  </div>
  Media file: <input id="inputVT" accept="video/*,audio/*" type="file" onchange="playSelectedFile(this.files[0])"/>
  <input type="checkbox" onchange="toggleAudio(this, help)" id="aonly"/>audio only
</div>

<div id="myResizable" style="background: #ddd;"></div><!-- takes one of the players -->
<div id="scrub" style="margin-top: 4px;"></div>

<div id="timeInputs" style="margin: 3px 0px 0px 0px;">
  <!-- placeholder for jQuery range slider -->
  <div id="slider" style="margin-top: 0px; margin-bottom: 2px;"></div>
  <div style="margin: 3px 0px 0px 0px; padding: 5px; background-color: #ddd;">
  A: <input id="myTimeA" onchange="onInputTime(this,0)" size="8"/>
  B: <input id="myTimeB" onchange="onInputTime(this,1)" size="8"/>
  <button id="bmkAddButton" onmouseup="bmkAdd(myTimeA.value + '--' + myTimeB.value)">
    Add Bookmark</button>
  </div>
</div>

<div style="margin: 3px 0px 0px 0px; padding: 5px; background-color: #ddd;">
A-B Loop: <input type="button" id="loopButton" value="A" onmousedown="onLoopDown()"/>
<span id="myBmkSpan" hidden>
  <style>select:invalid { color: gray; }</style>
  <select id="myBookmarks" size="1"
    onmousedown="this.size=Math.min(5,this.options.length)"
    onblur="onBmkSelect(this.selectedIndex);this.size=1;"
  >
    <option value="" selected disabled>Bookmarked</option>
  </select><!--
  --><button id="annotButton" style="width:1.5em; padding: 0px;"
    onclick="onClickAddNote(myBookmarks.selectedIndex)" disabled
    ><span class="ui-icon ui-icon-comment"></span></button><!--
  --><button id="trashButton" style="width:1.5em; padding: 0px;"
    onclick="onClickTrash(myBookmarks.selectedIndex)"
  ><span class="ui-icon ui-icon-trash"></span></button>
</span> <input type="checkbox" onchange="toggleIntro(this, help)" id="intro"/>play intro<br/>
Speed: <select id="mySpeed" onchange="mySetPlaybackRate(this.value)"
         style="margin-top: 5px;" disabled></select>
</div>
<hr class="double" style="margin-top: 0px;"/>
© 2016 Alexander Grahn
<a href="https://gitlab.com/agrahn/ABLoopPlayer" style="float: right; margin-right: 5px;">
  Visit project on <img src="svg/gitlab.svg" style="height:0.9em;"/>
</a>

<div id="test"
  style="visibility: hidden; white-space: nowrap; width: auto;position: absolute;">
Player for <em>YouTube</em> and <em>local video and audio files</em> in the MP4/WebM/Ogg/MP3/WAV</div>
</body>
</html>
