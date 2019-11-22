// window.onload = function() {
//     document.getElementById("clickme").onclick = changeColor;
// };
// function changeColor(){
//   alert('Hello world!');
// 	var textbox = document.getElementById("textbox");
// 	textbox.value="Hello, world!";
// 	textbox.style.color="red";
//
// }
function bigger(){
	//alert("Hello World!");
	//$("textbox").style.fontSize="24pt";

	$("textbox").style.fontSize=parseInt($("textbox").style.fontSize)+(multiplier * 0.2)+"pt";

}

function blingcheck(){
	if(document.getElementById("bling").checked){
		//alert("Hello World!");
		$("textbox").style.fontWeight="bold";
		$("textbox").style.color="green";
		$("textbox").style.textDecoration="underline";

	}else{
		$("textbox").style.fontWeight="normal";
		$("textbox").style.color="black";
		$("textbox").style.textDecoration="none";
	}
}

function snoopify(){
	var text=document.getElementById("textbox");
	var x=text.value.toUpperCase();
	text.value=x.split(".").join("-izzle");
	// ("textbox").value.split(".").join("izzle");
}

function larger(){
	var text=document.getElementById("textbox");
	alert("hh");
}

function timelg(){
	setInterval(larger(),2000);

}

























//
// 27,35 $("").value.split(".").join()
//
// 7-9setinterval
//
// 8-
// window.onload
// $().onclick=setfontsize;
//
//
// if(fdf.inclue)
// word.push sguft
