<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">

<h1 class="text-3xl font-bold text-center text-gray-900">
    Image Compressor
</h1>

<p class="text-center text-gray-500">
    Compress images online without uploading
</p>


<label id="drop-area"
class="block border-2 border-dashed border-indigo-300 rounded-2xl p-10 text-center cursor-pointer hover:bg-indigo-50 transition">


<svg class="w-14 h-14 mx-auto text-indigo-500 mb-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

</svg>


<p class="font-semibold text-gray-700">
Drop image here
</p>

<p class="text-sm text-gray-400">
or click to upload
</p>


<input 
id="compress-input"
type="file"
accept="image/*"
class="hidden">

</label>



<div id="compress-controls"
class="hidden space-y-5">


<div class="grid grid-cols-3 gap-3">


<div class="bg-gray-100 rounded-xl p-3 text-center">

<p class="text-xs text-gray-500">
Original
</p>

<b id="original-size">-</b>

</div>



<div class="bg-indigo-50 rounded-xl p-3 text-center">

<p class="text-xs text-gray-500">
Compressed
</p>

<b id="compressed-size"
class="text-indigo-600">
-
</b>

</div>



<div class="bg-green-50 rounded-xl p-3 text-center">

<p class="text-xs text-gray-500">
Saved
</p>

<b id="saved"
class="text-green-600">
-
</b>

</div>


</div>



<div>

<label class="text-sm font-medium">

Quality:
<span id="quality-value">
75
</span>%

</label>


<input 
id="quality-slider"
type="range"
min="10"
max="100"
value="75"
class="w-full mt-2">


</div>



<img id="preview-img"
class="hidden w-full max-h-72 object-contain rounded-xl border">



<button id="download-btn"
class="hidden w-full py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700">

Download Compressed Image

</button>


</div>



<p id="status-msg"
class="text-sm text-gray-500 text-center">
</p>


</div>




<script>


let originalImage=null;
let originalSize=0;
let fileName="image";


const input=document.querySelector("#compress-input");
const drop=document.querySelector("#drop-area");

const controls=document.querySelector("#compress-controls");

const quality=document.querySelector("#quality-slider");
const qualityValue=document.querySelector("#quality-value");

const preview=document.querySelector("#preview-img");

const download=document.querySelector("#download-btn");


input.onchange=e=>{

loadImage(e.target.files[0]);

};



drop.ondragover=e=>{

e.preventDefault();

drop.classList.add("bg-indigo-50");

};


drop.ondrop=e=>{

e.preventDefault();

loadImage(e.dataTransfer.files[0]);

};



function loadImage(file){

if(!file) return;


if(!file.type.startsWith("image/")){

alert("Only images allowed");

return;

}


originalSize=file.size;

fileName=file.name.split(".")[0];


document.querySelector("#original-size")
.textContent=formatBytes(file.size);



let reader=new FileReader();


reader.onload=e=>{


let img=new Image();


img.onload=()=>{

originalImage=img;

controls.classList.remove("hidden");

compress();

};


img.src=e.target.result;


};


reader.readAsDataURL(file);


}



quality.oninput=()=>{

qualityValue.textContent=quality.value;

compress();

};



function compress(){


if(!originalImage)return;



let canvas=document.createElement("canvas");


let maxWidth=2000;


let scale=Math.min(
maxWidth/originalImage.width,
1
);



canvas.width=
originalImage.width*scale;


canvas.height=
originalImage.height*scale;



let ctx=canvas.getContext("2d");


ctx.drawImage(
originalImage,
0,
0,
canvas.width,
canvas.height
);



canvas.toBlob(blob=>{


let url=
URL.createObjectURL(blob);



preview.src=url;

preview.classList.remove("hidden");



document.querySelector("#compressed-size")
.textContent=
formatBytes(blob.size);



let saved=
((1-(blob.size/originalSize))*100)
.toFixed(1);



document.querySelector("#saved")
.textContent=
saved+"%";



download.classList.remove("hidden");


download.onclick=()=>{


let a=document.createElement("a");

a.href=url;

a.download=
fileName+"-compressed.jpg";

a.click();


};



},
"image/jpeg",
quality.value/100
);



}



function formatBytes(bytes){

if(bytes<1024)
return bytes+" B";


if(bytes<1024*1024)
return (bytes/1024).toFixed(1)+" KB";


return (bytes/1024/1024).toFixed(2)+" MB";

}



</script>