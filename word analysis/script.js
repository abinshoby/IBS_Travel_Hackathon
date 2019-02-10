var url="https://s3-us-west-2.amazonaws.com/tkmce-chunks/output"
function insertBar(title, height) {
  var chart = document.getElementById("chart"),
  bar = document.createElement("li");
  barSpan = document.createElement("span");

  barSpan.style.height = height;
  barSpan.setAttribute("title", title);
  bar.appendChild(barSpan);
  chart.appendChild(bar);
}

function calculateHeight(data) {
  var maxCount = 0;
  for(var i=0; i<data.length; i++) {
  	if(data[i]["count"] > maxCount) {
  		maxCount = data[i]["count"];
  	}
  }
  for(var i=0; i<data.length; i++) {
  	data[i]["height"] = (data[i]["count"] / maxCount) * 100;
  }
}

function getData(url) {
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {
  	if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
  	  data = JSON.parse(xmlHttp.responseText);
  	  var subsetData = data.slice(0, 9);
  	  calculateHeight(subsetData);
  	  for(var i=0; i<subsetData.length; i++) {
  	  	insertBar(subsetData[i]["word"], subsetData[i]["height"] + "%");
  	  }
  	}
  }
  xmlHttp.open("GET", url, true);
  xmlHttp.send();
}

window.onload = getData(url);
window.onload=getData(url);
