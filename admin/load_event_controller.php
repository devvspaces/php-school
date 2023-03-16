<?php
include("../class.php");

$show = mysqli_query($con, "SELECT * from event");
while ($op = mysqli_fetch_array($show)) {
	$event_id = $op['sn'];
	$event = $op['event'];
	$date = $op['date'];
	$time = $op['time'];
	$venue = $op['venue'];
	echo "<tr>
			<td>$event</td>
			<td>$date</td>
			<td>$time</td>
			<td>$venue</td>
			<td>
				<a href='delete_event.php?is=$event_id' class='btn'><span class='glyphicon glyphicon-trash' title='delete' ></span> Delete</a>
				<a href='bulk_message.php?event_id=$event_id' class='btn' data='$event_id'><span class='glyphicon glyphicon-envelope' title='delete' ></span> Send Reminder</a></td>
			</tr>";
}
