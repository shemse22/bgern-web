<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>


<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
PDF Splitter
</h1>


<p class="text-center text-gray-500">
Split PDF pages instantly. Your files stay private.
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
Drop PDF here
</p>


<p class="text-sm text-gray-400">
or click to upload
</p>



<input 
id="pdf-input"
type="file"
accept="application/pdf"
class="hidden">


</label>




<div id="info"
class="hidden bg-gray-50 rounded-xl p-4">


<div class="flex justify-between">

<span>
File
</span>

<b id="file-name">
-
</b>


</div>


<div class="flex justify-between mt-2">

<span>
Pages
</span>

<b id="page-count">
-
</b>


</div>


<div class="flex justify-between mt-2">

<span>
Size
</span>

<b id="file-size">
-
</b>


</div>


</div>




<div id="controls"
class="hidden space-y-4">


<div class="grid grid-cols-2 gap-4">


<div>

<label class="text-sm">
From page
</label>

<input 
id="from-page"
type="number"
value="1"
class="w-full border rounded-xl p-3">


</div>



<div>

<label class="text-sm">
To page
</label>


<input 
id="to-page"
type="number"
value="1"
class="w-full border rounded-xl p-3">


</div>


</div>




<button
id="split-btn"
class="
w-full
bg-indigo-600
hover:bg-indigo-700
text-white
py-3
rounded-xl
font-semibold">

Split PDF

</button>



<a
id="download"
class="
hidden
block
text-center
w-full
bg-green-600
text-white
py-3
rounded-xl
font-semibold">

Download PDF

</a>


</div>




<p id="status"
class="text-center text-sm text-gray-500">

</p>


</div>





<script>


let pdfFile=null;
let totalPages=0;



const input=
document.getElementById("pdf-input");


const drop=
document.getElementById("drop-area");



input.onchange=e=>{

loadPDF(e.target.files[0]);

};




drop.ondragover=e=>{

e.preventDefault();

drop.classList.add("bg-indigo-50");

};



drop.ondrop=e=>{

e.preventDefault();

loadPDF(e.dataTransfer.files[0]);

};





async function loadPDF(file){


if(!file)return;


if(file.type!=="application/pdf"){

alert("Please upload PDF file");

return;

}



pdfFile=file;



document.getElementById("file-name")
.textContent=file.name;



document.getElementById("file-size")
.textContent=formatBytes(file.size);



const bytes=
await file.arrayBuffer();



const pdf=
await PDFLib.PDFDocument.load(bytes);



totalPages=
pdf.getPageCount();



document.getElementById("page-count")
.textContent=
totalPages;



document.getElementById("from-page")
.max=
totalPages;


document.getElementById("to-page")
.max=
totalPages;


document.getElementById("to-page")
.value=
totalPages;



document.getElementById("info")
.classList.remove("hidden");


document.getElementById("controls")
.classList.remove("hidden");


document.getElementById("status")
.textContent=
"PDF ready";


}






document
.getElementById("split-btn")
.onclick=
async()=>{


let from=
Number(document.getElementById("from-page").value);


let to=
Number(document.getElementById("to-page").value);



if(from<1 || to>totalPages || from>to){

document.getElementById("status")
.textContent=
"Invalid page range";


return;

}



document.getElementById("status")
.textContent=
"Processing PDF...";



const bytes=
await pdfFile.arrayBuffer();


const source=
await PDFLib.PDFDocument.load(bytes);



const newPdf=
await PDFLib.PDFDocument.create();



let pages=[];


for(
let i=from-1;
i<=to-1;
i++
){

pages.push(i);

}



const copied=
await newPdf.copyPages(
source,
pages
);



copied.forEach(
p=>newPdf.addPage(p)
);



const output=
await newPdf.save();



const blob=
new Blob(
[output],
{
type:"application/pdf"
}
);



const url=
URL.createObjectURL(blob);



const download=
document.getElementById("download");



download.href=url;


download.download=
`split-${from}-${to}.pdf`;


download.classList.remove("hidden");



document.getElementById("status")
.textContent=
"Completed successfully";


};





function formatBytes(bytes){

if(bytes<1024)
return bytes+" B";


if(bytes<1024*1024)
return(
bytes/1024
).toFixed(1)+" KB";


return(
bytes/1024/1024
).toFixed(2)+" MB";

}


</script>