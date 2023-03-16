function generatePDF(){
	const element  =  document.getElementById("contentx");
	html2pdf()
	.from(element)
	.save();
}