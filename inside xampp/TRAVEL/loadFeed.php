<?php
$con = mysqli_connect("localhost","root","","www");
mysqli_set_charset($con,"utf8");
$sql = "SELECT * FROM experience ORDER BY upvote DESC";
$res = $con->query($sql);
echo '
		<div id="hidden"></div>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8" id="post">
				<div class="row">
					<textarea class="form-control" rows="3" id="userpost" placeholder="Write down your experience"></textarea>
				</div>	
				<div class="row" id="postdetails">
					<div class="col-sm-6">
						<input class="form-control" type="text" placeholder="Enter the state name..." id="poststate">
					</div>
					<div class="col-sm-6">
						<input class="form-control" type="number" placeholder="Enter the average expense..." id="postcost">
					</div>
					<div class="col-sm-6">
						<input class="form-control" type="text" placeholder="Enter the title..." id="posttitle">
					</div>
					<div class="col-sm-6">
						<select id="posttag" class="form-control">Choose The Tag
							<option value="localitem">Local Item</option>
							<option value="localplaces">Local Place</option>
							<option value="localfood">Local Food</option>
						</select>
					</div>
					<div class="col-sm-12 postnav" id="submitpost" onclick="submitpost()">Post Your Experience</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
';
while($row = $res->fetch_assoc()){
	echo '
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 feed">
				<div class="row feedHeading">
					<div class="userpic"></div>
					<div class="userid" id="userid';echo $row['id'];echo'"></div>
					<div class="username">';echo $row['username'];echo'</div>
					<div class="usertitle">';echo $row['title'];echo'</div>
				</div>
				<div class="row feedContent">
					<div class="feedtext row">
						<div class="row" id="';echo $row['id'];echo'">
							';echo $row['experience'];echo'
						</div>';
	if($row['image']!=NULL){
echo '						<div class="row" id="feedimg">
							<img src="';echo $row['image'];echo'" class="img-responsive"/>
						</div><div class="row"></div>'	;
	}

					echo'</div>
				</div>
				<div class="row feedResponse">
					<div class="col-sm-4 commentNav" id="com';echo $row['id'];echo'" onclick="showcomm(';echo $row['id'];echo')">Comments</div>
					<div class="col-sm-4 translateNav" onclick="showlang(';echo $row['id'];echo')">Translate</div>
					<div class="translatePopup" id="trans';echo $row['id'];echo'">
						<center><form id="languages">
						<select id="language';echo $row['id'];echo'">
							<option value="en">English</option>
							<option value="hi">Hindi</option>
							<option value="ml">Malayalam</option>
							<option value="tl">Tamil</option>
							<option value="ge">German</option>
							<option value="bn">Bengali</option>
							<option value="ja">Japanese</option>
							<option value="zh">Chinese</option>
						</select>
						<button type="button" onclick="sendtrans(';echo $row['id'];echo')">OK</button>
						</form></center>
					</div>
					<div class="col-sm-4 upvoteNav" id="upvote';echo $row['id'];echo'" onclick="upvote(';echo $row['id'];echo')">Upvote | ';echo $row['upvote'];echo'</div>
				</div>
				<div class="row readcomment" id="readcommentid';echo $row['id'];echo'">
					
					<div class="row eachcomment">
						<div class="col-sm-2">
							<center><div class="comuserpic"></div></center>
						</div>
						<div class="col-sm-10">and float them to the left to make them appear on the same line as controls which is better for 2 column form layout. and float them to the left to make them appear on the same line as controls which is better for 2 column form layout.</div>
					</div>
					
				</div>
				<div class="row postcomment">
					<form action="" method="post">
						<div class="col-sm-10">
							<textarea type="text" class="form-control" placeholder="Write Your Comment..." id="commenttext" rows="1"></textarea>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn" id="commentbtn">POST</button>
						</div>
					</form>
				</div>
				
			</div>
			<div class="col-sm-2"></div>
		</div>	
	';
}
	

?>