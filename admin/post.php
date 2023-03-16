<?php

header("location:https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=fKOBgeDLXpFLKHTC4rq0fL7jGTkeVpqXTKdWKpec3UuD3CpPBlPltE5yPsYC&from=BulkSMS.ng&to=2348148677134,2348124194767&body=we are the champions&dnd=1
")
if(http_response_code(200)){
	echo "your message has been sent successfully";
}
else{
	echo "error "
}
?>

