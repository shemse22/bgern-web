<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
JPG To PDF Converter
</h1>


<p class="text-center text-gray-500">
Convert images into a PDF document instantly
</p>



<label id="drop-area"
class="
block
border-2
border-dashed
border-indigo-300
rounded-3xl
p-10
text-center
cursor-pointer
hover:bg-indigo-50
transition
">


<svg class="w-14 h-14 mx-auto text-indigo-500 mb-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">


<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>


</svg>


<p class="font-semibold text-gray-700">
Drop images here
</p>


<p class="text-sm text-gray-400">
JPG, PNG, WEBP supported
</p>



<input
id="image-input"
type="file"
multiple
accept="image/*"
class="hidden">


</label>





<div id="info"
class="hidden bg-indigo-50 rounded-xl p-4 text-center">

<span id="image-count">
0
</span>
images selected

</div>




<div id="preview-list"
class="grid grid-cols-3 gap-3">

</div>




<button
id="convert-btn"
disabled
class="
w-full
bg-indigo-600
hover:bg-indigo-700
disabled:opacity-40
text-white
py-3
rounded-xl
font-semibold">

Convert To PDF

</button>




<a
id="download"
class="
hidden
block
text-center
bg-green-600
text-white
py-3
rounded-xl
font-semibold">

Download PDF

</a>



<p id="status"
class="text-center text-sm text-gray-500">

</p>



<p class="text-center text-xs text-gray-400">
🔒 Images are processed locally in your browser
</p>


</div>







<script>


let images=[];



const input=
document.getElementById("image-input");


const drop=
document.getElementById("drop-area");


const preview=
document.getElementById("preview-list");





input.onchange=e=>{

addImages(
Array.from(e.target.files)
);

};





drop.ondragover=e=>{

e.preventDefault();

};



drop.ondrop=e=>{

e.preventDefault();

addImages(
Array.from(e.dataTransfer.files)
);

};





function addImages(files){


files.forEach(file=>{


if(file.type.startsWith("image/")){

images.push(file);

}


});


render();


}




function render(){


preview.innerHTML="";


images.forEach((file,index)=>{


let div=document.createElement("div");


div.className=
"relative";



div.innerHTML=`

<img 
src="${URL.createObjectURL(file)}"
class="
w-full
h-24
object-cover
rounded-xl
border">


<button
onclick="removeImage(${index})"
class="
absolute
top-1
right-1
bg-red-500
text-white
rounded-full
w-6
h-6">

×


</button>

`;



preview.appendChild(div);



});



document
.getElementById("image-count")
.textContent=
images.length;



document
.getElementById("info")
.classList
.toggle(
"hidden",
images.length===0
);



document
.getElementById("convert-btn")
.disabled=
images.length===0;


}





function removeImage(index){

images.splice(index,1);

render();

}







document
.getElementById("convert-btn")
.onclick=
async()=>{


if(images.length===0)return;


const status=
document.getElementById("status");


status.textContent=
"Creating PDF...";



const {jsPDF}=window.jspdf;


let pdf=
new jsPDF(
"p",
"mm",
"a4"
);



for(
let i=0;
i<images.length;
i++
){


let data=
await readFile(images[i]);


let img=
await load(data);



let width=
pdf.internal.pageSize.getWidth();


let height=
pdf.internal.pageSize.getHeight();



let ratio=
Math.min(
width/img.width,
height/img.height
);



let imgWidth=
img.width*ratio;


let imgHeight=
img.height*ratio;



if(i>0)
pdf.addPage();



pdf.addImage(
data,
"JPEG",
(width-imgWidth)/2,
(height-imgHeight)/2,
imgWidth,
imgHeight
);



}





let blob=
pdf.output(
"blob"
);



let url=
URL.createObjectURL(blob);



let download=
document.getElementById("download");



download.href=url;


download.download=
"images-to-pdf.pdf";


download.classList.remove("hidden");



status.textContent=
"PDF created successfully";


};








function readFile(file){


return new Promise(resolve=>{


let reader=
new FileReader();


reader.onload=
()=>resolve(reader.result);


reader.readAsDataURL(file);


});


}




function load(src){


return new Promise(resolve=>{


let img=
new Image();


img.onload=
()=>resolve(img);


img.src=src;


});


}


</script>