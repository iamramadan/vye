let array = [
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"},
    {dp:"/imgs/com_alibaba_intl_android_apps_poseidon.webp"}
   ];
   
   
   let parentElement = "";
   let storyElement = document.querySelector(".stories");
   
   array.forEach(function(element, index){
   parentElement +=`<div class="story">
        <img id="${index}" src="${element.dp}">
       </div>`;
   });
   
   storyElement.innerHTML = parentElement;
   
   storyElement.addEventListener("click", function(dets){
    let image = array[dets.target.id].story;
    document.querySelector(".full-screen").style.display = "block";
    document.querySelector(".full-screen").style.backgroundImage = `url(${image})`;
   
    setTimeout(function(){
     document.querySelector(".full-screen").style.display = "none";
    },3000)
   });