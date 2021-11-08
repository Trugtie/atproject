
const btnUp = document.querySelector('.btnUp');
const cateContent = document.querySelector('.cateContent');
const cateContentHeader= document.querySelector('.cateContent_header');
const cateContentDescription= document.querySelector('.cateContent_header_description');
btnUp.addEventListener("click", function(){
  if(cateContent.style.height == '52.4rem'){
    cateContent.style.height = '0';
    cateContentHeader.style.opacity = '0';
    cateContentDescription.style.opacity = '0';
  }
  else{
    cateContent.style.height = '52.4rem';
    cateContentHeader.style.opacity = '1';
    cateContentDescription.style.opacity = '1';
  }
});